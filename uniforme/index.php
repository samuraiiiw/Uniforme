<?php
    require_once "functions.php"; 

    $title = "Six Uniforme";
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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <?php require_once "nav.php"; ?>

    <div>
      <?php
        if(isset($_GET['vrsta'])){
          $vrsta = $_GET['vrsta'];
          
          $sql="SELECT slika.put as put,
                       artikal.id as id,
                       artikal.naziv as naziv,
                       artikal.cena as cena
                FROM slika
                INNER JOIN artikal on slika.artikal_id = artikal.id
                INNER JOIN vrsta on vrsta.id = artikal.vrsta_id
                WHERE vrsta.naziv = '{$vrsta}';";

          $result = $mysqli->query($sql) or die($mysqli->error);

          while($row = $result->fetch_assoc()){
            echo "<div>
                    <a href='prikaz.php?id={$row['id']}'><img src='{$row['put']}' alt=''></a>
                    <p>{$row['naziv']}</p>
                    <p>{$row['cena']}</p>
                  </div>";
            }

        } else {
          echo  "<a href='index.php?vrsta=bluze'><img src='artikli/artikalM1' alt=''></a>";
          echo  "<a href='index.php?vrsta=bluze'><img src='artikli/artikal1' alt=''></a>";
        }
      ?>
    </div>
    <?php require_once "footer.php";?>
   

</body>
</html>
</html>