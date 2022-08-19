<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="UTF-8">

    <title>Linee e Orari</title>

    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php include('header.php');
    include_once('functions.php');
    ?>

    <article>
    <?php $fermate = get_service_child_list($_GET['id_service'])?>

    <?php var_dump($fermate)?>


    </article>

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