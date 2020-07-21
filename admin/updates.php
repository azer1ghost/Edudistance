<?php
ob_start();				//Sesia basladildi *
session_start();
date_default_timezone_set("Asia/Baku");
include '../setting/connect.php';  //baglanti temin edildi *
include 'upfunc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CMS - Updates</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style>
    .accordion {
      font-size: 17px;
      max-width: 800px;
      border-radius: 5px;
    }

    .accordion-header,
    .accordion-body {
      background: white;
    }

    .accordion-header {
      padding: 1.5em 1.5em;
      background: #3F51B5;
      text-transform: uppercase;
      color: white;
      cursor: pointer;
      font-size: .8em;
      letter-spacing: .1em;
      transition: all .3s;
    }

    .accordion-header:hover {
      background: #2D3D99;
      position: relative;
      z-index: 5;
    }

    .accordion-body {
      background: #fcfcfc;
      color: #3f3c3c;
      display: none;
    }

    .accordion-body__contents {
      padding: 1.5em 1.5em;
      font-size: .85em;
    }

    .accordion__item.active:last-child .accordion-header {
      border-radius: none;
    }

    .accordion:first-child > .accordion__item > .accordion-header {
      border-bottom: 1px solid transparent;
    }

    .accordion__item > .accordion-header:after {
      content: ">";
      font-size: 1.2em;
      float: right;
      position: relative;
      top: -2px;
      transition: .3s all;
      transform: rotate(90deg);
    }

    .accordion__item.active > .accordion-header:after {
      transform: rotate(-180deg);
    }

    .accordion__item.active .accordion-header {
      background: #2D3D99;
    }

    .accordion__item .accordion__item .accordion-header {
      background: #f1f1f1;
      color: black;
    }
    </style>
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
          	<h3><i class="fa fa-angle-right"></i>Updates</h3>

<!--GEt CONTENTs-=====================================================  -->
<form return="false" method="post">
<menu style="padding:10px" id="nestable-menu">
  <button type="submit" name="checkforupdates" class="btn btn-success" ><i class="fa fa-refresh"></i> Chek For Update</button>

<?php

if (isset($_POST["checkforupdates"])){

  if ( updateControl($UpdateURL,$username,$password) == 0 ) { echo "Your have lastest updates"; }

  elseif ( updateControl($UpdateURL,$username,$password) == 1 ) {

        echo "<p style='padding-top:20px'>Updates available </p> <button type='submit' name='getupdates' class='btn btn-primary'><i class='fa fa-download'></i> Get Updates Now</button>";
    }

}


if (isset($_POST["getupdates"])){

    if (Update($UpdateURL,$username,$password) == 0) {
        echo 'Update failed ERROR code 404';
    }
    elseif (Update($UpdateURL,$username,$password) == 1) {

      echo '<p style="margin-right:auto;margin-left:auto;padding:20px 0px 0px 0px;font-size:15px">Finishing updates please waiting<img style="max-width:70px" src="../assets/img/loading.gif" alt="loading"></p>';

      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'updates.php?update=success';
      header( "Refresh:5; url='http://$host$uri/$extra'");

    }
}

?>

</menu>
</form>




<div class="accordion js-accordion">

<?php include 'updatenotes.txt';



?>

<?php foreach ($NOTES as $not) { ?>

  <div class="accordion__item js-accordion-item active">
      <div class="accordion-header js-accordion-header"> <?php echo $not[0] ?></div>
      <div class="accordion-body js-accordion-body">
          <div class="accordion-body__contents">
            <?php echo $not[1] ?>
          </div>
      </div>
      <!-- end of accordion body -->
  </div>
  <!-- end of accordion item -->

<?php } ?>


</div>
    <!-- end of accordion -->



<!-- GEt CONTENTs -->

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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->
    <?php if (isset($_GET["update"])){ ?>
        <script type="text/javascript">
          swal("Updates Successfully!", "Your have lastest updates now!", "success");
        </script>
    <?php } ?>



  <script>
  var accordion = (function(){

  var $accordion = $('.js-accordion');
  var $accordion_header = $accordion.find('.js-accordion-header');
  var $accordion_item = $('.js-accordion-item');

  // default settings
  var settings = {
    // animation speed
    speed: 400,

    // close all other accordion items if true
    oneOpen: true
  };

  return {
    // pass configurable object literal
    init: function($settings) {
      $accordion_header.on('click', function() {
        accordion.toggle($(this));
      });

      $.extend(settings, $settings);

      // ensure only one accordion is active if oneOpen is true
      if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
        $('.js-accordion-item.active:not(:first)').removeClass('active');
      }

      // reveal the active accordion bodies
      $('.js-accordion-item.active').find('> .js-accordion-body').show();
    },
    toggle: function($this) {

      if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
        $this.closest('.js-accordion')
               .find('> .js-accordion-item')
               .removeClass('active')
               .find('.js-accordion-body')
               .slideUp()
      }

      // show/hide the clicked accordion item
      $this.closest('.js-accordion-item').toggleClass('active');
      $this.next().stop().slideToggle(settings.speed);
    }
  }
})();

$(document).ready(function(){
  accordion.init({ speed: 300, oneOpen: true });
});

  </script>
  </body>
</html>
