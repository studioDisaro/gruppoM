<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione delle utenze</title>
    <?php include_once('functions.php'); ?>


    <?php
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "edit") {
                $edit = edit_user($_GET['user_id'], $_GET['surname'], $_GET['name']);
            }

            if ($_GET['action'] == "new") {
                $new = new_user($_GET['surname'], $_GET['name'], $_GET['username'], $_GET['password']);
            }
        }

        if (isset($_GET['user_id'])) {
        $user_selected = get_user_byID($_GET['user_id']);
        }

        $users = get_users_list(); 
    ?>
</head>

<body id="body">
    <ul>
        <?php foreach ($users as $user) : ?>
            <button onclick="location='users.php?user_id=<?= $user['user_id'] ?>'"><?= $user['user_surname'] ?></button>
        <?php endforeach; ?>

        <button onclick="location='users.php?action=new_user'">NUOVO UTENTE</button>

    </ul>

    <?php if (isset($user_selected)) : ?>
        <?php //var_dump($user_selected); 
        ?>

        <form action="users.php" method="get">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="user_id" value="<?= $user_selected['user_id'] ?>">
            <input type="text" name="surname" value="<?= $user_selected['user_surname'] ?>">
            <input type="text" name="name" value="<?= $user_selected['user_name'] ?>">
            <p>UTENZA: <?= $user_selected['user_username'] ?></p>
            <button type="submit">Salva modifiche</button>
        </form>
    <?php endif; ?>

    <?php if (isset($_GET['action'])) : ?>
        <?php if ($_GET['action']=='new_user') : ?>
            <form action="users.php" method="get">
                <input type="hidden" name="action" value="new">
                <input type="text" name="surname" placeholder="NOME" value="">
                <input type="text" name="name" placeholder="COGNOME" value="">
                <input type="text" name="username" placeholder="USERNAME" value="">
                <input type="password" name="password" placeholder="PASSWORD" value="">
                <button onclick="check_exist_User()">EILA</button>
                <button type="submit">Salva modifiche</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(isset($new)){
        if (is_numeric($new)) {
            echo "NUOVA UTENZA CREATA CORRETTAMENTE CON ID ".$new;
        }else {
            echo "ERRORE CREAZIONE UTENZA ".$new;
        }
    }
    ?>
</body>

</html>