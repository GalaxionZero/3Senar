<?php
session_start();
require "koneksi.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare the SQL statement
$sql = "SELECT * FROM products WHERE nama LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $searchQuery . "%";
$stmt->bind_param('s', $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
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
    <!--Navbar-->
    <?php include("navbar.php")
    ?>
<main>
        <h1 class="content-title">Hasil Pencarian:</h1>
        <div class="maincontainer4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="container">
                        <img src="/projectakhir/Posttest7/images/<?php echo htmlspecialchars($row['foto']); ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>">
                        <div class="overlay">
                            <div class="items"></div>
                            <div class="items head">
                                <p><span><?php echo htmlspecialchars($row['nama']); ?></span></p>
                                <hr>
                            </div>
                            <div class="items price">
                                <br>
                                <p class="new">$<?php echo htmlspecialchars($row['harga']); ?></p>
                            </div>
                            <a href="productpage.php" class ="cart">Check here!</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No results found for "<?php echo htmlspecialchars($searchQuery); ?>"</p>
            <?php endif; ?>
        </div>
    </main>
    <!--Footer-->
    <?php require("footer.php")
    ?>
    <script src="scripts/script.js"></script> 
</body>
</html>