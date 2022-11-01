<?php

include 'config.php';
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

   <h1 class="title">lastest product</h1>

   <div class="box-container">
   <?php 
            $sql = "SELECT * FROM ProductsHome ";
            $stmt = $connect->prepare($sql);
         
            $stmt->execute();
            $rowCount = $stmt->rowCount();  
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
      
            if($rowCount > 0){
               while($row = $stmt->fetch()) {
         ?>
      <div class="box">
         
         <img src="<?= $row['ProductsImage']?>" alt="">
         <h3><?= $row['ProductsName']?></h3>
         <p><?= $row['ProductsDetails']?></p>
         <a href="shows.php?id=<?= $row['ProductsId']?>" class="btn"><?= $row['ProductsName']?></a>
         
      </div>
      <?php }
            }?>

   </div>

</section>

<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>