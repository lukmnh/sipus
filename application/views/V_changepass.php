<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Change Password</h3>
        <br>
    </div>
    <?php
    if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-dismissible">
            <?= $this->session->flashdata('info'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div> <?php }
                ?>
    <!-- <?= $this->session->flashdata('info') ?> -->
    <form method="post" action="<?= base_url() ?>Dashboard/account" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Penerbit" value="<?= $data['nama']; ?>" readonly>
                </div>
            </div>
            <div class=" form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Induk</label>
                <div class="col-sm-10">
                    <input type="text" name="nomor_induk" class="form-control" placeholder="Nama Penerbit" value="<?= $data['nomor_induk']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordSekarang" class="col-sm-2 col-form-label">Password Sekarang</label>
                <div class="col-sm-10">
                    <input type="password" name="passwordSekarang" id="passwordSekarang" class="form-control" minlength="4" placeholder="Password Sekarang" required>
                    <?= form_error('passwordSekarang', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordBaru" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" name="passwordBaru" id="passwordBaru" class="form-control" minlength="4" placeholder="Password Baru" required>
                    <?= form_error('passwordBaru', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordBaru1" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" name="passwordBaru1" id="passwordBaru1" class="form-control" minlength="4" placeholder="Ulangi Password Baru" required>
                    <?= form_error('passwordBaru1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
        </div>
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Ubah Password</button> &nbsp;&nbsp;&nbsp;
            <a class=" btn btn-success" href="<?= base_url('') ?>Dashboard">Kembali</a>
        </div>
    </form>
</div>