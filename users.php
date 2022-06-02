<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once('functions.php'); ?>
    <?php $users = get_users_list(); ?>

    <?php
    if (isset($_GET['user_id'])) {
        $user = get_user_byID($_GET['user_id']);
    }
    ?>
</head>

<body>
    <ul>
        <?php foreach ($users as $user) : ?>
            <button onclick="location='users.php?user_id=<?= $user['user_id'] ?>'"><?= $user['user_name'] ?></button>
        <?php endforeach; ?>
    </ul>

    <?php if (isset($user)) : ?>
        <?php var_dump($user); ?>
    <?php endif; ?>
</body>

</html>