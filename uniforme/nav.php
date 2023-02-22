<link rel="stylesheet" href="index.css">
<h1 id="logo">Six Uniforme</h1>
        
<div class="nav-box">
<nav class="row" >
    <?php echo "<a class='col-3' href='index.php?naziv=katalog'>Zenske Uniforme</a>";?>
        <a class="col-3" href="">Muske Uniforme</a>
        <!-- <a class=" col-2   "href="">Prodajna mesta</a> -->
        <a class="col-3"href="">Kape</a>
        <a class="col-3"href="">Nesto</a>
</nav>

</div>

    <a href="cart.php" class="cart">
        <h4 >
            <i class="bi bi-cart" id="cart"></i> Korpa
            <?php 
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<span>$count</span>";
                } 
                else 
                    echo "<span>0</span>";

            ?>
        </h4>
    </a>
