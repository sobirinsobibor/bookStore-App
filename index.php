<?php

require 'functions.php';

$rows = query("SELECT * FROM buku");

if(isset($_POST['input-btn'])){
  if(input($_POST, $id)>0){
    echo 
    "<script>
        alert('Data berhasil ditambahkan')
    </script>";
  }else{
    echo 
    "<script>
        alert('Data berhasil ditambahkan')
    </script>";
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
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Tambah Koleksi Buku
            </button>
            <div class="collapse mt-3" id="collapseExample">
                <form method="post" style="width:60%;">
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Buku</label>
                      <input type="text" class="form-control" name="kode">
                    </div>
                    <div class="mb-3">
                      <label for="judul" class="form-label">Judul Buku</label>
                      <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="mb-3">
                      <label for="halaman" class="form-label">Halaman Buku</label>
                      <input type="number" class="form-control" name="halaman">
                    </div>
                    <div class="mb-3">
                      <label for="tahun" class="form-label">Tahun Terbit</label>
                      <input type="number" class="form-control" name="tahun">
                    </div>
                    <button type="submit" class="btn btn-success" name="input-btn">Submit</button>
                  </form>
            </div>
        </div>

        <div class="mt-3">
            <table class="table table-striped" style="width: 60%;">
                <thead style="background-color: cornflowerblue; color: white;" align="center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $number = 1; 
                      foreach($rows as $row):
                  ?>
                  <tr>
                    <th scope="row"><?=$number?></th>
                    <td style="width: 55%;"><?=$row['judul']?></td>
                    <td>
                        <div class="row align-items-center">
                            <div class="col">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a href="details.php?id=<?=$row['id']?>" style="text-decoration: none; color: white;">details</a>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="CRUD/update.php?id=<?=$row['id']?>" style="text-decoration: none; color: white;">update</a>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <a href="CRUD/delete.php?id=<?=$row['id']?>" style="text-decoration: none; color: white;">delete</a>
                                </button>
                            </div>
                        </div>
                    </td>
                  </tr>
                  <?php
                    $number++;
                    endforeach;
                  ?>
                </tbody>
              </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>