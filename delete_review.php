<?php
    require 'koneksi.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $findQuery = mysqli_query($conn, "SELECT * FROM start_review WHERE id=$id");
        $review = mysqli_fetch_assoc($findQuery);

        if($review){

            unlink('images/'. $start_review['foto_file']);

            $query ="DELETE FROM start_review WHERE id = $id";
            $result = mysqli_query($conn, $query);

            if($result){
                echo "<script>
                alert('Data berhasil dihapus');
                document.location.href = 'start_review.php';
                </script>";
            } else {
                echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'start_review.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Data tidak ditemukan');
            document.location.href = 'start_review.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Data tidak ditemukan');
        document.location.href = 'start_review.php';
        </script>";
    }
?>
