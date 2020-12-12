<?php

session_start();
require('connect.php');
require('base.php');
echo"przekazałem coś";



function load_cart_products()
{
    if (isset($_GET['pro_id'])) {
        echo"przekazałem cokolwiek";
        $product_id = $_GET['pro_id'];
        $get_product = "select * from product where product_id = '$product_id'";
        $run_product = mysqli_query($conn, $get_product);
        $row_product = mysqli_fetch_array($run_product);

        $product_name = $row_product['name'];
        $price = $row_product['price'];

    }


    echo "<tbody>
        <tr>
            <th scope='row'>1</th>
            <td>

            </td>
            <td>$product_name</td>
            <td>
            "
        ;

    echo $price;
    echo'</td>
            <td>
                <form>
                    <div class="col-md3">
                        <label>
                            <input type="number" class="form-control" placeholder="Ilość">
                        </label>
                    </div>
                </form>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Usuń</button>
            </td>
        </tr>
        </tbody>
    ';

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

<?php
if (isset($_SESSION['blad'])) {
    echo $_SESSION['blad'];

}

?>
<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produkt</th>
            <th scope="col">Rozmiar</th>
            <th scope="col">Cena</th>
            <th scope="col">Ilość</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <?php
        load_cart_products();
        ?>
    </table>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>


</body>
</html>
<?php





if(isset($_POST['submit'])) {
    $place_order = "insert into zamowienie (order_id, customer_id, shoe_id, address_id, employee_id, price, quantity, stage, date) 
                    values ('$order_id', '$customer_id', '$shoe_id', '$address_id', '$empoloyee_id', '$price', '$quantity', '$stage', '$date')";
    }


