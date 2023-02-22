<?php
    require_once "functions.php"; 

    $title = "Viktoria Style";
    $table = 'artikal';
    
    // $haljina= 'haljina';
    // $pantalone = 'pantalone';
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$title";?></title>
    <link rel="stylesheet" href="stil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   

</head>
<body>

    <?php require_once "nav.php"; ?>
    
    <div class="row prikaz">

        <div class="kategorije col-3">
                <h2 style="margin-left: 10%;">Kategorije</h2>
                <ul>
                    <li class="li">Bluza</li>
                    <li class="li"><?php echo "<a href='index.php?naziv=haljina'>Haljina</a>";?></li>  
                    <li class="li">Kaput</li>
                    <li class="li">Kombinezon</li>
                    <li class="li"><?php echo "<a href='index.php?naziv=pantalone'>pantalone</a>"?></li>
                    <li class="li">Suknja</li>
                    <li class="li">Majica</li>
                </ul>
        </div>


        <div id="slike" class="slike col-9 row">
            <?php

            if(isset($_GET['naziv'])){
                $naziv=$_GET['naziv'];   

                        //filtriranje

                        if($naziv !='katalog'){
                            $vrsta = $naziv;
                        } else {
                                $vrsta = 'haljina';
                            }

            
                        //izbacivanje slika
        
                        $sql="SELECT * FROM $table WHERE vrsta='{$vrsta}'";
 
                        $result = $mysqli->query($sql) or die($mysqli->error);
                        
                        while ($row = $result->fetch_assoc()){
                            
                            if($row['s'] == 0 && $row['l'] ==0 && $row['xl']==0 && $row['xxl'] ==0 && $row['xxxl']==0) continue;  
        
                            echo  "<div class='oneimage col-4'>
                                        <a href='prikaz.php?id={$row['id']}' >
                                            <img src ='{$row['slika']}' >
                                            <p class='nazivArtikla'>{$row['naziv']}<br>
                                                                    {$row['cena']} RSD</p>
                                        </a>
                                     </div>";
                        }
                        
                } 
                else
                { 
                    $vrsta= 'haljina';

                    $sql="SELECT * FROM $table WHERE vrsta='{$vrsta}'";
 
                        $result = $mysqli->query($sql) or die($mysqli->error);
                        
                        while ($row = $result->fetch_assoc()){
                            
                            if($row['s'] == 0 && $row['l'] ==0 && $row['xl']==0 && $row['xxl'] ==0 && $row['xxxl']==0) continue;  
        
                            echo  "<div class='oneimage col-4'>
                                        <a href='prikaz.php?id={$row['id']}' >
                                            <img src ='{$row['slika']}' >
                                            <p class='nazivArtikla'>{$row['naziv']}</p>
                                        </a>
                                     </div>";
                        }
                }

            ?>

        </div>

        
        
    </div>

    


    <footer>
        <div class="content">
          <div class="top">
            <div class="logo-details">
              <i class="fab fa-slack"></i>
              <span class="logo_name">SIX UNIFORME</span>
            </div>
            <div class="media-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
          <div class="link-boxes">
            <ul class="box">
              <li class="link_name">Kompanija</li>
              <li><a href="#">O nama</a></li>
              <li><a href="#">Politika privatnosti</a></li>
              <li><a href="#">Galerija</a></li>
            </ul>
            <ul class="box">
              <li class="link_name">Kontakt</li>
              <li><a href="#">+381(61)3917286</a></li>
              <li><a href="#">+381(60)0177085</a></li>
              <li><a href="#">sixuniforme@gmail.com</a></li>
            </ul>
            <ul class="box">
              <li class="link_name">Informacije</li>
              <li><a href="#">Radno vreme: 11:00 - 18:00</a></li>
              <li><a href="#">Subota: 10:00 - 15:00</a></li>
              <li><a href="#">Nedelja: Zatvorena</a></li>
            </ul>
            <ul class="box">
              <li class="link_name">Brzi piristup</li>
              <li><a href="#">Pocetna</a></li>
              <li><a href="#">Kontakt</a></li>
              <li><a href="#">O nama</a></li>
            </ul>
            <ul class="box input-box">
              <li class="link_name">Lokacija</li>
              <iframe 
   frameborder="0" height="250" scrolling="no" 
   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4476.601645162976!2d21.902807215504556!3d43.32018120661894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b1cbc0c69daf%3A0xf2284db9055d70c!2sStefan%20I%20Ksenija%20uniforme!5e0!3m2!1ssr!2srs!4v1673967898080!5m2!1ssr!2srs" width="300"></iframe>
            </ul>
          </div>
        </div>
        <div class="bottom-details">
          <div class="bottom_text">
            <span class="copyright_text">SIX UNIFORME © 2016 <a href="#"></a>All rights reserved</span>
            <span class="policy_terms">
              <a href="#">Privacy policy</a>
              <a href="#">Terms & condition</a>
            </span>
          </div>
        </div>
      </footer>
</body>
</html>
</html>