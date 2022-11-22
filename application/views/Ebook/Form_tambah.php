<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-danger alert-dismissible">
        <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div> <?php }
            ?>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Ebook</h3>
    </div>
    <form method="post" action="<?= base_url() ?>Ebook/simpan" class="form-horizontal" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">ID E-Book</label>
                <div class="col-sm-10">
                    <input type="text" name="id_ebook" class="form-control" value="<?= $id_ebook; ?>" placeholder="ID E-Book" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama E-Book</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_ebook" class="form-control" placeholder="Nama Ebook" pattern="[a-zA-Z ]*" minlength="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi E-Book</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi_ebook" class="form-control" placeholder="Deskripsi E-Book" cols="30" rows="5" minlength="4" pattern="[a-zA-Z ]*" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">File E-Book</label>
                <div class="col-sm-3">
                    <input type="file" name="pdf" class="form-control">
                    <small>You must insert only PDF File</small><br>
                    <small>Max size 50MB</small>
                </div>
            </div>
        </div>
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Tambah</button> &nbsp;&nbsp;&nbsp;
            <a class=" btn btn-success" href="<?= base_url('Ebook') ?>">Kembali</a>
        </div>
    </form>
</div>