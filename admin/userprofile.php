<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include 'country.php';
 $contentsor=$db->prepare("select * from `admin` where admin_login=:id");
 $contentsor->execute(array('id' => $_SESSION['cms_admin_login']));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS - User Profile</title>

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
          	<h3><i class="fa fa-angle-right"></i> User Profile</h3>

<!--GEt CONTENTs-=====================================================  -->



    <form id="updateadmin" onsubmit="return false" >
      <input type="hidden" name="admin_picurl" value="<?php echo $print['admin_picurl'] ?>">
      <input type="hidden" name="admin_id" value="<?php echo $print['admin_id'] ?>">
      <input type="hidden" name="admin_durum"  value="1" >

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_name">Admin Name*:</label>
          <input required type="text" class="form-control" placeholder="Enter Name" value="<?php echo $print['admin_name'] ?>" id="admin_name" name="admin_name">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_surname">Admin Surname*:</label>
          <input required type="text" class="form-control" placeholder="Enter Surname" value="<?php echo $print['admin_surname'] ?>" id="admin_surname" name="admin_surname">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_login">Admin Username*: (relogin required)</label>
          <input required type="text" class="form-control" placeholder="Enter Username" value="<?php echo $print['admin_login'] ?>" id="admin_login" name="admin_login">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_email">Admin Email*:</label>
          <input required type="text" class="form-control" placeholder="Enter Email" value="<?php echo $print['admin_email'] ?>" id="admin_email" name="admin_email">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_date">Admin Birthday*:</label>
          <input required type="date" class="form-control" value="<?php echo $print['admin_date'] ?>" id="admin_date" name="admin_date">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_city">Admin City*:</label>
          <input required type="text" class="form-control" placeholder="Enter City" value="<?php echo $print['admin_city'] ?>" id="admin_city" name="admin_city">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_country">Admin Country*:</label>
          <select required class="form-control" name="admin_country" id="admin_country" >
            <?php echo $selectcountry ?>
          </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_password1">Admin Password:</label>
          <input type="text" class="form-control" placeholder="write new password"  id="admin_password1" name="admin_password">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_password2">Reset Admin Password:</label>
          <input type="text" class="form-control" placeholder=" rewrite new password"  id="admin_password2" name="admin_password">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="admin_picurl">Admin profile picture</label>
        <input type="text" class="form-control" placeholder="admin picture url"  id="admin_picurl" name="admin_picurl" value="<?php echo $print['admin_picurl'] ?>">
      </div>
    </div>



        <button type="submit" class="btn btn-default">Update</button>
    </form>


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

    function reloadPage()
     {
       window.location.reload()
     }

          $(function () {

            $('form').on('submit', function (e) {
              e.preventDefault();

              var pas1 = $('#admin_password1').val();
              var pas2 = $('#admin_password2').val();

              if (pas1 != pas2) {
                alert('Passwords are not the same')
                return false;
              }

              if (pas1 == pas2 & pas1 != "" & pas2 != "") {
                $.ajax({
                  type: 'post',
                  url: '../setting/engine.php',
                  data: $('form').serialize() + "&adminwithpassupdate=ok",
                  success: function () {
                    swal("Successfully!", "Your admin1 setting was updated!", "success");
                    reloadPage();
                  }
                });
              }


              if ( pas1 == "" & pas2 == "") {

                $.ajax({
                  type: 'post',
                  url: '../setting/engine.php',
                  data: $('form').serialize() + "&adminupdate=ok",
                  success: function () {
                    swal("Successfully!", "Your admin2 setting was updated!", "success");
                      reloadPage();
                  }
                });

              }

            });

          });

          var defaultVal = "<?php echo $print['admin_country'] ?>";
            $("#admin_country").find("option").each(function () {

                if ($(this).val() == defaultVal) {

                    $(this).prop("selected", "selected");
                }
            });

////////////////////////////////////////////////////////////////////////////////////////////////////

        </script>

  </body>
</html>
