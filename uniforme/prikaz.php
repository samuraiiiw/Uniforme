<?php

    require_once "functions.php";

    $title = "prikaz";
    $table= 'artikal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
     <link rel="stylesheet" href="stil.css">
     
</head>
<body>


            <?php

            require_once "nav.php";            

                if(isset($_GET['id'])){
                    $artikal_id = $_GET['id'];
                }

                $result = $mysqli->query("SELECT * FROM $table WHERE artikal.id=$artikal_id") or die($mysqli->error);

                $row = $result->fetch_assoc();
                $naziv = $row['naziv'];   
                $cena = $row['cena'];
                
                if($row['s']!=0){
                    $s="S";
                }else $s= NULL;
                if($row['m']!=0){
                    $m="M";
                }else $m= NULL;
                if($row['l']!=0){
                    $l="L";
                }else $l= NULL;
                if($row['xl']!=0){
                    $xl="XL";
                } else $xl= NULL;
                if($row['xxl']!=0){
                    $xxl="XXL";
                } else $xxl= NULL;
                if($row['xxxl']!=0){
                    $xxxl="XXL";
                }else $xxxl= NULL;
                

                    echo 
                        "   <div class='row prikaz'>
                            <div class='col-5'>
                                <img src='{$row['slika']}' class='uvelicano'>
                            </div>
                            
                            <div class='artikal_info col-4'>
                                <div><h2>$naziv</h2></div>
                                
                                <div>
                                Izaberi veličinu:<br>
                                <span>$s</span>
                                <span$m</span>
                                <span>$l</span>
                                <span>$xl</span>
                                <span>$xxl</span>
                                <span>$xxxl</span>
                                </div>
                               
                                <div>
                                Cena:<br>
                                <p id='cena-info'>$cena RSD</p>
                                </div>
                                
                                <button type='button' class='btn-prikaz' onclick='openPopup()' name='add'>Dodaj u korpu</button>
                                <input type='hidden' name= 'artikal_id' value='$artikal_id'>
                            </div>
                        </div>"
                        ;

            ?>
        


        <div class="popup "id="popup">
        <div class="scroll">
        <?php
            
            if(isset($_SESSION['cart'])){
            echo "
            <div class='korpa-naziv'>
             Korpa
            </div>";

            
            if($_SESSION['cart'][0] == 0 ){
                $_SESSION['cart'][0] = $artikal_id;
            }
            
            $temp=0;
            foreach($_SESSION['cart'] as $key){
                if($key==$artikal_id)
                    $temp=1;
            }

            if($temp==0){
                array_push($_SESSION['cart'],$artikal_id);
                $count=count($_SESSION['cart']);
            }

            foreach($_SESSION['cart'] as $key=>$value){
                 // echo "<script>alert('Artikal je vec dodat u korpu!')</script>";
                 
                 $result = $mysqli->query("SELECT * FROM $table WHERE artikal.id=$value") or die($mysqli->error);
                 $row = $result->fetch_assoc();
                 $naziv = $row['naziv'];
                 $cena= $row['cena'];
                //  $slika= $row['slika'];
                //  echo "$naziv";
                    echo "
                 <div class='popup-prikaz row'>
                    <div class='popup-slika col-4'>
                        <img src ='{$row['slika']}' >
                    </div>

                    <div class='popup-info col-8'>
                    
                            <p>$naziv<br>
                            $cena RSD</p>
                        
                    
            
                        
                    </div>
                 </div>";
            
            }
            // echo " BROJ ELEMENTA U KORPI JE $count";


            // var_dump($_SESSION['cart']);
        
            // foreach($_SESSION['cart'] as $key=>$value){
            //     echo "$value";

            // }

            
            // if(isset($_SESSION['cart'])){
            //     $item_array_id = array_column($_SESSION['cart'],'artikal_id');

            //     if(in_array($artikal_id,$item_array_id)){
            //         echo "<script>alert('Artikal je vec dodat u korpu!')</script>";
            //     }else{
            //         $count=count($_SESSION['cart']);

            //         $item_array = array(
            //             'artikal_id'=> $artikal_id
            //         );

            //         $_SESSION['cart'][$count]= $item_array;
            //     }

            // }else{
            //     $item_array = array(
            //         'artikal_id'=> $artikal_id
            //     );
            // };

            // $_SESSION['cart'][0]= $item_array;
                // print_r($_SESSION);

           
            }
        ?>
        </div>
            <div class="cart-btn">
            <a href='cart.php' ><button class='korpa-bttn'>Idi u Korpu</button></a></div>
    </div>  
        
 <!-- <script src="index.js"></script> -->
    <script>
        let popup=document.getElementById("popup");

        function openPopup(){
            popup.classList.add("open-popup");
        }
    </script>

<script src="https://unpkg.com/react/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
  
    <script src="https://unpkg.com/babel-standalone"></script>

        <script src="index.js" type="text/jsx"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>