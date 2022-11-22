<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Edit Pengarang</h3>
        <br>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url() ?>Pengarang/update" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Id Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" name="id_pengarang" value="<?= $data['id_pengarang']; ?>" placeholder="class=" form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pengarang" value="<?= $data['nama_pengarang']; ?>" class="form-control" pattern="[a-zA-Z ]*" minlength="3" placeholder="Nama Anggota" required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer row justify-content-center">
                <button type="submit" class="btn btn-info">Ubah</button> &nbsp;&nbsp;&nbsp;
                <a class=" btn btn-success" href="<?= base_url('Pengarang') ?>">Kembali</a>
            </div>
            <!-- /.card-footer -->
    </form>
</div>