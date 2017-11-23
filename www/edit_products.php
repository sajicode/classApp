<?php

	$page_title = "Admin Dashboard";

	include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");
    
    //checkLogin();
    
    if($_GET['book_id']) {
        $book_id = $_GET['book_id']; 
    }

    $item = getProductbyId($conn, $book_id);

    $category = getCategoryById($conn, $item[5]);

    //print_r($item); exit();

    $errors = [];

	if(array_key_exists('edit', $_POST)) {

		if(empty($_POST['title'])) {
			$errors['title'] = "Please enter book title";

		}

		if(empty($_POST['author'])) {
			$errors['author'] = "Please enter book author";
		}

		if(empty($_POST['price'])) {
			$errors['price'] = "Please enter book price";

		}

		if(empty($_POST['cat'])) {
			$errors['cat'] = "Please select book category";

		}

		if(empty($_POST['year'])) {
			$errors['year'] = "Please select date of publication";

		}

		if(empty($errors)) {

			$clean = array_map('trim', $_POST);
			$clean['id'] = $book_id;

			editProduct($conn, $clean);

			redirect("view_products.php");

		}
	}

?>

<div class="wrapper">
		<hr>
		<form id="register" action ="" method ="POST">
			<div>
                <?php 
                    $title = displayErrors($errors, 'title');
                    echo $title;
                ?>
				<label>Title:</label>
				<input type="text" name="title" placeholder="title" value="<?php echo $item[1]; ?>">
			</div>
			<div>
                <?php 
                    $author = displayErrors($errors, 'author');
                    echo $author;
                ?>
				<label>Author:</label>	
				<input type="text" name="author" placeholder="author" value="<?php echo $item[2]; ?>">
			</div>

			<div>
                <?php  
                    $price= displayErrors($errors, 'price');
                    echo $price;
                ?>
				<label>Price:</label>
				<input type="text" name="price" placeholder="price" value="<?php echo $item[3]; ?>">
			</div>
			<div>
                <?php  
                    $year = displayErrors($errors, 'year');
                    echo $year;
                ?>
				<label>Year:</label>
				<input type="text" name="year" placeholder="publication date" value="<?php echo $item[4]; ?>">
			</div>
 
			<div>
                <?php  
					$err = displayErrors($errors, 'cat');
					echo $err;
                ?>
				<label>Category:</label>	
				<select name= "cat">
					<!--<option value ="">Select Category</option>-->
                    <option value="<?php echo $category[0]; ?>"><?php echo $category[1]; ?></option>
					<?php
						$data = fetchCategory($conn, $category[1]);
						echo $data;
					?>
				</select>
			</div>

			<input type="submit" name="edit" value="Edit Products">

		</form>
        <h4 class="jumpto">To edit product image, <a href="edit_image.php">click here</a></h4>

    </div>

    <?php 

        include("includes/footer.php");

    ?>