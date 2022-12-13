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

        <?php if (isset($_GET['id_service'])) : ?>
            <?php $fermate = get_service_child_list($_GET['id_service']) ?>

            <?php if ($fermate) : ?>
                <h1>Lista fermate</h1>
                <?php $n = 1;?>
                <?php foreach($fermate as $fermata):?>
                    <div style="margin-bottom: 10px; margin-top:5px; border-bottom: 1px solid lightgray">
                        FERMATA <b><?= $n?></b><br/>
                        <?php $n++;?>
                        NOME: <b><?=$fermata['service_child_name'];?></b><br/>
                        DESCRIZIONE: <?=$fermata['service_child_description'];?><br/>
                    </div>
                <?php endforeach?>
            <?php else : ?>
                nessuna fermata impostata su questa linea
            <?php endif; ?>
            
        <?php else : ?>
            occhio non è impostata nessuna linea
        <?php endif; ?>


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