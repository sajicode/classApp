<?php

    session_start();

    $page_title = "Edit Category";

    include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");

    $flag = ['Top-Selling', 'Trending', 'Recently-Viewed'];

    checkLogin();

    if($_GET['book_id']) {
        $book_id = $_GET['book_id'];
    }

    $item = getBookById($conn, $book_id);

    $errors = [];

    if(array_key_exists('edit', $_POST)) {

        if(empty($_POST['title'])) {

            $errors['title'] = "Enter the book title";

        }

        if(empty($_POST['author'])) {

            $errors['author'] = "Enter the book author";

        }

        if(empty($_POST['price'])) {

            $errors['price'] = "Enter the book price";

        }

        if(empty($_POST['year'])) {

            $errors['year'] = "Enter the publication year";

        }

        if(empty($_POST['flag'])) {

            $errors['flag'] = "Select the book flag";

        }

        if(empty($errors)) {

            $clean = array_map('trim', $_POST);
            $clean['id'] = $book_id;

            updateProduct($conn, $clean);

            redirect("view_products.php");

        }
    }

?>

<div class="wrapper">
    <div id="stream">
        <form id="register"  action ="" method ="POST">
			<div>
				<?php  
					$info = displayErrors($errors, 'title');
					echo $info;
				?>
				<label>Edit Title:</label>
				<input type="text" name="title" placeholder="title" value="<?php echo $item[1]; ?>">
            </div>

            <div>
				<?php  
					$info = displayErrors($errors, 'author');
					echo $info;
				?>
				<label>Edit Author:</label>
				<input type="text" name="author" placeholder="author" value="<?php echo $item[2]; ?>">
            </div>

            <div>
				<?php  
					$info = displayErrors($errors, 'price');
					echo $info;
				?>
				<label>Edit Price:</label>
				<input type="text" name="price" placeholder="price" value="<?php echo $item[3]; ?>">
            </div>

            <div>
				<?php  
					$info = displayErrors($errors, 'cat_name');
					echo $info;
				?>
				<label>Edit Publication Year:</label>
				<input type="text" name="year" placeholder="publication year" value="<?php echo $item[4]; ?>">
            </div>

            <div>
				<?php  
					$info = displayErrors($errors, 'flag');
					echo $info;
				?>
				<label>Edit flag:</label>
				<select name= "flag">
					<option name="">Select Flag</option>
					<?php foreach($flag as $fl) { ?>
						<option value="<?php echo $fl; ?>"><?php echo $fl; ?></option>
					<?php } ?>
				</select>
            </div>

            <input type="submit" name="edit" value="Edit"/>
        </form>
    </div>
</div>

<?php
    include("includes/footer.php");
?>