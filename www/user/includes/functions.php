<?php

    function displayErrors($err, $name) {

        $result = "";

        if(isset($err[$name])) {
            $result = '<span class=err>'.$err[$name].'</span>';
        }

        return $result;
    }

    function doesEmailExist($dbconn, $email) {
        $result = false;

        $stmt = $dbconn->prepare("SELECT email FROM customers WHERE :e=email");

        $stmt->bindParam(":e", $email);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0) {
            $result = true;
        }

        return $result;
    }

    function userRegister($dbconn, $input) {

        $hash = password_hash($input['password'], PASSWORD_BCRYPT);

        $stmt = $dbconn->prepare("INSERT INTO customers(firstName, lastName, email, username, hash) VALUES(:f, :l, :e, :u, :h)");

        $data = [
            ":f" => $input['fname'],
            ":l" => $input['lname'],
            ":e" => $input['email'],
            ":u"=>$input['uname'],
            ":h" => $hash
        ];

        $stmt->execute($data);
    }

    function redirect($location, $msg) {
        header("location: ".$location.$msg);
    }

?>