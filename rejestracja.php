<?php

    session_start();

    if (isset($_POST['email'])) {
        //Udana walidacja? tak
        $wszystko_OK = true;

        $imie = $_POST['imie'];
        if(strlen($imie) < 1 || strlen($imie) > 20) {
            $wszystko_OK = false;
            $_SESSION['e_imie']="Imię musi posiadać od 1 do 20 znaków";
        }
//        if(ctype_alpha($imie) == false) {
//            $wszystko_OK = false;
//            $_SESSION['e_nick'] = "Imie może skąłdać się tylko z liter";
//        }

        $nazwisko = $_POST['nazwisko'];
        if(strlen($nazwisko) < 1 || strlen($nazwisko) > 20) {
            $wszystko_OK = false;
            $_SESSION['e_nazwisko']="Nazwisko musi posiadać od 1 do 20 znaków";
        }
//        if(ctype_alpha($nazwisko) == false) {
//            $wszystko_OK = false;
//            $_SESSION['e_nazwisko'] = "Nazwisko może skąłdać się tylko z liter";
//        }

        //Sprawdzanie poprawnoścli loginu
        $nick = $_POST['nick'];
        //sprawdzanie długości loginu
        if(strlen($nick) < 3 || strlen($nick) > 20) {
            $wszystko_OK = false;
            $_SESSION['e_nick']="Login musi posiadać od 3 do 20 znaków";
        }

        if(ctype_alnum($nick) == false) {
            $wszystko_OK = false;
            $_SESSION['e_nick'] = "Login może skąłdać się tylko z liter i cyfr (bez polskich znaków)";
        }

        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) ||($emailB != $email)){
            $wszystko_OK = false;
            $_SESSION['e_email'] = "Podaj poprawny email";
        }

        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];

        if((strlen($haslo1) < 8) || strlen($haslo1) > 20 ) {
            $wszystko_OK = false;
            $_SESSION['e_haslo']="Hasło musi posiadać 8-20 znaków";
        }

        if($haslo1 != $haslo2) {
            $wszystko_OK = false;
            $_SESSION['e_haslo']="hasla nie są identyczne";
        }

        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

        if(!isset($_POST['regulamin'])) {
            $wszystko_OK = false;
            $_SESSION['e_regulamin']="Nie zaakceptowano regulaminu";
        }

        //zapamiętaj wprowadzone dane
        $_SESSION['fr_imie'] = $imie;
        $_SESSION['fr_nazwisko'] = $nazwisko;
        $_SESSION['fr_nick'] = $nick;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_haslo1'] = $haslo1;
        $_SESSION['fr_haslo2'] = $haslo2;


        if(isset($_POST['regulamin']))$_SESSION['fr_regulamin']=true;

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name );
            if($polaczenie->connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                //Czy email już istnieje?
                $result = $polaczenie->query("SELECT customer_id FROM customer where email='$email'");
                if(!$result) throw new Exception($polaczenie->error);

                $ile_takich_maili = $result->num_rows;
                if($ile_takich_maili > 0) {
                    $wszystko_OK = false;
                    $_SESSION['e_email']='Istnieje już konto z takim adresem email';
                }
                //Czy nick już istnieje?
                $result = $polaczenie->query("SELECT customer_id FROM customer where login='$nick'");
                if(!$result) throw new Exception($polaczenie->error);

                $ile_takich_nickow = $result->num_rows;
                if($ile_takich_nickow > 0) {
                    $wszystko_OK = false;
                    $_SESSION['e_nick']='Istnieje już konto z takim adresem nickiem';
                }

                if($wszystko_OK == true) {
                    //dodajemy gracza do bazy
                    if($polaczenie->query("INSERT INTO customer VALUES (NULL, '$imie', '$nazwisko', '$nick','$haslo_hash','$email')")) {
                        $_SESSION['udanarejestracja'] = true;
                        header('Location: udanaRejestracja.php');
                    } else {
                        throw new Exception($polaczenie->error);
                    }
                }
                $polaczenie->close();
            }


        } catch (Exception $e) {
            echo '<span style="color:red;">Błąd serwera.</span>';
            echo '<br/>Informacja deweloperska'.$e;
        }


    }
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1"/>
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>


    <style>
        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }



    </style>
</head>

<body>
    <header>
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
        <br/>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm col-md-12 col-lg-6 col-xl-4">
                    <form method="post">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Imię:</label>
                            <input type="text" value="<?php
                            if(isset($_SESSION['fr_imie'])) {
                                echo $_SESSION['fr_imie'];
                                unset($_SESSION['fr_imie']);
                            }
                            ?>" name="imie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/>
                            <?php
                            if(isset($_SESSION['e_imie'])) {
                                echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
                                unset($_SESSION['e_imie']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nazwisko:</label>
                            <input type="text" value="<?php
                            if(isset($_SESSION['fr_nazwisko'])) {
                                echo $_SESSION['fr_nazwisko'];
                                unset($_SESSION['fr_nazwisko']);
                            }
                            ?>" name="nazwisko" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/>
                            <?php
                            if(isset($_SESSION['e_nazwisko'])) {
                                echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
                                unset($_SESSION['e_nazwisko']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login:</label>
                            <input type="text" value="<?php
                            if(isset($_SESSION['fr_nick'])) {
                                echo $_SESSION['fr_nick'];
                                unset($_SESSION['fr_nick']);
                            }
                            ?>" name="nick" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/>
                            <?php
                            if(isset($_SESSION['e_nick'])) {
                                echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                                unset($_SESSION['e_nick']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" value="<?php
                            if(isset($_SESSION['fr_email'])) {
                                echo $_SESSION['fr_email'];
                                unset($_SESSION['fr_email']);
                            }
                            ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <?php
                            if(isset($_SESSION['e_email'])) {
                                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                                unset($_SESSION['e_email']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hasło:</label>
                            <input type="password" value="<?php
                            if(isset($_SESSION['fr_haslo1'])) {
                                echo $_SESSION['fr_haslo1'];
                                unset($_SESSION['fr_haslo1']);
                            }
                            ?>" name="haslo1" class="form-control" id="exampleInputPassword1"><br/>
                            <label for="exampleInputPassword1">Powtórz hasło:</label>
                            <input type="password" value="<?php
                            if(isset($_SESSION['fr_haslo2'])) {
                                echo $_SESSION['fr_haslo2'];
                                unset($_SESSION['fr_haslo2']);
                            }
                            ?>" name="haslo2" class="form-control" id="exampleInputPassword1">
                            <?php
                            if(isset($_SESSION['e_haslo'])) {
                                echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                                unset($_SESSION['e_haslo']);
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Zarejestruj się</button>
                        <label>
                        <input type="checkbox" value="<?php
                        if(isset($_SESSION['fr_regulamin'])) {
                            echo $_SESSION['fr_regulamin'];
                            unset($_SESSION['fr_regulamin']);
                        }
                        ?>" name="regulamin"/> Akceptuję regulamin
                        </label>
                        <?php
                            if(isset($_SESSION['e_regulamin'])) {
                                echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                                unset($_SESSION['e_regulamin']);
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>