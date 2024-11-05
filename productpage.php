<?php
    session_start();
    require 'functions.php';
    checkLogin();

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    } else {
        $id = $_GET['id'];
        $data = tampilProdukById($id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style/productpage.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo htmlspecialchars($row['nama']); ?></title>
</head>
<body>
<!--Navbar-->
<?php include("navbar.php")
?>

<div class="container">
        <div class="imgBx">
            <img src="img/<?php echo $data[0]['foto']?>" alt="<?php echo $data[0]['foto']?>">
        </div>
        <div class="details">
            <div class="content">
                <h2><?php echo htmlspecialchars($data[0]['nama'])?><br>
                    <span><?php echo htmlspecialchars($data[0]['kategori'])?></span>
                </h2>
                <p>
                    <?php echo htmlspecialchars($data[0]['deskripsi'])?>
                </p>
                <h3><?php echo htmlspecialchars($data[0]['harga'])?></h3>
            </div>
        </div>
        <div class="container2">
            <div class="locations">
                <h2>Lokasi Toko<br>
                </h2>
                <br>
            <ul>
                <li class="jalan" onclick="showLocation('Mt Haryono, Jakarta')">Jl. MT Haryono, Balikpapan</li>
                <br>
                <li class="jalan">Jalan placeholder</li>
                <br>
                <li class="jalan">Jalan placeholder</li>
                <br>
            </ul>
            <div id="mapcontainer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8872446056325!2d116.87282571085557!3d-1.2378328987451517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df146c2e2cab5e5%3A0x96bafdf1508f79de!2sYamaha%20Music%20School%20Doremi%20(Ruko%20Balikpapan%20Super%20Blok)!5e0!3m2!1sen!2sid!4v1730506316140!5m2!1sen!2sid" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
        </div>
    </div>


    <!--Footer-->
<?php require("footer.php")
?>
<script src="scripts/script.js"></script> 
</body>
</html>