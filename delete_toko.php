<?php
    require 'functions.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (deleteToko($id)){
            echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'admin_list_toko.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'admin_list_toko.php';
            </script>";
        }
    }
?>
