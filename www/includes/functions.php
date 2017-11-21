<?php

    function uploadFile($files, $name, $loc) {
        $result = false;

        $rnd = rand(0000000000, 9999999999);
        $strip_name = str_replace(' ', '_', $files[$name]['name']);

        $fileName = $rnd.$strip_name;
        $destination = $loc.$fileName;

        if(move_uploaded_file($files[$name]['tmp_name'], $destination)) {
            $result[] = true;
        } else {
            $result[] = false;
        }

        return $result;
    }

    function doAdminRegister($dbconn, $input) {

        $hash = password_hash($input['password'], PASSWORD_BCRYPT);

        $stmt = $dbconn->prepare("INSERT INTO admin(firstName, lastName, email, hash) VALUES(:f, :l, :e, :h)");

        $data = [
            ":f" => $input['fname'],
            ":l" => $input['lname'],
            ":e" => $input['email'],
            ":h" => $hash
        ];

        $stmt->execute($data);
    }

    function doesEmailExist($dbconn, $email) {
        $result = false;

        $stmt = $dbconn->prepare("SELECT email FROM admin WHERE :e=email");

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

    function validateLogin($dbconn, $email, $password) {
        $result = "";

        $stmt = $dbconn->prepare("SELECT * FROM admin WHERE :e=email");

        $stmt->bindParam(":e", $email);
        $stmt->execute();

        while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
            //print_r($result);
            $hash = $result['hash'];
            if(password_verify($password, $hash)) {
                $result=true;
            } else {
                $result=false;
            }
            return $result;

            
            /* $hash = $result['hash'];
            
            $stmt2 = $dbconn->prepare("SELECT * FROM admin WHERE :p=$hash");
            $hashed = password_verify($password, $hash);
            $stmt2->bindParam(":p", $hashed);
            $stmt2->execute();
 */
        }

        //$stmt2 = $stmt->fetchAll();
        //print_r($stmt2['firstName']);

        /* $count = $stmt->rowCount();

        if($count == 1) {

            $result = true;
        } else{
            $result = false;
        }
        return $result;*/
    }

    function adminLogin($dbconn, $input) {

        $result = [];

        $stmt = $dbconn->prepare("SELECT * FROM admin WHERE email=:e");

        $stmt->bindParam(':e', $input['email']);
        $stmt->execute();

        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);

        if($count != 1 || !password_verify($input['password'], $row['hash'])) {
            $result[] = false;
        } else {
            $result[] = true;
            $result[] = $row;
        }
        return $result;
    }

    function addCategory($dbconn, $input) {

        $stmt = $dbconn->prepare("INSERT INTO category(category_name) VALUES(:catName)");

        $stmt->bindParam(':catName', $input['cat_name']);

        $stmt->execute();
    }
 

?>