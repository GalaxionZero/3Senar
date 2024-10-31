<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $findQuery = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($findQuery);

    if ($product) {
        // Hapus file gambar dari folder 'images'
        if (file_exists('images/' . $product['foto'])) {
            unlink('images/' . $product['foto']);
        }

        // Hapus data dari database
        $query = "DELETE FROM products WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'admin_list_barang.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'admin_list_barang.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Data tidak ditemukan');
        document.location.href = 'admin_list_barang.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Data tidak ditemukan');
    document.location.href = 'admin_list_barang.php';
    </script>";
}
?>
