<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: main_page.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1"/>
    <title>Sklep z butami</title>

    <link rel="stylesheet" href="css/bootstrap-grid.min.css"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
<main>
    <section class="boots">
        <div class="container">

            <header>
                <h1>Najlepsze buciki</h1>
            </header>

            <div class="row">

                <form action="login.php" method="post">
                    Login: <br/> <input type="text" name="login"/> <br/>
                    Hasło: <br/> <input type="password" name="haslo"/> <br/><br/>
                    <input type="submit" value="zaloguj się">
                </form>

                <div class="col-sm-12">
                    <figure></figure>

                    <div class="col-sm-3">Buty</div>
                    <div class="col-sm-3">Sznurówki</div>
                    <div class="col-sm-3">Akcesoria do czyszczenia</div>
                    <div class="col-sm-3">Skarpetki</div>
                </div>

                <div class="col-sm-3">

                    <figure>
                        <a href="#"><img src="img/vansAuthentic.jpg" alt="Vans Authentic"></a>

                    </figure>

                </div>

                <div class="col-sm-3">

                    <figure>
                        <a href="#"><img src="img/nikeChron.jpg" alt="Vans Authentic"></a>

                    </figure>

                </div>

                <div class="col-sm-3">

                    <figure>
                        <a href="#"><img src="img/vansOldSkool.jpg" alt="Vans Authentic"></a>

                    </figure>

                </div>

                <div class="col-sm-3">

                    <figure>
                        <a href="#"><img src="img/vansSk8Hi.jpg" alt="Vans Authentic"></a>

                    </figure>

                </div>


                <div id="footer">
                    Najlepsze buty w sieci
                </div>

            </div>
        </div>
    </section>
</main>

<?php
if (isset($_SESSION['blad'])) {
    echo $_SESSION['blad'];
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


