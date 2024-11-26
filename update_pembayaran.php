<?php
// Memasukkan file koneksi
include 'koneksi.php';

// Mendapatkan id_pembayaran dari permintaan (misalnya dari URL atau form)
$id_pembayaran = $_GET['id_pembayaran'] ?? null;

// Status pembayaran yang diinginkan
$status_baru = "Sudah Bayar";

if ($id_pembayaran) {
    // Cek status pembayaran saat ini
    $cek_query = "SELECT status_pembayaran FROM pembayaran WHERE id_pembayaran = ?";
    $cek_stmt = $conn->prepare($cek_query);
    $cek_stmt->bind_param("i", $id_pembayaran);
    $cek_stmt->execute();
    $result = $cek_stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Cek apakah status saat ini adalah "Belum Dibayar"
        if ($row['status_pembayaran'] === "Belum Bayar") {
            // Update status pembayaran menjadi "Dibayar"
            $query = "UPDATE pembayaran SET status_pembayaran = ? WHERE id_pembayaran = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $status_baru, $id_pembayaran);

            if ($stmt->execute()) {
                echo "Status pembayaran berhasil diperbarui menjadi 'Sudah Bayar'.";

                // Cek apakah ada data yang masuk ke tabel pengiriman setelah update
                $check_query = "SELECT * FROM pengiriman WHERE id_order IN (SELECT id_order FROM pembayaran WHERE id_pembayaran = ?)";
                $check_stmt = $conn->prepare($check_query);
                $check_stmt->bind_param("i", $id_pembayaran);
                $check_stmt->execute();
                $result_check = $check_stmt->get_result();

                if ($result_check->num_rows > 0) {
                    echo " Pengiriman telah terupdate otomatis.";
                } else {
                    echo " Tidak ada perubahan pada tabel pengiriman.";
                }
                $check_stmt->close();
            } else {
                echo "Gagal memperbarui status pembayaran: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Status pembayaran sudah 'Dibayar' atau tidak perlu diubah.";
        }
    } else {
        echo "Data pembayaran tidak ditemukan.";
    }

    $cek_stmt->close();
} else {
    echo "Parameter id_pembayaran diperlukan.";
}

$conn->close();
?>