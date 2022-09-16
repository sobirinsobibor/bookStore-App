<?php

require '../functions.php';

$id = $_GET['id'];
$rows = query("SELECT * FROM buku WHERE id = '$id'");


if(isset($_POST['update-btn'])){
    if(update($_POST, $id)>0){
        echo 
        "
        <script>
            alert('Data Berhasil Diubah')
            document.location.href = '../index.php'
        </script>
        ";
    }else{
        "
        <script>
            alert('Data Tidak Berhasil Diubah')
            document.location.href = '../index.php'
        </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sistem Informasi Koleksi Perpustakaan</title>
  </head>
  <body>
    <nav class="navbar navbar-dark " style="background-color: cornflowerblue;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Sistem Informasi Koleksi Perpustakaan </span>
        </div>
    </nav>

    <div class="container">
        <div class="mt-3">
            <?php
                foreach($rows as $row):
            ?>
            <form method="post" style="width:60%;">
                <div class="mb-3">
                <label for="kode" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" name="kode" value="<?=$row['kode']?>">
                </div>
                <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?=$row['judul']?>">
                </div>
                <div class="mb-3">
                <label for="halaman" class="form-label">Halaman Buku</label>
                <input type="number" class="form-control" name="halaman" value="<?=$row['halaman']?>">
                </div>
                <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahun" value="<?=$row['terbit']?>">
                </div>
                <button type="submit" class="btn btn-success" name="update-btn">Submit</button>
            </form>
            <?php
                endforeach;
            ?>
        </div>
        <div class="mt-3">
            <button type="button" class="btn btn-dark" onclick="doubleMainMenu()" >cancel</button>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../function.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>