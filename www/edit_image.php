<?php

    session_start();

    $page_title = "Edit Image";

    include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");

    checkLogin();

    if($_GET['img']) {

        $book_id = $_GET['img'];

    }

    $errors = [];

    define('MAX_FILE_SIZE', '2097152');
	
    $ext = ['image/jpg', 'image/jpeg', 'image/png'];
    
    if(array_key_exists('pic', $_POST)) {

        if(empty($_FILES['image']['name'])) {
			$errors['image'] = "Please select a book image";

		}

		if($_FILES['image']['size'] > MAX_FILE_SIZE) {
			$errors['image'] = "Image size too large";

		}

		if(!in_array($_FILES['image']['type'], $ext)) {
			$errors['image'] = "Image type not suported";

        }
        
        if(empty($errors)) {

            $img = uploadFile($_FILES, 'image', 'uploads/');

			if($img[0]) {

				$dest = $img[1];

            }
            
            updateImage($conn, $book_id, $dest);

            redirect("view_products.php");

        }
    }
    
?>

<div class="wrapper">
    <form id ="register" action="" method="POST" enctype="multipart/form-data">
        <div>
            <?php  
                $err = displayErrors($errors, 'image');
                echo $err;
            ?>
            <label>Image:</label>

            <input type ="file" name ="image"/>
        </div>

        <input type="submit" name="pic">

    </form>
</div>

<?php include("includes/footer.php"); ?>
