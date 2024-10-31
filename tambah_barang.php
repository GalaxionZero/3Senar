<?php

    require 'functions.php';
    $conn = connection();

    if (isset($_POST['tambah'])) {
        $data['nama'] = $_POST['nama'];
        $data['harga'] = $_POST['harga'];
        $data['deskripsi'] = $_POST['deskripsi'];
        $data['stok'] = $_POST['stok'];
        $data['kategori'] = $_POST['kategori'];
        $data['fotoName'] = $_FILES['foto']['name'];
        $data['fotoSize'] = $_FILES['foto']['size'];
        $data['fotoTmp'] = $_FILES['foto']['tmp_name'];
        $data['fotoError'] = $_FILES['foto']['error'];
        
        if (tambahProduk($data)) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'admin_list_barang.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
                document.location.href = 'admin_list_barang.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang </title>
    <link rel="stylesheet" href="style/tambah_barang.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h1 class="title">Tambah Barang</h1>
            <p class="title">Tambah Produk Alat Musik!</p>
            <div class="content">
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="nama">Nama Produk</label><br>
                    <input type="text" id="nama" name="nama" required><br>

                    <label for="harga">Harga</label><br>
                    <input type="text" id="harga" name="harga" required><br>

                    <label for="stok">Stok</label><br>
                    <input type="text" id="stok" name="stok" required><br>

                    <label for="deskripsi">Deskripsi</label><br>
                    <textarea id="deskripsi" name="deskripsi" required></textarea><br>

                    <label for="kategori">Kategori</label><br>
                    <textarea id="kategori" name="kategori" required></textarea><br>

                    <label for="foto">Foto</label><br>
                    <input type="file" name="foto" id="foto" style="border: 1px solid rgba(0,0,0,0.6); border-radius:9px; padding: 7px 10px; font-size: 16px;" required><br>

                    <input class="button" type="submit" value="Tambah" name="tambah">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
