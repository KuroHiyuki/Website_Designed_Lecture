<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">

   <div class="flex">
   
   <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>Healthyfood</a>
            <form action="" class="search-box-container">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
        </form>
        <!--<div id="menu-bar" class="fas fa-bars"></div>-->
      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div class="icons">
         <a href="#" class="fas fa-heart"></a>
         <a href="#" id="user-btn" class="fas fa-user-circle"></a>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href ="logout.php"><div class ="fas fa-sign-out"></div>
         
      </div>

   </div>

</header>