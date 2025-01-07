<?php
include "header.php";
include "sidebar.php";
?>

</main> <!--end::App Main--> <!--begin::Footer-->
<main class="app-main"> <!--begin::App Content Header-->
<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Kontak</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div> <!--end::App Content Header--> <!--begin::App Content-->
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row"> <!--begin::Col-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Malasngoding.com - Kirim Email Mengunakan PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 
<div class="container mt-3">
  <h2>Kirim Email Kepada Author</h2>
  <form action="proses_kontak.php" method="post">
    <div class="mb-3 mt-3">
      <label>Email Tujuan:</label>
      <input type="email" class="form-control"  placeholder="Email Tujuan" name="email" required>
    </div>
    <div class="mb-3 mt-3">
      <label>Judul Pesan:</label>
      <input type="text" class="form-control"  placeholder="Judul Pesan" name="judul" required>
    </div>
    <div class="mb-3 mt-3">
      <label>Isi Pesan:</label>
      <textarea class="form-control" name="pesan" placeholder="Pesan" required></textarea>
    </div>
   
    <button type="submit" class="btn btn-primary">Kirim</button>
  </form>
</div>
 
</body>
</html>