<?php
    
    $mysqli = new mysqli('localhost', 'root','','uniforme') or die($mysqli->connect_error);

    session_start();

    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

	function queryMySQL($query){
		global $connection;
		$result = $connection->query($query);
		if(!$result) die($connection->error);
		return $result;
	}

	function showPhotos($id){
	 $result = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);
                
                while ($data = $result->fetch_assoc()){

                    echo    "<div class='col-4'>
                            <a href='prikaz.php?id={$data['id']}' >
                                <img src='{$data['img_dir']}' >

                                {$data['naziv']}
                            </a>
                            </div>";
                }
	}

    function cartElement($productimg,$productname,$productprice){
        $element = "
        <div class='col-3'>
        <form action='cart.php' method='get'>
            <!-- slika -->
            <img src=$productimg alt=''>

            <!-- naziv -->
            $productname
            $productprice
            <div>
            <button type='button' class='btn bg-light border rounded-circle'><i class='bi bi-file-minus'></i>  </button>
            <input type='text' value='1' class='form-control w-25 d-inline'>
                    
            <button type='button' class='btn bg-light border rounded-circle'><i class='bi bi-file-plus'></i>  </button>
            </div>
            
            </form>
        </div>

        ";

        echo $element;

    }

?>