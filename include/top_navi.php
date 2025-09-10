<?php
$sqllms_1  = $dblms->querylms(" SELECT c.cat_id, c.cat_name, c.cat_href, sc.id_cat
                                FROM ".CATEGORIES." c
                                LEFT JOIN ".SUB_CATEGORIES." sc ON c.cat_id = sc.id_cat 
                                WHERE c.cat_status = '1'
                                GROUP BY c.cat_id
                            ");
echo'
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
                <a class="navbar-brand" href="'.SITE_URL.'index"><img src="'.SITE_URL.'assets/images/logo.png" alt="Apportion"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-left navigation-holder">
                <button class="close-navbar"><i class="ti-close"></i></button>
                <ul class="nav navbar-nav">
                    <li class="check_links">
                        <a href="'.SITE_URL.'">Home</a>
                    </li>
                    <li class="check_links">
                        <a href="'.SITE_URL.'about">About Us</a>
                    </li>
                    <!-- 
                    <li class="check_links">
                        <a href="'.SITE_URL.'categories">Categories</a>
                    </li>
                    -->
                    
                    <li class="check_links">
                        <a href="'.SITE_URL.'projects">Projects</a>
                    </li>
                    <!-- 
                    <li class="check_links">
                        <a href="'.SITE_URL.'packages">packages</a>
                    </li>
                    <li class="menu-item-has-children check_links">
                        <a href="'.SITE_URL.'categories">Categories</a>
                        <ul class="sub-menu">';
                            while ($value_cat = mysqli_fetch_array($sqllms_1)){
                                $flag = (!empty($value_cat['id_cat']) ? 'menu-item-has-children' : '');
                                $link = (!empty($flag) ? "".SITE_URL."categories/".$value_cat['cat_href']."" : "#");
                                echo'
                                <li class="">
                                    <a href="'.$link.'">'.$value_cat['cat_name'].'</a>
                                </li> ';                            
                            }
                            echo'
                        </ul>
                    </li>
                    --> 
                    <li class="check_links">
                        <a href="'.SITE_URL.'team">Team</a>
                    </li>
                    <li class="check_links">
                        <a href="'.SITE_URL.'gallery">Gallery</a>
                    </li>
                    <li class="check_links">
                        <a href="'.SITE_URL.'events"">Events</a>
                    </li>
                    <li class="check_links">
                        <a href="'.SITE_URL.'contact">Conatct Us</a>
                    </li>
                    <li class="menu-item-has-children check_links">
                        <a>Downloads</a>
                        <ul class="sub-menu">
                            <li><a href="'.SITE_URL.'uploads/forms/f_welfare_application_form.pdf" download="">F-Welfare Application Form</a></li>
                            <li><a href="'.SITE_URL.'uploads/forms/f_donor_form.pdf" download="">F-Donor Form</a></li>
							<!--
                            <li><a href="'.SITE_URL.'uploads/forms/donor_form.pdf" download="">Donor Form</a></li>
                            <li><a href="'.SITE_URL.'uploads/forms/welfare_application_form.pdf" download="">Welfare Application Form</a></li>
							-->
                            <li><a href="'.SITE_URL.'uploads/forms/membership_application_form.pdf" download="">Membership Form</a></li>
                        </ul>
                    </li> 
                    <li class="check_links">
                        <a href="'.SITE_URL.'reports">Reports</a>
                    </li>
                    <!-- 
                    <li class="menu-item-has-children check_links"> 
                        <a href="page">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="'.SITE_URL.'about">About</a></li>
                            <li><a href="'.SITE_URL.'contact">Contact</a></li>
                            <li><a href="'.SITE_URL.'testimonials">Testimonials</a></li>
                            <li><a href="'.SITE_URL.'events">Events</a></li>   
                        </ul>
                    </li>
                    -->
                </ul>
            </div>
            <div class="cart-search-contact">
                <div class="donate-btn">
                    <a href="'.SITE_URL.'donation" class="theme-btn-s7"><i class="fi flaticon-like"></i> Donate Now</a>
                </div>
            </div>
        </div>
    </nav>
</header>'; 
