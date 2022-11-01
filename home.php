<?php

//@include 'config.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Act healthy. Be healthy. Eat healthy.</span>
         <h3>Reach For A Healthier You With Organic Foods</h3>
         <p>The best and most efficient pharmacy is within your own system.</p>
         <a href="about.php" class="btn">about us</a>
      </div>

   </section>

</div>

<section class="home-category">

   <h1 class="title">shop by category</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/browrice.png" alt="">
         <h3>Brown rice</h3>
         <p>A whole grain and a good source of magnesium, phosphorus, selenium, thiamine, niacin, vitamin B6, and manganese and does provide some fiber.</p>
         <a href="shows.php?id=0" class="btn">Brown rice</a>
         
      </div>

      <div class="box">
         <img src="images/noodle_3.png" alt="">
         <h3> Noodles</h3>
         <p>Good for people with diabetes, overweight, create a feeling of fullness longer, support cholesterol control</p>
         <a href="shows.php?id=1" class="btn">Noodles</a>
      </div>

      <div class="box">
         <img src="images/granola_1.png" alt="">
         <h3>Granola</h3>
         <p>A food made of baked grains, nuts, and dried fruit. Good for the digestive tract, blood pressure and heart.</p>
         <a href="shows.php?id=2" class="btn">Granola</a>
      </div>

      <div class="box">
         <img src="images/ingredient.jpg" alt="">
         <h3>Ingrendient</h3>
         <p>We provide color additives, food additives, sweeteners, preservatives and so on. Healthyfood is specialized in supply food additives and ingredients.</p>
         <a href="shows.php?id=3" class="btn">Ingrendient</a>
      </div>

   </div>

</section>

<!-- <section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">


</section> -->


<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>