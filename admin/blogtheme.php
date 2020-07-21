<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
$themeid=1;
$th=$db->prepare("select * from `blogtheme` where theme_id=:id");
$th->execute(array('id' => $themeid ));
$bgtheme=$th->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CMS - Blog theme</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <style media="screen">
      .primary_color{
        border-radius: 100%;
        height: 40px;
        width: 40px;
        border: none;
        outline: none;
        -webkit-appearance: none;
      }

      .primary_color::-webkit-color-swatch-wrapper {
        padding: 0;
      }
      .primary_color::-webkit-color-swatch {
        border: none;
        border-radius: 100%;
      }
    </style>
    <script>
      var colorButton = document.getElementById("primary_color");
      var colorDiv = document.getElementById("color_val");
      colorButton.onchange = function() {
          colorDiv.innerHTML = colorButton.value;
          colorDiv.style.color = colorButton.value;
      }
    </script>
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
            <h3><i class="fa fa-angle-right"></i> Blog options</h3>

      <!--GEt CONTENTs-=====================================================  -->
      <form  id="colorup">

  <hr>
      <div class="col-lg-6 col-md-6 ">

          <input type="hidden" name="blogcolor" value="ok">
          <input type="hidden" name="theme_id" value="1">

          <input type="color" class="primary_color themech" class="field-radio" id="theme_main" name="theme_main">
          <label style="position:absolute;margin-top:12px" for="theme_main">Select Blog theme color</label>
          <span class="container" class="color_val"></span>

      </div>  <!-- #END# Draggable Handles -->

<div class="clearfix">

</div>
  <hr>
      <div class="col-md-6">
        <div class="form-group">
            <label for="main_text">"Main" Text:</label>
            <input required type="text" class="form-control" value="<?php echo $bgtheme['main_text'] ?>" id="main_text" name="main_text">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for="follow_us">"Follow us" Text:</label>
            <input required type="text" class="form-control" value="<?php echo $bgtheme['follow_us'] ?>" id="follow_us" name="follow_us">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for="catecory">"Catecories" Text:</label>
            <input required type="text" class="form-control" value="<?php echo $bgtheme['catecory'] ?>" id="catecory" name="catecory">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for="last_post">"Last posts" Text:</label>
            <input required type="text" class="form-control"  value="<?php echo $bgtheme['last_post'] ?>" id="last_post" name="last_post">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for="tags">"Tags" Text:</label>
            <input required type="text" class="form-control"  value="<?php echo $bgtheme['tags'] ?>" id="tags" name="tags">
        </div>
      </div>


      <div class="clearfix">

      </div>
          <hr>
          <div class="col-md-2">
            <div class="form-group">
                <label for="social_icon1">Icon</label>
                <select class="form-control" id="social_icon1" name="social_icon1" >
                  <option value='fa-facebook'>Facebook</option>
                  <option value='fa-instagram'>Instagram</option>
                  <option value='fa-google-plus'>Google</option>
                  <option value='fa-linkedin-square'>Linkedin</option>
                  <option value='fa-youtube'>Youtube</option>
                </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label for="social_link1">Link</label>
                <input required type="text" class="form-control" value="<?php echo $bgtheme['social_link1'] ?>" id="social_link1" name="social_link1">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label for="social_icon2">Icon</label>
                <select class="form-control" id="social_icon2" name="social_icon2" >
                  <option value='fa-facebook'>Facebook</option>
                  <option value='fa-instagram'>Instagram</option>
                  <option value='fa-google-plus'>Google</option>
                  <option value='fa-linkedin-square'>Linkedin</option>
                  <option value='fa-youtube'>Youtube</option>
                </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label for="social_link2">Link</label>
                <input required type="text" class="form-control"  value="<?php echo $bgtheme['social_link2'] ?>" id="social_link2" name="social_link2">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label for="social_icon3">Icon</label>
                <select class="form-control" id="social_icon3" name="social_icon3" >
                  <option value='fa-facebook'>Facebook</option>
                  <option value='fa-instagram'>Instagram</option>
                  <option value='fa-google-plus'>Google</option>
                  <option value='fa-linkedin-square'>Linkedin</option>
                  <option value='fa-youtube'>Youtube</option>
                </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label for="social_link3">Link</label>
                <input required type="text" class="form-control" value="<?php echo $bgtheme['social_link3'] ?>" id="social_link3" name="social_link3">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
                <label for="social_icon4">Icon</label>
                <select class="form-control" id="social_icon4" name="social_icon4" >
                  <option value='fa-facebook'>Facebook</option>
                  <option value='fa-instagram'>Instagram</option>
                  <option value='fa-google-plus'>Google</option>
                  <option value='fa-linkedin-square'>Linkedin</option>
                  <option value='fa-youtube'>Youtube</option>
                </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label for="social_link4">Link</label>
                <input required type="text" class="form-control"  value="<?php echo $bgtheme['social_link4'] ?>" id="social_link4" name="social_link4">
            </div>
          </div>
          <hr>
      <button style="float:right" type="submit" class="btn" name="button">update</button>
      </form>

      <!--GEt CONTENTs -->

          </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->





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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="menu/jquery.nestable.js"></script>

<script>
document.getElementById("theme_main").value = "<?php echo $bgtheme['theme_main']?>";



$(document).ready(function() {
    $('input.themech').change(function(){
      $.ajax({
        type: 'post',
        url: '../setting/engine.php',
        data: $('#colorup').serialize(),
        success: function () {}
      });
    });
});

$(document).ready(function() {
  $('#colorup').on('submit', function (e) {

    e.preventDefault();
      $.ajax({
        type: 'post',
        url: '../setting/engine.php',
        data: $('#colorup').serialize(),
        success: function () {}
      });
    });
});



var defaultVal1 = "<?php echo $bgtheme['social_icon1'] ?>";
  $("#social_icon1").find("option").each(function () {

      if ($(this).val() == defaultVal1) {

          $(this).prop("selected", "selected");
      }
});


var defaultVal2 = "<?php echo $bgtheme['social_icon2'] ?>";
  $("#social_icon2").find("option").each(function () {

      if ($(this).val() == defaultVal2) {

          $(this).prop("selected", "selected");
      }
});

var defaultVal3 = "<?php echo $bgtheme['social_icon3'] ?>";
  $("#social_icon3").find("option").each(function () {

      if ($(this).val() == defaultVal3) {

          $(this).prop("selected", "selected");
      }
});

var defaultVal4 = "<?php echo $bgtheme['social_icon4'] ?>";
  $("#social_icon4").find("option").each(function () {

      if ($(this).val() == defaultVal4) {

          $(this).prop("selected", "selected");
      }
});

</script>

  </body>
</html>
