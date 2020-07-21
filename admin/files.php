<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS - Files</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../assets/css/dropzone.css" rel="stylesheet">
    <link href="../assets/css/w3.css" rel="stylesheet">
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
  	<h3><i class="fa fa-angle-right"></i> Files</h3>
  	<hr>

<iframe src="filemanager.php" width="100%" height="600px" frameborder="0"></iframe>
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

    <script src="../assets/js/dropzone.js"></script>
    <script type="text/javascript">
            // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 10, // MB
        queuecomplete: function(){
          reloadPage()
        }

        };
    </script>

<!-- js placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery-1.10.2.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/jquery.scrollTo.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/js/fancybox/jquery.fancybox.js"></script>
    <!--common script for all pages-->
<script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->
<script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
</script>

<script src="script.js"></script>



  </body>
</html>
