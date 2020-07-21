<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include 'upfunc.php';
$count = $db->query("SELECT count(*) FROM `blog`")->fetchColumn();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS - Main Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Include the CSS that styles the charts. -->
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../assets/css/jquery.gritter.css" rel="stylesheet">

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
    <?php include 'header.php' ?>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
    <?php include 'sidebar.php' ?>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->


      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Main Page</h3>


<!--GEt CONTENTs -->
<div class="col-lg-12 main-chart">


<!--
  					<div class="row mt">

                        <div class="border-head">
                            <h3>VISITS</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>10.000</span></li>
                                <li><span>8.000</span></li>
                                <li><span>6.000</span></li>
                                <li><span>4.000</span></li>
                                <li><span>2.000</span></li>
                                <li><span>0</span></li>
                            </ul>
                            <div class="bar">
                                <div class="title">JAN</div>
                                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">FEB</div>
                                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">MAR</div>
                                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">APR</div>
                                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                            </div>
                            <div class="bar">
                                <div class="title">MAY</div>
                                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">JUN</div>
                                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                            </div>
                            <div class="bar">
                                <div class="title">JUL</div>
                                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                            </div>
                        </div>

  					</div>
-->

<div class="row">

   <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
      <div class="box1">
         <span class="li_heart"></span>
         <h3>0</h3>
      </div>
      <p>0 People liked your page the last 24hs. Whoohoo!</p>
   </div>

   <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
         <span class="li_cloud"></span>
         <h3>0</h3>
      </div>
      <p>0 New files were added in your cloud storage.</p>
   </div>

   <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
         <span class="li_stack"></span>
         <h3>0</h3>
      </div>
      <p>You have 0 unread messages in your inbox.</p>
   </div>

   <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
         <span class="li_news"></span>
         <h3><?php echo $count ?></h3>
      </div>
      <p>You have <?php echo $count ?> shared post.</p>
   </div>

   <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
         <span class="li_data"></span>
         <h3>OK!</h3>
      </div>
      <p>Your App is working perfectly. Relax & enjoy.</p>
   </div>

</div>
<!-- /row mt -->






  </div><!-- /col-lg-9 END SECTION MIDDLE -->






          </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content end-->
      <!--footer start-->
<?php include 'copyright.php'; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>


<?php if ( updateControl($UpdateURL,$username,$password) == 1 ) { ?>
    <script type="text/javascript">
            $(document).ready(function () {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'New updates are available',
                // (string | mandatory) the text inside the notification
                text: 'Dear <?php echo $adminprint['admin_name']." ".$adminprint['admin_surname'] ?> welcome to REDACTIVE App. New Updates are avaliable for you. Please go to update section and update your app or click link <a href="updates.php" style="color:#ffd777">Update</a>.',
                // (string | optional) the image to display on the left
                image: '../assets/img/logo.jpg',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: '1',
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

            return false;
            });
    	</script>
<?php } ?>

  </body>
</html>
