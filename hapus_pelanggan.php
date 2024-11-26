<?php
include 'koneksi.php';

$id = $_GET['id_pelanggan'];
$sql = "DELETE FROM pelanggan WHERE id_pelanggan='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Produk berhasil dihapus.";
    header("Location: tables/pelanggan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>