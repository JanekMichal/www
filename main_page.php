<?php

    session_start();

    if(!isset($_SESSION['zalogowany'])) {
        header("Location: index.php");
    }
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge,chrome=1" />
    <title>Sklep z butami</title>
</head>

<body>

<?php

    echo"<p>Witaj ".$_SESSION['user']."!";
    echo"Twoje imie to: ".$_SESSION['imie'];

    echo '[ <a href = "logout.php"> Wyloguj się<a/> ]<p/>';
?>

</body>
</html>
