<?php

  $ds = DIRECTORY_SEPARATOR;
  $base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..' . $ds . '..') . $ds;
  require_once("{$base_dir}config{$ds}db.php");
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  require_once("{$base_dir}backend{$ds}jadwal{$ds}table.php");
  require_once("{$base_dir}backend{$ds}jadwal{$ds}action.php");

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

      <!-- Modal Crud -->
        <!-- Edit Modal -->
        <!-- Delete Modal -->
       
     <!-- End Crud Modal -->

      <!-- Add Modal -->
      <!-- End Add Modal -->
    </section>

  </main><!-- End #main -->
<!-- End #main -->
<script>
  document.getElementById('month').addEventListener('change', function() {
 var month = this.value;
 var year = new Date().getFullYear();
 var lastDay = new Date(year, month, 0).getDate();
  
 var tbody = document.querySelector('.datatable tbody');
 tbody.innerHTML = '';
  
 for(var i = 1; i <= lastDay; i++) {
    var tr = document.createElement('tr');
    var tdTanggal = document.createElement('td');
    var tdHari = document.createElement('td');
    var tdPagi = document.createElement('td');
    var tdSiang = document.createElement('td');
    var tdMidle = document.createElement('td');
    
    tdTanggal.textContent = i;
    tdHari.textContent = new Date(year, month-1, i).toLocaleDateString('en-US', {weekday: 'long'});
    tdPagi.textContent = 'Pagi';
    tdSiang.textContent = 'Siang';
    tdMidle.textContent = 'Midle';
    
    tr.appendChild(tdTanggal);
    tr.appendChild(tdHari);
    tr.appendChild(tdPagi);
    tr.appendChild(tdSiang);
    tr.appendChild(tdMidle);
    
    tbody.appendChild(tr);
 }
});
</script>

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> 