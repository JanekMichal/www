<?php

    session_start();

    if (!isset($_SESSION['udanarejestracja'])) {
        header('Location: index.php');
        exit();
    }

    //usuwanie zmiennych pamiętających wartości wpisane do formularza
    if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
    if(isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
    if(isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
    if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
    if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);

    //Usuwanie błędów rejestracji
    if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
    if(isset($_SESSION['e_imie'])) unset($_SESSION['e_imie']);
    if(isset($_SESSION['e_nazwisko'])) unset($_SESSION['e_nazwisko']);
    if(isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1"/>
    <title>Sklep z butami</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>

</head>

<body>

<header>
    <nav class="navbar navbar-light bg-light navbar-expand-sm">
        <a class="navbar-brand" href="#">Najlepsze buty w sieci! </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu"
                aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainmenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                       id="dropdown01"> Buty </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#"> Miejskie </a>
                        <a class="dropdown-item" href="#"> Skate </a>
                        <a class="dropdown-item" href="#"> Marki </a>
                        <a class="dropdown-item" href="#"> Sneakers </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Akcesoria do czyszczenia </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Wyprzedaże </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Nowości </a>
                </li>
            </ul>

            <div class="dropdown">
                <a class="navbar-brand ml-2" href="#" data-toggle="dropdown">
                    <img src="icons/person-circle.svg" width="30" height="30" alt="" >
                </a>
                <div class="dropdown-menu">
                    <form class="px-4 py-3" action="login.php" method="post">
                        <div class="form-group">
                            <label for="loginForm">E-mail</label>
                            <input type="text" name="login" class="form-control" id="emailForm" placeholder="email@example.com">
                        </div>
                        <div>
                            <label for="passForm">Hasło</label>
                            <input type="password" name="haslo" class="form-control" id="passForm" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">
                                    Zapamiętaj mnie
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Zaloguj</button>
                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="rejestracja.php">Nie masz konta? Rejestracja</a>
                </div>
            </div>

            <a class="navbar-brand" href="#">
                <img src="icons/heart.svg" width="30" height="30" alt="" >
            </a>

            <a class="navbar-brand" href="#">
                <img src="icons/cart3.svg" width="30" height="30" alt="" >
            </a>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Szukaj">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Znajdź</button>
            </form>

        </div>
    </nav>

</header>
<main>
    <h1 class="text-center">Udało Ci się dokonać rejestracji!</h1>
    <h1 class="text-center">Możesz się teraz zalogować!</h1>
</main>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>



