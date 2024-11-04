<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    $query = "INSERT INTO stores (nama, alamat, no_tlp) VALUES ('$nama', '$alamat', '$no_tlp')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'admin_list_barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href = 'tambah_barang.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Toko</title>
    <link rel="stylesheet" href="style/tambah_barang.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h1 class="title">Tambah Toko</h1>
            <p class="title">Tambah Informasi Toko Baru</p>
            <div class="content">
                <form action="" method="POST">

                    <label for="nama">Nama Toko</label><br>
                    <input type="text" id="nama" name="nama" required><br>

                    <label for="alamat">Alamat</label><br>
                    <textarea id="alamat" name="alamat" required></textarea><br>

                    <label for="no_tlp">No. Telepon</label><br>
                    <input type="text" id="no_tlp" name="no_tlp" required><br>

                    <input class="button" type="submit" value="Tambah" name="tambah">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
