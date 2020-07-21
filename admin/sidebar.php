<?php

 $adminsor=$db->prepare("select * from `admin` where admin_login=:id");
 $adminsor->execute(array('id' => $_SESSION['cms_admin_login']));
 $adminprint=$adminsor->fetch(PDO::FETCH_ASSOC);
$admin = $adminprint['admin_name']." ".$adminprint['admin_surname'];
?>
<aside>
    <div id="sidebar"  class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <div style="border-radius: 50%;border:1px solid #eaeaea;background-color: white;max-width:60px;max-height: 60px;overflow:hidden;margin-left:auto;margin-right:auto;" >
              <p class="centered">
                <a href="userprofile.php">
                  <img src="<?php echo $adminprint['admin_picurl'] ?>" style="max-width:80px">
                </a>
              </p>
          </div>
          <h5 class="centered"><?php echo $admin ?></h5>

            <?php if($adminprint['admin_mission']=="President"|| $adminprint['admin_mission']=="Developer" ){ ?>

            <li class="active"><a href="homepage.php"><i class="fa fa-home"></i> Main</a></li>
            <li><a href="pages.php"><i class="fa fa-file"></i> Pages</a></li>
            <li><a href="menu.php"><i class="fa fa-bars"></i> Menus</a></li>
            <li><a href="galery.php"><i class="fa fa-picture-o"></i> Gallery</a></li>
            <li><a href="slider.php"><i class="fa fa-caret-square-o-right"></i> Slider</a></li>
            <li><a href="footer.php"><i class="fa fa-sort-amount-asc"></i> Footer</a></li>
            <li><a href="blog.php"><i class="fa fa-newspaper-o"></i> Blog </a></li>
            <li><a href="files.php"><i class="fa fa-cloud-upload"></i> Files </a></li>
            <li><a href="admins.php"><i class="fa fa-users"></i> Admins</a></li>
            <li><a href="siteoptions.php"><i class="fa fa-cog"></i> Options</a></li>
            <li><a href="updates.php"><i class="fa fa-arrow-down"></i> updates</a></li>

            <?php } if($adminprint['admin_mission']=="Developer"){ ?>
              <li><a href="library.php"><i class="fa fa-book"></i> Library</a></li>
            <?php } if($adminprint['admin_mission']=="Blogger"){ ?>
              <li><a href="#"><i class="fa fa-newspaper-o"></i> Blog <span class="label label-info label-mini">Premium</span> </a></li>
              <li><a href="userprofile.php"><i class="fa fa-user"></i> Edit Profile </a></li>
            <?php } ?>



        </ul>
        <!-- sidebar menu end    <span class="label label-info label-mini">Premium</span>  -->
    </div>
</aside>
