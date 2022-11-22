<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success alert-dismissible">
        <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div> <?php }
            ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url() ?>Dashboard/tambahAccount" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nomor Induk</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->nomor_induk; ?></td>
                        <td><?= $row->level; ?></td>
                        <td>
                            <!-- <!-- <a href="<?= base_url() ?>Anggota/ubah/<?= $row->id_anggota; ?>" class="btn-ubah btn-primary btn-xs">ubah</a> -->
                            <a href="<?= base_url() ?>Dashboard/hapusUser/<?= $row->id; ?>" class="btn-hapus btn-danger btn-xs" onclick="return confirm('Apa anda yakin?');">hapus</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>