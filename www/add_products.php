<?php

    session_start();

    $page_title = "Admin || Add Product";

    include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");

    checkLogin();

	$errors = [];

	$stmt = $conn->prepare("SELECT * FROM category");

	$stmt->execute();
	
	if(array_key_exists('add_product', $_POST)) {

		if(empty($_POST['title'])) {
			$errors['title'] = "Enter the book title";
		}

		if(empty($_POST['author'])) {
			$errors['author'] = "Enter the book author";
		}

		$clean = array_map('trim', $_POST);

		if(empty($_POST['price'])) {
			$errors['price'] = "Enter the book price";
		} else {

			$price = numeric($clean['price']);

			if($price) {
				echo "Enter price in digits";
			}
		}

		if(empty($_POST['pub_date'])) {
			$errors['pub_date'] = "Select the date of publication";
		}

		if(empty($_POST['quantity'])) {
			$errors['quantity'] = "Enter the quantity available";
		} else {

			$quantity = numeric($clean['quantity']);
			if($quantity) {
				echo "Enter quantity in digits";
			}

		}

		if(empty($_POST['cat_name'])) {
			$errors['catname'] = "Select a category";
		}

		if(empty($errors)) {
			
			$row = $stmt->fetch(PDO::FETCH_BOTH);
			//$data = categoryId($conn, $clean['cat_name']);
			$cat_id = $row[0];

			addProduct($conn, $_POST, $cat_id);

			redirect("add_category.php");

		}


	}

?>

<div class="wrapper">
    <div id="stream">
        <form id="register"  action ="add_products.php" method ="POST">
			<div>
				<?php  
					$info = displayErrors($errors, 'title');
					echo $info;
				?>
				<label>Title:</label>
				<input type="text" name="title" placeholder="book title">
            </div>
            <div>
				<?php  
					$info = displayErrors($errors, 'author');
					echo $info;
				?>
				<label>Author:</label>
				<input type="text" name="author" placeholder="book author">
            </div>
            <div>
				<?php  
					$info = displayErrors($errors, 'price');
					echo $info;
				?>
				<label>Price:</label>
				<input type="text" name="price" placeholder="book price">
            </div>
            <div>
				<?php  
					$info = displayErrors($errors, 'pub_date');
					echo $info;
				?>
				<label>Publication Date:</label>
				<input type="date" name="pub_date" placeholder="date of publication">
            </div>
            <div>
				<?php  
					$info = displayErrors($errors, 'quantity');
					echo $info;

				?>
				<label>Quantity:</label>
				<input type="text" name="quantity" placeholder="quantity">
            </div>
			<div>
				<p>Category: <select name="cat_name">
								<option value="">Select Category</option>
								<?php while($row = $stmt->fetch(PDO::FETCH_BOTH)) { ?>
								<option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
								<?php } ?>
								</select></p>

            </div>
            <input type="submit" name="add_product" value="Add"/>
        </form>
    </div>
</div>

<?php

    include("includes/footer.php");

?>