<?php
function update($data)
{
    global $connect;
    $harga = $data["hargatotal"];
    $pesan = $data["no_pesanan"];
    $uid = $data["userid"];
    $nod = htmlspecialchars($data["no_duduk"]);
    $query = "UPDATE tiket SET harga = '$harga' WHERE id_user= $uid AND no_pesanan = $pesan";
    $query2 = "UPDATE tiket SET no_duduk = '$nod' WHERE id_user= $uid AND no_pesanan = $pesan";
    mysqli_query($connect, $query);
    mysqli_query($connect, $query2);
    return mysqli_affected_rows($connect);
}
function updategambar($data)
{
    global $connect;
    $pesan = $data["no_pesanan"];
    $uid = $data["userid"];
    $gambar = upload();
    $jumlah = $data["jumlah"];
    $id_kereta = $data["id_kereta"];
    $kapasitas = $data["kapasitas"];
    $hasil = $kapasitas - $jumlah;
    $query2 = "UPDATE tiket SET bukti= '$gambar' WHERE id_user= $uid AND no_pesanan = $pesan";
    mysqli_query($connect, $query2);
    $query4 = "DELETE from tiket_sementara WHERE iduser= $uid";
    mysqli_query($connect, $query4);
    $query9 = "UPDATE kereta SET kapasitas= '$hasil' WHERE id_ker= $id_kereta";
    mysqli_query($connect, $query9);
    return mysqli_affected_rows($connect);
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
