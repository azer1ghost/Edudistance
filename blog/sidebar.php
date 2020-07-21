<!--Sidebar Side-->
<div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
  <aside class="sidebar default-sidebar right-sidebar">

      <!-- Search -->
        <div class="sidebar-widget search-box">

            <form id="search-form" action="blogs" method="GET">
                <div class="form-group">
                    <input type="search" name="search"  placeholder="Axtar" required>
                    <button type="submit"><span class="icon fa fa-search"></span></button>
                </div>
            </form>
</div>

        <!--Social Widget-->
        <div class="sidebar-widget sidebar-social-widget">
            <div class="sidebar-title">
                <h2><?php echo $bgtheme['follow_us'] ?></h2>
            </div>
            <ul class="social-icon-one alternate">
                <li><a href="<?php echo $bgtheme['social_link1'] ?>"><span class="fa <?php echo $bgtheme['social_icon1'] ?> shareic"></span></a></li>
                <li class="twitter"><a href="<?php echo $bgtheme['social_link2'] ?>"><span class="fa <?php echo $bgtheme['social_icon2'] ?> shareic"></span></a></li>
                <li class="g_plus"><a href="<?php echo $bgtheme['social_link3'] ?>"><span class="fa <?php echo $bgtheme['social_icon3'] ?> shareic"></span></a></li>
                <li class="linkedin"><a href="<?php echo $bgtheme['social_link4'] ?>"><span class="fa <?php echo $bgtheme['social_icon4'] ?> shareic"></span></a></li>
            </ul>
</div>
      <!--End Social Widget-->

      <!--Category Widget-->
        <div class="sidebar-widget categories-widget">
            <div class="sidebar-title">
                <h2><?php echo $bgtheme['catecory'] ?></h2>
            </div>
            <ul class="cat-list">




              <?php $bloggrow=$db->prepare("SELECT * from bloggroup order by blog_id DESC");
                    $bloggrow->execute();
              while($printgblog=$bloggrow->fetch(PDO::FETCH_ASSOC)){
                    $groupname = $printgblog['blog_group'];
                    $count = $db->query("SELECT count(*) FROM `blog` WHERE blog_group = '".$groupname."'")->fetchColumn();?>

                     <li class="clearfix"><a href="blogs?group=<?php echo seogetmethod($groupname) ?>"><?php echo $groupname ?> <span>(<?php echo $count; ?>)</span></a></li>

              <?php } ?>

            </ul>
        </div>
        <!--End Category Widget-->

        <!--Category Widget-->
        <div class="sidebar-widget categories-widget">
            <div class="sidebar-title">
                <h2><?php echo $bgtheme['last_post'] ?></h2>
            </div>


            <?php $blogrow=$db->prepare("SELECT * from blog order by blog_id DESC limit 4");
                  $blogrow->execute();
            while($printblog=$blogrow->fetch(PDO::FETCH_ASSOC)){
              if ($printblog['blog_durum'] == 1) {  ?>
            <article class="widget-post">
                <figure class="post-thumb"><a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" height="65px" src="<?php echo $printblog['blog_wallpaper'] ?>" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                <div class="text"><a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><?php echo $printblog['blog_name'] ?></a></div>
                <div style="font-size:11px"><i class="fa fa-clock-o"></i>   <?php echo $printblog['blog_date'] ?></div>
            </article>

          <?php } } ?>
        </div>

      <!--Adds Widget-->
        <div class="sidebar-widget sidebar-adds-widget">
          <div class="adds-block" style="background-image:url(blog/images/resource/add-image-3.jpg);">
              <div class="inner-box">
                  <div class="text">REKLAM <span> 340 x 283</span></div>
                    <a href="#" class="theme-btn btn-style-two">İndi Al</a>
                </div>
            </div>
        </div>
        <!--Ends Adds Widget-->



        <!--Popular Tags Two-->
        <div class="sidebar-widget popular-tags-two">
          <div class="sidebar-title">
                <h2><?php echo $bgtheme['tags'] ?></h2>
            </div>
            <a href="blog-sidebar.html#">Design</a>
            <a href="blog-sidebar.html#">Fashion</a>
            <a href="blog-sidebar.html#">Money</a>
            <a href="blog-sidebar.html#">Fashion</a>
            <a href="blog-sidebar.html#">Entertanment</a>
            <a href="blog-sidebar.html#">Design</a>
            <a href="blog-sidebar.html#">Fashion</a>
            <a href="blog-sidebar.html#">Pixels</a>
            <a href="blog-sidebar.html#">Business</a>
            <a href="blog-sidebar.html#">Fashion</a>
            <a href="blog-sidebar.html#">Design</a>
        </div>

    </aside>
</div>
