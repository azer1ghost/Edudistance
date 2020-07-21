<?php
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

    <title>Art Design CMS</title>

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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
		      <form class="form-login" action="../setting/engine.php" method="POST">
		        <h2 class="form-login-heading"><img width="100px" src="<?php echo $opprint['option_logo'] ?>" /></h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="admin_name" placeholder="Admin ID" required autofocus>
		            <br>
		            <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
		            <br>
		            <button class="btn btn-theme btn-block" name="loggin" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		        </div>
		      </form>
	  	</div>
	  </div>
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../assets/img/login-bg.jpg", {speed: 500});
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>


<?php if ($_GET['status']=="false") { ?>
    swal({
          title: "You are blocked from admin",
          text: "Please contact with admin more information",
          icon: "warning",
          dangerMode: true,
        })
<?php } ?>

          var defaultVal = "<?php echo $print['admin_country'] ?>";
            $("#admin_country").find("option").each(function () {

                if ($(this).val() == defaultVal) {

                    $(this).prop("selected", "selected");
                }
            });
        </script>

  </body>
</html>
