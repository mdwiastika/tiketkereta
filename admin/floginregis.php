<?php
function registrasi($data)
{
    global $connect;
    $namalengkap = $data["nama_lengkap"];
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
    mysqli_query($connect, "INSERT INTO user VALUES('','$email','$username', '$password', '$role','$namalengkap')");
    return mysqli_affected_rows($connect);
}
