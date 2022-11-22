<?php

class Ebook extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['nomor_induk'])) {
            $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible">
            Maaf, anda belum login!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>');
            redirect('Login');
        }
        $this->load->model('M_ebook');
        $this->load->library('pdf_report');
    }

    public function index()
    {
        $isi['isi'] = 'Ebook/V_ebook';
        $isi['judul'] = 'Data E-book';
        $isi['data'] = $this->db->get('ebook')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function detail($id)
    {
        $isi['isi'] = 'Ebook/Detail_ebook';
        $isi['judul'] = 'Detail E-book';
        $isi['data'] = $this->M_ebook->getData($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function tambahEbook()
    {
        $isi['isi'] = 'Ebook/Form_tambah';
        $isi['judul'] = 'Tambah E-book';
        $isi['id_ebook'] = $this->M_ebook->id_ebook();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $this->load->library('upload');
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '50000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('pdf')) {
            $file =  $this->upload->data();
            $fileName = '.assets/upload/' . $file['file_name'];

            $data = array(
                'id_ebook' => $this->input->post('id_ebook'),
                'nama_ebook' => $this->input->post('nama_ebook'),
                'deskripsi_ebook' => $this->input->post('deskripsi_ebook'),
                'pdf' => $file['file_name'],
            );

            $this->M_ebook->tambah($data);
            $this->session->set_flashdata('info', 'Data added successfully');
            redirect('Ebook');
        } else {
            $this->session->set_flashdata('info', 'failed to upload pdf');
            redirect('Ebook/tambahEbook');
        }
    }
    public function ubah($id)
    {
        $isi['isi'] = 'Ebook/Form_edit';
        $isi['judul'] = 'Form Edit Ebook';
        $isi['data'] = $this->M_ebook->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        // echo '<pre>';
        // var_dump($this->input->post());
        // var_dump($_FILES);
        // echo '</pre>';
        // die();
        $id_ebook = $this->input->post('id_ebook');
        $nama_ebook = $this->input->post('nama_ebook');
        $deskripsi_ebook = $this->input->post('deskripsi_ebook');
        $pdf_lama = $this->input->post('pdf_lama');

        $data1 = array(
            'id_ebook' => $id_ebook,
            'nama_ebook' => $nama_ebook,
            'deskripsi_ebook' => $deskripsi_ebook,
        );
        $upload_pdf = $_FILES['pdf']['name'];

        if ($upload_pdf) {
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '50000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (isset($pdf_lama)) {
                unlink(FCPATH . 'assets/upload/' . $pdf_lama);
            } else {
                echo 'upload gagal';
            }
            // LAKUKAN UPLOAD
            $this->upload->do_upload('pdf');
            $pdf_baru = $this->upload->data('file_name');
        } else {
            $pdf_baru = $pdf_lama;
        }
        $data1 = array(
            'pdf' => $pdf_baru
        );
        $this->M_ebook->update('ebook', ['id_ebook' => $id_ebook], $data1);
        $this->session->set_flashdata('info', 'Data updated successfully');
        redirect('Ebook');
    }

    public function convert()
    {

        $config                   = array();
        $config['allowed_types']  = 'pdf';
        $config['overwrite']      = TRUE;
        $config['remove_spaces']  = TRUE;

        $this->load->library('upload', $config);

        // Image manipulation library
        $this->load->library('image_lib');

        foreach ($notes['pdf'] as $key => $notes) {
            $_FILES['pdf']['name']      = $notes['name'][$key];
            $_FILES['pdf']['type']      = $notes['type'][$key];
            $_FILES['pdf']['tmp_name']  = $notes['tmp_name'][$key];
            $_FILES['pdf']['error']     = $notes['error'][$key];
            $_FILES['pdf']['size']      = $notes['size'][$key];

            $extension                    = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $unique_no                    = uniqid(rand(), true);
            $filename[$key]               = $unique_no . '.' . $extension; // with ex
            $filename2[$key]              = $unique_no; // without ex

            $target_path                  = "assets/upload/";

            if (!is_dir($target_path)) {
                mkdir('./' . $target_path, 0777, true);
            }

            $config['file_name']          = $filename[$key];
            $config['upload_path']        = './' . $target_path;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('pdf')) {
                return array('error' => $this->upload->display_errors());
            }

            // converting pdf to images with imagick
            $im             = new Imagick();
            $im->setResolution(160, 220);

            $ig = 0;

            while (true) {
                try {
                    $im->readimage($config['upload_path'] . $config['file_name'] . "[$ig]");
                } catch (Exception $e) {
                    $ig = -1;
                }

                if ($ig === -1) break;

                $im->setImageBackgroundColor('white');
                $im->setImageAlphaChannel(imagick::ALPHACHANNEL_REMOVE);
                $im->mergeImageLayers(imagick::LAYERMETHOD_FLATTEN);
                $im->setImageFormat('jpg');

                $image_name     = $filename2[$key] . "_$ig" . '.jpg';
                $imageprops     = $im->getImageGeometry();

                $im->writeImage($config['upload_path'] . $image_name);
                $im->clear();
                $im->destroy();

                // change file permission for file manipulation
                chmod($config['upload_path'] . $image_name, 0777); // CHMOD file

                // add watermark to image
                // $img_manip              = array();
                // $img_manip              = array(
                //     'image_library'     => 'gd2',
                //     'wm_type'           => 'overlay',
                //     'wm_overlay_path'   => FCPATH . '/uploads/institutes/'.$institute_logo, // path to watermark image
                //     'wm_x_transp'       => '10',
                //     'wm_y_transp'       => '10',
                //     'wm_opacity'        => '10',
                //     'wm_vrt_alignment'  => 'middle',
                //     'wm_hor_alignment'  => 'center',
                //     'source_image'      => $config['upload_path'] . $image_name
                // );

                // $this->image_lib->initialize($img_manip);
                // $this->image_lib->watermark();

                ImageJPEG(ImageCreateFromString(file_get_contents($config['upload_path'] . $image_name)), $config['upload_path'] . $image_name,);

                $ig++;
            }

            // unlink the original pdf file
            chmod($config['upload_path'] . $config['file_name'], 0777); // CHMOD file
            unlink($config['upload_path'] . $config['file_name']);    // remove file
        }
        //echo '<p>Success</p>';
        exit;
        die(json_encode(array(
            'data' => 'Success',
            'status' => 'success'
        )));
    }

    public function hapus($id)
    {
        $que = $this->M_ebook->hapus($id);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data erased successfully');
            redirect('Ebook');
        }
    }
}
