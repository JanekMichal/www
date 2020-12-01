<?php
function load_head() {
    echo'
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <script src="https://kit.fontawesome.com/33c5504d8f.js" crossorigin="anonymous"></script>

    <style>
        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        </style>
    ';
}

function load_navbar() {

    echo'
    <nav class="navbar navbar-light bg-light navbar-expand-sm">
            <a class="navbar-brand" href="index.php">Najlepsze buty w sieci! </a>
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
                            <a class="dropdown-item" href="#"> Klapki </a>
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
                </ul>';
                    if(!isset($_SESSION['zalogowany'])) {
                        echo '
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
                        ';
                    } else {
                        echo '
                        <div class="dropdown">
                    <a class="navbar-brand ml-2" href="#" data-toggle="dropdown">
                        <img src="icons/person-circle.svg" width="30" height="30" alt="" >
                    </a>
                    <div class="dropdown-menu" >
                        <form class="px-4 py-3" action="logout.php" method="post">
                            <div class="form-group">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Konto: 
                                ';
                        echo "" . $_SESSION['user'];
                        echo '</a>
                                <a class="nav-link" href="#">Moje konto</a>
                            </div>
                            <button type="submit"  class="btn btn-primary">Wyloguj się</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="rejestracja.php">Nie masz konta? Rejestracja</a>
                    </div>
                </div>';
                    }
                echo'
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
    ';
}
