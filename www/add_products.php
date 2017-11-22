<?php

	$page_title = "Admin Dashboard";

	include("includes/db.php");
    include("includes/functions.php");
	include("includes/dashboard_header.php");

	$errors = [];

	$flag = ['Top-Selling', 'Trending', 'Recently-Viewed'];

	define('MAX_FILE_SIZE', '2097152');
	
	$ext = ['image/jpg', 'image/jpeg', 'image/png'];

	if(array_key_exists('add', $_POST)) {

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

		if(empty($_POST['flag'])) {
			$errors['flag'] = "Please select a flag";

		}

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

				$location = $img[1];

			}

			$clean = array_map('trim', $_POST);
			$clean['dest'] = $location;

			addProducts($conn, $clean);
			
			redirect("view_products.php");
		}
	}

?>

<div class="wrapper">
		<hr>
		<form id="register"  action ="add_products.php" method ="POST" enctype="multipart/form-data">
			<div>
                <?php 
                    $title = displayErrors($errors, 'title');
                    echo $title;
                ?>
				<label>Title:</label>
				<input type="text" name="title" placeholder="title">
			</div>
			<div>
                <?php 
                    $author = displayErrors($errors, 'author');
                    echo $author;
                ?>
				<label>Author:</label>	
				<input type="text" name="author" placeholder="author">
			</div>

			<div>
                <?php  
                    $price= displayErrors($errors, 'price');
                    echo $price;
                ?>
				<label>Price:</label>
				<input type="text" name="price" placeholder="price">
			</div>
			<div>
                <?php  
                    $year = displayErrors($errors, 'year');
                    echo $year;
                ?>
				<label>Publication Date:</label>
				<input type="text" name="year" placeholder="publication date">
			</div>
 
			<div>
                <?php  
					$err = displayErrors($errors, 'cat');
					echo $err;
                ?>
				<label>Category:</label>	
				<select name= "cat">
					<option value ="">Select Category</option>
					<?php
						$data = fetchCategory($conn);
						echo $data;
					?>
				</select>
			</div>

			<div>
                <?php  
					$err = displayErrors($errors, 'flag');
					echo $err;
                ?>
				<label>Flag:</label>	
				<select name= "flag">
					<option name="">Select Flag</option>
					<?php foreach($flag as $fl) { ?>
						<option value="<?php echo $fl; ?>"><?php echo $fl; ?></option>
					<?php } ?>
				</select>
			</div>

			<div>
                <?php  
					$err = displayErrors($errors, 'image');
					echo $err;
                ?>
				<label>Image:</label>

				<input type ="file" name ="image"/>
			</div>

			<input type="submit" name="add" value="Add Products">
		</form>
    </div>