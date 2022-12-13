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

    <title>Gestisci servizi</title>

    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

    <?php

    require_once('functions.php');
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "edit") {
            $edit = edit_service($_GET['service_id'], $_GET['name'], $_GET['type'], $_GET['description']);
        }

        if ($_GET['action'] == "new") {
            $new = new_linea($_GET['name'], $_GET['type'], $_GET['description']);
        }
        if ($_GET['action'] == "delete") {
            $delete = delete_service($_GET['service_id']);
        }
    }

    if (isset($_GET['service_id'])) {
        $service_selected = get_linee($_GET['service_id']);
    }

    $services = get_service_list();
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
            <?php foreach ($services as $service) : ?>
                <button class="btn-admin" onclick="location='services.php?service_id=<?= $service['services_id'] ?>'"><?= $service['services_name'] ?></button>
            <?php endforeach; ?>

            <button class="btn-new" onclick="location='services.php?action=new_service'">NUOVO SERVIZIO</button>

        </ul>

        <?php if (isset($service_selected)) : ?>
            <?php //var_dump($service_selected); 
            ?>

            <form action="services.php" method="get">
                <h1 style="font-weight: 100;">SERVIZIO: <?= $service_selected['services_name'] ?></h1>
                <input class="form-field" type="hidden" name="action" value="edit" required>
                <input class="form-field" type="hidden" name="service_id" value="<?= $service_selected['services_id'] ?>" required>
                <input class="form-field" type="text" name="name" value="<?= $service_selected['services_name'] ?>" required>
                <select class="form-field" name="type" required>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?= $type['service_type_id'] ?>"
                        <?=$type['service_type_id']==$service_selected['services_type']? 'selected': ''?>><?= $type['service_type_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input class="form-field" type="text" name="description" value="<?= $service_selected['services_description'] ?>">
                <button class="btn-new" type="submit">Salva modifiche</button>
            </form>
            <button class="btn-delete" onclick="location.href='services.php?action=delete&service_id=<?= $service_selected['services_id'] ?>'">ELIMINA</button>
            <button class="btn-new" onclick="location.href='services_detail.php?service_id=<?= $service_selected['services_id'] ?>'">GESTISCI DETTAGLIO CORRELATO</button>

        <?php endif; ?>

        <?php if (isset($_GET['action'])) : ?>
            <?php if ($_GET['action'] == 'new_service') : ?>
                <form action="services.php" method="get">
                    <input class="form-field" type="hidden" name="action" value="new" required>
                    <input class="form-field" type="text" name="name" placeholder="NOME" value="" required>
                    <select class="form-field" name="type" placeholder="TIPO" required>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= $type['service_type_id'] ?>"><?= $type['service_type_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input class="form-field" type="text" name="description" placeholder="DESCRIZIONE" value="">
                    <button class="btn-new" type="submit">Salva modifiche</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($new)) {
            if (is_numeric($new)) {
                echo "NUOVO SERVIZIO CREATO CORRETTAMENTE CON ID " . $new;
            } else {
                echo "ERRORE CREAZIONE SERVIZIO " . $new;
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