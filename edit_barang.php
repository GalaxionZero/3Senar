<?php
    require 'functions.php';
    $id = $_GET['id'];
    $conn = connection();

    if (isset($_POST['tambah'])){
        $data['nama'] = $_POST['nama'];
        $data['harga'] = $_POST['harga'];
        $data['deskripsi'] = $_POST['deskripsi'];
        $data['stok'] = $_POST['stok'];
        $data['kategori'] = $_POST['kategori'];
        $data['fotoName'] = $_FILES['foto']['name'];
        $data['fotoSize'] = $_FILES['foto']['size'];
        $data['fotoTmp'] = $_FILES['foto']['tmp_name'];
        $data['fotoError'] = $_FILES['foto']['error'];

        if (updateProduk($data, $id)){
            echo "<script>
                alert('Data berhasil diperbarui');
                document.location.href = 'admin_list_barang.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diperbarui');
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
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style/tambah_barang.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h1 class="title">Edit Barang</h1>
            <p class="title">Ubah Produk Alat Musik</p>
            <div class="content">
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="nama">Nama</label><br>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($products['nama']); ?>" required><br>

                    <label for="harga">Harga</label><br>
                    <input type="text" id="harga" name="harga" value="<?php echo htmlspecialchars($products['harga']); ?>" required><br>

                    <label for="stok">stok</label><br>
                    <textarea id="stok" name="stok" required><?php echo htmlspecialchars($products['stok']); ?></textarea><br>

                    <label for="deskripsi">deskripsi</label><br>
                    <textarea id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($products['deskripsi']); ?>" </textarea><br>
                    
                    <label for="kategori">kategori</label><br>
                    <textarea id="kategori" name="kategori" required><?php echo htmlspecialchars($products['deskripsi']); ?>" </textarea><br>

                    <label for="foto">Foto</label><br>
                    <input type="hidden" name="oldimg" value="<?php echo htmlspecialchars($products['foto']); ?>">
                    <input type="file" name="foto" id="foto" style="border: 1px solid rgba(0,0,0,0.6); border-radius:9px; padding: 7px 10px; font-size: 16px;"><br>
                    <img src="images/<?php echo htmlspecialchars($products['foto']); ?>" alt="<?php echo htmlspecialchars($products['foto']); ?>" style="width: 80px; height: 100px;">

                    <input class="button" type="submit" value="Perbarui" name="tambah">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
