<?php

  $ds = DIRECTORY_SEPARATOR;
  $base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  require_once("{$base_dir}pages{$ds}content{$ds}datashift{$ds}process-datashift.php");

  // cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

  // cek apakah data berhasil di tambahkan atau tidak
  if ( tambah($_POST) > 0 ) {
      echo "
          <script>
              alert('data berhasil ditambahkan!');
              document.location.href = 'datashift.php';
              </script>
          ";
  } else {
      echo "
      <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'datashift.php';
          </script>
      ";
  }
}

?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="datashift.php">Data Shift</a></li>
          <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Shift</h5>

              <!-- Custom Styled Validation -->
              <form action="process-datashift.php" method="POST" class="needs-validation" novalidate>
              <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Jam</label>
                    <input type="text" name="jam" class="form-control" id="validationCustom02" value="" required>
                    <div class="valid-feedback">
                      Sudah Bagus!
                    </div>

                    <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Mulai</label>
                    <input type="text" name="mulai" class="form-control" id="validationCustom02" value="" required>
                    <div class="valid-feedback">
                      Sudah Bagus!
                    </div>

                    <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Akhir</label>
                    <input type="text" name="akhir" class="form-control" id="validationCustom02" value="" required>
                    <div class="valid-feedback">
                      Sudah Bagus!
                    </div>

                    <br>
                  </div>

                <button class="btn btn-primary" name="tambahshift" type="submit">Simpan</button>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> 