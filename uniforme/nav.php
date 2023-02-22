<link rel="stylesheet" href="stil.css">
<h1 class="naslov">SIX UNIFORME</h1>
        

<nav >
    <div class="vrsta">
        <a href="" class="meni">ZENSKA UNIFORMA</a>
        <ul class="vrste"><br><br>
            <li><a href="">Bluze</a></li><br>
            <li><a href="">Pantalone</a></li><br>
            <li><a href="">Mantil</a></li><br>
            <li><a href="">Haljine</a></li><br>
            <li><a href="">Suknje</a></li><br>
        </ul>
    </div>
    <div class="vrsta">
        <a href="" class="meni">MUSKA UNIFORMA</a>
        <ul class="vrste"><br><br>
            <li><a href="">Bluze</a></li> <br>
            <li><a href="">Pantalone</a></li><br>
            <li><a href="">Mantil</a></li><br>

        </ul>
    </div>
    <a href="" class="vrsta">KAPE</a>
    <a href="" class="vrsta">MAJICE</a>
</nav>



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
