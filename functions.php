<?php
    include 'connection.php';


    function get_users_list(){
        $conn = openConDB();
        $records = [];

        $sql = "SELECT * FROM `users`";
        $res = $conn->query($sql);
        if($res){
            while ($row = $res->fetch_assoc()) {
                $records[] = $row;
            }
        }else {
            return $conn->error;
        }

        return $records;
    }

    function new_user($user_surname, $user_name, $user_username, $user_password){
        $conn = openConDB();

        $user_surname = $conn->escape_string($user_surname);
        $user_name = $conn->escape_string($user_name);
        $user_username = $conn->escape_string($user_username);
        $user_password = $conn->escape_string(password_hash($user_password, PASSWORD_DEFAULT));

        $sql = "INSERT `users` (`user_surname`, `user_name`, `user_username`, `user_password`) VALUES ('$user_surname', '$user_name', '$user_username', '$user_password');";
        $res = $conn->query($sql);
        if($res){
            $user_id = $conn->insert_id;
            return $user_id;
        }else {
            return $conn->error;
        }
    }

    function get_user_byID($user_id){
        $conn = openConDB();
        $sql = "SELECT * FROM `users` WHERE `user_id`='$user_id';";
        $res = $conn->query($sql);
        if($res){
            $record = $res->fetch_assoc();
            return $record;
        }else {
            return $conn->error;
        }
    }

    function edit_user($user_id, $user_surname, $user_name){
        $conn = openConDB();

        $user_surname = $conn->escape_string($user_surname);
        $user_name = $conn->escape_string($user_name);

        $sql = "UPDATE `users` SET `user_surname` = '$user_surname', `user_name` = '$user_name' WHERE `user_id`='$user_id';";
        $res = $conn->query($sql);
        if($res){
            return 1;
        }else {
            return $conn->error;
        }
    }

?>