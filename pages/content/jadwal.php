<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}config{$ds}db.php");
require_once("{$base_dir}backend{$ds}function.php");
require_once("{$base_dir}backend{$ds}jadwal{$ds}table.php");
require_once("{$base_dir}backend{$ds}jadwal{$ds}action.php");

// Init
$sidebar_selected = "jadwal";

// Action
if (isset($_POST['add-data'])) {
  addJadwal();
}
/*elseif (isset($_POST['edit-data'])) {
  editJadwal();
}
elseif (isset($_POST['delete-data'])) {
  deleteJadwal();
}*/

if ($action_state) {
  header("Location: jadwal.php");
  exit;
}
$pegawaiList = pegawaiData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php require_once("{$base_dir}pages{$ds}core{$ds}header.php");?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Master User</h1>
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
              <h5 class="card-title">Jadwal Pegawai</h5>
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-data">Tambah data</button>
              <div class="form-group">
                <label for="month">Pilih Bulan</label>
                <select class="form-control" id="month">
                 <option value="01">Januari</option>
                 <option value="02">Februari</option>
                 <option value="03">Maret</option>
                 <option value="04">April</option>
                 <option value="05">Mei</option>
                 <option value="06">Juni</option>
                 <option value="07">Juli</option>
                 <option value="08">Agustus</option>
                 <option value="09">September</option>
                 <option value="10">Oktober</option>
                 <option value="11">November</option>
                 <option value="12">Desember</option>
                </select>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                 <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Pagi</th>
                    <th scope="col">Siang</th>
                    <th scope="col">Midle</th>
                 </tr>
                </thead>
                <tbody>
               
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>

      <!-- Add Modal -->
      <div class="modal fade" id="add-data" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Jadwal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                  <div class="my-1">
                    <div class="form-group">
                      <label for="nama" class="col-form-label">Nama Pegawai:</label>
                      <select id="id_pegawai" name="id_pegawai" class="form-control">
                        <?php foreach ($pegawaiList as $pegawai) : ?>
                          <option value=<?= $pegawai['id_pegawai'] ?>><?= $pegawai['nama'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="jam" class="col-form-label">Jam:</label>
                      <select class="form-control jam-option">
                        <option value="06:30-13:30">06:30-13:30 Pagi</option>
                        <option value="13:30-20:30">13:30-20:30 Siang</option>
                        <option value="09:00-16:00">09:00-16:00 Middle</option>
                        <option value="">Lainnya..</option>
                      </select>
                      <div class="d-none flex-row gap-2 jam-input">
                        <input type="text" class="form-control w-50" id="jam_awal" name="jam_awal" value="00:00" required>
                        <input type="text" class="form-control w-50" id="jam_akhir" name="jam_akhir" value="00:00" required>
                      </div>
                    </div>
                    <div class="form-group w-75">
                      <label for="tanggal" class="col-form-label">Tanggal:</label>
                      <div class="d-flex flex-row gap-2">
                        <select id="tanggal_hari" name="tanggal_hari" class="form-control w-25">
                          <option value="01">01</option>
                        </select>
                        <select id="tanggal_bulan" name="tanggal_bulan" class="form-control w-50">
                          <option value="01">Januari</option>
                          <option value="02">Febuari</option>
                        </select>
                        <select id="tanggal_tahun" name="tanggal_tahun" class="form-control w-25">
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="add-data">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End Add Modal -->
    </section>

  </main><!-- End #main -->

  <script src="../../main.js"></script>
</body>

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> 