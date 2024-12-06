<?php
include_once("koneksi.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);  // Konversi ke integer untuk menghindari SQL Injection

    $sql = "DELETE FROM data_barang WHERE id_barang = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
\    echo "ID tidak valid.";
}

mysqli_close($conn);
?>
