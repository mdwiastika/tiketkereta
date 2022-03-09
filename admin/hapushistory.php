<?php
include_once "ftiket.php";
include_once "connect.php";
$id = $_GET["id"];
if (hapus($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
            document.location.href = 'datakereta.php';</script> ";
} else {
    echo "<script>alert('data gagal dihapus');
            document.location.href = 'datakereta.php';</script> ";
}
