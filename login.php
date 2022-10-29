<?php
// Hiện tại chỉ hoàn thành chỉnh sữa xong giao diện 
//include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   
   /*$sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$email, $pass]);
   $rowCount = $stmt->rowCount();  

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if($rowCount > 0){

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }else{
         $message[] = 'no user found!';
      }

   }else{
      $message[] = 'incorrect email or password!';
   }*/

}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <!-- Xác định kiểu mã hoá của kỹ tự  -->
   
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Giúp thích ứng được với từng thiết bị để hiển thị chính xác  -->

   <title>Login</title>

   <!-- Liên kết đến css  -->
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
<!-- Thẻ section class giúp phân ra vùng đọc lập  và class = form container lấy ra thiết lập sẵn từ file css 
để trình bày section này ở trang này  -->
   <form action="" method="POST">
      <h3>LOGIN NOW</h3>
      <input type="email" name="email" class="box" placeholder="enter your email" required>
      <!-- class = box tương tự như form container
      placeholder là các hiển thị dòng chữ mờ khi chưa có dữ liệu được nhập vào  -->
      <input type="password" name="pass" class="box" placeholder="enter your password" required>
      <input type="submit" value="login now" class="btn" name="submit">
      <p>Don't have an account? <a href="register.php">register now</a></p>
   </form>

</section>


</body>
</html>