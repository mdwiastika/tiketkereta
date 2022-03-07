<?php
function update($data){
global $connect;
$harga = $data["hargatotal"];
$pesan = $data["no_pesanan"];
$uid= $data["userid"];
$query= "UPDATE tiket SET harga = '$harga' WHERE id_user= $uid AND no_pesanan = $pesan";
mysqli_query($connect, $query);
return mysqli_affected_rows($connect);
}
function updategambar($data){
    global $connect;
    $pesan = $data["no_pesanan"];
$uid= $data["userid"];
}
function upload()
{

    $nfile = $_FILES['image']['name'];
    $ufile = $_FILES['image']['size'];
    $tfile = $_FILES['image']['tmp_name'];
    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $valid = explode('.', '$nfile');
    $valid = strtolower(end($gambarvalid));
    if (!in_array($valid, $gambarvalid)) {
        echo "<script>alert('File yang anda pilih bukan gambar')</script>";
        return false;
    }
    if ($ufile > 30000000) {
        echo "<script>alert('Ukuran file terlalu besar')</script>";
        return false;
    }
    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $valid;
    move_uploaded_file($tfile, 'buktibayar/' . $namabaru);

    return $namabaru;
}
?>