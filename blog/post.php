<!-- Stylesheets -->
<link href="blog/css/bootstrap.css" rel="stylesheet">
<link href="blog/css/style.css" rel="stylesheet">
<link href="blog/css/responsive.css" rel="stylesheet">

<!--Color Themes-->
<link href="blog/css/color-themes/default-theme.css" rel="stylesheet">
<?php include 'blog/theme.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style media="screen">
  .shareic{
    padding-top: 15px;
  }
</style>

<div class="page-wrapper">

    <!--Sidebar Page Container-->
    <div style="padding-top:20px;padding-bottom:50px;">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="content">
                    	<div class="blog-single">
                        	<div class="inner-box">
                            	<div class="upper-box">
                                    <ul class="breadcrumb-bar">
                                        <li><a href="<?php echo $sitename ?>">Ana Səhifə</a></li>
                                        <li><a href="<?php echo $sitename ?>/blogs">Blog</a></li>
                                        <li><?php echo $bgprint['blog_name'] //title?></li>
                                    </ul>
                                    <ul class="tag-title">
                                        <li>Kateqorİya</li>
                                        <li><?php echo $bgprint['blog_group']?></li>
                                    </ul>
                                    <h2><?php echo $bgprint['blog_name']?></h2>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span><?php echo $bgprint['blog_date']?></li>
                                        <li><span class="icon qb-user2"></span><?php echo $bgprint['blog_author']?></li>
                                <!--    <li><span class="icon fa fa-comment-o"></span>3 comments</li> -->
                                        <li><span class="icon qb-eye"></span><?php echo $bgprint['blog_view']?> Views</li>
                                    </ul>

                                </div>
                                <div class="text">
                                	<?php echo $bgprint['blog_content']?>
                                </div>
                                <!--post-share-options-->
                                <div class="post-share-options">
                                    <div class="tags clearfix">

                                      <a href="#">tags in foreach</a></div>

                                </div>

                                <!--New Article-->
                                <ul class="new-article clearfix">
                                	<li><a href=""><span class="fa fa-angle-left"></span> &ensp; &ensp; &ensp; &ensp; Öncəki Məqalə</a></li>
                                  <li><a href="">Növbəti Məqalə &ensp; &ensp; &ensp; &ensp; <span class="fa fa-angle-right"></span></a></li>
                                </ul>
                            </div>
                            <br>
                            <ul class="social-icon-one alternate">
                                <li class="share">Paylaş:</li>
                                <li><a href="#"><span class="fa fa-facebook shareic"></span></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter shareic"></i></a></li>
                                <li class="g_plus"><a href="#"><i class="fa fa-google-plus shareic"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin-square shareic"></i></a></li>
                                <li class="pinteret"><a href="#"><i class="fa fa-pinterest-p shareic"></i></a></li>
                            </ul>

                           	<!--Author Box-->
                            <div class="author-box">
                                <div class="author-comment">
                                    <div class="inner-box">
                                        <div class="image"><img src="blog/images/resource/author-1.jpg" alt="" /></div>
                                        <h4><?php echo $bgprint['blog_author']?></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam penatibus et magnis .</div>
                                        <ul class="social-icon-two">
                                            <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                                            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>




                            <!--Comments Area
                            <div class="comments-area">
                                <div class="sec-title"><h2>2 Comments</h2></div>

                                <div class="comment-box">
                                    <div class="comment">

                                        <div class="comment-inner">
                                            <div class="comment-info">Sandra Mavic</div>
                                            <div class="post-date">March 03, 2017</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec qam penatibus et magnis .</div>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-box reply-comment">
                                    <div class="comment">

                                        <div class="comment-inner">
                                            <div class="comment-info">George Belly</div>
                                            <div class="post-date">March 03, 2017</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec qam penatibus et magnis .</div>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="comment-form">

                                <div class="sec-title"><h2>Leave a comment</h2></div>

                                <form method="post" action="blog.html">
                                    <div class="row clearfix">
                                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                            <input type="text" name="username" placeholder="Name ..." required>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                            <input type="email" name="email" placeholder="Email ..." required>
                                        </div>

                                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                            <input type="text" name="website" placeholder="Website ..." required>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <textarea name="message" placeholder="Message ..."></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <button class="theme-btn" type="submit" name="submit-form">Submit Comment</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                      End Comment Form -->

                        </div>
                    </div>
                </div>

                <?php include 'blog/sidebar.php' ?>
    <!--End Sidebar Page Container-->


        </div>
    </div>
    <!--End Sidebar Page Container-->
</div>
</div>
