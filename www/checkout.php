<?php

	session_start();

	$page_title = "Checkout";

	$id = "checkout";

	include 'includes/db.php';

	include 'includes/user_functions.php';

	include 'includes/user_header.php';

	$user_id = $_SESSION['userid'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	 
	checkLogin();
  
  	if($_GET['tot']) {
    $total = $_GET['tot'];
  	}

  	$errors = [];

  	if(array_key_exists('chkt', $_POST)) {

		if(empty($_POST['phone'])) {

		$errors['phone'] = "Please enter recipient phone number";

		}

		if(empty($_POST['addy'])) {

		$errors['addy'] = "Please enter a delivery address";

		}

		if(empty($_POST['code'])) {

		$errors['code'] = "Please enter recipient post code";

		}

		if(empty($errors)) {

			$clean = array_map('trim', $_POST);

			insertIntoSales($conn, $clean);

			deleteCartItems($conn);
		}
  	} 

?>

<div class="main">
    <div class="checkout-form">
      <form class="def-modal-form" action="" method ="POST">
        <div class="total-cost">
          <h3><?php echo "$".$total." Total Purchase"; ?></h3>
        </div>
        <div class="cancel-icon close-form"></div>
        <label for="login-form" class="header"><h3>Checkout</h3></label>
        <input type="text" name="phone" class="text-field phone" placeholder="Phone Number">
		<?php $info = displayErrors($errors, 'phone'); echo $info; ?>
        <input type="text" name="addy" class="text-field address" placeholder="Address">
		<?php $info = displayErrors($errors, 'addy'); echo $info; ?>
        <input type="text" name="code" class="text-field post-code" placeholder="Post Code">
		<?php $info = displayErrors($errors, 'code'); echo $info; ?>
        <input type="submit" name="chkt" class="def-button checkout" value="Checkout">
      </form>
    </div>
</div>

<?php include 'includes/user_footer.php'; ?>
