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
                <h3 class="mb-0">Dashboard</h3>
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

<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "batik_shop";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus data jika tombol Delete ditekan
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // Hapus file foto terlebih dahulu
    $result = $conn->query("SELECT foto FROM produk_batik WHERE id=$id");
    $row = $result->fetch_assoc();
    if (file_exists("uploads/" . $row['foto'])) {
        unlink("uploads/" . $row['foto']);
    }
    // Hapus data dari database
    $conn->query("DELETE FROM produk_batik WHERE id=$id");
    header("Location: produk_batik_list.php");
    exit();
}

// Ambil data produk dari database
$sql = "SELECT * FROM produk_batik ORDER BY tanggal_update DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Pusaka Batik</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin: 2px;
        }
        .btn-update {
            background-color: #4CAF50;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Daftar Produk Pusaka Batik</h2>
    <a href="upload_batik.php" class="btn"></a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Baju</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Tanggal Update</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_baju']}</td>
                    <td>{$row['deskripsi']}</td>
                    <td><img src='uploads/{$row['foto']}' alt='{$row['nama_baju']}' width='100'></td>
                    <td>{$row['tanggal_update']}</td>
                    <td>
                        <a href='update_produk_batik.php?id={$row['id']}' class='btn btn-update'>Update</a>
                        <a href='produk_batik_list.php?delete={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\");' class='btn btn-delete'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada produk yang ditemukan.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<div>
</div>
<?php       
include "footer.php";
?>
