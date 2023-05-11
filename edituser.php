<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Pengguna
              <a href="user.php" class="btn btn-danger float-end">Kembali</a>
            </h4>
          </div>
          <div class="card-body">
          <?php
            require_once 'koneksi.php';
            if(isset($_GET['id'])){
              $users_id = mysqli_real_escape_string($conn, $_GET['id']);
              $query = "SELECT * FROM users WHERE id='$users_id' ";
              $query_run = mysqli_query($conn, $query);

              if(mysqli_num_rows($query_run) > 0){
                $users = mysqli_fetch_array($query_run);
              ?>
            <form action="action-user.php" method="post" enctype="multipart/form-data" class="row g-3">
              <input type="hidden" id="id" name="id" value="<?= $users['id']; ?>">
              <div class="col-12">
                <label>Nama</label>
                <input type="text" id="name" name="name" value="<?=$users['name'];?>" class="form-control">
              </div>
              <div class="col-md-6">
                <label>Role</label>
                  <select id="role" name="role" value="<?=$users['role'];?>" class="form-select" aria-label="Pilih Role Pengguna">
                  <option selected>Pilih Role Pengguna</option>
                  <option value="admin">Admin</option>
                  <option value="staff">Staff</option>
                  </select>
              </div>
              <div class="col-md-6">
                <label>Password</label>
                <input type="password" id="password" name="password" value="<?=$users['password'];?>" class="form-control">
              </div>
              <div class="col-md-6">
                <label>Email</label>
                <input type="email" id="email" name="email" value="<?=$users['email'];?>" class="form-control">
              </div>
              <div class="col-md-6">
                <label>Telp</label>
                <input type="text" id="phone" name="phone" value="<?=$users['phone'];?>" class="form-control">
              </div>
              <div class="col-12">
                <label>Alamat lengkap</label>
                <textarea type="text" id="alamat" name="alamat" value="<?=$users['address'];?>" class="form-control"></textarea>
              </div>
              <div class="col-12">
                <label>Unggah foto</label>
                <input type="file" id="avatar" name="avatar" value="<?=$users['avatar'];?>" class="form-control">
              </div>
              <div class="mb-3">
                <button type="submit" id="edituser" name="edituser"  class="btn btn-primary">Simpan</button>
              </div>
            </form>
            <?php
              }else{
                echo "<h4>ID tidak ada</h4>";
              }}
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
</body>

</html>