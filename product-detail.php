<?php
  session_start();

  include 'config.php';

  include 'function.php';

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootsstrap cdn-->
    <script type="text/javascript">
    function toBottom() {
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth'
        })
    }

    function showMess() {
        var val = document.getElementById('mail-check');
        if (val.value == '') {
            window.alert('You have not entered your email yet!');
        } else {
            window.alert('Thank you for registering, all the latest product information will be sent to your email!');
        }
    }
    </script>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <title>Le Minh Nghia Bookstore</title>
</head>

<body>
    <!-- Search book by keyword -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="search.php" method="post">
                            <input class="form-control" type="text" name="search" id="search"
                                placeholder="Enter keyword for book">
                            <button class="form-control" type="submit"><img src="img/core-img/search.png"
                                    alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search book by keyword end -->

    <!-- Main content start -->
    <div class="main-content-wrapper d-flex clearfix">
        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php"><img src="img/new/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.php">Home page</a></li>
                    <li><a href="intro.php">Introduction</a></li>
                    <li><a href="product.php?category=horror">Products</a></li>
                    <li><a href="price-list.php">Price list</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <div class="row">
                    <a href="login.php" class="btn amado-btn mb-15"
                        <?php if (!isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Log in</a>
                    <a href="register.php" class="btn amado-btn active"
                        <?php if (!isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Sign up</a>
                </div>
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-3x fa-user" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>></i>
                    </div>
                    <div class="col-10">
                        <a class="dropdown-item" href="reset-password.php"
                            <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Welcome,
                            <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                        <div class="dropdown" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>
                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>
                                Account
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="edit-user.php"
                                    <?php if (isAdmin()){ echo 'style="display:none;"'; } ?>>Edit profile</a>
                                <a class="dropdown-item" href="changepw.php"
                                    <?php if (isAdmin()){ echo 'style="display:none;"'; } ?>>Change password</a>
                                <a class="dropdown-item" href="./admin/dashboard.php"
                                    <?php if (!isAdmin()){ echo 'style="display:none;"'; } ?>>Management</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"
                                    <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart
                    <span></span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Popularity</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header end -->

        <!-- Product details start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <?php
                        $id1 = $_GET['id'];
                        $result1 = mysqli_query($con,"SELECT * FROM `products` WHERE `id` = '$id1'");
                                
                        $row1 = mysqli_fetch_assoc($result1);
                        echo "
                    <div class='col-12'>
                        <nav aria-label='breadcrumb'>
                            <ol class='breadcrumb mt-50'>
                                <li class='breadcrumb-item'><a href='index.php'>Home page</a></li>
                                <li class='breadcrumb-item'><a href='product.php?category=".$row1['category']."'>".$row1['category']."</a></li>
                                <li class='breadcrumb-item active' aria-current='page'>".$row1['name']."</li>
                            </ol>
                        </nav>
                    </div>
                    ";
                    ?>
                </div>

                <div class="row">
                    <?php
                        $id = $_GET['id'];
                        $result = mysqli_query($con,"SELECT * FROM `products` WHERE `id` = '$id'");
                        
                        $row = mysqli_fetch_assoc($result);
                        echo
                    "        
                    <div class='col-12 col-lg-7'>
                        <div class='single_product_thumb'>
                            <div id='product_details_slider' class='carousel slide' data-ride='carousel'>
                                <ol class='carousel-indicators'>
                                    <li class='active' data-target='#product_details_slider' data-slide-to='0' style='background-image: url(".$row['image'].");'>
                                    </li>
                                    <li data-target='#product_details_slider' data-slide-to='1' style='background-image: url(img/product-img/pro-big-2.jpg);'>
                                    </li>
                                    <li data-target='#product_details_slider' data-slide-to='2' style='background-image: url(img/product-img/pro-big-3.jpg);'>
                                    </li>
                                    <li data-target='#product_details_slider' data-slide-to='3' style='background-image: url(img/product-img/pro-big-4.jpg);'>
                                    </li>
                                </ol>
                                <div class='carousel-inner'>
                                    <div class='carousel-item active'>
                                        <a class='gallery_img' href='".$row['image']."'>
                                            <img class='d-block w-100' src='".$row['image']."' alt='First slide'>
                                        </a>
                                    </div>
                                    <div class='carousel-item'>
                                        <a class='gallery_img' href='img/product-img/pro-big-2.jpg'>
                                            <img class='d-block w-100' src='img/product-img/pro-big-2.jpg' alt='Second slide'>
                                        </a>
                                    </div>
                                    <div class='carousel-item'>
                                        <a class='gallery_img' href='img/product-img/pro-big-3.jpg'>
                                            <img class='d-block w-100' src='img/product-img/pro-big-3.jpg' alt='Third slide'>
                                        </a>
                                    </div>
                                    <div class='carousel-item'>
                                        <a class='gallery_img' href='img/product-img/pro-big-4.jpg'>
                                            <img class='d-block w-100' src='img/product-img/pro-big-4.jpg' alt='Fourth slide'>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-lg-5'>
                        <div class='single_product_desc'>
                            <div class='product-meta-data'>
                                <div class='line'></div>
                                <p class='product-price'>".$row['price']." VND</p>
                                <a href='product-detail.php?id=".$row['id']."'>
                                    <h6>".$row['name']."</h6>
                                </a>
                                <div class='ratings-review mb-15 d-flex align-items-center justify-content-between'>
                                    <div class='ratings'>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                        <i class='fa fa-star' aria-hidden='true'></i>
                                    </div>
                                    <div class='review'>
                                        <a href='#'>Write your review</a>
                                    </div>
                                </div>
                            </div>

                            <div class='short_overview my-5'>
                                <p>The book is about the life in 1 day of a Greek guy, he...?</p>
                            </div>

                            <form class='cart clearfix' action='' method='post'>
                                <input type='hidden' name='code' value=".$row['code']." />
                                <div class='cart-btn d-flex mb-50'>
                                    <p>Quantity</p>
                                    <div class='quantity'>
                                        <span class='qty-minus' onclick='var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;'><i class='fa fa-caret-down' aria-hidden='true'></i></span>
                                        <input type='number' class='qty-text' id='qty' step='1' min='1' max='300' name='quantity' value='1'>
                                        <span class='qty-plus' onclick='var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;'><i class='fa fa-caret-up' aria-hidden='true'></i></span>
                                    </div>
                                </div>
                                <button type='submit' title='Add to cart' class='btn btn-warning buy'><i class='fa fa-cart-plus' style='margin-right: 5px;' aria-hidden='true'></i>Add to cart</button>
                            </form>

                        </div>
                    </div>
                    ";
                    ?>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Sign up for a chance to get <span>25% off </span></h2>
                        <p>All you need to do is fill in your email, click the subscribe button to receive new information 
                            about products and discounts as well as the latest news from the shop!!</p>
                    </div>
                </div>
                <!-- Newsletter form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input id="mail-check" type="email" name="email" class="nl-email"
                                placeholder="Enter your email">
                            <input type="submit" onclick="showMess()" value="Sign up">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter end -->

    <!-- Footer start -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.php"><img src="img/core-img/logo_2.png" alt=""></a>
                        </div>
                        <!-- Copywrite text -->
                        <p class="copywrite">
                            Copyright &copy;
                            <script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved | LeMinhNghia Corp
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <h5 style="color: white;">Access</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>

                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;"
                            href="index.php">Home page</a></p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;"
                            href="intro.php">Introduction</a></p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;"
                            href="product.php?category=horror">Products</a></p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;"
                            href="price-list.php">Price list</a></p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;"
                            href="contact.php">Contact</a></p>

                </div>

                <div class="col-md-3 pl-4">
                    <div class="row">
                        <h5 style="color: white;">Contact</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>
                    <div class="row">
                        <p style="color: white;"><span style="color:#777" class="fa fa-map-marker"></span> &nbsp;LeMinhNghia -
                            Ba Trieu Street, Xuan Phu Ward, Hue City</p>
                        <p style="color: white;"><span style="color:#777" class="fa fa-phone"></span> &nbsp;Hotline:
                            +8429072002 (Free)</p>
                        <p style="color: white;">Zalo retail: xxxxxxxxxx</p>
                        <p style="color: white;">Zalo wholesale: xxxxxxxxxx</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <h5 style="color: white;">Tags</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>
                    <button class="btn btn-outline-light">Book</button> <button class="btn btn-outline-light">
                        Comics</button> <button class="btn btn-outline-light">MBTL</button> <button
                        class="btn btn-outline-light">Sale</button> <button class="btn btn-outline-light">LeeMinNghia</button>
                </div>
            </div>
        </div>
    </footer>
  <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>