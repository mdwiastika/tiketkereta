<?php
function tiket($query)
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
    $idk = htmlspecialchars($data["id_kereta"]);
    $idu = htmlspecialchars($data["id_user"]);
    $nop = htmlspecialchars($data["no_pesanan"]);
    $nod = " ";
    $jumlah = htmlspecialchars($data["jumlah"]);
    $tangggalb = htmlspecialchars($data["tanggal_berangkat"]);
    $stasiunal = htmlspecialchars($data["stasiun_awal"]);
    $stasiunar = htmlspecialchars($data["stasiun_akhir"]);
    $harga = " ";
    $query = "INSERT INTO tiket VALUES ('','$idk','$idu','$nop','$nod','$harga','$jumlah','$tangggalb','$stasiunal','$stasiunar',' ')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function update($data)
{
    global $connect;
    $idk = htmlspecialchars($data["id_kereta"]);
    $idu = htmlspecialchars($data["id_user"]);
    $nop = htmlspecialchars($data["no_pesanan"]);
    $query = "INSERT INTO tiket_sementara VALUES ('','$idk','$idu','$nop')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM tiket WHERE id_tik= $id");
    return mysqli_affected_rows($connect);
}
