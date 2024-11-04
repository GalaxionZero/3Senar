<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM start_review WHERE id = $id";
$result = mysqli_query($conn, $query);

$start_review = [];
while($row = mysqli_fetch_assoc($result)) {
    $start_review[] = $row;
}

$start_review = $start_review[0];

if (isset($_POST['tambah'])) {
    $user = $_POST['user'];
    $nama_tempat = $_POST['nama_tempat'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $tanggal = $_POST['tanggal'];

    $oldimg = $_POST['oldimg'];

    if($_FILES['foto_path']['error'] === 4) {
        $file_name = $oldimg;

    } else {
        $tmp_name = $_FILES['foto_path']['tmp_name'];
        $file_name = $_FILES['foto_path']['name'];
        $file_size = $_FILES['foto_path']['size'];

        $maxFileSize = 4 * 1024 *1024;
        

        $validExtension = ['jpg','jpeg','png','webp'];
        $fileExtension = explode('.', $file_name);
        $fileExtension = strtolower(end($fileExtension));

        if (!in_array($fileExtension, $validExtension)){
            echo "<script>
                alert('File yang di Upload Bukan Gambar');
                document.location.href = 'tambah_review.php';
            </script>";
            exit;
        } elseif ($file_size > $maxFileSize) {
            echo "<script>
                alert('Ukuran file gambar tidak boleh lebih dari 4 MB.');
                document.location.href = 'edit_review.php';
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
                document.location.href = 'tambah_review.php';
                </script>";
            }
            $file_name = $new_file_name;
        }
    }
    // if (move_uploaded_file($_FILES['foto_path']['tmp_name'], $target_file)) {
    $query = "UPDATE start_review SET user='$user', nama_tempat='$nama_tempat', ulasan='$ulasan' , rating='$rating', tanggal='$tanggal', foto_path='$file_name' WHERE id=$id ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
        alert('Data berhasil diperbarui');
        document.location.href = 'start_review.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diperbarui');
        document.location.href = 'start_review.php';
        </script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Review</title>
    <link rel="stylesheet" href="style/tambah.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Edit Review</h1>
        <p class="title">Bagikan pengalaman kamu di tempat ini!</p>
        <div class="content">
            <form action="" method="POST" enctype="multipart/form-data">

                <label for="user">Nama User</label><br>
                <input type="text" id="user" name="user" value="<?php echo htmlspecialchars($start_review['user']); ?>" required><br>

                <label for="nama_tempat">Nama Tempat</label><br>
                <input type="text" id="nama_tempat" name="nama_tempat" value="<?php echo htmlspecialchars($start_review['nama_tempat']); ?>" required><br>

                <label for="ulasan">Ulasan</label><br>
                <textarea id="ulasan" name="ulasan" required><?php echo htmlspecialchars($start_review['ulasan']); ?></textarea><br>

                <label for="rating">Rating</label><br>
                <input type="number" id="rating" name="rating" min="1" max="5" value="<?php echo htmlspecialchars($start_review['rating']); ?>" required><br>

                <label for="tanggal">Tanggal</label><br>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($start_review['tanggal']); ?>" required><br>

                <label for="foto_path">Foto</label><br>
                <input type="file" name="foto_path" id="foto_path" style="border: 1px solid rgba(0,0,0,0.6); border-radius:9px; padding: 7px 10px; font-size: 16px;"><br>
                <img src="images/<?php echo htmlspecialchars($start_review['foto_path']); ?>" alt="<?php echo htmlspecialchars($start_review['foto_path']); ?>" style="width: 80px; height: 100px;">

                <input class="button" type="submit" value="Perbarui" name="tambah">
            </form>
        </div>
    </div>
</body>
</html>
