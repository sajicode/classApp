<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="user_style/styles.css">
    <title><?php echo $page_title ?></title>
</head>
<body id="<?php echo $id; ?>">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->

  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      	<a href="home.php"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      	<ul class="top-nav-list">
			<?php $cat_id = fetchCategory($conn); ?>
			<li class="top-nav-listItem Home"><a href="home.php">Home</a></li>
			<li class="top-nav-listItem catalogue"><a href="catalogue.php?cat_id=<?php echo $cat_id[0] ?>">Catalogue</a></li>
			<li class="top-nav-listItem login"><a href="user_logout.php">Logout</a></li>
			<li class="top-nav-listItem register"><a href="user_register.php">Register</a></li>
			<li class="top-nav-listItem cart">
          	<div class="cart-item-indicator">
            	<p><?php $data = countCartItems($conn); echo $data; ?></p>
          	</div>
          <a href="cart.php">Cart</a>
        </li>
      	</ul>
      	<form class="search-brainfood">
        	<input type="text" class="text-field" placeholder="Search all books">
      	</form>
    </div>
  </div>