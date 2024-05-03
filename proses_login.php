<?php
session_start();
include 'config/connect.php';
$username = $_POST['username'];
$password = $_POST['password'];


$querry =mysqli_query($is_connect, "SELECT * FROM siswa WHERE username='$username'");
// $result = mysqli_query($is_connect, $querry);


$data = mysqli_fetch_assoc($querry);


if(NULL != $data){
   
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $username;
   
    header('Location: index.php');
    $query1 = mysqli_query($is_connect, "UPDATE siswa SET last_log = now() where id =". $_SESSION['id']);
    $data1 = mysqli_fetch_assoc($query1);
}else{
    echo 'Ahhh Ahhhh';
    echo "<a href='authentication-login.php'>Kembali</a>";
}
