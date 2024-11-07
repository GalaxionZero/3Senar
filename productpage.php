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

    $dataToko = tampilToko();
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
<?php include("navbar.php")?>

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

                <?php foreach ($dataToko as $toko)?>
                <button class="accordion"><?php echo $toko['nama']?></button>
                <div class="panel">
                    <p>Alamat: <?php echo $toko['alamat']?></p>
                    <p>No. Telepon: <?php echo $toko['no_tlp']?></p>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php require("footer.php")?>
    <script src="scripts/script.js"></script> 
</body>
</html>