<?php
    function connection(){
        $conn = mysqli_connect('localhost:3307','root','','db_senar');
        if(!$conn){
            die('Connection failed'.mysqli_connect_error());
        }
        return $conn;
    }

    function register($data){
        $conn = connection();
        $username = $data['username'];
        $email = $data['email'];

        $check = "SELECT * FROM users WHERE email='$email' OR username='$username'";
        $result = mysqli_query($conn, $check);
        
        if(mysqli_num_rows($result) > 0){
            return false;
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if(mysqli_query($conn, $query)){
            return true;
        } else {
            return false;
        }
    }

    function login($data){
        $conn = connection();
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $query = "SELECT * FROM users WHERE username='$username' AND email='$email'";
        $result = mysqli_query($conn, $query);
        if($data = mysqli_fetch_assoc($result)){
            if(password_verify($password, $data['password'])){
                session_start();
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['admin'] = $data['admin'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function checkLogin(){
        if(!isset($_SESSION['login'])){
            header("Location: login.php");
            exit;
        }
    }

    function checkAdmin(){
        if(isset($_SESSION['admin' != 1])){
            header("Location: index.php");
            exit;
        }
    }

    function upload($data){
        $namaFile = $data['fotoName'];
        $ukuranFile = $data['fotoSize'];
        $error = $data['fotoError'];
        $tmpName = $data['fotoTmp'];

        if($error === 4){
            echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>alert('File yang diupload bukan gambar')</script>";
            return false;
        }

        if($ukuranFile > 10000000){
            echo "<script>alert('Ukuran gambar terlalu besar')</script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    function tambahProduk($data){
        $conn = connection();
        $nama = $data['nama'];
        $harga = $data['harga'];
        $deskripsi = $data['deskripsi'];
        $stok = $data['stok'];
        $kategori = $data['kategori'];
        $foto = upload($data);

        if(!$foto){
            return false;
        }

        $query1 = "INSERT INTO products (nama) VALUES ('$nama')";

        if (mysqli_query($conn, $query1)) {
            $id_product = mysqli_insert_id($conn);

            $query2 = "INSERT INTO product_details (id_product, harga, deskripsi, stok, foto, kategori) 
                       VALUES ('$id_product', '$harga', '$deskripsi', '$stok', '$foto', '$kategori')";
    
            if (mysqli_query($conn, $query2)) {
                return true;
            }
        }
        return false;
    }

    function tampilProduk(){
        $conn = connection();
        $query = "SELECT * FROM products JOIN product_details ON products.id = product_details.id_product";
        $result = mysqli_query($conn, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function tampilProdukByName($string){
        $conn = connection();
        $query = "SELECT * FROM products JOIN product_details ON products.id = product_details.id_product WHERE nama LIKE '%$string%'";
        $result = mysqli_query($conn, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function tampilProdukByKategori($string){
        $conn = connection();
        $query = "SELECT * FROM products JOIN product_details ON products.id = product_details.id_product WHERE kategori LIKE '$string%'";
        $result = mysqli_query($conn, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function tampilProdukById($id){
        $conn = connection();
        $query = "SELECT * FROM products JOIN product_details ON products.id = product_details.id_product WHERE products.id = $id";
        $result = mysqli_query($conn, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function updateProduk($data, $id){
        $conn = connection();
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $kategori = $_POST['kategori'];
        $foto = upload($data);

        if(!$foto){
            return false;
        }

        $query1 = "UPDATE products SET nama='$nama' WHERE id=$id;";
        $query2 = "UPDATE product_details SET harga='$harga', deskripsi='$deskripsi', stok='$stok', foto='$foto', kategori='$kategori' WHERE id_product=$id";

        if(mysqli_multi_query($conn, $query1)){
            if(mysqli_multi_query($conn, $query2)){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function deleteProduk($id){
        $conn = connection();
        $query1 = "DELETE FROM product_details WHERE id_product = $id";
        mysqli_query($conn, $query1);
        $query2 = "DELETE FROM products WHERE id = $id";
        
        if (mysqli_query($conn, $query2)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteToko($id){
        $conn = connection();
        $query = "DELETE FROM stores WHERE id = $id";
        if(mysqli_query($conn, $query)){
            return true;
        } else {
            return false;
        }
    }

    function tampilToko(){
        $conn = connection();
        $query = "SELECT * FROM stores";
        $result = mysqli_query($conn, $query);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
?>