<?php
include 'connection.php';

// function execQUERY_first($sql, $json=false){
//     $conn = openConDB();
//     $res = $conn->query($sql);
//     if ($res) {
//         $record = $res->fetch_assoc();
//     } else {
//         // return false;
//         return $conn->error;
//     }

//     if ($json) {
//         $record = json_encode($record, true);
//     }
//     return $record;
// }

// function execQUERY_all($sql, $json=false){
//     $records = [];
//     $conn = openConDB();
//     $res = $conn->query($sql);
//     if ($res) {
//         while ($row = $res->fetch_assoc()) {
//             $records[] = $row;
//         }
//     } else {
//         // return false;
//         return $conn->error;
//     }

//     if ($json) {
//         $records = json_encode($records, true);
//     }

//     return $records;
// }

function delete_record($sql)
{
    $conn = openConDB();
    $res = $conn->query($sql);
    if ($res) {
        return 1;
    } else {
        return $conn->error;
    }
}

// USER

function verifyLogin($username, $password)
{
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

    $sql = "SELECT `user_id`, `user_username`, `user_surname`, `user_name`, `user_email`, `user_age`, `user_admin` FROM `users`";
    $res = $conn->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $records[] = $row;
        }
    } else {
        // return false;
        return $conn->error;
    }

    return $records;
}


function new_user($user_surname, $user_name, $email, $age, $user_username, $user_password, $user_admin=0)
{
    $conn = openConDB();

    $user_surname = $conn->escape_string($user_surname);
    $user_name = $conn->escape_string($user_name);
    $email = $conn->escape_string($email);
    $user_username = $conn->escape_string($user_username);
    $user_password = $conn->escape_string(password_hash($user_password, PASSWORD_DEFAULT));

    $sql = "INSERT `users` (`user_surname`, `user_name`, `user_email`, `user_age`, `user_username`, `user_password`, `user_admin`) VALUES ('$user_surname', '$user_name', '$email', '$age', '$user_username', '$user_password', '$user_admin');";
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
    $sql = "SELECT `user_id`, `user_username`, `user_surname`, `user_name`, `user_email`, `user_age` FROM `users` WHERE `user_id`='$user_id';";
    $res = $conn->query($sql);
    if ($res) {
        $record = $res->fetch_assoc();
        return $record;
    } else {
        return $conn->error;
    }
}

function edit_user($user_id, $user_surname, $user_name, $email, $age)
{
    $conn = openConDB();

    $user_surname = $conn->escape_string($user_surname);
    $user_name = $conn->escape_string($user_name);
    $email = $conn->escape_string($email);

    $sql = "UPDATE `users` SET `user_surname` = '$user_surname', `user_name` = '$user_name', `user_email` = '$email', `user_age` = '$age' WHERE `user_id`='$user_id';";
    $res = $conn->query($sql);
    if ($res) {
        return true;
    } else {
        return $conn->error;
    }
}


function delete_user($user_id)
{
    $sql = "DELETE FROM `users` WHERE `user_id`='$user_id';";
    return delete_record($sql);
}

//END USER

//SERVICE TYPE

function get_service_type_list()
{
    $conn = openConDB();
    $records = [];

    $sql = "SELECT * FROM `service_type`";
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

function get_service_type($service_type_id)
{
    $conn = openConDB();

    $sql = "SELECT * FROM `service_type` WHERE `service_type_id`='$service_type_id'";
    $res = $conn->query($sql);
    if ($res) {
        $record = $res->fetch_assoc();
    } else {
        return $conn->error;
    }

    return $record;
}


function new_service_type($name, $description = "")
{
    $conn = openConDB();

    $name = $conn->escape_string($name);
    $description = $conn->escape_string($description);

    $sql = "INSERT `service_type` (`service_type_name`, `service_type_description`) VALUES ('$name', '$description');";
    $res = $conn->query($sql);
    if ($res) {
        $service_type_id = $conn->insert_id;
        return $service_type_id;
    } else {
        return $conn->error;
    }
}

function edit_service_type($service_type_id, $name, $description="")
{
    $conn = openConDB();
    $name = $conn->escape_string($name);
    $description = $conn->escape_string($description);

    $sql = "UPDATE `service_type` SET `service_type_name`='$name', `service_type_description`='$description' WHERE `service_type_id` = '$service_type_id';;";
    $res = $conn->query($sql);
    if ($res) {
        return true;
    } else {
        return $conn->error;
    }
}

function delete_service_type($service_type_id)
{
    $sql = "DELETE FROM `service_type` WHERE `service_type_id`='$service_type_id'";
    return delete_record($sql);
}


//END SERVICE TYPE


//SERVICE

function get_service_list()
{
    $conn = openConDB();
    $records = [];

    $sql = "SELECT * FROM `services`";
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

function get_service($service_id)
{
    $conn = openConDB();
    $sql = "SELECT * FROM `services` WHERE `service_id` = '$service_id';";
    $res = $conn->query($sql);
    if ($res) {
        $record = $res->fetch_assoc();
        return $record;
    } else {
        return $conn->error;
    }
}

function new_service($name, $type, $description="")
{
    $conn = openConDB();
    $name = $conn->escape_string($name);
    $description = $conn->escape_string($description);

    $sql = "INSERT `services` (`service_name`, `services_type`, `service_description`) VALUES ('$name', '$type', '$description');";
    $res = $conn->query($sql);
    if ($res) {
        $services_id = $conn->insert_id;
        return $services_id;
    } else {
        return $conn->error;
    }
}

function edit_service($service_id, $name, $type, $description="")
{
    $conn = openConDB();
    $name = $conn->escape_string($name);
    $description = $conn->escape_string($description);

    $sql = "UPDATE `services` SET `service_name`='$name', `services_type`='$type', `service_description`='$description' WHERE `service_id` = '$service_id';;";
    $res = $conn->query($sql);
    if ($res) {
        return true;
    } else {
        return $conn->error;
    }
}

function delete_service($service_id)
{
    $sql = "DELETE FROM `services` WHERE `service_id` = '$service_id';";
    return delete_record($sql);
}


//END SERVICE



//SERVICE CHILD

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

function get_service_child($service_child_id)
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


function new_service_child($service_child_parentId, $name, $description="")
{
    $conn = openConDB();
    $conn = openConDB();
    $name = $conn->escape_string($name);
    $description = $conn->escape_string($description);

    $sql = "INSERT `service_child` (`service_child_parentId`, `service_child_name`, `service_child_description`) VALUES ('$service_child_parentId', '$name', '$description');";
    $res = $conn->query($sql);
    if ($res) {
        $services_id = $conn->insert_id;
        return $services_id;
    } else {
        return $conn->error;
    }
}

function update_service_child($service_child_id, $service_child_parentId, $name, $description="")
{
    $conn = openConDB();
    $conn = openConDB();
    $name = $conn->escape_string($name);
    $description = $conn->escape_string($description);

    $sql = "UPDATE `service_child` SET `service_child_parentId`='$service_child_parentId', `service_child_name`='$name', `service_child_description`='$description' WHERE `service_child_id`='$service_child_id';";
    $res = $conn->query($sql);
    if ($res) {
        $services_id = $conn->insert_id;
        return $services_id;
    } else {
        return $conn->error;
    }
}


function delete_service_child($service_child_id){
    $sql = "DELETE FROM `service_child` WHERE `service_child_id`='$service_child_id'";
    return delete_record($sql);
}
