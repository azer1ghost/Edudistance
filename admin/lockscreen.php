<?php
session_start();

if (isset($_SESSION['cms_admin_login'])) {
  $login = $_SESSION['cms_admin_login'];
  $picurl = $_SESSION['admin_picurl'];
  $name = $_SESSION['admin_name'];
};

if (isset($_SESSION['lock_login'])) {
  $login = $_SESSION['lock_login'];
  $picurl = $_SESSION['admin_picurl'];
  $name = $_SESSION['admin_name'];
};

session_destroy();

session_start();

$_SESSION['lock_login'] = $login;
$_SESSION['admin_picurl'] = $picurl;
$_SESSION['admin_name'] = $name;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $login  ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="getTime()">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  	<div class="container">

	  		<div id="showtime"></div>
	  			<div class="col-lg-4 col-lg-offset-4">
	  				<div class="lock-screen">
		  				<h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
		  				<p>UNLOCK</p>

				          <!-- Modal -->
				          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				              <div class="modal-dialog">
				                  <div class="modal-content">
				                      <div class="modal-header">
				                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                          <h4 class="modal-title">Welcome Back</h4>
				                      </div>
				                      <div class="modal-body">
				                          <p class="centered"><img class="img-circle" width="80" height="80" src="<?php echo $_SESSION['admin_picurl'] ?>"> <br> <?php echo $_SESSION['admin_name'] ?> </p>
                                  <form action="index.php" method="post">
				                          <input type="password" name="admin_password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">

				                      </div>
				                      <div class="modal-footer centered">
				                          <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
				                          <button class="btn btn-theme03"  type="submit">Unlock</button>

                                </form>
                                <a href="login.php"><button onclick="login()" class="btn btn-theme02" type="button">login</button></a>
				                      </div>
				                  </div>
				              </div>
				          </div>
				          <!-- modal -->


	  				</div><!--/lock-screen -->
	  			</div><!-- /col-lg-4 -->

	  	</div><!-- /container -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../assets/img/login-bg.jpg", {speed: 500});
    </script>

    <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>


<?php if ($_GET['status']=="password-wrong") { ?>
    swal({
          title: "Enter failed",
          text: "Password is wrong",
          icon: "warning",
          dangerMode: true,
        })
<?php } ?>
</script>

  </body>
</html>