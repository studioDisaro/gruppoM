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

    <title>Gestione tipi servizio</title>

    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

    <?php

    require_once('functions.php');
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "edit") {
            $edit = edit_service_type($_GET['service_type_id'], $_GET['name'], $_GET['description']);
        }

        if ($_GET['action'] == "new") {
            $new = new_service_type($_GET['name'], $_GET['description']);
        }
        if ($_GET['action'] == "delete") {
            $delete = delete_service_type($_GET['service_type_id']);
        }
    }

    if (isset($_GET['service_type_id'])) {
        $service_type_selected = get_service_type($_GET['service_type_id']);
    }

    $types = get_service_type_list();
    ?>

</head>

<body>
    <?php include 'header.php'; ?>
    <article>
        <?php var_dump($_SESSION) ?>
        <?php echo "<h1>Benvenuto " . $_SESSION['user']['user_name'] . " in Moving in Turin!</h1>"; ?>

        <ul>
            <button class="btn-new" onclick="location='admin.php'">PAGINA AMMINISTRATORE</button><br>
            <?php foreach ($types as $type) : ?>
                <button class="btn-admin" onclick="location='service_types.php?service_type_id=<?= $type['service_type_id'] ?>'"><?= $type['service_type_name'] ?></button>
            <?php endforeach; ?>

            <button class="btn-new" onclick="location='service_types.php?action=new_service_type'">NUOVO TIPO SERVIZIO</button>

        </ul>

        <?php if (isset($service_type_selected)) : ?>
            <?php //var_dump($service_type_selected); 
            ?>

            <form action="service_types.php" method="get">
                <h1 style="font-weight: 100;">TIPO SERVIZIO: <?= $service_type_selected['service_type_name'] ?></h1>
                <input class="form-field" type="hidden" name="action" value="edit" required>
                <input class="form-field" type="hidden" name="service_type_id" value="<?= $service_type_selected['service_type_id'] ?>" required>
                <input class="form-field" type="text" name="name" value="<?= $service_type_selected['service_type_name'] ?>" required>
                <textarea class="form-field" style="height:100px" name="description"><?= $service_type_selected['service_type_description'] ?></textarea>
                <button class="btn-new" type="submit">Salva modifiche</button>
            </form>
            <button class="btn-delete" onclick="location.href='service_types.php?action=delete&service_type_id=<?= $service_type_selected['service_type_id'] ?>'">ELIMINA</button>

        <?php endif; ?>

        <?php if (isset($_GET['action'])) : ?>
            <?php if ($_GET['action'] == 'new_service_type') : ?>
                <form action="service_types.php" method="get">
                    <input class="form-field" type="hidden" name="action" value="new" required>
                    <input class="form-field" type="text" name="name" placeholder="NOME" value="" required>
                    <textarea class="form-field" style="height:100px" name="description"></textarea>

                    <button class="btn-new" type="submit">Salva modifiche</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($new)) {
            if (is_numeric($new)) {
                echo "NUOVO TIPO SERVIZIO CREATO CORRETTAMENTE CON ID " . $new;
            } else {
                echo "ERRORE CREAZIONE TIPO SERVIZIO " . $new;
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