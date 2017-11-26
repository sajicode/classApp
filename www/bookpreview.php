<?php

    session_start();

    $page_title = "Book Preview";

    $id = "bookpreview";

    include 'includes/db.php';

    include 'includes/user_functions.php';

    include 'includes/user_header.php';

    if($_GET['book_id']) {

        $book_id = $_GET['book_id'];
      
    }

    $user_id = $_SESSION['userid'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];

    $item = fetchBookById($conn, $book_id);

    $errors = [];

    if(array_key_exists('upload', $_POST)) {

        if(empty($_POST['review'])) {

            $errors['review'] = "Please enter your comments in the textbox";

        }

        if(empty($errors)) {

            $clean = array_map('trim', $_POST);

            $clean['bookId'] = $book_id;
            $clean['userId'] = $user_id;

            insertIntoReview($conn, $clean);

            redirect("home.php");
        }
	}
	
	$errors = [];

	if(array_key_exists('buy', $_POST)) {

		if(empty($_POST['qty'])) {

			$errors['qty'] = "Please select the quantity of books you wish to buy";

		}

		if(empty($errors)) {

			$clean = array_map('trim', $_POST);
			$clean['image'] = $item['img_path'];
			$clean['prices'] = $item['price'];
			$clean['total'] = ($_POST['qty'] * $clean['prices']);
			$clean['item_id'] = $item['book_id'];

			insertIntoCart($conn, $clean);
			redirect("catalogue.php","?Added to cart");
		}
	}

?>

<div class="main">
    <p class="global-error">You have not chosen any amount!</p>
    <div class="book-display">
      <div class="display-book" style="background: url('<?php echo $item[7]; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php echo $item[1]; ?></h2>
        <h3 class="book-author"><?php echo "by ".$item[2]; ?></h3>
        <h3 class="book-price"><?php echo "$".$item[3]; ?></h3>
        <form action="" method="POST">
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field" name="qty">
          <input class="def-button add-to-cart" type="submit" name="buy" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="book-reviews">
      <h3 class="header">Reviews</h3>
      <ul class="review-list">
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">jm</h4>
          </div>
          <div class="info">
            <h4 class="username">Jon Williams</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">AE</h4>
          </div>
          <div class="info">
            <h4 class="username">Abby Essien</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">SB</h4>
          </div>
          <div class="info">
            <h4 class="username">Sandra Bullock</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
      </ul>
      <div class="add-comment">
        <h3 class="header">Add your comment <?php echo $fname.' '.$lname; ?></h3>
        <form class="comment" action="" method="POST">
          <textarea class="text-field" placeholder="write something" name="review"></textarea>
          <button class="def-button post-comment" name="upload">Upload comment</button>
        </form>
      </div>
    </div>
  </div>

  <?php include 'includes/user_footer.php'; ?>
