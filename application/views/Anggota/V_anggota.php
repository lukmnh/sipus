<style>
    .btn-lihat {
        margin-left: -40px;
    }
</style>

<?php
if ($this->session->userdata('level') == '1') { ?>
    <?php
    if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-success alert-dismissible">
            <?= $this->session->flashdata('info'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div> <?php }
                ?>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <a href="<?= base_url() ?>Anggota/tambah" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah Anggota</a>
                </div>
                <div class="col-md-1">
                    <a href="<?= base_url() ?>Laporan/pdfAnggota" class="btn btn-danger btn-block btn-lihat" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;PDF</a>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Anggota</th>
                        <th>NISN</th>
                        <th>Nama Anggota</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $row->id_anggota; ?></td>
                            <td><?= $row->nomor_induk; ?></td>
                            <td><?= $row->nama_anggota; ?></td>
                            <td><?= $row->kelas; ?></td>
                            <td><?= $row->jenis_kelamin; ?></td>
                            <td><?= $row->alamat; ?></td>
                            <td><?= $row->no_hp; ?></td>
                            <td>
                                <a href="<?= base_url() ?>Anggota/ubah/<?= $row->id_anggota; ?>" class="btn-ubah btn-primary btn-xs">ubah</a>
                                <a href="<?= base_url() ?>Anggota/hapus/<?= $row->id_anggota; ?>" class="btn-hapus btn-danger btn-xs" onclick="return confirm('Apa anda yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <!-- /.card-header -->
    <?php
    if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-success alert-dismissible">
            <?= $this->session->flashdata('info'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div> <?php }
                ?>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <?php
            foreach ($data1 as $row) { ?>
                <a href="<?= base_url() ?>Anggota/ubah/<?= $row->id_anggota; ?>" class="btn-ubah btn-primary btn-xs">ubah</a>
                <tr>
                    <td>ID Anggota</td>
                    <td><?= $row->id_anggota; ?></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td><?= $row->nomor_induk; ?></td>
                </tr>
                <tr>
                    <td>Nama Anggota</td>
                    <td><?= $row->nama_anggota; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><?= $row->kelas; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= $row->jenis_kelamin; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $row->alamat; ?></td>
                </tr>
                <tr>
                    <td>No Telfon</td>
                    <td><?= $row->no_hp; ?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
    </div>
<?php }
?>