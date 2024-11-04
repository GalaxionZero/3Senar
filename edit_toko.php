<?php
    require 'functions.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM stores WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $stores = [];
    while($row = mysqli_fetch_assoc($result)) {
        $stores[] = $row;
    }

    $store = $stores[0];

    if (isset($_POST['perbarui'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];

        $query = "UPDATE stores SET nama='$nama', alamat='$alamat', no_tlp='$no_tlp' WHERE id=$id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
            alert('Data berhasil diperbarui');
            document.location.href = 'admin_list_toko.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal diperbarui');
            document.location.href = 'edit_toko.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Toko</title>
    <link rel="stylesheet" href="style/tambah_barang.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h1 class="title">Edit Toko</h1>
            <p class="title">Ubah Informasi Toko</p>
            <div class="content">
                <form action="" method="POST">

                    <label for="nama">Nama Toko</label><br>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($store['nama']); ?>" required><br>

                    <label for="alamat">Alamat</label><br>
                    <textarea id="alamat" name="alamat" required><?php echo htmlspecialchars($store['alamat']); ?></textarea><br>

                    <label for="no_tlp">No. Telepon</label><br>
                    <input type="text" id="no_tlp" name="no_tlp" value="<?php echo htmlspecialchars($store['no_tlp']); ?>" required><br>

                    <input class="button" type="submit" value="Perbarui" name="perbarui">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
