<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = $_POST['cpass'];
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $tel = $_POST['phone'];
   $tel = filter_var($tel,FILTER_SANITIZE_STRING);
   $birthday = $_POST['Birthday'];

   $select = $connect->prepare("SELECT * FROM UserInfo WHERE UserEmail = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'User email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         $insert = $connect->prepare("INSERT INTO UserInfo (Username, UserEmail, UserPassword,UserPhone, UserBirthday) VALUES(?,?,?,?,?)");
         $insert->execute([$name, $email, $pass, $tel, $birthday]);
            $message[] = 'Registered successfully!';
            header('location:login.php');

      }
   }

}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
      <input type="name" name="name" class="box" placeholder="Enter your name" required></br>
      <input type="email" name="email" class="box" placeholder="Enter your email" required></br>
      <input type="password" name="pass" class="box" placeholder="Enter your password" required></br>
      <input type="password" name="cpass" class="box" placeholder="Confirm your password" required></br>
      <input type="tel" name="phone" class="box" required pattern="[0-9]{4}[0-9]{3}[0-9]{3}" placeholder="07xx.xxx.xxx"></br>
      <input type="date" name="Birthday" class = "box"></br>
      <input type="submit" value="register now" class="btn" name="submit"></br>
      <p>Already have an account? <a href="login.php">Login now</a></p></br>
   </form>
</section>

</body>
</html>
