<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success alert-dismissible">
        <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div> <?php }
            ?>
<?php
if ($this->session->userdata('level') == '1') { ?>
    <div class="card">
        <div class="card-header">
            <form method="post" action="<?= base_url(); ?>Laporan/buku">
                <div class="row">
                    <div class="col-md-3">
                        <a href="<?= base_url() ?>Buku/tambah" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah</a>
                    </div>
                    <div class="col-md-2">
                        <select name="thn_awal" class="form-control select2" style="width: 100%;">
                            <option value="">Pilih Tahun</option>
                            <?php
                            for ($tahun = 2000; $tahun <= 2022; $tahun++) { ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="thn_akhir" class="form-control select2" style="width: 100%;">
                            <option value="">Pilih Tahun</option>
                            <?php
                            for ($tahun = 2000; $tahun <= 2022; $tahun++) { ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-block btn-filter"><i class="fa fa-filter"></i>Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="<?= base_url() ?>Laporan/buku" class="btn btn-warning btn-block btn-refresh"><i class="fa fa-retweet"></i>Refresh</a>
                    </div>
                    <div class="col-md-1">
                        <a href="<?= base_url() ?>Laporan/pdfBuku" class="btn btn-danger btn-block btn-lihat" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;PDF</a>
                    </div>
                </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Buku</th>
                        <th>Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Rak</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $row->id_buku; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->nama_pengarang; ?></td>
                            <td><?= $row->nama_penerbit; ?></td>
                            <td><?= $row->tahun_terbit; ?></td>
                            <td><?= $row->rak; ?></td>
                            <td><?= $row->jumlah; ?></td>
                            <td>
                                <a href="<?= base_url() ?>Buku/ubah/<?= $row->id_buku; ?>" class="btn-ubah btn-primary btn-xs">ubah</a>
                                <a href="<?= base_url() ?>Buku/hapus/<?= $row->id_buku; ?>" class="btn-hapus btn-danger btn-xs" onclick="return confirm('Apa anda yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Buku</th>
                        <th>Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Rak</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $row->id_buku; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->nama_pengarang; ?></td>
                            <td><?= $row->nama_penerbit; ?></td>
                            <td><?= $row->tahun_terbit; ?></td>
                            <td><?= $row->rak; ?></td>
                            <td><?= $row->jumlah; ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php }
?>