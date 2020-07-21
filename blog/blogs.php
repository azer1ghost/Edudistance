
<!DOCTYPE html>
<html>

<!-- Stylesheets -->
<link href="blog/css/bootstrap.css" rel="stylesheet">
<link href="blog/css/style.css" rel="stylesheet">
<link href="blog/css/responsive.css" rel="stylesheet">
<?php include 'blog/theme.php' ?>
<!--Color Themes-->


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<body>
<div class="page-wrapper">


    <!--Sidebar Page Container-->
    <div style="padding-top:20px;padding-bottom:50px;">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="content">
                    	<!--Sec Title-->
                    	<div class="sec-title">
                        	<h2><?php echo $bgtheme['main_text'] ?></h2>
                        </div>

                        <div class="row clearfix">

                          <div class="row" id="load_data"></div>
                        <!--GEt CONTENTs -->

                          <center><div id="load_data_message"></div></center>

                        </div>

                    </div>

                    <!-- Styled Pagination -->

                </div>

                <?php include 'blog/sidebar.php' ?>

            </div>

        </div>
    </div>
    <!--End Sidebar Page Container-->



</body>
</html>
