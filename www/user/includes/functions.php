<?php

    function userRegister($dbconn, $input) {

        $hash = password_hash($input['password'], PASSWORD_BCRYPT);

        $stmt = $dbconn->prepare("INSERT INTO customers(firstName, lastName, email, username, hash)VALUES(:f, :l, :e, :u, :h)");

        $data = [

            ":f" => $input['fname'],
            ":l" => $input['lname'],
            ":e" => $input['email'],
            ":u" => $input['uname'],
            ":h" => $hash
        ];

        $stmt->execute($data);
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

    function displayErrors($err, $name) {

        $result = "";

        if(isset($err[$name])) {

            $result = '<span class=err>'.$err[$name].'</span>';

        }
        return $result;
    }

    function userLogin($dbconn, $input) {

        $result = [];

        $stmt = $dbconn->prepare("SELECT * FROM customers WHERE email=:e");

        $stmt->bindParam(':e', $input['email']);

        $stmt->execute();

        $count = $stmt->rowCount();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        echo $row['hash'];

        if(!password_verify($input['password'], $row['hash'])) {

            $result[]= false;
        } else {

            $result[] = true;
            $result[] = $row;
        }
        return $result;
    }

    function checkLogin() {

        if(!isset($_SESSION['aid'])) {

            header("location:login.php");
        }
    }

    function fetchBookByFlag ($dbconn, $dbflag) {

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE flag=:f");

        $stmt->bindParam(':f', $flag);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);

        return $row;

    }

    



?>