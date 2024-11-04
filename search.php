<?php
    session_start();
    require 'functions.php';

    $searchQuery = isset($_GET['search-input']) ? $_GET['search-input'] : '';

    $data = array_merge(tampilProdukByName($searchQuery), tampilProdukByKategori($searchQuery));

    $data = array_unique($data, SORT_REGULAR);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style/search.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include("navbar.php")
    ?>
    <main>
        <h1 class="content-title">Hasil Pencarian:</h1>
        
        <?php if(count($data) === 0) : ?>
            <h1 class="content-title">Produk tidak ditemukan</h1>
        <?php else : ?>
            <?php foreach($data as $data) : ?>
            <div class="maincontainer4">
                <div class="container">
                    <img src="img/<?php echo $data['foto'] ?>" alt="<?php echo $data['foto']?>">
                    <div class="overlay">
                        <div class="items"></div>
                        <div class="items head">
                            <p><span><?php echo htmlspecialchars($data['nama']); ?></span></p>
                            <hr>
                        </div>
                        <div class="items price">
                            <br>
                            <p class="new">$<?php echo htmlspecialchars($data['harga']); ?></p>
                        </div>
                        <a href="productpage.php?id=<?php echo $data['id']?>" class ="cart">Check here!</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
    <?php require("footer.php")?>
    <script src="scripts/script.js"></script> 
</body>
</html>