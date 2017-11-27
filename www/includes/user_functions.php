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

    function doesUnameExist($dbconn, $uname) {

        $result = false;

        $stmt = $dbconn->prepare("SELECT username FROM customers WHERE :u=username");

        $stmt->bindParam(":u", $uname);

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

        if($count != 1 || !password_verify($input['password'], $row['hash'])) {

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
/* 
    function fetchBookByFlag ($dbconn, $dbflag) {

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE flag=:f");

        $stmt->bindParam(':f', $flag);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);

        return $row;

    } */

    function redirect($location, $msg) {

        header("location: ".$location.$msg);

    }

    function bookInfo($dbconn, $top) {

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE flag=:f");

        $stmt->bindParam(":f", $top);

        $stmt->execute();

        $count = $stmt->rowCount();

        if($count == 1) {

            $row = $stmt->fetch(PDO::FETCH_BOTH);

        }
        return $row;

    }

    function displayImageByCat($dbconn, $input) {

        $cover = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE flag=:f");

        $stmt->bindParam(":f", $input);

        $stmt->execute();

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cover[] = $select[7];
        }

        return $cover;
    }

    function displayPriceByCat($dbconn, $input) {

        $price = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE flag=:f");

        $stmt->bindParam(":f", $input);

        $stmt->execute();

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $price[] = $select[3];
        }

        return $price;
    }

    function displayIdByCat($dbconn, $input) {

        $id = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE flag=:f");

        $stmt->bindParam(":f", $input);

        $stmt->execute();

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $id[] = $select[0];
        }

        return $id;
    }

    function fetchBookById($dbconn, $id) {

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE book_id=:bid");

        $stmt->bindParam(":bid", $id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);

        return $row;
    }

    function insertIntoReview($dbconn, $input) {

    $stmt = $dbconn->prepare("INSERT INTO reviews(book_id, customer_id, review)VALUES(:bid, :cid, :r)");

    $data =[
        ":bid"=>$input['bookId'],
        ":cid"=>$input['userId'],
        ":r"=> $input['review'],
    ];

    $stmt->execute($data);

    }

    function selectPriceByCat($dbconn, $input) {

        $cat = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE category_id = :cid");

        $stmt->bindParam(":cid", $input);

        $stmt->execute();

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cat[] = $select[3];

        }
        return $cat;
    }

    function selectImageByCat($dbconn, $input) {

        $cat = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE category_id = :cid");

        $stmt->bindParam(":cid", $input);

        $stmt->execute();

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cat[] = $select[7];

        }
        return $cat;
    }
    
    function selectIdByCat($dbconn, $input) {

        $cat = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE category_id = :cid");

        $stmt->bindParam(":cid", $input);

        $stmt->execute();

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cat[] = $select[0];

        }
        return $cat;
    }

    function selectImageByFlagAndCat($dbconn, $input) {

        $cat = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE category_id = :cid AND flag=:f");

        $data = [
            ":cid"=>$input['catId'],
            ":f" =>$input['flg']
        ];

        $stmt->execute($data);

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cat[] = $select[7];

        }
        return $cat;
    }

    function selectPriceByFlagAndCat($dbconn, $input) {

        $cat = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE category_id = :cid AND flag=:f");

        $data = [
            ":cid"=>$input['catId'],
            ":f" =>$input['flg']
        ];

        $stmt->execute($data);

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cat[] = $select[3];

        }
        return $cat;
    }

    function selectIdByFlagAndCat($dbconn, $input) {

        $cat = [];

        $stmt = $dbconn->prepare("SELECT * FROM books WHERE category_id = :cid AND flag=:f");

        $data = [
            ":cid"=>$input['catId'],
            ":f" =>$input['flg']
        ];

        $stmt->execute($data);

        while($select = $stmt->fetch(PDO::FETCH_BOTH)) {

            $cat[] = $select[0];

        }
        return $cat;
    }

    function insertIntoCart($dbconn, $input) {

        $stmt = $dbconn->prepare("INSERT INTO cart(item, price, quantity, total, item_id)VALUES(:i, :p, :q, :t, :iId)");

        $data = [
            ":i"=>$input['image'],
            ":p"=>$input['prices'],
            ":q"=>$input['qty'],
            ":t"=>$input['total'],
            ":iId"=>$input['item_id']
        ];

        $stmt->execute($data);
    }

    function viewCart($dbconn) {

        $result = "";

        $stmt = $dbconn->prepare("SELECT * FROM cart");

        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            $result .= '<tr><td><div class="book-cover b1" style="background: url('.$row[1].'); background-size: cover; 
                      background-position: center; background-repeat: no-repeat;"</td>';

            $result .= '<td><p class="book-price">'.$row[2].'</p></td>';

            $result .= '<td><p class="quantity">'.$row[3].'</p></td>';

            $result .= '<td><p class="total">'.$row[4].'</p></td>';

            $result .= '<td>
                            <form class="update" name="quant">
                                <input type="number" class="text-field qty">
                                <input type="submit" class="def-button change-qty" value="Change Qty" name="update">
                            </form>
                        </td>';

            $result .= '<td><a href class="def-button remove-item">Remove Item</a></td></tr>';
        }
        return $result;
    }

    function displaySidebar($dbconn) {

        $result = "";

        $stmt = $dbconn->prepare("SELECT * FROM category");

        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            $result .= '<a href="catalogue.php?cat_id='.$row[0].'"><li class="category">'.$row[1].'</li></a>';

        }
        return $result;
    }

    function fetchCategory($dbconn) {

        $stmt=$dbconn->prepare("SELECT * FROM category");

        $stmt->execute();

        while($row=$stmt->fetch(PDO::FETCH_BOTH)) {

            $cat = $row[0];

        }
        return $cat;
    }
    
    function fetchBook($dbconn) {

        $stmt = $dbconn->prepare("SELECT * FROM books");

        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)); {

            $bookId = $row[0];

        }
        return $bookId;
    }

    function updateQty($dbconn, $input) {

        $stmt = $dbconn("UPDATE ")
    }


?>