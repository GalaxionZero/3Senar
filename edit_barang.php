<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);

$products = [];
while($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

$products = $products[0];

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $oldimg = $_POST['oldimg'];

    if($_FILES['foto']['error'] === 4) {
        $file_name = $oldimg;

    } else {
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
        } elseif ($file_size > $maxFileSize) {
            echo "<script>
                alert('Ukuran file gambar tidak boleh lebih dari 4 MB.');
                document.location.href = 'edit_barang.php';
            </script>";
            exit;

        } else {
            $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtension;

            if (file_exists('images/' . $oldimg)) {
                unlink('images/' . $oldimg);
            }
            
            if (!move_uploaded_file($tmp_name, 'images/' . $new_file_name)) {
                
                echo "<script>
                alert('Gagal meng-upload gambar');
                document.location.href = 'tambah_barang.php';
                </script>";
            }
            $file_name = $new_file_name;
        }
    }
    // if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
    $query = "UPDATE products SET nama='$nama', harga='$harga', stok='$stok' , deskripsi='$deskripsi', foto='$file_name' WHERE id=$id ";
    $result = mysqli_query($conn, $query);

    if ($result) {
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
