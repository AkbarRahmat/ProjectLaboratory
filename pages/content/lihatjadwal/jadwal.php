<?php

  $ds = DIRECTORY_SEPARATOR;
  $base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  // require_once("{$base_dir}pages{$ds}content{$ds}datapegawai{$ds}process-datapegawai.php");

?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Master Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Master User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jadwal jam kerja</h5>
              <p>
                <a href="add-datapegawai.php" type="button" class="btn btn-primary"> Tambah Data</a>
              </p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Pegawai</th>
                    <th scope="col">Shift</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                    $no = 0;
                    while($row=mysqli_fetch_array($QueryGetListUser)){
                      $no++;
                      echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['alamat']."</td>";
                        echo "<td>".$row['jk']."</td>";
                        echo "<td><a href=\"edit-datapegawai.php?id=" . $row["id"] . "\" class='btn btn-warning rounded-pill '>Edit</a>
                        <a href=\"delete-datapegawai.php?id=" . $row["id"] . "\"  class='btn btn-danger rounded-pill' >Hapus</a></td>";
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> 