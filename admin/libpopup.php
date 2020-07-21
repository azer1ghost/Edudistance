<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

 $libsor=$db->prepare("select * from `library` where lib_id=:id");
 $libsor->execute(array('id' => $_POST['lib_id']));
 $print=$libsor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Library Setting</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- Bootstrap core CSS -->

<div class="container">
  <h2>menu setting</h2>
    <form id="updatemenu" onsubmit="return false" >
      <input type="hidden" name="libupdate" value="libupdate">
      <input type="hidden" name="lib_id" value="<?php echo $print['lib_id'] ?>">
      <div class="form-group">
          <label for="lib_name">Library name*:</label>
          <input required type="text" class="form-control" placeholder="Enter menu name" value="<?php echo $print['lib_name'] ?>" id="lib_name" name="lib_name">
      </div>

      <div class="form-group">
          <label for="lib_headcode">Library header codes:</label>
          <textarea style="height: 220px" class="form-control" placeholder="Enter link"  id="lib_headcode" name="lib_headcode"><?php echo $print['lib_headcode'] ?></textarea>
      </div>

      <div class="form-group">
          <label for="lib_footercode">Library footer codes:</label>
          <textarea style="height: 220px" class="form-control" placeholder="Enter link"  id="lib_footercode" name="lib_footercode"><?php echo $print['lib_footercode'] ?></textarea>
      </div>

        <button type="submit" class="btn btn-default">Update</button>
    </form>
  </div>
    <!-- js placed at the end of the document so the menus load faster -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
          $(function () {

            $('form').on('submit', function (e) {

              e.preventDefault();

              $.ajax({
                type: 'post',
                url: '../setting/engine.php',
                data: $('form').serialize(),
                success: function () {
                  swal("Successfully!", "Your library setting was updated!", "success");
                }
              });

            });

          });
        </script>

  </body>
</html>
