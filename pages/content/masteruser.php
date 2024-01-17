<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..' . $ds . '..') . $ds;
require_once("{$base_dir}config{$ds}db.php");
require_once("{$base_dir}backend{$ds}function.php");
require_once("{$base_dir}backend{$ds}masteruser{$ds}table.php");
require_once("{$base_dir}backend{$ds}masteruser{$ds}action.php");

// Init
$sidebar_selected = "masteruser";

// Action
if (isset($_POST['add-data'])) {
  addUser();
}
elseif (isset($_POST['edit-data'])) {
  editUser();
}
elseif (isset($_POST['delete-data'])) {
  deleteUser();
}

if ($action_state) {
  header("Location: masteruser.php");
  exit;
}

$userList = tableData();
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
              <h5 class="card-title">Data Tabel Pegawai</h5>
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-data">Tambah data</button>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($userList as $no => $user) :?>
                    <tr>
                      <td><?= $user['nama'] ?></td>
                      <td><?= $user['jenis_kelamin'] ?></td>
                      <td><?= $user['role'] ?></td>
                      <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-data-<?= $no ?>"><i class="bi bi-pen"></i></button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-data-<?= $no ?>"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>

      <!-- Modal Crud -->
      <?php foreach ($userList as $no => $user) : ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="edit-data-<?= $no ?>" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group d-none">
                      <label for="id_user" class="col-form-label"></label>
                      <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-form-label">Username:</label>
                      <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-form-label">Password:</label>
                      <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="role" class="col-form-label">Role:</label>
                      <select id="role" name="role" class="form-control">
                          <option <?= atOption($user['role'], "user") ?>>User</option>
                          <option <?= atOption($user['role'], "admin") ?>>Admin</option>
                          <option <?= atOption($user['role'], "admin_super") ?>>Admin Super</option>
                      </select>
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

        <!-- Delete Modal -->
        <div class="modal fade" id="delete-data-<?= $no ?>" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
              <div class="modal-body">
                  <div class="form-group d-none">
                    <label for="id_user" class="col-form-label"></label>
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
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
      <?php endforeach; ?><!-- End Crud Modal -->

      <!-- Add Modal -->
      <div class="modal fade" id="add-data" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Pegawai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                  <div class="my-1">
                    <label for="username" class="col-form-label">Data User:</label>
                    <div class="px-3 border">
                      <div class="form-group">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                      <div class="form-group">
                        <label for="role" class="col-form-label">Role:</label>
                        <select id="role" name="role" class="form-control">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="admin_super">Admin Super</option>
                        </select>
                      </div>
                      <div class="p-2"></div>
                    </div>
                  </div>

                  <div class="my-1 mt-3">
                    <label for="nama" class="col-form-label">Data Diri:</label>
                    <div class="px-3 border">
                      <div class="form-group">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                      </div>
                      <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="p-2"></div>
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
  
  <?php require_once("{$base_dir}pages{$ds}core{$ds}footer.php");?> 
</body>
</html>