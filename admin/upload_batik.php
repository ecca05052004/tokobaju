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

// Proses form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_baju = $conn->real_escape_string($_POST['nama_baju']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);

    // Upload file foto
    $target_dir = "uploads/";
    $foto_name = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $foto_name;

    // Cek apakah folder upload ada, jika tidak buat folder
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // Simpan data ke database
        $sql = "INSERT INTO produk_batik (nama_baju, deskripsi, foto) 
                VALUES ('$nama_baju', '$deskripsi', '$foto_name')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully.<br>";
            echo "<a href='produk_batik_list.php'> Lihat Data Pusaka Batik </a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengupload foto.";
    }
}
// Tutup koneksi
$conn->close();
?>