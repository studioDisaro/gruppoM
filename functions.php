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

?>