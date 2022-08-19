<?php
include 'connection.php';

function verifyLogin($username, $password){
    $result = [
        'message' => 'Accesso avvenuto correttamente.',
        'success' => true,
        'user' => ''
    ];

    $resUser = get_user_ByUsername($username);
    //return $resUser;

    if (!$resUser) {
        $result = [
            'message' => 'Utenza non esistente.',
            'success' => false
        ];
        return $result;
    }

    if (!password_verify($password, $resUser['user_password'])) {
        $result = [
            'message' => 'Password errata.',
            'success' => false
        ];
        return $result;
    }

    $result['user'] = $resUser;
    return $result;
}

function get_user_ByUsername($username)
{
    $result = [];
    $conn = openConDB();

    $username = $conn->escape_string($username);

    $sql = "SELECT * FROM `users` WHERE `user_username` = '$username';";

    //return $sql;
    $res = $conn->query($sql);
    $conn->close();
    if ($res && $res->num_rows) {
        $result = $res->fetch_assoc();
    } else {
        return false;
    }

    return $result;
}


function get_users_list()
{
    $conn = openConDB();
    $records = [];

    $sql = "SELECT * FROM `users`";
    $res = $conn->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $records[] = $row;
        }
    } else {
        return $conn->error;
    }

    return $records;
}

function new_user($user_surname, $user_name, $email, $age, $user_username, $user_password)
{
    $conn = openConDB();

    $user_surname = $conn->escape_string($user_surname);
    $user_name = $conn->escape_string($user_name);
    $email = $conn->escape_string($email);
    $user_username = $conn->escape_string($user_username);
    $user_password = $conn->escape_string(password_hash($user_password, PASSWORD_DEFAULT));

    $sql = "INSERT `users` (`user_surname`, `user_name`, `user_email`, `user_age`, `user_username`, `user_password`) VALUES ('$user_surname', '$user_name', '$email', '$age', '$user_username', '$user_password');";
    $res = $conn->query($sql);
    if ($res) {
        $user_id = $conn->insert_id;
        return $user_id;
    } else {
        return $conn->error;
    }
}

function check_username($user_username)
{
    $conn = openConDB();
    $user_username = $conn->escape_string($user_username);
    $sql = "SELECT COUNT(*) as 'count' FROM `users` WHERE `user_username` = '$user_username';";
    $res = $conn->query($sql);
    if ($res) {
        $result = $res->fetch_assoc();
        return $result['count'];
    } else {
        return $conn->error;
    }
}

function get_user_byID($user_id)
{
    $conn = openConDB();
    $sql = "SELECT * FROM `users` WHERE `user_id`='$user_id';";
    $res = $conn->query($sql);
    if ($res) {
        $record = $res->fetch_assoc();
        return $record;
    } else {
        return $conn->error;
    }
}

function edit_user($user_id, $user_surname, $email, $age)
{
    $conn = openConDB();

    $user_surname = $conn->escape_string($user_surname);
    $email = $conn->escape_string($email);

    $sql = "UPDATE `users` SET `user_surname` = '$user_surname', `user_email` = '$email', `user_age` = '$age' WHERE `user_id`='$user_id';";
    $res = $conn->query($sql);
    if ($res) {
        return 1;
    } else {
        return $conn->error;
    }
}

function get_service_list()
{
    $conn = openConDB();
    $records = [];

    $sql = "SELECT * FROM `service`";
    $res = $conn->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $records[] = $row;
        }
    } else {
        return $conn->error;
    }

    return $records;
}

function get_service_byID($service_id)
{
    $conn = openConDB();
    $sql = "SELECT * FROM `service` WHERE `service_id` = '$service_id';";
    $res = $conn->query($sql);
    if ($res) {
        $record = $res->fetch_assoc();
        return $record;
    } else {
        return $conn->error;
    }
}

function get_service_child_list($service_id)
{
    $conn = openConDB();
    $records = [];

    $sql = "SELECT * FROM `service_child` WHERE `service_child_parentId` = '$service_id'";
    $res = $conn->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $records[] = $row;
        }
    } else {
        return $conn->error;
    }

    return $records;
}

function get_service_child_byID($service_child_id)
{
    $conn = openConDB();
    $sql = "SELECT * FROM `service_child` WHERE `service_child_id` = '$service_child_id';";
    $res = $conn->query($sql);
    if ($res) {
        $record = $res->fetch_assoc();
        return $record;
    } else {
        return $conn->error;
    }
}
