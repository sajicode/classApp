<?php

    session_start();

    $page_title = "Delete Category";

    include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");


    checkLogin();

    if($_GET['cat_id']) {
        $cat_id = $_GET['cat_id'];
    }

    //$item = getCategoryById($conn, $cat_id);

    //$errors = [];

    /* if(array_key_exists('delete', $_POST)) {

        if(empty($_POST['cat_name'])) {
            $errors['cat_name'] = "Please enter a category name"; 
        }

        if(empty($errors)) {
            $clean = array_map('trim', $_POST);*/
            //$clean['id'] = $cat_id;

            deleteCategory($conn, $cat_id);

            redirect("view_category.php");
    //     }
    // }

?>



<!-- <div class="wrapper">
    <div id="stream">
        <form id="register"  action ="" method ="POST">
			<div>
				
				<label>Delete category:</label>
				<input type="text" name="cat_name" placeholder="category name" value="<?php echo $item[1]; ?>">
            </div>
            <input type="submit" name="delete" value="Delete"/>
        </form>
    </div>
</div> -->