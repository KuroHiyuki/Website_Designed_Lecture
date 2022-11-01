<?php

include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:login.php');

/*session_start();
if(isset($_SESSION['UserName'])){
    unset($_SESSION['UserName']);
}
header('location:login.php');*/

?>