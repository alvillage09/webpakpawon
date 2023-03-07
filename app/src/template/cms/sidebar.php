
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= BASEURL; ?>">
          <i class="bi bi-grid"></i>
          <span>Dasbor</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASEURL; ?>/role">
              <i class="bi bi-circle"></i><span>Peranan</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Pegawai</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Pelanggan</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End User Nav -->

      <li class="nav-item">
        <a class="nav-link " href="<?= BASEURL; ?>/menu">
          <i class='bx bx-bowl-hot'></i>
          <span>Menu</span>
        </a>
      </li><!-- End Menu Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Pesanan</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Pembayaran</span>
            </a>
          </li>
        </ul>
      </li><!-- End Transaction Nav -->
    </ul>

  </aside><!-- End Sidebar-->
