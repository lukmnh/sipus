<?php if ($this->session->userdata('level') == '1') { ?>
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $anggota ?></h3>
            <p>Jumlah Anggota Perpus</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="<?= base_url() ?>Anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $buku; ?></h3>

            <p>Jumlah Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-book"></i>
          </div>
          <a href="<?= base_url() ?>Buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $pinjam; ?></h3>
            <p>Jumlah Peminjam Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-industry"></i>
          </div>
          <a href="<?= base_url() ?>Pinjam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $kembali; ?></h3>
            <p>Jumlah buku yang dikembalikan</p>
          </div>
          <div class="icon">
            <i class="fas fa-address-book"></i>
          </div>
          <a href="<?= base_url() ?>Kembali" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class=" col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-danger ganteng">
          <div class="inner">
            <h3><?= $user; ?></h3>
            <p>Jumlah User</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="<?= base_url() ?>Dashboard/detailAccount" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- /.row (main row) -->
  </div>
<?php } else { ?>
  <div class="container-fluid">
    <h1 style="text-align: center;">Selamat Datang di Perpustakaan SD ISLAM NURUL HIKMAH</h1>
    <br>
    <br>
    <label>
      <h2 style="justify-content: center; text-align: center; background-color: lightblue;">Silahkan pilih menu menu yang ada di bawah maupun menu yang ada disamping jika ingin melihat data pada Anggota yang sedang login, daftar buku yang tersedia, dan melakukan pinjam buku dan mengembalikannya</h2>
    </label>
    <br>
    <br>
    <br>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info" style="height: 100%;">
          <div class="inner">
            <h4>Lihat Data User</h4>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="<?= base_url() ?>Anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info" style="height: 100%;">
          <div class="inner">
            <h4>Lihat Data Buku</h4>
          </div>
          <div class="icon">
            <i class="fas fa-book"></i>
          </div>
          <a href="<?= base_url() ?>Buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info" style="height: 100%;">
          <div class="inner">
            <h4>Pinjam Buku</h4>
          </div>
          <div class="icon">
            <i class="fas fa-address-book"></i>
          </div>
          <a href="<?= base_url() ?>Pinjam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- /.row (main row) -->
  </div>
<?php }
