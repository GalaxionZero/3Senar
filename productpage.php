<?php
session_start();
require "koneksi.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
            <img src="images\revstar.png" alt="Revstar Image">
        </div>
        <div class="details">
            <div class="content">
                <h2>REVSTAR<br>
                    <span>Yamaha Series</span>
                </h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Nam ultrices commodo justo, at egestas erat consequat sed. 
                Praesent ac pulvinar tellus. Aenean iaculis tellus eu erat dictum ultricies. 
                Integer vestibulum molestie ante, quis congue risus aliquet sit amet. 
                Integer tincidunt non arcu sit amet fringilla. 
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                Phasellus porta luctus dui, ac dignissim felis gravida id. Nullam vel lorem eget velit porttitor blandit.
                </p>
                <h3>Rp.6.000.000-Rp.12.000.000.</h3>
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