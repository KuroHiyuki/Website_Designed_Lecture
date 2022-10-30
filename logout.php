<?php

/*@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:login.php');*/

session_start();
if(isset($_SESSION['email'])&& $_SESSION['email']!=NULL){
    unset($_SESSION[email]);
}
header('location:login.php');

?>