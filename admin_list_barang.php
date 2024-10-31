<?php
    require 'koneksi.php';

    $query = "SELECT * FROM products ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $list_products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $list_products[] = $row;
    }


    if(isset($_POST["keyword"])) {
        $keyword = $_POST["keyword"];

        $sql = mysqli_query($conn, "SELECT * FROM products WHERE nama LIKE '%$keyword%' ");
    
        $list_products = [];
        while ($row = mysqli_fetch_assoc($sql)) {
            $list_products[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/admin_list-barang.css">
</head>
<body>
    <!-- <?php include("navbar.php") ?> -->
    <div class="background">
        <div class="admin-container">
            <h1>List Product</h1>
            <div class="container">
                <a href="tambah_barang.php">
                    <button class="tambah">
                        <p>Tambah Barang</p>
                    </button>
                </a>
                <a href="index.php">
                    <button class="back">
                        <p>Kembali</p>
                    </button>
                </a>
                <div class="navbar-search">
                    <form action="" method="post">
                        <input type="text" name="keyword" placeholder="Cari barang" autocomplete="off" class="search-input">
                        <button type="submit" name="search" class="search-button">Search</button>
                    </form>
                </div>
            </div>
            <table class="table-admin">
                <thead>
                    <tr class="table-admin-row">
                        <th class="table-admin-header">No</th>
                        <th class="table-admin-header">Barang</th>
                        <th class="table-admin-header">Harga</th>
                        <th class="table-admin-header">Stock</th>
                        <th class="table-admin-header">Deskripsi</th>
                        <th class="table-admin-header">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($list_products as $products): ?>
                        <tr class="table-admin-row">
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $products['nama']; ?></td>
                            <td><?php echo $products['harga']; ?></td>
                            <td><?php echo $products['stok']; ?></td>
                            <td><?php echo $products['deskripsi']; ?></td>
                            <td><img src="images/<?php echo $products['foto']; ?>" alt="<?php $products['foto']?>" width="80%" height="100px" style="display: block; margin:0 auto;"></td>
                            <td>
                                <div class="button-container">
                                    <a href="edit_barang.php?id=<?php echo $products['id']?>">
                                        <button class="edit-btn">
                                            <i class="fa-solid fa-pen" style="color: #ffffff;"> </i>
                                        </button>
                                    </a>
                                    <a href="delete_barang.php?id=<?php echo $products['id']?>" onclick="return confirm('Yakin untuk menghapus admin ini?')">
                                        <button class="delete-btn">
                                            <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php $i++ ; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <?php include("footer.php") ?> -->
</body>
</html>
