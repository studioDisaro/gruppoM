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

    <title>Gestisci servizi dettaglio</title>

    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

    <?php

    require_once('functions.php');

    //SAVE PARENT IN SESSION

    if (isset($_GET['service_id'])) {
        $_SESSION['service_id']=$_GET['service_id'];
    }

    if (!isset($_SESSION['service_id'])) {
        header('Location: services_detail.php');
    }


    if (isset($_GET['action'])) {
        if ($_GET['action'] == "edit") {
            $edit = update_service_child($_GET['service_child_id'], $_GET['name'], $_GET['description']);
        }

        if ($_GET['action'] == "new") {
            $new = new_service_child($_SESSION['service_id'], $_GET['name'], $_GET['description']);
        }
        if ($_GET['action'] == "delete") {
            $delete = delete_service_child($_GET['service_child_id']);
        }
    }

    if (isset($_GET['service_child_id'])) {
        $service_child_selected = get_service_child($_GET['service_child_id']);
    }

    $service_selected = get_service($_SESSION['service_id']);
    $service_child_list = get_service_child_list($_SESSION['service_id']);
    ?>

</head>

<body>
    <?php include 'header.php'; ?>
    <article>
        <?php var_dump($_SESSION) ?>
        <?php echo "<h1>Benvenuto " . $_SESSION['user']['user_name'] . " in Moving in Turin!</h1>"; ?>

        <ul>
            <button class="btn-new" onclick="location='admin.php'">PAGINA AMMINISTRATORE</button><br>
            <?php foreach ($service_child_list as $service_child) : ?>
                <button class="btn-admin" onclick="location='services_detail.php?service_child_id=<?= $service_child['service_child_id'] ?>'"><?= $service_child['service_child_name'] ?></button>
            <?php endforeach; ?>

            <button class="btn-new" onclick="location='services_detail.php?action=new_service_child'">NUOVO SERVIZIO DETTAGLIO</button>

        </ul>

        <?php if (isset($service_child_selected)) : ?>
            <?php //var_dump($service_child_selected); 
            ?>

            <form action="services_detail.php" method="get">
                <h1 style="font-weight: 100;">SERVIZIO: <?= $service_selected['services_name'] ?></h1>
                <h1 style="font-weight: 100;">SERVIZIO DETTAGLIO: <?= $service_child_selected['service_child_name'] ?></h1>
                <input class="form-field" type="hidden" name="action" value="edit" required>
                <input class="form-field" type="hidden" name="service_child_id" value="<?= $service_child_selected['service_child_id'] ?>" required>
                <input class="form-field" type="text" name="name" value="<?= $service_child_selected['service_child_name'] ?>" required>
                <input class="form-field" type="text" name="description" value="<?= $service_child_selected['service_child_description'] ?>">
                <button class="btn-new" type="submit">Salva modifiche</button>
            </form>
            <button class="btn-delete" onclick="location.href='services_detail.php?action=delete&service_child_id=<?= $service_child_selected['service_child_id'] ?>'">ELIMINA</button>

        <?php endif; ?>

        <?php if (isset($_GET['action'])) : ?>
            <?php if ($_GET['action'] == 'new_service_child') : ?>
                <form action="services_detail.php" method="get">
                    <input class="form-field" type="hidden" name="action" value="new" required>
                    <input class="form-field" type="text" name="name" placeholder="NOME" value="" required>
                    <input class="form-field" type="text" name="description" placeholder="DESCRIZIONE" value="">
                    <button class="btn-new" type="submit">Salva modifiche</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($new)) {
            if (is_numeric($new)) {
                echo "NUOVO SERVIZIO DETTAGLIO CREATO CORRETTAMENTE CON ID " . $new;
            } else {
                echo "ERRORE CREAZIONE SERVIZIO DETTAGLIO " . $new;
            }
        }
        ?>

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