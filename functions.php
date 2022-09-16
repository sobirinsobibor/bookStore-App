<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "kuliahquery";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed : ".$conn->connect_error);
}

//query 
function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//refresh
function refresh(){
    header("Refresh:0");
}

//input
function input($data){
    global $conn;

    $kode = $data['kode'];
    $judul = $data['judul'];
    $halaman = $data['halaman'];
    $tahun = $data['tahun'];

    $query = "INSERT INTO buku VALUES 
              ('', '$kode', '$judul', '$halaman', '$tahun')";
    
    mysqli_query($conn, $query);
    refresh();
    return mysqli_affected_rows($conn);
}

//delete
function del($id){
    global $conn;

    $query = "DELETE FROM buku WHERE id = '$id'";

    mysqli_query($conn, $query);
    echo $id;
    return mysqli_affected_rows($conn);
}

//update 
function update($data, $id){
    global $conn;

    $kode   = $data['kode'];
    $judul  = $data['judul'];
    $halaman= $data['halaman'];
    $terbit = $data['tahun'];

    $query = "UPDATE buku SET 
              kode  = '$kode',
              judul = '$judul',
              halaman = '$halaman',
              terbit  = '$terbit'
              WHERE id = '$id';";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>