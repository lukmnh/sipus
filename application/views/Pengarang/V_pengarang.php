<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success alert-dismissible">
        <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div> <?php }
            ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url() ?>Pengarang/tambah" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Pengarang</th>
                    <th>Nama Pengarang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row->id_pengarang; ?></td>
                        <td><?= $row->nama_pengarang; ?></td>
                        <td>
                            <a href="<?= base_url() ?>Pengarang/ubah/<?= $row->id_pengarang; ?>" class="btn-ubah-p btn-primary btn-xs">ubah</a>
                            <a href="<?= base_url() ?>Pengarang/hapus/<?= $row->id_pengarang; ?>" class="btn-hapus-p btn-danger btn-xs" onclick="return confirm('Apa anda yakin?');">hapus</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>