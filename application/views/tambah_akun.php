<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Akun Admin</h3>
        <br>
    </div>

    <form method="post" action="<?= base_url() ?>Dashboard/tambahAccount" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" pattern="[a-zA-Z ]*" minlength="3" maxlength="50" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Induk</label>
                <div class="col-sm-10">
                    <input type="number" name="nomor_induk" class="form-control" minlength="8" maxlength="16" placeholder="Nomor Induk Admin" required>
                    <?= form_error('nomor_induk', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
        </div>
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Tambah</button> &nbsp;&nbsp;&nbsp;
            <a class=" btn btn-success" href="<?= base_url('') ?>Dashboard/detailAccount">Kembali</a>
        </div>
    </form>
</div>