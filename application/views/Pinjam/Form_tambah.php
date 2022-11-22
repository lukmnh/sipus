<?php
if ($this->session->userdata('level') == '1') { ?>

    <?php
    $tgl_pinjam = date('Y-m-d');

    $tiga_hari = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
    $tgl_kembali = date('Y-m-d', $tiga_hari);
    ?>
    <?php
    if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-success alert-dismissible">
            <?= $this->session->flashdata('info'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div> <?php }
                ?>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Peminjam</h3>
            <br>
        </div>

        <form method="post" action="<?= base_url() ?>Pinjam/simpan" class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ID Peminjaman</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_pinjam" class="form-control" value="<?= $id_pinjam; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <select name="nomor_induk" id="" class="form-control select2" style="width: 100%;">
                            <option>Pilih NISN Peminjam</option>
                            <?php
                            foreach ($peminjam as $row) { ?>
                                <option value="<?= $row->id_anggota; ?>"><?= $row->nomor_induk ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Peminjam</label>
                    <div class="col-sm-10">
                        <select name="id_anggota" id="id_anggota" class="form-control select2" style="width: 100%;">
                            <option>Pilih Peminjam</option>
                            <?php
                            foreach ($peminjam as $row) { ?>
                                <option value="<?= $row->id_anggota; ?>"><?= $row->nama_anggota ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Buku</label>
                    <div class="col-sm-10">
                        <select name="id_buku" id="id_buku" class="form-control select2" style="width: 100%;">
                            <option value="">Pilih Buku</option>
                            <?php foreach ($buku as $row) { ?>
                                <option value="<?= $row->id_buku; ?>"><?= $row->judul_buku ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_kembali" value="<?= $tgl_kembali; ?>" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer row justify-content-center">
                <button type="submit" class="btn btn-info">Tambah</button> &nbsp;&nbsp;&nbsp;
                <a class=" btn btn-success" href="<?= base_url('Pinjam') ?>">Kembali</a>
            </div>
        </form>
    </div>
<?php } else { ?>

    <?php
    if (!empty($this->session->flashdata('info'))) { ?>
        <div class="alert alert-success alert-dismissible">
            <?= $this->session->flashdata('info'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div> <?php }

            $tgl_pinjam = date('Y-m-d');
            $tiga_hari = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
            $tgl_kembali = date('Y-m-d', $tiga_hari);

                ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Peminjam</h3>
            <br>
        </div>

        <form method="post" action="<?= base_url() ?>Pinjam/simpan" class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ID Peminjaman</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_pinjam" class="form-control" value="<?= $id_pinjam; ?>" maxlength="5" placeholder="ID Buku" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <input type="text" name="nomor_induk" class="form-control" pattern="^[0-9]{8,10}" title="8 angka sampai 10 angka" placeholder="Contoh : 13118835" required>
                        <!-- <small>Masukkan NISN yang sesuai dengan minimal 8 angka</small> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ID Anggota Peminjam</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_anggota" class="form-control" pattern="^[A-Z]{2}[0-9]{3}" value="<?= $id_anggota ?>" title="menggunakan 2 huruf uppercase dan 3 angka dengan maksimal 5 karakter" placeholder="Contoh : AG001" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Buku</label>
                    <div class="col-sm-10">
                        <select name="id_buku" id="id_buku" class="form-control select2" style="width: 100%;" required>
                            <option value="">Pilih Buku</option>
                            <?php foreach ($buku as $row) { ?>
                                <option value="<?= $row->id_buku; ?>"><?= $row->judul_buku ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_kembali" value="<?= $tgl_kembali; ?>" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer row justify-content-center">
                <button type="submit" class="btn btn-info">Tambah</button> &nbsp;&nbsp;&nbsp;
                <a class=" btn btn-success" href="<?= base_url('Pinjam') ?>">Kembali</a>
            </div>
        </form>
    </div>
<?php }
?>

<script>
    $('#id_buku').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '<?= base_url() ?>Pinjam/jumlah',
            data: {
                id: id
            },
            method: 'POST',
            dataType: 'json',
            success: function(hasil) {
                var jumlah = JSON.stringify(hasil.jumlah);
                var jumlah1 = jumlah.split('"').join('');
                if (jumlah1 <= 0) {
                    alert('Maaf, Stok buku ini sedang kosong');
                    location.reload();
                }
            }
        });
    });
</script>