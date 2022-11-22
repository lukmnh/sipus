<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Edit Ebook</h3>
    </div>
    <form method="post" action="<?= base_url() ?>Ebook/update/" class="form-horizontal" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Ebook</label>
                <div class="col-sm-10">
                    <input type="text" name="id_ebook" class="form-control" value="<?= $data['id_ebook']; ?>" placeholder="ID Ebook" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama EBook</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_ebook" value="<?= $data['nama_ebook']; ?>" class="form-control" placeholder="Judul Ebook" pattern="[a-zA-Z ]*" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi Ebook</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi_ebook" class="form-control" pattern="[a-zA-Z ]*" placeholder="Deskripsi Ebook" cols="30" rows="5" minlength="4" required><?= $data['deskripsi_ebook']; ?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <b style="color: black;">Ganti File PDF</b>
                    <input type="hidden" name="pdf_lama" value="<?= $data['pdf']; ?>" class="form-control">
                    <input class="form-control" type="file" name="pdf">
                    <small>You must insert only PDF</small><br>
                    <small>Max size 50MB</small>
                </div>
            </div>
        </div>
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Ubah</button> &nbsp;&nbsp;&nbsp;
            <a class=" btn btn-success" href="<?= base_url('Ebook') ?>">Kembali</a>
        </div>
    </form>
</div>