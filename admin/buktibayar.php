<?php
include_once "connect.php";
include_once "fbayar.php";
session_start();
// if (!isset($_SESSION["login"])) {
//     header("location: ../user/login.php");
// }

$id = $_SESSION["uid"];
include_once "connect.php";
include_once "fbayar.php";
$query2 = mysqli_query($connect, "SELECT s.no_pesanan, t.jumlah, k.harga_ker, k.nama_ker, k.kelas_ker, k.id_ker, k.kapasitas FROM tiket_sementara AS s INNER JOIN tiket AS t ON t.id_kereta= s.id_kereta2 INNER JOIN kereta AS k ON k.id_ker= s.id_kereta2 WHERE s.iduser= t.id_user AND s.no_pesanan= t.no_pesanan");
$tiket = mysqli_fetch_assoc($query2);
if (isset($_POST["submit"])) {
    if (updategambar($_POST) > 0) {
        echo "<script>alert('data berhasil ditambahkan');
        document.location.href = 'datakereta.php';</script> ";
    } else {
        echo "<script>alert('data gagal ditambahkan');
        document.location.href = 'datakereta.php';</script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Simple Tables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="image.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once "header.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once "sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12" style="font-family: roboto;">
                        <div class="container card shadow overflow-hidden mt-5 p-5" style="width: 70%;">
                            <h3 class="text-center"></h3>
                            <hr />
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="no_pesanan" value="<?= $tiket["no_pesanan"] ?>">
                                    <input type="hidden" name="userid" id="userid" value="<?= $id ?>">
                                    <input type="hidden" name="id_kereta" value="<?= $tiket["id_ker"] ?>">
                                    <input type="hidden" name="jumlah" value="<?= $tiket["jumlah"] ?>">
                                    <input type="hidden" name="kapasitas" id="kapasitas" value="<?= $tiket["kapasitas"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="stok" style="display: inline-block;">QR CODE:</label>
                                    <img src="../qrcode.jpeg" alt="" style="max-width: 100px; display: inline-block;">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Kirim Foto Bukti Pembayaran:</label>
                                    <input type="file" class="form-control" id="gambar" name="image" autocomplete="off" onchange="readURL(this);" style="max-width: 150px;">
                                    <img id="blah" src="http://placehold.it/180" alt="your image" />
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include_once "footer.php";
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="image.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="image.js"></script>
</body>

</html>