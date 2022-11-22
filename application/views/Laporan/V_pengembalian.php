<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
    .tgl_akhir {
        margin-left: -10px;
    }

    .btn-filter {
        margin-left: -20px;
    }

    .btn-refresh {
        margin-left: -30px;
    }

    .btn-lihat {
        margin-left: -40px;
    }
</style>

<body>
    <div class="card-body">
        <form method="post" action="<?= base_url(); ?>Laporan/pengembalian">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-primary"><b><?= $judul; ?></b></h4>
                </div>
                <div class="col-md-2">
                    <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal" onfocus="(this.type = 'date')">
                </div>
                <div class="col-md-2">
                    <input type="text" name="tgl_akhir" class="form-control tgl_akhir" placeholder="Tanggal Akhir" onfocus="(this.type = 'date')">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary btn-block btn-filter"><i class="fa fa-filter"></i>Filter</button>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url() ?>Laporan/pengembalian" class="btn btn-warning btn-block btn-refresh"><i class="fa fa-retweet"></i>Refresh</a>
                </div>
                <div class="col-md-1">
                    <a href="<?= base_url() ?>Laporan/pdfPengembalian" class="btn btn-danger btn-block btn-lihat" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;PDF</a>
                </div>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Pengembalian</th>
                        <th>Nama Peminjam</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $row->id_kembali; ?></td>
                            <td><?= $row->nama_anggota; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= mediumdate_indo($row->tgl_pinjam); ?></td>
                            <td><?= mediumdate_indo($row->tgl_kembali); ?></td>
                            <td><?= mediumdate_indo($row->tgl_kembalikan); ?></td>
                        </tr>
                    <?php }

                    ?>
                </tbody>
            </table>
    </div>
    </div>
</body>

</html>