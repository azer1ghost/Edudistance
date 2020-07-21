<?php
ob_start();				//Sesia basladildi *
session_start();

  include '../setting/connect.php';  //baglanti temin edildi *
  $opsor=$db->prepare("select * from `mainoptions` where option_id=:id");
  $opsor->execute(array('id' => 1));
  $opprint=$opsor->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS - User Profile</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style media="screen">
      td{
        height: 120px;
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
          	<h3><i class="fa fa-angle-right"></i> Site main options</h3>
<hr>
<!--GEt CONTENTs-=====================================================  -->



<form id="updateoptions" onsubmit="return false" >
  <input type="hidden" name="mainoptions" value="ok">
  <input type="hidden" name="option_id" value="<?php echo $opprint['option_id'] ?>">




<table class="table table-striped table-advance table-hover">
      <tr>
        <th>Actions</th>
        <th>Results</th>
      </tr>
      <tr>
        <td>
          <label for="option_favicion">Favicon logo url* (64x64 or 128x128 only .ico file):</label>
          <input type="text" class="form-control" placeholder="Enter Favicon url" value="<?php echo $opprint['option_favicion'] ?>" id="option_favicion" name="option_favicion">
        </td>
        <td>
          <img style="max-width:100px;margin-top:20px;" src="<?php echo $opprint['option_favicion'] ?>" alt="Favicon">
        </td>
      </tr>


      <tr>
        <td>
          <label for="option_logo">Main Logo of Yout Business*:</label>
          <input type="text" class="form-control" placeholder="Enter Logo url" value="<?php echo $opprint['option_logo'] ?>" id="option_logo" name="option_logo">
        </td>
        <td>
          <img style="max-width:100px;margin-top:20px;" src="<?php echo $opprint['option_logo'] ?>" alt="Logo">
        </td>
      </tr>


              <button type="submit" class="btn btn-default">Update</button>

      <tr>
        <td>
          <div class="form-group">
              <label for="option_test"></label>
              <input  type="hidden" class="form-control" placeholder="Enter test" value="<?php echo $opprint['option_test'] ?>" id="option_test" name="option_test">
          </div>
        </td>
        <td>

        </td>
      </tr>
    </table>




    </form>


<div class="clearfix"></div>









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

    <script>
    /////////////////////////////////////////////////////////////////////////////////////////////////

    function reloadPage()
     {
       window.location.reload()
     }
    //////////////////////////////////////////////////////////////////////////////////////////////////
    $(function () {

      $('#updateoptions').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
          type: 'post',
          url: '../setting/engine.php',
          data: $('form').serialize(),
          success: function () {
            swal("Successfully!", "Your setting was updated!", "success").then(function(result){
              reloadPage();
           })

          }
        });

      });

    });
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

        </script>

  </body>
</html>
