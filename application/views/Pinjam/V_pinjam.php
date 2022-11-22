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
            <a href="<?= base_url() ?>Pinjam/tambah" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah</a>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Peminjaman</th>
                        <th>Nama Peminjam</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $row) {
                        $tgl_kembali = new DateTime($row->tgl_kembali);
                        $tgl_now = new DateTime();
                        $selisih = $tgl_now->diff($tgl_kembali)->format("%a");
                    ?>
                        <tr>
                            <td><?= $row->id_pinjam; ?></td>
                            <td><?= $row->nama_anggota; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->tgl_pinjam; ?></td>
                            <td><?= $row->tgl_kembali; ?></td>
                            <td>
                                <?php
                                if ($tgl_kembali >= $tgl_now or $selisih == 0) {
                                    echo "<span class='color='red'>Belum dikembalikan!</span>";
                                } else {
                                    echo "TELAT <b style='color:red;'>" . $selisih . "</b> Hari <br> <span class='label label-danger'> Denda Perhari = Rp. 2000";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>Pinjam/kembalikan/<?= $row->id_pinjam; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Apakah buku mau dikembalikan?');">Kembalikan</a>
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
        <div class="card-header">
            <a href="<?= base_url() ?>Pinjam/tambah" class="btn-plus btn-success"><i class="fas fa-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Peminjaman</th>
                        <th>ID Anggota Peminjam</th>
                        <th>ID Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data1 as $row) {
                        $tgl_kembali = new DateTime($row->tgl_kembali);
                        $tgl_now = new DateTime();
                        $selisih = $tgl_now->diff($tgl_kembali)->format("%a");
                    ?>
                        <tr>
                            <td><?= $row->id_pinjam; ?></td>
                            <td><?= $row->id_anggota; ?></td>
                            <td><?= $row->id_buku; ?></td>
                            <td><?= $row->tgl_pinjam; ?></td>
                            <td><?= $row->tgl_kembali; ?></td>
                            <td>
                                <?php
                                if ($tgl_kembali >= $tgl_now or $selisih == 0) {
                                    echo "<span class='color='red'>Belum dikembalikan!</span>";
                                } else {
                                    echo "TELAT <b style='color:red;'>" . $selisih . "</b> Hari <br> <span class='label label-danger'> Denda Perhari = Rp. 2000";
                                }
                                ?>
                            </td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php }
?>