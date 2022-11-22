<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Penerbit</h3>
        <br>
    </div>

    <form method="post" action="<?= base_url() ?>Penerbit/simpan" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_penerbit" class="form-control" pattern="[a-zA-Z ]*" minlength="3" placeholder="Nama Penerbit" required>
                </div>
            </div>
        </div>
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Tambah</button> &nbsp;&nbsp;&nbsp;
            <a class=" btn btn-success" href="<?= base_url('Penerbit') ?>">Kembali</a>
        </div>
    </form>
</div>