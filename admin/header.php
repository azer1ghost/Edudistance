<?php

$adminsor=$db->prepare("select * from admin where admin_login=:login");
$adminsor->execute(array(
'login' => $_SESSION['cms_admin_login'] ));

	$say=$adminsor->rowCount();

    if($say==0){

header("Location:login.php?durum=nolog");
exit;
    } ?>

<header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
      <!--logo start-->
      <a href="homepage.php"  class="logo"><img style="max-width:44px" src="../assets/img/logo.png" alt=""></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu">
              <!-- settings start -->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="homepage.php">
                      <i class="fa fa-tasks"></i>
                      <span class="badge bg-theme">1</span>
                  </a>
                  <ul class="dropdown-menu extended tasks-bar">
                      <div class="notify-arrow notify-arrow-green"></div>
                      <li>
                          <p class="green">1 message</p>
                      </li>
                      <li>
                          <a href="index.html#">
                              <div class="task-info">
                                  <div class="desc">CMS  Panel</div>
                                  <div class="percent">71%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%">
                                      <span class="sr-only">71% Complete (success)</span>
                                  </div>
                              </div>
                          </a>
                      </li>

                      <li class="external">
                          <a href="#">See All Tasks</a>
                      </li>
                  </ul>
              </li>
              <!-- settings end -->
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-theme"></span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                      <div class="notify-arrow notify-arrow-green"></div>
                      <li>
                          <p class="green">You have't new messages</p>
                      </li>
              <!--        <li>
                          <a href="index.html#">
                              <span class="photo"><img alt="avatar" src=""></span>
                              <span class="subject">
                              <span class="from">Zac Snider</span>
                              <span class="time">Just now</span>
                              </span>
                              <span class="message">
                                  Hi mate, how is everything?
                              </span>
                          </a>
                      </li>

                      <li>
                          <a href="index.html#">See all messages</a>
                      </li>
										-->
                  </ul>
              </li>
              <!-- inbox dropdown end -->
          </ul>
          <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
              <li><a class="logout" href="lockscreen.php">Lock</a></li>
              <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
  </header>
