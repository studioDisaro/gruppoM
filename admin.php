<?php session_start();
if (!isset($_SESSION)) {
    Header('Location: home.php');
}

if (!isset($_SESSION['auth_login'])) {
    Header('Location: home.php');
}

if (isset($_SESSION)) {
    if (isset($_SESSION['auth_login'])) {
        if ($_SESSION['user']['user_admin'] != 1) {
            Header('Location: home.php');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="UTF-8">

    <title>Home </title>

    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php include 'header.php'; ?>
    <article>
        <?php var_dump($_SESSION); ?>
        <?php echo "<h1>Benvenuto " . $_SESSION['user']['user_name'] . " in Moving in Turin!</h1>"; ?>

        <button class="btn-admin" onclick="location.href='users.php'">Gestisci utenze</button>
        <button class="btn-admin">Gestisci tipi di servizio</button>
        <button class="btn-admin">Gestisci servizi</button>

        <footer>
            <div class="footerhome">
                <ul>
                    <li><a href="contatti.html">Contatti</a></li>
                    <li> Lavora con noi </li>
                </ul>

                <br>
                Copyright © 2021 Manuela Ferri & Giorgia Canova
            </div>

        </footer>


</body>

</html>