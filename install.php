<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">


    <title>INSTALLAZIONE DATABASE</title>
    <?php $paramConn = require "connection_param.php"; ?>
    <?php include_once "functions.php"; ?>
</head>

<body>
    <?php $conn = new mysqli($paramConn['mysql_host'], $paramConn['mysql_user'], $paramConn['mysql_password']); ?>
    <?php if ($conn->connect_error) : ?>
        <div style="margin:15px; border: 1px solid red; border-radius:8px; padding:5px">
            <h1>ERRORE DI CONNESSIONE AL SERVER:</h1>
            <p><?= $conn->connect_error; ?></p>
        </div>
        <?php exit; ?>
    <?php else : ?>
        <div style="margin:15px; border: 1px solid green; background-color:lightgreen; border-radius:8px; padding:5px">
            <h1>CONNESIONE RIUSCITA</h1>
        </div>
        <?php $databaseName = $paramConn['mysql_db']; ?>
        <?php $sql = "CREATE DATABASE IF NOT EXISTS `$databaseName`"; ?>
        <?php $res = $conn->query($sql); ?>

        <?php if ($res) : ?>
            <div style="margin:15px; border: 1px solid green; background-color:lightgreen; border-radius:8px; padding:5px">
                DATABASE CREATO CORRETTAMENTE
            </div>
        <?php else : ?>
            <div style="margin:15px; border: 1px solid red; border-radius:8px; padding:5px">
                ERRORE DI CREAZIONE DEL DATABASE
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <?php $conn = new mysqli($paramConn['mysql_host'], $paramConn['mysql_user'], $paramConn['mysql_password'], $paramConn['mysql_db']); ?>
    <?php if ($conn->connect_error) : ?>
        <div style="margin:15px; border: 1px solid red; border-radius:8px; padding:5px">
            <h1>ERRORE DI CONNESSIONE AL DATABASE:</h1>
            <p><?= $conn->connect_error; ?></p>
        </div>
        <?php exit; ?>
    <?php else : ?>
        <!--CREAZIONE TABELLA UTENZE-->
        <?php $sql = " CREATE TABLE IF NOT EXISTS users (
            user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            user_creationTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            user_modificationTimestamp TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL,
            user_username VARCHAR(256) NOT NULL UNIQUE,
            user_password VARCHAR(256) NOT NULL,
            user_surname VARCHAR(256),
            user_name VARCHAR(256),
            user_email VARCHAR(256),
            user_age INT(3),
            user_admin BOOLEAN NOT NULL DEFAULT 0
            )ENGINE=INNODB;";
        ?>

        <?php if ($conn->query($sql)) : ?>
            <div>TABELLA UTENZE CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE CREAZIONE TABELLA UTENZE <?= $conn->error; ?></div>
        <?php endif; ?>

        <?php $sql = " CREATE TABLE IF NOT EXISTS service_type (
            service_type_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            service_type_creationTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            service_type_modificationTimestamp TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL,
            service_type_name VARCHAR(256) NOT NULL,
            service_type_description TEXT NULL DEFAULT NULL
            )ENGINE=INNODB;";

        /*1=bus, 2=tram, 3=metro, 4=servizio ferroviario metropolitano*/
        ?>

        <?php if ($conn->query($sql)) : ?>
            <div>TABELLA TIPO SERVIZIO CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE TIPO CREAZIONE TABELLA SERVIZIO <?= $conn->error; ?></div>
        <?php endif; ?>



        <?php $sql = " CREATE TABLE IF NOT EXISTS services (
            services_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            services_creationTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            services_modificationTimestamp TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL,
            services_name VARCHAR(256) NOT NULL,
            services_type VARCHAR(256) DEFAULT '1',
            services_description TEXT NULL DEFAULT NULL
            )ENGINE=INNODB;";
        ?>

        <?php if ($conn->query($sql)) : ?>
            <div>TABELLA SERVIZIO CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE CREAZIONE TABELLA SERVIZIO <?= $conn->error; ?></div>
        <?php endif; ?>



        <?php $sql = " CREATE TABLE IF NOT EXISTS service_child (
            service_child_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            service_child_creationTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            service_child_modificationTimestamp TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL,
            service_child_parentId INT(11) NOT NULL,
            service_child_sort INT(3) NULL DEFAULT '100',
            service_child_name VARCHAR(256) NOT NULL,
            service_child_description TEXT NULL DEFAULT NULL
            )ENGINE=INNODB;";
        ?>


        <?php if ($conn->query($sql)) : ?>
            <div>TABELLA SERVIZIO CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE CREAZIONE TABELLA SERVIZIO <?= $conn->error; ?></div>
        <?php endif; ?>

    <?php endif; ?>

    <hr>

    INSERIMENTO VALORI DEFAULT:

    <h1>UTENZE</h1>

    <?php

    $user_default =
        [
            ['user_surname' => 'Disarò', 'user_name' => 'Lucio', 'email'=>'luciocell@gmail.com', 'age'=>'45', 'user_username'=>'lucio', 'user_password'=>'lucio', 'user_admin'=>1 ],
            ['user_surname' => 'Canova', 'user_name' => 'Giorgia', 'email'=>'giorgia@gmail.com', 'age'=>'20', 'user_username'=>'giorgia', 'user_password'=>'giorgia', 'user_admin'=>1 ],
        ];

        foreach ($user_default as $id => $detail) {
            $user_id = new_user($detail['user_surname'], $detail['user_name'], $detail['email'], $detail['age'], $detail['user_username'], $detail['user_password'], $detail['user_admin']);
            echo 'UTENZA CREATO CORRETAMENTE CON ID ' . $user_id. '</br>';
        }
    ?>

    <h1>TIPO LINEE</h1>

    <?php

    $services_type_default =
        [
            ['name' => 'BUS', 'description' => 'Sistema di automezzi alimentati a carbonfossile'],
            ['name' => 'TRAM', 'description' => 'Sistema di veicoli elettrici con rotaie'],
            ['name' => 'METRO', 'description' => 'Sistema di veicoli sotterranei elettrici con rotaie'],
            ['name' => 'SERVIZIO FERROVIARIO METROPOLITANO', 'description' => '']
        ];

    foreach ($services_type_default as $id => $detail) {
        $service_type_id = new_service_type($detail['name'], $detail['description']);
        echo 'TIPO SERVIZIO CREATO CORRETAMENTE CON ID ' . $service_type_id. '</br>';
    }
    ?>


</body>

</html>