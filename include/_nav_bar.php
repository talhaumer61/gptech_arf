<header id="header" class="site-header header-style-1">
    <nav class="navigation navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="open-btn">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $sqllms  = mysqli_fetch_array($dblms->querylms("SELECT `web_info_logo`
                                            FROM ".WEB_INFO." 
                                            WHERE `web_info_status` = '1'
                                            ORDER BY `web_info_id` DESC LIMIT 1"));
                ?>
                <a class="navbar-brand" href="index.php"><img src="admin/images/web_info/<?php echo $sqllms['web_info_logo']; ?>" alt></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-left navigation-holder">
                <button class="close-navbar"><i class="ti-close"></i></button>
                <ul class="nav navbar-nav">
                    <li class="menu-item-has-children current-menu-parent">
                        <a href="<?= SITE_URL?>">Home</a>
                        <ul class="sub-menu">
                            <li class="current-menu-item"><a href="index.php">Home style 1</a></li>
                            <li><a href="index-2.php">Home style 2</a></li>
                            <li><a href="index-3.php">Home style 3</a></li>
                            <li class="menu-item-has-children">
                                <a href="#Level3">Third level</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Level 3</a></li>
                                    <li><a href="#">Level 3</a></li>
                                    <li><a href="#">Level 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="testimonials.php">Testimonials</a></li>
                            <li><a href="team.php">Team</a></li>
                            <li><a href="team-single.php">Team single</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="404.php">404</a></li>
                            <li><a href="events.php">Events</a></li>
                            <li><a href="event-single.php">Event single</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Causes</a>
                        <ul class="sub-menu">
                            <li><a href="causes.php">Causes</a></li>
                            <li><a href="case-single.php">Causes single</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.php">Blog default</a></li>
                            <li><a href="blog-left-sidebar.php">Blog left sidebar</a></li>
                            <li><a href="blog-fullwidth.php">Blog full width</a></li>
                            <li class="menu-item-has-children">
                                <a href="#Level3">Blog details</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-single.php">Blog details</a></li>
                                    <li><a href="blog-single-left-sidebar.php">Blog details left sidebar</a></li>
                                    <li><a href="blog-single-fullwidth.php">Blog details full width</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="shop-single.php">Shop single</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div><!-- end of nav-collapse -->

            <div class="cart-search-contact">
                <div class="header-search-form-wrapper">
                    <button class="search-toggle-btn"><i class="fi flaticon-search"></i></button>
                    <div class="header-search-form">
                        <form>
                            <div>
                                <input type="text" class="form-control" placeholder="Search here...">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mini-cart">
                    <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-basket"></i> <span class="cart-count">02</span></button>
                    <div class="mini-cart-content">
                        <div class="mini-cart-items">
                            <div class="mini-cart-item clearfix">
                                <div class="mini-cart-item-image">
                                    <a href="#"><img src="assets/images/shop/mini-cart/img-1.jpg" alt></a>
                                </div>
                                <div class="mini-cart-item-des">
                                    <a href="#">Hoodi with zipper</a>
                                    <span class="mini-cart-item-price">$20.15</span>
                                    <span class="mini-cart-item-quantity">x 1</span>
                                </div>
                            </div>
                            <div class="mini-cart-item clearfix">
                                <div class="mini-cart-item-image">
                                    <a href="#"><img src="assets/images/shop/mini-cart/img-2.jpg" alt></a>
                                </div>
                                <div class="mini-cart-item-des">
                                    <a href="#">Ninja T-shirt</a>
                                    <span class="mini-cart-item-price">$13.25</span>
                                    <span class="mini-cart-item-quantity">x 2</span>
                                </div>
                            </div>
                        </div>
                        <div class="mini-cart-action clearfix">
                            <span class="mini-checkout-price">$215.14</span>
                            <a href="#" class="view-cart-btn">View Cart</a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end of container -->
    </nav>
</header>