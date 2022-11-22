<?php
if ($this->session->userdata('level') == '1') { ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="<?= base_url() ?>Dashboard" style="text-align:center; font-weight:bolder;">
      <span class="brand-text">SD Islam Nurul Hikmah</span>
      <!-- <nav>
        <ul>
          <!-- <img src="assets/img/logo.jpg" alt="Logo" content="center" width="120" height="60"> -->
      <!-- </ul>
      </nav> -->
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="header-nav">Menu Navigasi</li>
          <li class=" nav-item">
            <a href="<?= base_url() ?>Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Anggota" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Master Buku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>Buku" class="nav-link">
                  <i class="fas fa-light fa-book"></i>
                  <p> Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Penerbit" class="nav-link">
                  <i class="fas fa-columns"></i>
                  <p> Penerbit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Pengarang" class="nav-link">
                  <i class="fas fa-solid fa-user"></i>
                  <p> Pengarang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Ebook" class="nav-link">
                  <i class="fas fa-light fa-book"></i>
                  <p>
                    E-book
                  </p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link"> &nbsp;
              <i class="fas fa-folder-open" aria-hidden="true"></i>
              <p>
                Transaksi Buku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>Pinjam" class="nav-link">
                  <i class="fa fa-upload" aria-hidden="true"></i>
                  <p> Transaksi Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Kembali" class="nav-link">
                  <i class="fa fa-download" aria-hidden="true"></i>
                  <p> Transaksi Pengembalian</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link"> &nbsp;
              <i class="fas fa-file" aria-hidden="true"></i> &nbsp;
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>Laporan/peminjam" class="nav-link">
                  <i class="fa fa-circle" aria-hidden="true"></i>
                  <p> Laporan Peminjaman</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>Laporan/pengembalian" class="nav-link">
                  <i class="fa fa-circle" aria-hidden="true"></i>
                  <p> Laporan Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
          <hr>
          <li class="nav-item">
            <a href="<?= base_url() ?>Login/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>
<?php } else { ?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="<?= base_url() ?>Dashboard" style="text-align:center; font-weight:bolder;">
      <span class="brand-text">SD Islam Nurul Hikmah</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="header-nav">Menu Navigasi</li>
          <li class=" nav-item">
            <a href="<?= base_url() ?>Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Anggota" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Buku" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Daftar Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Ebook" class="nav-link">
              <i class="nav-icon fas fa-light fa-book"></i>
              <p>
                E-book
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"> &nbsp;
              <i class="fas fa-folder-open" aria-hidden="true"></i>&nbsp;
              <p>
                Pinjam Buku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>Pinjam" class="nav-link">&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-upload" aria-hidden="true"></i>
                  <p> Buku yang di Pinjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Kembali" class="nav-link">&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-download" aria-hidden="true"></i>
                  <p> Buku yang di Kembalikan</p>
                </a>
              </li>
            </ul>
            <hr>
          <li class="nav-item">
            <a href="<?= base_url() ?>Login/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>
<?php }
?>