<?php 
$sqllms = $dblms->querylms("SELECT about_image, about_description, about_title, our_mission, our_vision, our_values
                                FROM ".ABOUT." 
                                ORDER BY about_id ASC LIMIT 1
                            ");
if(mysqli_num_rows($sqllms) > 0){
    $sqllms  = mysqli_fetch_array($sqllms);
    echo'
    <section class="about-section target-area section-padding" id="about">
        <div class="content-area">
            <div class="left-col">
                <div class="about-area">
                    <div class="section-title">
                        <span>#About Us</span>
                        <h2>'.$sqllms['about_title'].'</h2>
                    </div>
                    <div class="about-details '.(($control != 'about')?'line-clamp':'').'" id="more_about">
                        <p>'.html_entity_decode(html_entity_decode($sqllms['about_description'])).'</p>
                    </div>
                    <b>“A company set up under section 42 of the Companies Act, 2017.”</b>';
                    if ($control != 'about') {
                        echo'
                        <div class="btns">
                            <a href="'.SITE_URL.'about" class="theme-btn-s4" id="more_about_text" style="cursor: pointer;">More about us</a>
                        </div>';
                    }
                    echo'
                </div>
            </div>
            <div class="right-col data-bg-image">
                <div class="img-holder">
                    <br><br>';
                    /*
                    <img src="'.ADMIN_URL.'uploads/images/about/'.$sqllms['about_image'].'" alt>
                    */
                    echo'
                    <iframe width="560" height="317" src="https://www.youtube.com/embed/nMCIb64BxYE" title="Apportion Relief Foundation! Country Head, Syed Tanveer Abbas Tabish, shares an video message." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                    if ($control == 'about') {
                        echo'
                        <script>
                            window.onload = function() {
                                var intro = document.getElementById("intro");
                                intro.play();                    
                            };
                        </script>';
                    }
                    echo'
                </div>
            </div>
        </div>
    </section>';
    if($control == 'about'){
        echo'
        <section class="mission-vision-section">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="mission-vision-grids clearfix">
                            <div class="grid">
                                <div class="overlay"></div>
                                <h3>Our Mission</h3>
                                <p class="line-clamp-6">'.html_entity_decode(html_entity_decode($sqllms['our_mission'])).'</p>
                            </div>
                            <div class="grid">
                                <div class="overlay"></div>
                                <h3>Our Vision</h3>
                                <p class="line-clamp-6">'.html_entity_decode(html_entity_decode($sqllms['our_vision'])).'</p>
                            </div>
                            <div class="grid">
                                <div class="overlay"></div>
                                <h3>Our Values</h3>
                                <p class="line-clamp-6">'.html_entity_decode(html_entity_decode($sqllms['our_values'])).'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
    }
}
?>
<!-- <script>
    var i = 2;
    function more_about(){
        i++;
        if (i%2==1) {
            $('#more_about').removeClass('line-clamp');
            $('#more_about_text').html('Less about us');
        } else {
            $('#more_about').addClass('line-clamp');
            $('#more_about_text').html('More about us');
        }
    }
</script> -->