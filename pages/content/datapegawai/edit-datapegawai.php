<?php
session_start();
include "../../core/connection.php";
$ds = DIRECTORY_SEPARATOR;
 $base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
 require_once("{$base_dir}pages{$ds}core{$ds}header.php");
 require_once("{$base_dir}pages{$ds}content{$ds}datapegawai{$ds}process-datapegawai.php");

 $id = $_GET['id'];

 $sql = "SELECT * FROM pegawai WHERE id=$id";
 $result = mysqli_query($koneksi, $sql);
 
 if (mysqli_num_rows($result) > 0) {
     $row = mysqli_fetch_assoc($result);
     $nama = $row['nama'];
     $alamat = $row['alamat'];
     $jk = $row['jk'];
 } else {
     echo "Pegawai tidak ditemukan";
 }

?>
  
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Data Pegawai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Data Pegawai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Edit Data Pegawai</h5>
              <p>Silahkan mengisi form di bawah ini untuk mengedit data pegawai.</p>

              <!-- Form -->
              <form action="process-datapegawai.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                 <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                 <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="inputNama" value="<?php echo $nama; ?>">
                 </div>
                </div>
                <div class="row mb-3">
                 <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                 <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" id="inputAlamat" value="<?php echo $alamat; ?>">
                 </div>
                </div>
                <div class="row mb-3">
                 <label for="inputJK" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                 <div class="col-sm-10">
                    <select name="jk" class="form-select" id="inputJK">
                      <option value="L" <?php if($jk == "L"){ echo "selected"; } ?>>Laki-laki</option>
                      <option value="P" <?php if($jk == "P"){ echo "selected"; } ?>>Perempuan</option>
                    </select>
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