<?php
function jadwal($query)
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
    $berangkat = htmlspecialchars($data["berangkat"]);
    $sampai = htmlspecialchars($data["sampai"]);
    $nama = htmlspecialchars($data["nama_ker"]);
    $dari = htmlspecialchars($data["dari"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $query = "INSERT INTO jadwal VALUES ('','$nama','$berangkat','$sampai','$dari','$tujuan')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM jadwal WHERE id_jad= $id");
    return mysqli_affected_rows($connect);
}
