<?php
include 'koneksi.php';

$id_supplier = $_GET['id_supplier'];
$sql = "DELETE FROM supplier WHERE id_supplier='$id_supplier'";

if ($conn->query($sql) === TRUE) {
    echo "Supplier berhasil dihapus.";
    header("Location: tables/supplier.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
