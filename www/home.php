<?php

	session_start();

	$page_title = "Home";

	$id = "home";

	include 'includes/db.php';

	include 'includes/user_functions.php';

	include 'includes/user_header.php';

	$user_id = $_SESSION['userid'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];


?>

<div class="main">
	<?php echo "Welcome ".$fname.' '.$lname; ?>

    <div class="book-display">
        <?php

            $topSeller = 'Top-Selling';

            $item = bookInfo($conn, $topSeller);

			$topImage = $item['img_path'];

        ?>
      <div class="display-book" style="background: url('<?php echo $topImage; ?>'); background-size: cover; 
      background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php echo $item['title']; ?></h2>
        <h3 class="book-author"><?php echo $item['author']; ?></h3>
        <h3 class="book-price"><?php echo "$".$item['price']; ?></h3>

        <form>
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div>
    <?php

		$trending = 'Trending';

		$trend = displayImageByCat($conn, $trending);
		
		$trend1 = $trend[0];
		$trend2 = $trend[10];
		$trend3 = $trend[14];
		$trend4 = $trend[19];

		$trendPrice = displayPriceByCat($conn, $trending);

		$price1 = $trendPrice[0];
		$price2 = $trendPrice[10];
		$price3 = $trendPrice[14];
		$price4 = $trendPrice[19];

		$productId = displayIdByCat($conn, $trending);

		$trendId1 = $productId[0];
		$trendId2 = $productId[10];
		$trendId3 = $productId[14];
		$trendId4 = $productId[19];

    ?>
    <div class="trending-books horizontal-book-list">
      <h3 class="header">Trending</h3>
      <ul class="book-list">
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $trendId1; ?>"><div class="book-cover" style="background: url('<?php echo $trend1; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$price1; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $trendId2; ?>"><div class="book-cover" style="background: url('<?php echo $trend2; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$price2; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $trendId3; ?>"><div class="book-cover" style="background: url('<?php echo $trend3; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$price3; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $trendId4; ?>"><div class="book-cover" style="background: url('<?php echo $trend4; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$price4; ?></p></div>
        </li>
      </ul>
    </div>
	<?php

		$recentViewed = 'Recently-Viewed';

		$recentImg = displayImageByCat($conn, $recentViewed);
		
		$recent1 = $recentImg[2];
		$recent2 = $recentImg[6];
		$recent3 = $recentImg[10];
		$recent4 = $recentImg[14];

		$recentPrice = displayPriceByCat($conn, $recentViewed);

		$recPrice1 = $recentPrice[2];
		$recPrice2 = $recentPrice[6];
		$recPrice3 = $recentPrice[10];
		$recPrice4 = $recentPrice[14];

		$bookId = displayIdByCat($conn, $recentViewed);

		$recId1 = $bookId[2];
		$recId2 = $bookId[6];
		$recId3 = $bookId[10];
		$recId4 = $bookId[14];

    ?>
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId1; ?>"><div class="book-cover" style="background: url('<?php echo $recent1; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice1; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId2; ?>"><div class="book-cover" style="background: url('<?php echo $recent2; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice2; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId3; ?>"><div class="book-cover" style="background: url('<?php echo $recent3; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice3; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId4; ?>"><div class="book-cover" style="background: url('<?php echo $recent4; ?>'); background-size: cover; 
      		background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice4; ?></p></div>
        </li>
      </ul>
    </div>
    
</div>

<?php include 'includes/user_footer.php'; ?>
