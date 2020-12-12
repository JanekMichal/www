<?php

session_start();
require_once('base.php');
require_once('connect.php');


?>

    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <?php load_head(); ?>
        <title>Dodaj produkt</title>
    </head>

    <body>

    <header>
        <?php load_navbar(); ?>
    </header>

    <main>
        <br/>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm col-md-12 col-lg-6 col-xl-4">
                    <form method="POST" action="" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label">Nazwa Produktu</label>
                            <input name="product_name" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Marka</label>
                            <input name="product_brand" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Zdjęcie 1 </label>
                            <input name="product_img1" type="file" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Zdjęcie 2 </label>
                            <input name="product_img2" type="file" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Zdjęcie 3 </label>
                            <input name="product_img3" type="file" required>
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom04">Wybierz Typ</label>
                            <select name="product_cat" class="form-control" id="validationCustom04" required>
                                <?php

                                $get_p_cats = "select * from product_category";
                                $run_p_cats = mysqli_query($conn, $get_p_cats);

                                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    $p_cat_title = $row_p_cats['p_cat_title'];

                                    echo " <option value='$p_cat_id'> $p_cat_title </option> ";
                                }

                                ?>
                            </select>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Rozmiar</th>
                                <th scope="col">Ilość</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">40</th>
                                <th>
                                    <input name="ilosc_rozm_40" type="number" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">41</th>
                                <th>
                                    <input name="ilosc_rozm_41" type="number" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">42</th>
                                <th>
                                    <input name="ilosc_rozm_42" type="number" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">43</th>
                                <th>
                                    <input name="ilosc_rozm_43" type="number" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">44</th>
                                <th>
                                    <input name="ilosc_rozm_44" type="number" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">45</th>
                                <th>
                                    <input name="ilosc_rozm_45" type="number" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">46</th>
                                <th>
                                    <input name="ilosc_rozm_46" type="number" class="form-control">
                                </th>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label class="control-label"> Cena produktu</label>
                            <input name="product_price" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Opis produktu</label>
                            <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input name="submit" value="Dodaj produkt" type="submit"
                                   class="btn btn-primary form-control">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    </body>
    </html>

<?php

if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];

    $ilosc_rozm_46 = $_POST['ilosc_rozm_46'];
    $ilosc_rozm_45 = $_POST['ilosc_rozm_45'];
    $ilosc_rozm_44 = $_POST['ilosc_rozm_44'];
    $ilosc_rozm_43 = $_POST['ilosc_rozm_43'];
    $ilosc_rozm_42 = $_POST['ilosc_rozm_42'];
    $ilosc_rozm_41 = $_POST['ilosc_rozm_41'];
    $ilosc_rozm_40 = $_POST['ilosc_rozm_40'];

    $product_cat = $_POST['product_cat'];

    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $insert_stock = "insert into stock(size40, size41, size42, size43, size44, size45, size46) values ('$ilosc_rozm_40', '$ilosc_rozm_41', '$ilosc_rozm_42', '$ilosc_rozm_43', '$ilosc_rozm_44', '$ilosc_rozm_45', '$ilosc_rozm_46')";
    $run_stock = mysqli_query($conn, $insert_stock);

    $get_stock_id = "select stock_id from stock 
                        order by stock_id DESC LIMIT 1";
    $run_stock_id = mysqli_query($conn, $get_stock_id);

    $row_stock_id = mysqli_fetch_array($run_stock_id);
    $stock_id = $row_stock_id['stock_id'];


    $insert_product = "insert into product (name, brand, image1, image2, image3, stock_id, type, price, date_of_adding, description) values ('$product_name', '$product_brand','$product_img1', '$product_img2', '$product_img3', '$stock_id', '$product_cat', '$product_price', NOW(), '$product_desc')";
    $run_product = mysqli_query($conn, $insert_product);

    echo "<script>alert('Product has been inserted sucessfully ')</script>";
    mysqli_close($conn);
}

?>