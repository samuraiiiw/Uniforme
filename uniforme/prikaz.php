<?php

    require_once "functions.php";

    $title = "prikazzzzzzzzzzzzz";
    $table= 'artikal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>


    <?php

    require_once "nav.php";            
        
        if(isset($_GET['id'])){ 
            $artikal_id = $_GET['id'];
        }

        $sql= "SELECT *
              FROM artikal
              INNER JOIN slika on artikal.id = slika.artikal_id
              WHERE artikal.id = $artikal_id;";

        $result = $mysqli->query($sql) or die($mysqli->error);
        $row = $result->fetch_assoc();
        $naziv = $row['naziv'];   
        $cena = $row['cena'];
        $velicina = $row['velicine_id'];
    
   
        
        // if($velicina == 1){
        //     $s = "S";
        // } else $s = NULL;
        // if($velicina == 2 ){
        //     $m = "M";
        // } else $s = NULL;
        // if($velicina == 3 ){
        //     $l = "L";
        // } else $s = NULL;
        // if($velicina == 4 ){
        //     $xl = "XL";
        // } else $s = NULL;

        // if($row['S']!=0){
        //     $s="S";
        // }else $s= NULL;
        // if($row['M']!=0){
        //     $m="M";
        // }else $m= NULL;
        // if($row['L']!=0){
        //     $l="L";
        // }else $l= NULL;
        // if($row['XL']!=0){
        //     $xl="XL";
        // } else $xl= NULL;

        ?>     
        
        <form action='' method='post'>
                 
            <!-- div za sliku -->
            <div>
                <?php echo "<img src='{$row['put']}' alt=''>"; ?>
            </div>

            <!-- div za info -->
            <div>
                <?php
                echo "<h2>$naziv</h2>";
                echo "<label for=''>Izaberi velicinu</label><br>";                  

                if($velicina == 1){
                    echo "<input type='radio' name='velicina' id=''>S";
                }
                if($velicina == 2){
                    echo "<input type='radio' name='velicina' id=''>M";
                }
                if($velicina == 3){
                    echo "<input type='radio' name='velicina' id=''>L";
                }
                if($velicina == 4){
                    echo "<input type='radio' name='velicina' id=''>XL";
                }
                        
                echo "<br><label>Cena: </label>
                       <p>$cena</p>";
                ?>
                <button type='button' class='btn-prikaz' onclick='openPopup()' name='dodaj_u_korpu'>Dodaj u korpu</button>
                <input type='hidden' name= 'artikal_id' value='$artikal_id'>
            </div>     
        </form>
                


    <div>
        <?php

            if(isset($_POST['dodaj_u_korpu'])){

                $sql= "SELECT *
                       FROM artikal
                       INNER JOIN slika on artikal.id = slika.artikal_id
                       WHERE artikal.id = $artikal_id;";
                $result = $mysqli->query($sql) or die($mysqli->error);
                $artikal = $result->fetch_accos();

                $novi_artikal = array(
                    'id' => $artikal['id'],
                    'naziv' => $artikal['naziv'],
                    'cena' => $artikal['cena'],
                    'velicina' => $artikal['velicina'],
                    'kolicina' => 1
                );

                if(isset($_SESSION['korpa'])) {
                    $korpa = $_SESSION['korpa'];
                    
                    if(array_key_exists($artikal_id, $korpa)) {
                      $korpa[$artikal_id]['kolicina'] += 1;
                    } else {
                      $korpa[$artikal_id] = $novi_artikal;
                    }
                  } else {
                    $korpa = array($artikal_id => $novi_artikal);
                  }
                  $_SESSION['korpa'] = $korpa;

            }


        ?>
    </div>


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
             
        $sql= "SELECT * 
              FROM artikal 
              INNER JOIN slika on slika.artikal_id = artikal.id
              WHERE artikal.id = $value;";

             $result = $mysqli->query($sql) or die($mysqli->error);
             $row = $result->fetch_assoc();
             $naziv = $row['naziv'];
             $cena= $row['cena'];
           
                echo "
             <div class='popup-prikaz row'>
                <div class='col-4'>
                    <img src ='{$row['put']}' class='popup-slika'>
                </div>
                <div class='popup-info col-8'>
                        <p>$naziv<br>
                        $cena RSD</p>
                </div>
             </div>";
        
        }
       
        }
    ?>
        </div>
            <div class="cart-btn">
                <a href='cart.php' ><button class='korpa-bttn'>Idi u Korpu</button></a>
            </div>
     </div>  
        

<script>
const popup = document.querySelector('.popup');
const body = document.querySelector('body');
const btnPrikaz = document.querySelector('.btn-prikaz');

btnPrikaz.addEventListener('click', function() {
  togglePopup();
});

function togglePopup() {
  popup.classList.toggle('open-popup');
  body.classList.toggle('blur');
  // provjerava da li je popup otvoren
  
}

popup.addEventListener('click', function(e) {
  // ako se klikne izvan popupa zatvara se popup
  if (e.target !== popup) {
    togglePopup();
  }
});


document.addEventListener('keyup', function(e) {
  // ako se pritisne Escape zatvara se popup
  if (e.key === 'Escape' && popup.classList.contains('open-popup')) {
    togglePopup();
  }
});

// Sakrij popup element kada se stranica učita
popup.classList.remove('open-popup');

</script>
    <?php require_once "footer.php";?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>