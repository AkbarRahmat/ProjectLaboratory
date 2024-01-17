<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}config{$ds}db.php");
require_once("{$base_dir}backend{$ds}function.php");
require_once("{$base_dir}backend{$ds}jadwal{$ds}table.php");
require_once("{$base_dir}backend{$ds}jadwal{$ds}action.php");

// Init
$sidebar_selected = "jadwal";
$date_current = currentDate();

// Filter
if (isset($_POST['select-month'])) {
  $_SESSION['month_select'] = $_POST['month'];
  header("Location: jadwal.php");
  exit;
}

// Action
if (isset($_POST['add-data'])) {
  addJadwal();
}
elseif (isset($_POST['edit-data'])) {
  editJadwal();
}
elseif (isset($_POST['delete-data'])) {
  deleteJadwal();
}

if ($action_state) {
  header("Location: jadwal.php");
  exit;
}

// Data
$year_selected = $date_current['year'];
$month_selected = (isset($_SESSION['month_select'])) ? $_SESSION['month_select'] : $date_current['month'];
$day_selected = $date_current['day'];
$pegawaiList = pegawaiData();
$jadwalList = tableData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php require_once("{$base_dir}pages{$ds}core{$ds}header.php"); ?>

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
              <?php if ($_SESSION['role'] == "admin" && $date_current['month'] == $month_selected): ?>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                  data-bs-target="#add-data">Tambah data</button>
              <?php endif; ?>
              <form action="" id="month-form" method="post">
                <div class="form-group mb-3">
                  <label for="month">Pilih Bulan</label>
                  <select class="form-control" id="month-select" name="month">
                    <option <?= atOption($month_selected, "01") ?>>Januari</option>
                    <option <?= atOption($month_selected, "02") ?>>Februari</option>
                    <option <?= atOption($month_selected, "03") ?>>Maret</option>
                    <option <?= atOption($month_selected, "04") ?>>April</option>
                    <option <?= atOption($month_selected, "05") ?>>Mei</option>
                    <option <?= atOption($month_selected, "06") ?>>Juni</option>
                    <option <?= atOption($month_selected, "07") ?>>Juli</option>
                    <option <?= atOption($month_selected, "08") ?>>Agustus</option>
                    <option <?= atOption($month_selected, "09") ?>>September</option>
                    <option <?= atOption($month_selected, "10") ?>>Oktober</option>
                    <option <?= atOption($month_selected, "11") ?>>November</option>
                    <option <?= atOption($month_selected, "12") ?>>Desember</option>
                  </select>
                  <button type="submit" class="d-none" id="month-submit" name="select-month"></button>
                </div>
              </form>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Shift</th>
                    <?php if ($_SESSION['role'] == "admin") :?>
                      <th scope="col">Aksi</th>
                    <?php endif;?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($jadwalList as $no => $jadwal): ?>
                    <tr>
                      <td>
                        <?= $jadwal['nama'] ?>
                      </td>
                      <td>
                        <?= $jadwal['tanggal_hari'] ?>
                      </td>
                      <td>
                        <?= $jadwal['tanggal_namahari'] ?>
                      </td>
                      <td>
                        <?= $jadwal['jam_awal'] . " - " . $jadwal['jam_akhir'] ?>
                      </td>
                      <?php if ($_SESSION['role'] == "admin") :?>
                        <td>
                          <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-data-<?= $no ?>"><i
                              class="bi bi-pen"></i></button>
                          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-data-<?= $no ?>"><i
                              class="bi bi-trash"></i></button>
                        </td>
                      <?php endif;?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>

      <!-- modal crud -->
      <?php foreach ($jadwalList as $no => $jadwal): ?>

        <!-- edit modal -->
        <div class="modal fade" id="edit-data-<?= $no ?>" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <div class="form-group d-none">
                    <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal" value="<?= $jadwal['id_jadwal'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-form-label">Nama Pegawai:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $jadwal['nama'] ?>" disabled>
                  </div>
                  <div class="form-group">
                  <label for="jam_awal" class="col-form-label">Jam:</label>
                    <div class="d-flex flex-row gap-2">
                      <input type="text" class="form-control w-50" id="jam_awal" name="jam_awal" value="<?= $jadwal['jam_awal'] ?>" required>
                      <input type="text" class="form-control w-50" id="jam_akhir" name="jam_akhir" value="<?= $jadwal['jam_akhir'] ?>" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" name="edit-data">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- delete modal -->
        <div class="modal fade" id="delete-data-<?= $no ?>" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <h4>Yakin ingin hapus jadwal?</h4>
                  <div class="form-group d-none">
                    <label for="id_user" class="col-form-label"></label>
                    <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal"
                      value="<?= $jadwal['id_jadwal'] ?>">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" name="delete-data">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- End Crud Modal -->

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
                      <?php foreach ($pegawaiList as $pegawai): ?>
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
                      <input type="text" class="form-control w-50" id="jam_akhir" name="jam_akhir" value="00:00"
                        required>
                    </div>
                  </div>
                  <div class="form-group w-75">
                    <label for="tanggal" class="col-form-label">Tanggal:</label>
                    <div class="d-flex flex-row gap-2">
                      <select id="tanggal_hari" name="tanggal_hari" class="form-control w-25">
                        <option <?= atOption($day_selected, "01") ?>>01</option>
                        <option <?= atOption($day_selected, "02") ?>>02</option>
                        <option <?= atOption($day_selected, "03") ?>>03</option>
                        <option <?= atOption($day_selected, "04") ?>>04</option>
                        <option <?= atOption($day_selected, "05") ?>>05</option>
                        <option <?= atOption($day_selected, "06") ?>>06</option>
                        <option <?= atOption($day_selected, "07") ?>>07</option>
                        <option <?= atOption($day_selected, "08") ?>>08</option>
                        <option <?= atOption($day_selected, "09") ?>>09</option>
                        <option <?= atOption($day_selected, "10") ?>>10</option>
                        <option <?= atOption($day_selected, "11") ?>>11</option>
                        <option <?= atOption($day_selected, "12") ?>>12</option>
                        <option <?= atOption($day_selected, "13") ?>>13</option>
                        <option <?= atOption($day_selected, "14") ?>>14</option>
                        <option <?= atOption($day_selected, "15") ?>>15</option>
                        <option <?= atOption($day_selected, "16") ?>>16</option>
                        <option <?= atOption($day_selected, "17") ?>>17</option>
                        <option <?= atOption($day_selected, "18") ?>>18</option>
                        <option <?= atOption($day_selected, "19") ?>>19</option>
                        <option <?= atOption($day_selected, "20") ?>>20</option>
                        <option <?= atOption($day_selected, "21") ?>>21</option>
                        <option <?= atOption($day_selected, "22") ?>>22</option>
                        <option <?= atOption($day_selected, "23") ?>>23</option>
                        <option <?= atOption($day_selected, "24") ?>>24</option>
                        <option <?= atOption($day_selected, "25") ?>>25</option>
                        <option <?= atOption($day_selected, "26") ?>>26</option>
                        <option <?= atOption($day_selected, "27") ?>>27</option>
                        <option <?= atOption($day_selected, "28") ?>>28</option>
                        <option <?= atOption($day_selected, "29") ?>>29</option>
                        <option <?= atOption($day_selected, "30") ?>>30</option>
                        <option <?= atOption($day_selected, "31") ?>>31</option>
                      </select>
                      <select id="tanggal_bulan" name="tanggal_bulan" class="form-control w-50" disabled>
                        <option <?= atOption($month_selected, "01") ?>>Januari</option>
                        <option <?= atOption($month_selected, "02") ?>>Februari</option>
                        <option <?= atOption($month_selected, "03") ?>>Maret</option>
                        <option <?= atOption($month_selected, "04") ?>>April</option>
                        <option <?= atOption($month_selected, "05") ?>>Mei</option>
                        <option <?= atOption($month_selected, "06") ?>>Juni</option>
                        <option <?= atOption($month_selected, "07") ?>>Juli</option>
                        <option <?= atOption($month_selected, "08") ?>>Agustus</option>
                        <option <?= atOption($month_selected, "09") ?>>September</option>
                        <option <?= atOption($month_selected, "10") ?>>Oktober</option>
                        <option <?= atOption($month_selected, "11") ?>>November</option>
                        <option <?= atOption($month_selected, "12") ?>>Desember</option>
                      </select>
                      <select id="tanggal_tahun" name="tanggal_tahun" class="form-control w-25" disabled>
                        <option value="<?= $year_selected ?>"><?= $year_selected ?></option>
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