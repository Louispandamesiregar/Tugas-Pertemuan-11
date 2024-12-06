<?php
include_once("koneksi.php");

// Validasi input ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);  // Konversi ke integer untuk menghindari SQL Injection

    // Gunakan prepared statement untuk keamanan
    $sql = "DELETE FROM data_barang WHERE id_barang = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect setelah berhasil dihapus
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    // Jika ID tidak valid
    echo "ID tidak valid.";
}

// Tutup koneksi
mysqli_close($conn);
?>