<?php
  session_start();
  if(isset($_SESSION['is_login']) && ($_SESSION['is_login']) == true):
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Detail Pengguna
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
              <div class="mb-3">
                <label>Nama Pengguna</label>
                <p class="form-control"><?=$users['name'];?></p>
              </div>
              <div class="mb-3">
                <label>Email</label>
                <p class="form-control"><?=$users['email'];?></p>
              </div>
              <div class="mb-3">
                <label>Phone</label>
                <p class="form-control"><?=$users['phone'];?></p>
              </div>
              <div class="mb-3">
              <label>Role</label>
              <p class="form-control"><?=$users['role'];?></p>
              </div>
              <div class="mb-3">
              <label>Alamat</label>
              <p class="form-control"><?=$users['address'];?></p>
              </div>
              <div class="mb-3">
              <label>Avatar</label>
              <p class="form-control"><img src="images/<?php echo $users['avatar'];?>" width="80" height="80"></p>
              </div>
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
<?php else :
    header('Location: login.php');
endif;?>