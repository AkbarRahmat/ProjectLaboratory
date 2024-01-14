  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= $sidebar_selected == 'dashboard' ? '' : 'collapsed' ?>" href="../content/dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!--<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../datashift/datashift.php">
              <i class="bi bi-circle"></i><span>Data Shift</span>
            </a>
          </li>
          <li>
            <a href="../masteruser/table_user.php">
              <i class="bi bi-circle"></i><span>Data Pegawai</span>
            </a>
          </li>
        </ul>
      </li>--><!-- End Components Nav -->

      <!-- <li class="nav-heading">Pages</li> -->

      <li class="nav-item">
<<<<<<< HEAD
        <a class="nav-link collapsed" href="../lihatjadwal/table_jadwal.php">
=======
        <a class="nav-link <?= $sidebar_selected == 'jadwal' ? '' : 'collapsed' ?>" href="../content/jadwal.php">
>>>>>>> f60264634a7329605d1589981e9464fbb3e54984
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