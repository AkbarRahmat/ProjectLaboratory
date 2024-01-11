<?php
session_start();
include "../../core/connection.php";
$ds = DIRECTORY_SEPARATOR;
 $base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
 require_once("{$base_dir}pages{$ds}core{$ds}header.php");
 require_once("{$base_dir}pages{$ds}content{$ds}datashift{$ds}process-datashift.php");

 $idjam = $_GET['id_jam'];

 $sql = "SELECT * FROM shift WHERE id_jam='$idjam'";
 $result = mysqli_query($koneksi, $sql);
 
 if (mysqli_num_rows($result) > 0) {
     $row = mysqli_fetch_assoc($result);
     $jam = $row['jam'];
     $mulai = $row['mulai'];
     $akhir = $row['akhir'];
 } else {
     echo "Shift tidak ditemukan";
 }

?>
  
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Data Shift</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Data Shift</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Edit Data Shift</h5>
              <p>Silahkan mengisi form di bawah ini untuk mengedit data shift.</p>

              <!-- Form -->
              <form action="process-datashift.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_jam" value="<?php echo $idjam; ?>">
                <div class="row mb-3">
                 <label for="inputNama" class="col-sm-2 col-form-label">Jam</label>
                 <div class="col-sm-10">
                    <input type="text" name="jam" class="form-control" id="inputNama" value="<?php echo $jam; ?>">
                 </div>
                </div>
                <div class="row mb-3">
                 <label for="inputAlamat" class="col-sm-2 col-form-label">Mulai</label>
                 <div class="col-sm-10">
                    <input type="text" name="mulai" class="form-control" id="inputAlamat" value="<?php echo $mulai; ?>">
                 </div>
                </div>
                <div class="row mb-3">
                 <label for="inputAkhir" class="col-sm-2 col-form-label">Akhir</label>
                 <div class="col-sm-10">
                    <input type="text" name="akhir" class="form-control" id="inputAkhir" value="<?php echo $akhir; ?>">
                 </div>
                </div>
                <button type="submit" name="edit_submit" class="btn btn-primary">Submit</button>
              </form>
              <!-- End Form -->

            </div>
          </div>

        </div>
      </div>
    </section

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> 