<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Anggota</h3>
        <br>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url() ?>Anggota/simpan" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Id Anggota</label>
                <div class="col-sm-10">
                    <input type="text" name="id_anggota" value="<?= $id_anggota; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input type="text" name="nomor_induk" class="form-control" pattern="^[0-9]{8}" title="Masukkan NISN dengan 8 angka">
                    <?= form_error('nomor_induk', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota" pattern="[a-zA-Z ]*" minlength="3" maxlength="30" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <select name="kelas" class="form-control" placeholder="Kelas" required>
                        <option></option>
                        <option>4-A</option>
                        <option>4-B</option>
                        <option>5-A</option>
                        <option>5-B</option>
                        <option>6-A</option>
                        <option>6-B</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                        <option></option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" placeholder="Alamat" cols="30" rows="5" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Telpon</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telpon" required>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Tambah</button> &nbsp;&nbsp;&nbsp;
            <a class="btn btn-default" href="<?= base_url('Anggota') ?>">Kembali</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>