<?php
include 'koneksi.php';

$id_produk = $_GET['id_produk'];
$sql = "DELETE FROM produk WHERE id_produk='$id_produk'";

if ($conn->query($sql) === TRUE) {
    echo "Produk berhasil dihapus.";
    header("Location: tables/produk.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
