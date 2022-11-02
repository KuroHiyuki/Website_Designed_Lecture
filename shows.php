<?php

include 'config.php';

session_start();

$user_id = $_SESSION['UserName'];

if(!isset($user_id)){
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
    <style>
        img{
            width: 700px;
        }
    </style>
</head>
<body>  
    <?php
    //Nếu khi import một file bằng lệnh require thì nếu chương trình bị lỗi thì lập tức trình biên dịch sẽ dừng và xuất ra thông báo lỗi. 
    //Còn nếu sử dụng lệnh include thì đó chỉ là một cảnh báo nên chương trình vẫn chạy cho đến cuối chương trình.
    require_once "header.php";
    
        require_once "config.php";
  //Hàm isset() dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ của máy tính chưa      
        if(isset($_GET["id"]))
        {
            $sql = "SELECT * FROM products WHERE ProductsId = ?";
 //Placeholder không định danh
 //Khởi tạo Prepare statement (Chuẩn bị một câu lệnh SQL làm khung/mẫu -đóng vai trò như tham số ) từ biến $conn 
            $stmt = $connect->prepare($sql);  
            $id = $_GET['id'];
//Phương thức excute gán giá trị lần lượt tron P.Holder
            $stmt->execute([$id]);
//rowCount(): trả về số hàng bị ảnh hưởng bởi câu lệnh DELETE, INSERT hoặc UPDATE
            $rowCount = $stmt->rowCount();  
//PDO::FETCH_ASSOC: Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database) 
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            if($rowCount > 0){
                while($row = $stmt->fetch()){?>
                <center><table border="1"; style="width: 70%"; table-layout: fixed; height:300px>
                
                    <tr>
                        <td rowspan ="8" class ="td1">
                            <img src="<?= $row["ProductsImage"]?>" >
                            
                        </td>
                    </tr>
                    <tr>
                        <td><h1><?php echo $row["ProductsName"]; ?></h1> </td>
                    </tr>
                    <tr>
                        <td row><h3>Products ID:</h3> <?php echo$row["ProductsId"]; ?> </td>
                    </tr>
                    <tr>
                        <td><h3>Products Name:</h3> <?php echo $row["ProductsName"]; ?> </td>
                    </tr>
                    <tr>
                        <td><h3>Product Cagetory:</h3> <?php echo $row["ProductsCagetory"]; ?>  </td>
                    </tr>
                    <tr>
                        <td><h3>Product Price: </h3> <?php echo $row["ProductsPrice"]; ?> </td>
                    </tr> 
                    <tr>
                        <td><h3>Made in:</h3> <?php echo $row["ProductsMadein"]; ?> </td>
                    </tr> 
                    <tr>
                        <td><h3>Expiry:</h3> <?php echo $row["ProductsExp"]; ?> </td>
                    </tr>
                    <tr height = 20px></tr>
                    <tr>
                        <br/><td colspan="2" class="detail"><h2>Product Detail :</h2> <?php echo $row["ProductsDetails"]; ?> </td>
                    </tr>            
        <?php
            }
        ?>
        </table>
<?php
                }
    
        else {
        echo "0 results";
        }
        //mysqli_close($conn);
    }
    include "footer.php";
        ?>
    </div>
    <script src="js/script.js"></script>
    </body>
</html>