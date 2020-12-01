<?php

session_start();
require_once ('base.php');

//if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
//    header('Location: main_page.php');
//    exit();
//}
require_once("functions.php");
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
            <?php getProducts(); ?>
        </div>
    </div>

<?php
if (isset($_SESSION['blad'])) {
    echo $_SESSION['blad'];
}

?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>


