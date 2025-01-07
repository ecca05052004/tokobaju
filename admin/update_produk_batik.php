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

// Ambil data berdasarkan ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk_batik WHERE id=$id");
$row = $result->fetch_assoc();

// Update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_baju = $conn->real_escape_string($_POST['nama_baju']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);

    // Cek apakah ada file baru yang diupload
    if ($_FILES['foto']['name']) {
        $target_dir = "uploads/";
        $foto_name = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $foto_name;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Hapus foto lama
            if (file_exists("uploads/" . $row['foto'])) {
                unlink("uploads/" . $row['foto']);
            }
            $conn->query("UPDATE produk_batik SET nama_baju='$nama_baju', deskripsi='$deskripsi', foto='$foto_name' WHERE id=$id");
        }
    } else {
        $conn->query("UPDATE produk_batik SET nama_baju='$nama_baju', deskripsi='$deskripsi' WHERE id=$id");
    }

    header("Location: produk_batik_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk Pusaka Batik</title>
</head>
<body>
    <h2>Update Produk Pusaka Batik</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama_baju">Nama Baju:</label><br>
        <input type="text" id="nama_baju" name="nama_baju" value="<?= $row['nama_baju'] ?>" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" required><?= $row['deskripsi'] ?></textarea><br><br>

        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*"><br>
        <img src="uploads/<?= $row['foto'] ?>" alt="<?= $row['nama_baju'] ?>" width="100"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
