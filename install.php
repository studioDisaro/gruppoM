<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">

    
    <title>INSTALLAZIONE DATABASE</title>
    <?php $paramConn = require "connection_param.php"; ?>
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
        <?php $sql = " CREATE TABLE users (
            user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            user_creationTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            user_modificationTimestamp TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL,
            user_username VARCHAR(256) NOT NULL UNIQUE,
            user_password VARCHAR(256) NOT NULL,
            user_surname VARCHAR(256),
            user_name VARCHAR(256),
            user_email VARCHAR(256),
            user_age INT(3)
            )ENGINE=INNODB;";
        ?>

        <?php if($conn->query($sql)):?>
            <div>TABELLA UTENZE CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE CREAZIONE TABELLA UTENZE <?=$conn->error;?></div>
        <?php endif; ?>



        <?php $sql = " CREATE TABLE service (
            service_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            service__name VARCHAR(256) NOT NULL,
            service_type VARCHAR(256) DEFAULT 'BUS',/*1=bus, 2=tram, 3=metro, 4=servizio ferroviario metropolitano*/
            service_description TEXT NULL DEFAULT NULL
            )ENGINE=INNODB;";
        ?>

        <?php if($conn->query($sql)):?>
            <div>TABELLA SERVIZIO CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE CREAZIONE TABELLA SERVIZIO <?=$conn->error;?></div>
        <?php endif; ?>



        <?php $sql = " CREATE TABLE service_child (
            service_child_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
            service_child_parentId INT(11) NOT NULL,
            service_child_name VARCHAR(256) NOT NULL,
            service_child_description TEXT NULL DEFAULT NULL
            )ENGINE=INNODB;";
        ?>

        <?php if($conn->query($sql)):?>
            <div>TABELLA SERVIZIO CREATA CORRETTAMENTE</div>
        <?php else : ?>
            <div>ERRORE CREAZIONE TABELLA SERVIZIO <?=$conn->error;?></div>
        <?php endif; ?>
            
    <?php endif; ?>
</body>

</html>