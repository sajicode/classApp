<?php

	session_start();

	$page_title = "Catalogue";

	$id = "catalogue";

	include 'includes/db.php';

	include 'includes/user_functions.php';

	include 'includes/user_header.php';

	$user_id = $_SESSION['userid'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];

	$errors = [];

	if(array_key_exists('update', $_POST)) {

		if(empty($_POST['quant'])) {
			$errors['quant'] = "Please select a quantity";
		}

		if(empty($errors)) {
			$clean = array_map('trim', $_POST);
			//$clean['bookId'] = $bookId;

			$clean['total'] = $clean['quant'] * $clean['price'];

			$showData = updateQty($conn, $clean);
			redirect("cart.php");
		}
	}



?>

<div class="main">
    <table class="cart-table">
      	<thead>
			<tr>
				<th><h3>Item</h3></th>
				<th><h3>Price</h3></th>
				<th><h3>Quantity</h3></th>
				<th><h3>Total</h3></th>
				<th><h3>Update</h3></th>
				<th><h3>Remove</h3></th>
			</tr>
      	</thead>
      	<tbody>
		  

		<?php 
         
            $data = viewCart($conn);

			echo $data;
			
			$bookId = fetchBook($conn);

        ?>

        
      	</tbody>
    </table>
    <div class="cart-table-actions">
      <button class="def-button previous">previous</button>
      <button class="def-button next">next</button>
      <div class="index">
        <a href="#"><p>1</p></a>
        <a href="#"><p>2</p></a>
        <a href="#"><p>3</p></a>
      </div>
      <a href="checkout.php"><button class="def-button checkout">Checkout</button></a>
    </div>
    
</div>

<?php include 'includes/user_footer.php'; ?>
