<?php
    require 'koneksi.php';

    $query = "SELECT * FROM start_review ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $s_review = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $s_review[] = $row;
    }


    if(isset($_POST["keyword"])) {
        $keyword = $_POST["keyword"];

        $sql = mysqli_query($conn, "SELECT * FROM start_review WHERE nama_tempat LIKE '%$keyword%' OR user LIKE '%$keyword%'");
    
        $s_review = [];
        while ($row = mysqli_fetch_assoc($sql)) {
            $s_review[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Pengguna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/start.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="review-container">
        <h1>Review dari Pengguna</h1>
        <div class="container">
            <a href="tambah_review.php">
                <button class="tambah">
                    <p>Tambah Review</p>
                </button>
            </a>
            <a href="index.php">
                <button class="back">
                    <p>Kembali</p>
                </button>
            </a>
            <form action="" method="post" >
                <input type="text" name="keyword" placeholder="Cari Review" autocomplete="off">
                <button type="submit" name="search" class="search-btn">
                    <i class="fa-solid fa-search" style="color: #ffffff;"></i>
                </button>
            </form>
        </div>
        <table class="table-review">
            <thead>
                <tr class="table-review-row">
                    <th class="table-review-header">No</th>
                    <th class="table-review-header">Nama User</th>
                    <th class="table-review-header">Nama Tempat</th>
                    <th class="table-review-header">Ulasan</th>
                    <th class="table-review-header">Rating</th>
                    <th class="table-review-header">Tanggal</th>
                    <th class="table-review-header">Foto</th>
                    <th class="table-review-header">Ubah</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($s_review as $start_review): ?>
                    <tr class="table-review-row">
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $start_review['user']; ?></td>
                        <td><?php echo $start_review['nama_tempat']; ?></td>
                        <td><?php echo $start_review['ulasan']; ?></td>
                        <td><?php echo $start_review['rating']; ?>/5</td>
                        <td><?php echo $start_review['tanggal']; ?></td>
                        <td><img src="images/<?php echo $start_review['foto_path']; ?>" alt="<?php $start_review['foto_path']?>" width="80%" height="100px" style="display: block; margin:0 auto;"></td>
                        <td>
                            <div class="button-container">
                                <a href="edit_review.php?id=<?php echo $start_review['id']?>">
                                    <button class="edit-btn">
                                        <i class="fa-solid fa-pen" style="color: #ffffff;"> </i>
                                    </button>
                                </a>
                                <a href="delete_review.php?id=<?php echo $start_review['id']?>" onclick="return confirm('Yakin untuk menghapus review ini?')">
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
    <?php include("footer.php") ?>
</body>
</html>
