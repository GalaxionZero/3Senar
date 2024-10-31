<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];


    // Handle upload foto
    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];
    $file_size = $_FILES['foto']['size'];

    $maxFileSize = 4 * 1024 *1024;
    

    $validExtension = ['jpg','jpeg','png','webp'];
    $fileExtension = explode('.', $file_name);
    $fileExtension = strtolower(end($fileExtension));

    if (!in_array($fileExtension, $validExtension)){
        echo "<script>
            alert('File yang di Upload Bukan Gambar');
            document.location.href = 'tambah_barang.php';
        </script>";
        exit;
    } else {
        $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtension;

        if (move_uploaded_file($tmp_name, 'images/' . $new_file_name)) {
            $query = "INSERT INTO products VALUES (' ', '$nama','$harga', '$stok', '$deskripsi', '$new_file_name' )";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
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
        }else {
            echo "<script>
            alert('Gagal meng-upload gambar');
            document.location.href = 'tambah_barang.php';
            </script>";
        }
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

                    <label for="foto">Foto</label><br>
                    <input type="file" name="foto" id="foto" style="border: 1px solid rgba(0,0,0,0.6); border-radius:9px; padding: 7px 10px; font-size: 16px;" required><br>

                    <input class="button" type="submit" value="Tambah" name="tambah">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
