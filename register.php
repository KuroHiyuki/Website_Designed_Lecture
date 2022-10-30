<?php

//include 'config.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $tel = $_POST['phone'];
   $tel = filter_var($tel,FILTER_SANITIZE_NUMBERIC);
   $birthday = $_POST['Birthday'];

   /*$select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){
            if($image_size > 2000000){
               $message[] = 'image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'registered successfully!';
               header('location:login.php');
            }
         }

      }
   }*/

}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>
<body>

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
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>Register now</h3>
      <input type="email" name="email" class="box" placeholder="Enter your email" required></br>
      <input type="password" name="pass" class="box" placeholder="Enter your password" required></br>
      <input type="password" name="cpass" class="box" placeholder="Confirm your password" required></br>
      <input type="tel" name="phone" class="box" required pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}" placeholder="07xx.xxx.xxx"></br>
      <input type="date" name="Birthday" class = "box"></br>
      <input type="submit" value="register now" class="btn" name="submit"></br>
      <p>Already have an account? <a href="login.php">Login now</a></p></br>
   </form>
</section>

</body>
</html>
