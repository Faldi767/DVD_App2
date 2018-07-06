<?php
	$GLOBALS['servername'] = "localhost";
	$GLOBALS['username'] = "root";
	$GLOBALS['password'] = "";
	$GLOBALS['dbname'] = "dvd_store";
	function home() {
		include("header.php");
	}
	function top() {
		?>
		<div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="" class="btn btn-success btn-sm">Welcome Guest</a>
                <a href="">Shopping cart total Rp.100.000, Total item 2</a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="">My Account</a>
                    </li>
                    <li>
                        <a href="">Go To Cart</a>
                    </li>
                    <li>
                        <a href="">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
	}
	function slider() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM tbl_slider";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			?>
		    <div class="container" id="slider">
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                	<?php
                	for($i=0;$i < $result->num_rows; $i++) {
                		echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.($i == 0 ? 'active' : '').'"></li>';
                	}
                	?>
                </ol>
                <div class="carousel-inner">
                	<?php
		    while($row = $result->fetch_assoc()) {
		        echo '<div class="item '.($row['slide_id'] == 1 ? 'active' : '').'">';
                    echo '<img src="admin/slide_images/'.$row['slide_images'].'" alt="">';
                echo '</div>';
		    }
		    ?>
		    </div>
            </div>
        </div>
    </div>
        <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="">WE LOVE OUR CUSTOMER</a></h3>
                        <p>we are know to provide best possible service ever</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-tags"></i>
                        </div>
                        <h3><a href="">BEST PRICE</a></h3>
                        <p>you can check all other sites about the prices and compare with us</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <h3><a href="">100% GUARANTEED  </a></h3>
                        <p>free return on everything in 1 month with terms and privacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        	<?php
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
	function loadhomeproduct() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
		    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>Latest This Week</h2>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container">
        <div class="row">
        	<?php
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
		    	<div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <center>
                    <a href="">
                        <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" alt="" class="img-responsive">
                    </a>
                    </center>
                    <div class="text">
                        <h3><a href=""><?php echo $row["product_title"]; ?></a></h3>
                        <p class="price">Rp.<?php echo $row["product_price"]; ?></p>
                        <p class="buttons">
                            <a href="" class="btn btn-default">View Details</a>
                            <a href="" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>
                                Add to Cart
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <?php
		    }
		    ?>
		            </div>
    </div>
    <?php
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
	function navbar() { ?>
		<div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="">Video Store</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menunavigation">
                    <span class="sr-only sr-only-focusable">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="menunavigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="customer/my_account.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-primary navbar-btn right" href="">
                    <i class="fa fa-shopping-cart"></i>
                    <span>4 Items in cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="user_search" required>
                            <span class="input-group-btn">
                                <button type="submit" value="search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
	function footer() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product_category";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
			<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-6">
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>Top Product Categories</h4>
                <ul>
                	<?php
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
		    	<li><a href=""><?php echo $row["cat_p_title"]; ?></a></li>
		        <?php
		    }
		    ?>
		    </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>Where to find Us</h4>
                <p>
                    <strong>Video Store. Ltd</strong>
                    <br>Malang
                    <br>0341
                    <br>Video Store Company
                    <br>videostore@gmail.com
                    <br>
                    <strong>Video Store Company</strong>
                </p>
                <a href="contact.php">Contact Us Page</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>Get the news</h4>
                <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi iste, labore consequuntur exercitationem eos sequi nisi ullam consequatur voluptatum quae? Modi vel similique eum labore aperiam quasi quod rem dolorem.
                </p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn">
                        <input type="submit" value="subscribe" class="btn btn-default">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay in touch</h4>
                <p class="social">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
?>