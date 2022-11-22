<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success alert-dismissible">
        <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div> <?php }
            ?>
<?php
if ($this->session->userdata('level') == '1') { ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url() ?>Ebook/tambahEbook" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah</a>
        </div>
        <br>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Ebook</th>
                        <th>Nama Ebook</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->id_ebook; ?></td>
                            <td><?= $row->nama_ebook; ?></td>
                            <td>
                                <a href="<?= base_url() ?>Ebook/detail/<?= $row->id_ebook; ?>" class="btn-ubah btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url() ?>Ebook/ubah/<?= $row->id_ebook; ?>" class="btn-ubah btn-primary btn-xs">ubah</a>
                                <a href="<?= base_url() ?>Ebook/hapus/<?= $row->id_ebook; ?>" class="btn-hapus btn-danger btn-xs" onclick="return confirm('Apa anda yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Ebook</th>
                    <th>Nama Ebook</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->id_ebook; ?></td>
                        <td><?= $row->nama_ebook; ?></td>
                        <td>
                            <a href="<?= base_url() ?>Ebook/detail/<?= $row->id_ebook; ?>" class="btn-ubah btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
<?php }
?>