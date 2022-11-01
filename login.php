<?php
// Hiện tại chỉ hoàn thành chỉnh sữa xong giao diện 
include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   //hàm mã hoá md5 la danh cho việc nghiền chuỗi thành các đoạn số mã hoá
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   
   $sql = "SELECT * FROM UserInfo WHERE UserEmail = ?";
   $stmt = $connect->prepare($sql);
   // Đoạn lệnh prepare là để khắc phục lỗi SQL injection 
   $stmt->execute([$email]);
   $rowCount = $stmt->rowCount();  
   $stmt->setFetchMode(PDO::FETCH_ASSOC);

   if($rowCount > 0){
      while($row = $stmt->fetch()) {

         if($row['UserPassword'] == $pass){
            echo "Logged in successfully! <a href='javascript: history.go(-1)'>Ok</a>";
            $_SESSION['UserId'] = $row['UserId'];
            $_SESSION['UserName'] = $row['UserName'];
            header('location:home.php');
            setcookie("Success", "Logged in successfully!", time()+1, "/","", 0);
         }
         else{
            echo "Incorrect email or password! <a href='javascript: history.go(-1)'>Login failed!</a>";
            //$message[] = 'Incorrect email or password!';
            setcookie("Error", "Login failed!", time()+1, "/","", 0);
      }
   }

   }else{
      echo "No user found! <a href='javascript: history.go(-1)'>Login failed!</a>";
      //$message[] = 'No user found!';
      setcookie("Error", "Login failed!", time()+1, "/","", 0);
   }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Liên kết đến css  -->
   <link rel="stylesheet" href="css/components.css">
   <link rel="stylesheet" href="css/style.css">
   
   <meta charset="UTF-8">
   <!-- Xác định kiểu mã hoá của kỹ tự  -->
   
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Giúp thích ứng được với từng thiết bị để hiển thị chính xác  -->

   <title>Login</title>

   
</head>
<body>
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
<header class="header">

<meta charset="UTF-8">
<div class="flex">

<a href="home.php" class="logo"><i class="fas fa-shopping-basket"></i>Healthyfood</a>
</header>

<section class="form-container">
<!-- Thẻ section class giúp phân ra vùng đọc lập  và class = form container lấy ra thiết lập sẵn từ file css 
để trình bày section này ở trang này  -->
   <form action="" method="POST">
      <h3>LOGIN NOW</h3>
      <input type="email" name="email" class="box" placeholder="Enter your email" required>
      <!-- class = box tương tự như form container
      placeholder là các hiển thị dòng chữ mờ khi chưa có dữ liệu được nhập vào  -->
      <input type="password" name="pass" class="box" placeholder="Enter your password" required>
      <input type="submit" value="login now" class="btn" name="submit">
      <p>Don't have an account? <a href="register.php">register now</a></p>
   </form>

</section>


</body>
</html>