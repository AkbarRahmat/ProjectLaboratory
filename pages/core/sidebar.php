  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= $sidebar_selected == 'dashboard' ? '' : 'collapsed' ?>" href="../content/dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?= $sidebar_selected == 'jadwal' ? '' : 'collapsed' ?>" href="../content/jadwal.php">
          <i class="bi bi-calendar"></i>
          <span>Jadwal</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?= $sidebar_selected == 'masteruser' ? '' : 'collapsed' ?>" href="../content/masteruser.php">
          <i class="bi bi-calendar"></i>
          <span>Kelola Pegawai</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

    </ul>

  </aside><!-- End Sidebar-->