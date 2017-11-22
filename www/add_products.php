<?php

	$page_title = "Admin Dashboard";

	include("includes/db.php");
    include("includes/functions.php");
	include("includes/dashboard_header.php");

	$errors = [];

	$flag = ['Top-Selling', 'Trending', 'Recently-Viewed'];

?>

<div class="wrapper">
		<hr>
		<form id="register"  action ="add_products.php" method ="POST">
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
				<label>Category:</label>
				<input type="text" name="year" placeholder="publication date">
			</div>
 
			<div>
                <?php  
					$err = displayErrors($errors, 'cat');
					echo $err;
                ?>
				<label>:</label>	
				<select name= "cat">
					<?php

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
				<label>Book Image:</label>
				<p>Please upload a book image</p>	
				<input type ="file" name ="image"/>
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
    </div>