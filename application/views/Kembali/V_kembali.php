<?php
if ($this->session->userdata('level') == '1') { ?>
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Nama Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) {

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama_anggota; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->tgl_pinjam; ?></td>
                            <td><?= $row->tgl_kembali; ?></td>
                            <td><?= $row->tgl_kembalikan; ?></td>
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
                        <th>No</th>
                        <th>IDAnggota Peminjam</th>
                        <th>ID Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data1 as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->id_anggota; ?></td>
                            <td><?= $row->id_buku; ?></td>
                            <td><?= $row->tgl_pinjam; ?></td>
                            <td><?= $row->tgl_kembali; ?></td>
                            <td><?= $row->tgl_kembalikan; ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php }
?>