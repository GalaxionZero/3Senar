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
        $query = "SELECT * FROM sensei WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        if($data = mysqli_fetch_assoc($result)){
            if(password_verify($password, $data['password'])){
                session_start();
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['username'] = $data['username'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    function checkSession(){
        session_start();
        if(isset($_SESSION['email'])){
            return true;
        } else {
            return false;
        }
    }

    function checkLogin(){
        session_start();
        if(isset($_SESSION['email'])){
            header("Location: profile.php");
            exit;
        } else {
            return false;
        }
    }

    function upload(){
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        if($error === 4){
            echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
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

    function tambahProduk(){
        $conn = connection();
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $kategori = $_POST['kategori'];
        $foto = upload();

        if(!$foto){
            return false;
        }

        $query = "INSERT INTO products (nama) VALUES ('$nama'); INSERT INTO product_details (harga, deskripsi, stok, foto, kategori) VALUES ('$harga', '$deskripsi', '$stok', '$foto', $kategori);";

        if(mysqli_multi_query($conn, $query)){
            return true;
        } else {
            return false;
        }
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

    function updateProduk(){
        $conn = connection();
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $kategori = $_POST['kategori'];
        $foto = upload();

        if(!$foto){
            return false;
        }

        $query = "UPDATE products SET nama='$nama' WHERE id=$id; UPDATE product_details SET harga='$harga', deskripsi='$deskripsi', stok='$stok', foto='$foto', kategori='$kategori' WHERE id_product=$id";

        if(mysqli_multi_query($conn, $query)){
            return true;
        } else {
            return false;
        }
    }

    function deleteProduk($id){
        $conn = connection();
        $query = "DELETE FROM products WHERE id=$id; DELETE FROM product_details WHERE id_product=$id";
        if(mysqli_multi_query($conn, $query)){
            return true;
        } else {
            return false;
        }
    }
?>