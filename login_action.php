<?php
    session_start();

    if (isset($_POST)) {
        require_once('functions.php');

        //var_dump($_POST);

        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $res = verifyLogin($username, $password);

        /*insert debug var_dump*/
        var_dump($res);
        //exit;

        if ($res['success']) {
            unset($res['user']['user_password']);
            unset($res['user']['user_creationTimestamp']);

            $_SESSION['auth_login']=true;
            $_SESSION['user']=$res['user'];

            //var_dump($_SESSION);
            Header('Location: home.php');
            exit;
        }else {
            Header('Location: reserved.php?error=loginError');
            exit;
        }
        
    } else {
        echo "Questa pagina è atta a recuperare i dati di login.";
    }
?>