<?php
include 'koneksi.php';

$id_stok = $_GET['id_stok'];
$sql = "DELETE FROM stok WHERE id_stok='$id_stok'";

if ($conn->query($sql) === TRUE) {
    echo "Stok berhasil dihapus.";
    header("Location: tables/stok.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
