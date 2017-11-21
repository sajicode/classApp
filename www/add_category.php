<?php

    $page_title = "Admin Dashboard";
    include("includes/dashboard_header.php");
    include("includes/footer.php");

?>



<div class="wrapper">
    <div id="stream">
        <form id="register"  action ="add_category.php" method ="POST">
			<div>
				<?php  
					$info = displayErrors($error, 'cat_name');
					echo $info;
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
            </div>
            <input type="submit" name="add" value="Add"/>
        </form>
    </div>
</div>