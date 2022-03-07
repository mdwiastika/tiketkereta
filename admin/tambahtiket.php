<?php
include_once "connect.php";
include_once "ftiket.php";
session_start();
// if (!isset($_SESSION["login"])) {
//     header("location: ../user/login.php");
// }
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('data berhasil ditambahkan');
        document.location.href = 'jadwalkereta.php';</script> ";
    } else {
        echo "<script>alert('data gagal ditambahkan');
        document.location.href = 'jadwalkereta.php';</script> ";
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
                            <h3 class="text-center">Pesan Tiket</h3>
                            <hr />
                            <form action="" method="POST">
                                <div class=" form-group">
                                    <input type="hidden" value="1" name="id_user">
                                    <label for="kategori">Nama Kereta:</label>
                                    <select id="kategori" class="form-control" name="nama_ker" required autocomplete="off">
                                        <option value=" ">-- Pilih Kereta --</option>
                                        <?php
                                        $query = mysqli_query($connect, "SELECT * FROM jadwal AS j INNER JOIN kereta AS k on j.id_kereta=k.id_ker");
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['id_kereta']; ?>"><?php echo $data["nama_ker"]; ?> (<?= $data["kelas_ker"]; ?>)</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi"> Tanggal Berangkat:</label>
                                    <input type="text" class="form-control" id="deskripsi" name="tanggal_berangkat" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Sampai (waktu):</label>
                                    <input type="text" class="form-control" id="deskripsi" name="sampai" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Dari:</label>
                                    <select id="kategori" class="form-control" name="dari" required autocomplete="off">
                                        <option value=" ">-- Pilih Stasiun --</option>
                                        <?php
                                        $query = mysqli_query($connect, "SELECT * FROM stasiun");
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['nama_sta']; ?>"><?php echo $data["nama_sta"]; ?> (<?= $data["code_sta"]; ?>)</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Tujuan:</label>
                                    <select id="kategori" class="form-control" name="tujuan" required autocomplete="off">
                                        <option value=" ">-- Pilih Stasiun --</option>
                                        <?php
                                        $query = mysqli_query($connect, "SELECT * FROM stasiun");
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['nama_sta']; ?>"><?php echo $data["nama_sta"]; ?> (<?= $data["code_sta"]; ?>)</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
</body>

</html>