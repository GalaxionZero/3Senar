<?php
    require 'functions.php';
    session_start();
    checkLogin();
    checkAdmin();
    $conn = connection();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $success = deleteProduk($id);

        if ($success) {
            if (file_exists('img/' . $product['foto'])) {
                unlink('img/' . $product['foto']);
            }
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
    }
?>
