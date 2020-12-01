<?php

$db = mysqli_connect("localhost", "root", "", "sklep");

function getProducts() {

    global $db;


        $get_products = "select * from product order by 1 DESC LIMIT 0,15";

        $run_products = mysqli_query($db, $get_products);



    while($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['name'];

        $pro_price = $row_products['price'];

        $pro_image1 = $row_products['image1'];

        echo "
        
        <div class='col-lg-4 col-md-6 col-sm-6'>
      
            <div class='product'>
                <a href='product_details.php?pro_id=$pro_id'>
                <img class='img-fluid' src='product_images/$pro_image1'>
                </a> 
                <div class='text'>
                    <h6>
                        $pro_title
                    </h6>
                    <p class='price'>
                        $pro_price zł
                    </p>
                </div>
            </div>
        </div>
        ";
    }
}
?>
