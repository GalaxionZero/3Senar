<?php
    require 'koneksi.php';

    $query = "SELECT * FROM stores ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $list_stores = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $list_stores[] = $row;
    }

    if (isset($_POST["keyword"])) {
        $keyword = $_POST["keyword"];
        
        $sql = mysqli_query($conn, "SELECT * FROM stores WHERE nama LIKE '%$keyword%' ");
        
        $list_stores = [];
        while ($row = mysqli_fetch_assoc($sql)) {
            $list_stores[] = $row;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Toko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/admin_list-barang.css">
</head>
<body>
    <div class="background">
        <div class="admin-container">
            <h1>Data Toko</h1>
            <div class="container">
                <a href="tambah_store.php">
                    <button class="tambah">
                        <p>Tambah Toko Baru</p>
                    </button>
                </a>
                <a href="index.php">
                    <button class="back">
                        <p>Kembali</p>
                    </button>
                </a>
                <div class="navbar-search">
                    <form action="" method="post">
                        <input type="text" name="keyword" placeholder="Cari Toko" autocomplete="off" class="search-input">
                        <button type="submit" name="search" class="search-button">Search</button>
                    </form>
                </div>
            </div>
            <table class="table-admin">
                <thead>
                    <tr class="table-admin-row">
                        <th class="table-admin-header">No</th>
                        <th class="table-admin-header">Nama Toko</th>
                        <th class="table-admin-header">Alamat</th>
                        <th class="table-admin-header">No. Telepon</th>
                        <th class="table-admin-header">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($list_stores as $store): ?>
                        <tr class="table-admin-row">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $store['nama']; ?></td>
                            <td><?php echo $store['alamat']; ?></td>
                            <td><?php echo $store['no_tlp']; ?></td>
                            <td>
                                <div class="button-container">
                                    <a href="edit_store.php?id=<?php echo $store['id']; ?>">
                                        <button class="edit-btn">
                                            <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                        </button>
                                    </a>
                                    <a href="delete_store.php?id=<?php echo $store['id']; ?>" onclick="return confirm('Yakin untuk menghapus toko ini?')">
                                        <button class="delete-btn">
                                            <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
