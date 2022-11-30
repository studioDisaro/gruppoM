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

    <?php

    require_once('functions.php');
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "edit") {
            $edit = edit_user($_GET['user_id'], $_GET['surname'], $_GET['name'], $_GET['email'], $_GET['age']);
        }

        if ($_GET['action'] == "new") {
            $new = new_user($_GET['surname'], $_GET['name'], $_GET['email'], $_GET['age'], $_GET['username'], $_GET['password']);
        }
        if ($_GET['action'] == "delete") {
            $delete = delete_user($_GET['user_id']);
        }
    }

    if (isset($_GET['user_id'])) {
        $user_selected = get_user_byID($_GET['user_id']);
    }

    $users = get_users_list();
    ?>

</head>

<body>
    <?php include 'header.php'; ?>
    <article>
        <?php var_dump($_SESSION) ?>
        <?php echo "<h1>Benvenuto " . $_SESSION['user']['user_name'] . " in Moving in Turin!</h1>"; ?>

        <ul>
            <button class="btn-new" onclick="location='admin.php'">PAGINA AMMINISTRATORE</button><br>
            <?php foreach ($users as $user) : ?>
                <button class="btn-admin" onclick="location='users.php?user_id=<?= $user['user_id'] ?>'"><?= $user['user_surname'] ?></button>
            <?php endforeach; ?>

            <button class="btn-new" onclick="location='users.php?action=new_user'">NUOVO UTENTE</button>

        </ul>

        <?php if (isset($user_selected)) : ?>
            <?php //var_dump($user_selected); 
            ?>

            <form action="users.php" method="get">
                <h1 style="font-weight: 100;">UTENZA: <?= $user_selected['user_username'] ?></h1>
                <input class="form-field" type="hidden" name="action" value="edit" required>
                <input class="form-field" type="hidden" name="user_id" value="<?= $user_selected['user_id'] ?>" required>
                <input class="form-field" type="text" name="surname" value="<?= $user_selected['user_surname'] ?>" required>
                <input class="form-field" type="text" name="name" value="<?= $user_selected['user_name'] ?>" required>
                <input class="form-field" type="email" name="email" value="<?= $user_selected['user_email'] ?>" required>
                <input class="form-field" type="number" name="age" value="<?= $user_selected['user_age'] ?>" required>
                <button class="btn-new" type="submit">Salva modifiche</button>
            </form>
            <button class="btn-delete" onclick="location.href='users.php?action=delete&user_id=<?= $user_selected['user_id'] ?>'">ELIMINA</button>

        <?php endif; ?>

        <?php if (isset($_GET['action'])) : ?>
            <?php if ($_GET['action'] == 'new_user') : ?>
                <form action="users.php" method="get">
                    <input class="form-field" type="hidden" name="action" value="new" required>
                    <input class="form-field" type="text" name="surname" placeholder="COGNOME" value="" required>
                    <input class="form-field" type="text" name="name" placeholder="NOME" value="" required>
                    <input class="form-field" type="email" name="email" placeholder="EMAIL" value="" required>
                    <input class="form-field" type="number" name="age" placeholder="ETA'" value="" required>
                    <input class="form-field" type="text" name="username" placeholder="USERNAME" value="" required>
                    <input class="form-field" type="password" name="password" placeholder="PASSWORD" value="" required>
                    <button class="btn-new" type="submit">Salva modifiche</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($new)) {
            if (is_numeric($new)) {
                echo "NUOVA UTENZA CREATA CORRETTAMENTE CON ID " . $new;
            } else {
                echo "ERRORE CREAZIONE UTENZA " . $new;
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