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
    <link rel="stylesheet" type="css/text" href="/SanPham.css"> 
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
    require_once "header.php";
    
        require_once "config.php";
        
        if(isset($_GET["id"]))
        {
            $sql = "SELECT * FROM products WHERE ProductsId = ?";
            $stmt = $connect->prepare($sql);  
            $id = $_GET['id'];
            $stmt->execute([$id]);
            $rowCount = $stmt->rowCount();  
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            if($rowCount > 0){
                while($row = $stmt->fetch()){?>
                <center><table border="1"; style="width: 80%"; table-layout: fixed; height:200px>
                
                    <tr>
                        <td rowspan ="5" class ="td1">
                            <img src="<?= $row["ProductsImage"]?>" >
                            
                        </td>
                    </tr>
                    <tr>
                        <td row><b>Products ID:</b> <?php echo$row["ProductsId"]; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Products Name:</b> <?php echo $row["ProductsName"]; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Product Cagetory:</b> <?php echo $row["ProductsCagetory"]; ?>  </td>
                    </tr>
                    <tr>
                        <td><b>Product Price</b> <?php echo $row["ProductsPrice"]; ?> </td>
                    </tr>  
                    <tr height = 20px></tr>
                    <tr>
                        <br/><td colspan="2" ><b>Product Detail :</b> <?php echo $row["ProductsDetails"]; ?> </td>
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