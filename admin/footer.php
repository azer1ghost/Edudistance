<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

 $contentsor=$db->prepare("select * from `footer` where footer_id=:id");
 $contentsor->execute(array('id' => 1));
 $footerprint=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CMS Art Design</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          	<h3><i class="fa fa-angle-right"></i> Footer </h3>

<!--GEt CONTENTs-=====================================================  -->
<menu style="padding:10px" id="nestable-menu">
  <a href="footereditor.php"><button type="button" class="btn btn-success"><i class="fa fa-paint-brush"></i> Edit</button></a>
</menu>

<?php echo trim($footerprint['footer_content']) ?>

<!--GEt CONTENTs -->

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
<script type="text/javascript">
$(document).ready(function(){
    $("#thisYear").text((new Date).getFullYear());
});
</script>

  </body>
</html>
