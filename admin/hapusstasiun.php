<?php
include_once "fstasiun.php";
include_once "connect.php";
$id = $_GET["id"];
if (hapus($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
            document.location.href = 'datastasiun.php';</script> ";
} else {
    echo "<script>alert('data gagal dihapus');
            document.location.href = 'datastasiun.php';</script> ";
}