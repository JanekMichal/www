<?php

session_start();
require_once('base.php');
require_once('connect.php');
require_once('functions.php');


if (isset($_GET['pro_id'])) {
    $product_id = $_GET['pro_id'];

    $get_product = "select * from product where product_id = '$product_id'";

    $run_product = mysqli_query($conn, $get_product);

    $row_product = mysqli_fetch_array($run_product);
    $stock_id = $row_product['stock_id'];
    $p_cat_id = $row_product['p_cat_id'];

    $pro_title = $row_product['name'];
    $pro_id = $row_product['product_id'];
    $pro_brand = $row_product['brand'];
    $pro_price = $row_product['price'];


    $pro_img1 = $row_product['image1'];
    $pro_img2 = $row_product['image2'];
    $pro_img3 = $row_product['image3'];

    $pro_desc = $row_product['description'];
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php load_head() ?>
    <title>Sklep z butami</title>
</head>

<body>
<header>
    <?php load_navbar(); ?>
</header>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="product_images/<?php echo $pro_img1; ?>" class="d-block w-100" alt="Zdjęcie butów">
                    </div>
                    <div class="carousel-item">

                        <img src="product_images/<?php echo $pro_img2; ?>" class="d-block w-100" alt="Zdjęcie butów">
                    </div>
                    <div class="carousel-item">
                        <img src="product_images/<?php echo $pro_img3; ?>" class="d-block w-100" alt="Zdjęcie butów">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4 mt-4">


            <h4><?php echo "Buty " . $pro_title ?></h4>
            <h6><?php echo "ID produktu: " . $product_id ?> </h6>

            <h4><?php echo "" . $pro_price . " PLN" ?></h4>
            <?php echo $pro_desc ?>
<!--            <a href='product_details.php?pro_id=$pro_id'>-->
            <form action="cart.php?pro_id=<?php echo $pro_id; ?>">
                <div class="mt-3">
                    <label for="selected_size">Rozmiary: </label>
                    <select name="selected_size" class="form-control" id="selected_size" required>
                        <?php


                        $get_sizes = "select * from stock where stock_id=$stock_id ";
                        $run_sizes = mysqli_query($conn, $get_sizes);
                        $row_sizes = mysqli_fetch_array($run_sizes);

                        $size40_stock = $row_sizes['size40'];
                        $size41_stock = $row_sizes['size41'];
                        $size42_stock = $row_sizes['size42'];
                        $size43_stock = $row_sizes['size43'];
                        $size44_stock = $row_sizes['size44'];
                        $size45_stock = $row_sizes['size45'];
                        $size46_stock = $row_sizes['size46'];

                        echo " <option value='40'> 40 - $size40_stock szt.  </option> ";
                        echo " <option value='41'> 41 - $size41_stock szt.  </option> ";
                        echo " <option value='42'> 42 - $size42_stock szt.  </option> ";
                        echo " <option value='43'> 43 - $size43_stock szt.  </option> ";
                        echo " <option value='44'> 44 - $size44_stock szt.  </option> ";
                        echo " <option value='45'> 45 - $size45_stock szt.  </option> ";
                        echo " <option value='46'> 46 - $size46_stock szt.  </option> ";
                        ?>
                    </select>
                </div>

                <div class="mt-3">
                    <button href="" type="submit" class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i>
                        Dodaj do koszyka
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_SESSION['blad'])) {
    echo $_SESSION['blad'];
}

?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>
