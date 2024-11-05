<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3Senar</title>
    <link rel="stylesheet" href="style/home.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--Background-->
    <div class="background-section">
        <!--Navbar-->
        <?php include("navbar.php")
        ?>

        <!--Hero-->
        <div class="hero-section">
            <div class="hero-container">
                <hgroup>
                    <h1 class="hero-title">
                        Buat hidup anda lebih berwarna dengan musik<br />
                        3Senar
                    </h1>
                    <p class="hero-description">
                        Temukan alat musik terbaik anda bersama 3Senar! </p>
                </hgroup>
            </div>
        </div>
    </div>
    <!--Main Content-->
    <main class="main-section">
        <div class="main-content">
            <h1 class="content-title">Cari Sahabat Bermusik anda disini!</h1>
            <div class="content-grid">
                <div class="content-box">
                    <img src="assets/pac311.jpg" alt="Content 1"/>
                    <a href="search.php?search-input=gitar" class="title-box">
                        <h2>Cari perlengkapan gitar disini!</h2>
                    </a>
                </div>
                <div class="content-box">
                    <img src="assets/panini2.jpg" alt="Content 2"/>
                    <a href="search.php?search-input=piano" class="title-box">
                        <h2>Cari perlengkapan piano disini!</h2>
                    </a>
                </div>
                <div class="content-box">
                    <img src="assets/drummer.jpg" alt="Content 3"/>
                    <a href="search.php?search-input=drum" class="title-box">
                        <h2>Cari perlengkapan drum disini!</h2>
                    </a>
                </div>
                <div class="content-box">
                    <img src="assets/Vibraphones.jpg" alt="Content 4"/>
                    <a href="search.php?search-input=perkusi" class="title-box">
                        <h2>Cari perlengkapan perkusi disini!</h2>
                    </a>
                </div>
                <div class="content-box">
                    <img src="assets/earphone.png" alt="Content 5"/>
                    <a href="search.php?search-input=earphone" class="title-box">
                        <h2>Cari earphone disini!</h2>
                    </a>
                </div>
                <div class="content-box">
                    <img src="assets/audio.png" alt="Content 6"/>
                    <a href="search.php?search-input=audio" class="title-box">
                        <h2>Cari perlengkapan audio disini!</h2>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <!--Footer-->
    <?php require("footer.php")
    ?>
    <script src="scripts/script.js"></script>    
</body>
</html>