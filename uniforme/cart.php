<?php
        require_once "functions.php"; 

        $table = 'artikal';
        $sql="SELECT * FROM $table";
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">  
</head>
<body>
    <div class="cart-container">
    <?php require_once "nav.php";?>

    
    <div class="cart-box row">

        <?php

            
            foreach($_SESSION['cart'] as $key=>$value){
                $result = $mysqli->query("SELECT * FROM $table WHERE artikal.id=$value") or die($mysqli->error);
                $row = $result->fetch_assoc();
                $naziv = $row['naziv'];
                $cena= $row['cena'];

                echo "
                  <div class='col-3'>
                    <div class='cart-img'>
                        <img src ='{$row['slika']}' >
                    </div>

                    <div class='cart-info'>
                        
                            <p>$naziv<br>
                            $cena RSD</p>
    
                    </div>
                 </div>";

            }

            // $product_id = array_column($_SESSION['cart'],'product_id');

            // foreach($_SESSION['cart'] as $key=>$value){

            //     echo $value;

            //     $sql="SELECT * FROM $table WHERE id='{$artikal_id}'";

            //     $result = $mysqli->query($sql) or die($mysqli->error);

            //     $row = mysqli_fetch_assoc($result);

            //     cartElement($row['slika'],$row['naziv'],$row['cena']);
                
            // }


            // while($row=mysqli_fetch_assoc($result)){
            //     foreach($product_id as $id){
            //         if($row['id']==$id){
            //             cartElement($row['product_img'],$row['product_name'],$row['product_price']);
            //         }
            //     }
            // }

        ?>

    </div>
    </div>
    <div class="cart-price">

    </div>


<script src="https://unpkg.com/react/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
  
    <script src="https://unpkg.com/babel-standalone"></script>


    <script src="index.js" type="text/jsx"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>