<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Edit Buku</h3>
    </div>

    <form method="post" action="<?= base_url() ?>Buku/update" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="id_buku" class="form-control" value="<?= $data['id_buku']; ?>" placeholder="ID Buku" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="judul_buku" value="<?= $data['judul_buku']; ?>" class="form-control" placeholder="Judul Buku" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <select name="id_pengarang" class="form-control select2" style="width: 100%;">
                        <option value="">Pilih Pengarang</option>
                        <?php foreach ($pengarang as $row) {
                            if ($data['id_pengarang'] == $row->id_pengarang) { ?>
                                <option value="<?= $row->id_pengarang; ?>" selected><?= $row->nama_pengarang ?></option>
                            <?php } else { ?>
                                <option value="<?= $row->id_pengarang; ?>"><?= $row->nama_pengarang ?></option>

                        <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <select name="id_penerbit" class="form-control select2" style="width: 100%;">
                        <option value="">Pilih Penerbit</option>
                        <?php foreach ($penerbit as $row) {
                            if ($data['id_penerbit'] == $row->id_penerbit) { ?>
                                <option value="<?= $row->id_penerbit; ?>" selected><?= $row->nama_penerbit ?></option>
                            <?php } else { ?>
                                <option value="<?= $row->id_penerbit; ?>"><?= $row->nama_penerbit ?></option>

                        <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tahun terbit</label>
                <div class="col-sm-10">
                    <select name="tahun_terbit" class="form-control select2" style="width: 100%;">
                        <option value="">Pilih Tahun</option>
                        <?php
                        for ($tahun = 2000; $tahun <= 2022; $tahun++) {
                            if ($data['tahun_terbit'] == $tahun) { ?>
                                <option value="<?= $tahun; ?>" selected> <?= $tahun; ?></option>
                            <?php } else { ?>
                                <option value="<?= $tahun; ?>"> <?= $tahun; ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Rak</label>
                <div class="col-sm-10">
                    <input type="text" name="rak" class="form-control" value="<?= $data['rak']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Buku</label>
                <div class="col-sm-10">
                    <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" class="form-control" placeholder="Jumlah Buku" required>
                </div>
            </div>
        </div>
        <div class="card-footer row justify-content-center">
            <button type="submit" class="btn btn-info">Ubah</button> &nbsp;&nbsp;&nbsp;
            <a class=" btn btn-success" href="<?= base_url('Buku') ?>">Kembali</a>
        </div>
    </form>
</div>