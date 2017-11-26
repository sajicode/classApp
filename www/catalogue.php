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


?>

<div class="side-bar">
    <div class="categories">
      <h3 class="header">Categories</h3>
      <ul class="category-list">
        <a href="#"><li class="category">Javascript</li></a>
        <a href="#"><li class="category">HTML</li></a>
        <a href="#"><li class="category">History</li></a>
        <a href="#"><li class="category">Literature</li></a>
        <a href="#"><li class="category">Mathematics</li></a>
        <a href="#"><li class="category">Engineering</li></a>
        <a href="#"><li class="category">Politics</li></a>
        <a href="#"><li class="category">Music</li></a>
        <a href="#"><li class="category">Literature</li></a>
        <a href="#"><li class="category">Mathematics</li></a>
        <a href="#"><li class="category">Engineering</li></a>
        <a href="#"><li class="category">Politics</li></a>
        <a href="#"><li class="category">Music</li></a>
      </ul>
    </div>
</div>

<div class="main">

    <?php

        $clean = array_map('trim', $_POST);

        $clean['cat_id'] = 2;

        $price = selectPriceByCat($conn, $clean['cat_id']);

        $jsPrice1 = $price[0];
        $jsPrice2 = $price[2];
        $jsPrice3 = $price[4];
        $jsPrice4 = $price[6];
        $jsPrice5 = $price[8];
        $jsPrice6 = $price[9];
        $jsPrice7 = $price[3];
        $jsPrice8 = $price[5];

        $pic = selectImageByCat($conn, $clean['cat_id']);

        $jsPic1 = $pic[0];
        $jsPic2 = $pic[2];
        $jsPic3 = $pic[4];
        $jsPic4 = $pic[6];
        $jsPic5 = $pic[8];
        $jsPic6 = $pic[9];
        $jsPic7 = $pic[3];
        $jsPic8 = $pic[5];

        $bookId = selectIdByCat($conn, $clean['cat_id']);

        $jsId1 = $bookId[0];
        $jsId2 = $bookId[2];
        $jsId3 = $bookId[4];
        $jsId4 = $bookId[6];
        $jsId5 = $bookId[8];
        $jsId6 = $bookId[9];
        $jsId7 = $bookId[3];
        $jsId8 = $bookId[5];


    ?>
    <div class="main-book-list horizontal-book-list">
      <ul class="book-list">
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId1; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic1; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice1; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId2; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic2; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice2; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId3; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic3; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice3; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId4; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic4; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice4; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId5; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic5; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice5; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId6; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic6; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice6; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId7; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic7; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice7; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $jsId8; ?>"><div class="book-cover" style="background: url('<?php echo $jsPic8; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$jsPrice8; ?></p></div>
        </li>
      </ul>
      <div class="actions">
        <button class="def-button previous">Previous</button>
        <button class="def-button next">Next</button>
      </div>
    </div>
    <div class="recently-viewed-books horizontal-book-list">

        <?php

            //$clean = array_map('trim', $_POST);

            $clean['flg'] = "Recently-Viewed";
            $clean['catId'] = 2;

            $recentjs = selectImageByFlagAndCat($conn, $clean);

            $recImg1 = $recentjs[0];
            $recImg2 = $recentjs[1];
            $recImg3 = $recentjs[2];
            $recImg4 = $recentjs[3];
            
            $recentPricejs = selectPriceByFlagAndCat($conn, $clean);

            $recPrice1 = $recentPricejs[0];
            $recPrice2 = $recentPricejs[1];
            $recPrice3 = $recentPricejs[2];
            $recPrice4 = $recentPricejs[3];

            $recentIdjs = selectIdByFlagAndCat($conn, $clean);

            $recId1 = $recentIdjs[0];
            $recId2 = $recentIdjs[1];
            $recId3 = $recentIdjs[2];
            $recId4 = $recentIdjs[3];
        ?>

        <h3 class="header">Recently Viewed</h3>
        <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId1; ?>"><div class="book-cover" style="background: url('<?php echo $recImg1; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice1; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId2; ?>"><div class="book-cover" style="background: url('<?php echo $recImg2; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice2; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId3; ?>"><div class="book-cover" style="background: url('<?php echo $recImg3; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice3; ?></p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php?book_id=<?php echo $recId4; ?>"><div class="book-cover" style="background: url('<?php echo $recImg4; ?>'); background-size: cover; 
            background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo "$".$recPrice4; ?></p></div>
        </li>
      </ul>
    </div>
    
</div>

<?php include 'includes/user_footer.php'; ?>
