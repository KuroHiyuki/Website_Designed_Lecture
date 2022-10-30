<?php
/*$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "webmanagement";      // Khai báo database

            // Kết nối database tintuc
    $connect = new mysqli($server, $username, $password, $dbname);

            //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ($connect->connect_error) {
        die("Không kết nối :" . $connect->connect_error);
        exit();
    }*/
    
$db_name = "mysql:host=localhost;dbname=webmanagement";
$username = "root";
$password = "";

$connect = new PDO($db_name, $username, $password);


?>