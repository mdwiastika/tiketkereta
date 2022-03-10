<?php
function kereta($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $array = [];
    while ($hi = mysqli_fetch_assoc($result)) {

        $array[] = $hi;
    }
    return $array;
}
function tambah($data)
{
    global $connect;
    $harga = htmlspecialchars($data["harga"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $nama = htmlspecialchars($data["nama"]);
    $tempat = htmlspecialchars($data["kapasitas"]);
    $query = "INSERT INTO kereta VALUES ('','$nama','$harga','$kelas','$tempat')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM kereta WHERE id_ker= $id");
    return mysqli_affected_rows($connect);
}
function registrasi($data)
{
    global $connect;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["password2"]);
    $email = strtolower(stripslashes($data["email"]));
    $role = strtolower(stripslashes($data["role"]));
    // mengecek username ada di database apa belum
    $duplikatu = mysqli_query($connect, "SELECT username FROM user WHERE username= '$username'");
    if (mysqli_fetch_assoc($duplikatu)) {
        echo "<script>
        alert('username sudah pernah didaftarkan')
        </script>";
        return false;
    }
    // mengecek email ada di database apa belum
    $duplikate = mysqli_query($connect, "SELECT email FROM user WHERE email= '$email'");
    if (mysqli_fetch_assoc($duplikate)) {
        echo "<script>
        alert('email sudah pernah didaftarkan')
        </script>";
        return false;
    }
    // mengecek konfirmasi password apakah sesuai apa tidak
    if ($password !== $password2) {
        echo " <script>
        alert('konfirmasi password salah')
        </script>";
        return false;
    }
    // enkripsi password (password yang ingin di acak, )
    $password = password_hash($password, PASSWORD_DEFAULT);
    // menambah user ke database
    mysqli_query($connect, "INSERT INTO user VALUES('','$username','$email', '$password', '$role')");
    return mysqli_affected_rows($connect);
}
function ubah($data)
{
    global $connect;
    $id_kereta = $data["kereta"];
    $kuantitas = $data["kuantitas"];
    $query = "UPDATE kereta SET kapasitas = '$kuantitas' WHERE id_ker= $id_kereta";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
