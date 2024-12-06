<?php
include("koneksi.php");
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
<div class="container">
    <h1>Data Barang</h1>
    <div class="main">
        <table class="container-table">
            <tr class="heading-table">
                <th class="th">Gambar</th>
                <th class="th">Nama Barang</th>
                <th class="th">Katagori</th>
                <th class="th">Harga Jual</th>
                <th class="th">Harga Beli</th>
                <th class="th">Stok</th>
                <th class="th">Aksi</th>
            </tr>
            <?php if($result): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>"></td>
                        <td><?= $row['nama'];?></td>
                        <td><?= $row['kategori'];?></td>
                        <td><?= $row['harga_beli'];?></td>
                        <td><?= $row['harga_jual'];?></td>
                        <td><?= $row['stok'];?></td>
                        <td><?= $row['id_barang'];?></td>
                        <td>
                            <a href="ubah.php"?id=<?php echo $row['id_barang'];?>"><button>Edit</button></a>
                            <a href="hapus.php"?id=<?php echo $row['id_barang'];?>">><button>Hapus</button></a>
                        </td>
                    </tr>
                    <?php endwhile; else: ?>
                        <tr>
                            <td colspan="7">Belum ada data</td>
                        </tr>
                        <?php endif; ?>
        </table>
        </div>
    </div>
</body>
</html>
