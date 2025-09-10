<?php

include "dbsetting/classdbconection.php";
include "dbsetting/lms_vars_config.php";
$dblms = new dblms();
include "functions/functions.php";
if ($control != "ARF-Privacy") {
	include("include/header.php");
}

include("include/query.php");
include("include/newsletter.php");
// include("include/donation.php");
include("include/error_msg.php");

if ($control == "about")
{
    include("include/about.php");
}
else if ($control == "index" && $control == "")
{
    include("include/index.php");
}
else if ($control == "reports" || $control == "downloads")
{
    include("include/reports.php");
}
else if ($control == "contact")
{
    include("include/contact.php");
}
else if ($control == "testimonials")
{
    include("include/testimonials.php");
}
else if ($control == "team")
{
    include("include/team.php");
}
else if ($control == "team-single")
{
    include("include/team-single.php");
}
else if ($control == "faq")
{
    include("include/faq.php");
}
else if ($control == "gallery")
{
    include("include/gallery.php");
}
else if ($control == "packages")
{
    include("include/packages.php");
}
else if ($control == "event-single")
{
    include("include/event-single.php");    
}
// else if ($control == "projects")
// {
//     include("include/projects-banner.php");
//     include("include/projects.php");    
//}
else if ($control == "project-detail")
{
    include("include/project_detail.php");    
}
else if ($control == "events")
{
    include("include/events.php");    
}
else if ($control == "blog-left-sidebar")
{
    include("include/blog-left-sidebar.php");    
}
else if ($control == "blog-fullwidth")
{
    include("include/blog-fullwidth.php");    
}
else if ($control == "event-detail")
{
    include("include/event_detail.php");    
}
else if ($control == "blog-single-left-sidebar")
{
    include("include/blog-single-left-sidebar.php");    
}
else if ($control == "blog-single-fullwidth")
{
    include("include/blog-single-fullwidth.php");    
}
else if ($control == "shop")
{
    include("include/shop.php");    
}
else if ($control == "shop-single")
{
    include("include/shop-single.php");    
}
else if ($control == "cart")
{
    include("include/cart_box.php");    
}
else if ($control == "home" || $control == "index" || $control == "") 
{
    include("include/index.php");
}
else if ($control == "categories") 
{
    include("include/categories.php");
}
else if ($control == "projects") 
{
    include("include/categories.php");
}
else if ($control == "ARF-Privacy") 
{
    include("include/ARF-Privacy.html");
}else if ($control == "donation") 
{
    include("include/donation.php");
}else if ($control == "my-donations") 
{
    include("include/my_donations.php");
}
else
{
    include("include/index.php");
}
if ($control != "ARF-Privacy") {
	include ("include/footer.php");
}
?>