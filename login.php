<?php

    session_start();

    require_once "connect.php";
    if(!isset($_POST['login']) || (!isset($_POST['haslo']))) {
        header('Location: index.php');
        exit();
    }
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error:".$polaczenie->connect_errno."Opis: ".$polaczenie->connect_error; //usunąć kiedyś, żeby nie pokazywać publicznie
    } else {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login, ENT_QUOTES,"UTF-8");



        if($rezultat = @$polaczenie->query(
            sprintf("SELECT * FROM customer WHERE BINARY login = '%s'", // bianry żeby odróżnić duże litery od małych
            mysqli_real_escape_string($polaczenie, $login))))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow > 0) {
                $wiersz = $rezultat->fetch_assoc();

                if(password_verify($haslo, $wiersz['password'])) {

                    $_SESSION['zalogowany'] = true;
                    $_SESSION['customer_id'] = $wiersz['customer_id'];
                    $_SESSION['user'] = $wiersz['login'];
                    $_SESSION['imie'] = $wiersz['name'];

                    unset($_SESSION['blad']); //usuwamy set bo udało nam się zalogować
                    $rezultat->free_result();
                    header('Location: index.php');
                }
                else {
                    $_SESSION['blad'] = '<span style ="color:#ff0000">Niepoprawny login lub hasło!</span>';
                    header('Location:index.php');
                }
            } else {

                $_SESSION['blad'] = '<span style ="color:#ff0000">Niepoprawny login lub hasło!</span>';
                header('Location:index.php');
            }
        }
        $polaczenie->close();
    }





?>