<?php

  $ds = DIRECTORY_SEPARATOR;
  $base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  require_once("{$base_dir}pages{$ds}content{$ds}datashift{$ds}process-datashift.php");

?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Shift</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Master Shift</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Tabel Shift</h5>
              <p>
                <a href="add-datashift.php" type="button" class="btn btn-primary"> Tambah Data</a>
              </p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Mulai</th>
                    <th scope="col">Akhir</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 0;
                    while($row=mysqli_fetch_array($QueryGetListShift)){
                      $no++;
                      echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['jam']."</td>";
                        echo "<td>".$row['mulai']."</td>";
                        echo "<td>".$row['akhir']."</td>";
                        echo "<td><a href=\"edit-datashift.php?id=" . $row["id_jam"] . "\" class='btn btn-warning rounded-pill '>Edit</a>      
                        <a href=\"delete-datashift.php?id=" . $row["id_jam"] . "\"  class='btn btn-danger rounded-pill' >Hapus</a></td>";
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