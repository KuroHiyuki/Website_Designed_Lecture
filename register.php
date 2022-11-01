<?php

include 'config.php';
//include 'js/validate.js';

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
      //echo '<script language="javascript">arlet("User email already exist!");</script>';
      $message[] = 'User email already exist!';
   }else{
      if($pass != $cpass){
         //echo '<script language="javascript">arlet("Confirm password not matched!");</script>';
         //echo "Confirm password not matched! <a href='javascript: history.go(-1)'>Trở lại</a>";
         //exit;
         $message[] = 'Confirm password not matched!';
      }else{
         $insert = $connect->prepare("INSERT INTO UserInfo (Username, UserEmail, UserPassword,UserPhone, UserBirthday) VALUES(?,?,?,?,?)");
         $insert->execute([$name, $email, $pass, $tel, $birthday]);
            //echo '<script language="javascript">arlet("Registered successfully!"); </script>';
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
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message i">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
<script type="text/javascript">
   
    function validateform() {
        var name = document.forms['myform']['name'].value;
        var email = document.forms['myform']['email'].value;
        var pass = document.forms['myform']['pass'].value;
        var phone = document.forms['myform']['phone'].value;
        
         if (name == null || name == "") {
               alert("Name can't be blank");
               //return
         } 
         if (pass.length < 6) {
               alert("Password must be at least 6 characters long.");
               //return
         }
         if (email == ''){
               alert("Email can't be blank");
               return false;
         }
         if (!isEmail(email)){
               alert('Email invalidate');
               return false;
         } else if (phone == '') {
               alert("Phone number can't be blank");
         } else 
         if (!isPhone(phone)) {
               alert('Phone number invalidate');
               //isCheck = false;
               return false;
         } else {
               setSuccess(phone);
         }
               
      }
      function isEmail(email) {
         return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
      }

      function isPhone(number) {
         //return /((03|05|07|08|09]))+([0-9]{8})\b/.test(number);
         return  /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/.test(number);
      }

   // validateform();
</script>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="box">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" name="myform" method="POST" onsubmit="validateform()">
      <h3>Register now</h3>
      <input type="name" name="name" class="box" placeholder="Enter your name" required>
      <input type="email" name="email" class="box" placeholder="Enter your email" required>
      <input type="password" name="pass" class="box" placeholder="Enter your password" minlength = "6" required>
      <input type="password" name="cpass" class="box" placeholder="Confirm your password" required>
      <input type="tel" name="phone" class="box" required pattern="[0-9]{4}[0-9]{3}[0-9]{3}" placeholder="07xx.xxx.xxx" >
      <input type="date" name="Birthday" class = "box" required>
      <input type="submit" value="register now" class="btn" name="submit">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>
</section>

</body>
</html>

