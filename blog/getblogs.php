<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include '../setting/function.php';  //baglanti temin edildi *

if(isset($_POST["limit"], $_POST["start"])){


if (isset($_POST['search'])) {
  $keyword=$_POST['search'];
  $sql="SELECT * FROM blog WHERE `blog_name` LIKE :keyword; order by blog_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ";
  $q=$db->prepare($sql);
  $q->bindValue(':keyword','%'.$keyword.'%');
  $q->execute();
  $i=0;
  while($printblog=$q->fetch(PDO::FETCH_ASSOC)){
  $i++;

    if ($printblog['blog_durum'] == 1) {  ?>
                <!--News Block One-->
                <div class="news-block-one col-md-6 col-sm-6 col-xs-12 count">
                    <div class="inner-box">
                        <div class="image">
                            <a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><img style="height:220px" src="<?php echo $printblog['blog_wallpaper'] ?>" alt="" /></a>
                        </div>
                        <div class="lower-box">
                            <h3><a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><?php echo $printblog['blog_name'] ?></a></h3>
                            <div class="post-date"><?php echo $printblog['blog_date'] ?> / <?php echo $printblog['blog_tag'] ?> / <?php echo $printblog['blog_author'] ?></div>
                            <div class="text"><?php echo  substr($printblog['blog_content'],0,150) ?></div>
                            <a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>" class="read-more">Ardını oxu <span class="arrow ion-ios-arrow-thin-right"></span></a>
                        </div>
                    </div>
                </div>
                <!--End News Block-->
<?php } } }


elseif (isset($_POST['group'])) {

  $keyword=$_POST['group'];
  $sql="SELECT * FROM blog WHERE `blog_group` LIKE :keyword; order by blog_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ";
  $q=$db->prepare($sql);
  $q->bindValue(':keyword','%'.$keyword.'%');
  $q->execute();
  $i=0;
  while($printblog=$q->fetch(PDO::FETCH_ASSOC)){
  $i++;
  if ($printblog['blog_durum'] == 1) {
  ?>
              <!--News Block One-->
              <div class="news-block-one col-md-6 col-sm-6 col-xs-12 count"  data-id="<?php echo $i; ?>" >
                  <div class="inner-box">
                      <div class="image">
                          <a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><img style="height:220px" src="<?php echo $printblog['blog_wallpaper'] ?>" alt="" /></a>
                      </div>
                      <div class="lower-box">
                          <h3><a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><?php echo $printblog['blog_name'] ?></a></h3>
                          <div class="post-date"><?php echo $printblog['blog_date'] ?> / <?php echo $printblog['blog_tag'] ?> / <?php echo $printblog['blog_author'] ?></div>
                          <div class="text"><?php echo  substr($printblog['blog_content'],0,150) ?></div>
                          <a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>" class="read-more">Ardını oxu <span class="arrow ion-ios-arrow-thin-right"></span></a>
                      </div>
                  </div>
              </div>
              <!--End News Block-->

<?php  } } }


else {

$blogrow=$db->prepare("SELECT * from blog order by blog_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ");
        $blogrow->execute();
  while($printblog=$blogrow->fetch(PDO::FETCH_ASSOC)){
    if ($printblog['blog_durum'] == 1) {  ?>
                <!--News Block One-->
                <div class="news-block-one col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><img style="height:220px" src="<?php echo $printblog['blog_wallpaper'] ?>" alt="" /></a>
                        </div>
                        <div class="lower-box">
                            <h3><a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>"><?php echo $printblog['blog_name'] ?></a></h3>
                            <div class="post-date"><?php echo $printblog['blog_date'] ?> / <?php echo $printblog['blog_tag'] ?> / <?php echo $printblog['blog_author'] ?></div>
                            <div class="text"><?php echo  substr($printblog['blog_content'],0,150) ?></div>
                            <a href="posts/<?php echo seo($printblog['blog_name']) ?>/<?php echo $printblog['blog_id'] ?>" class="read-more">Ardını oxu <span class="arrow ion-ios-arrow-thin-right"></span></a>
                        </div>
                    </div>
                </div>
                <!--End News Block-->

<?php } } } }?>
