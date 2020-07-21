<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

  $slidesor=$db->prepare("select * from `slider` where slider_id=:id");
  $slidesor->execute(array('id' => $_POST['slider_id']));
  $slideprint=$slidesor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page Setting</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- Bootstrap core CSS -->

<div class="container">
  <h2>Page setting</h2>
    <form id="updatepost" onsubmit="return false" >
      <input type="hidden" name="sliderpicoptions" value="change">
      <input type="hidden" name="slider_id" value="<?php echo $slideprint['slider_id'] ?>">

      <div class="form-group">
          <label for="slider_picurl">Picture url*:</label>
          <input required type="text" class="form-control" value="<?php echo $slideprint['slider_picurl'] ?>" id="slider_picurl" name="slider_picurl">
      </div>

      <div class="form-group">
          <label for="slider_link">Picture link*:</label>
          <input required type="text" class="form-control" placeholder="Enter slider link" value="<?php echo $slideprint['slider_link'] ?>" id="slider_link" name="slider_link">
      </div>

        <button type="submit" class="btn btn-default">Update</button>
    </form>
  </div>
    <!-- js placed at the end of the document so the pages load faster -->
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
                data: $('#updatepost').serialize(),
                success: function () {
                  swal("Successfully!", "Your slider setting was updated!", "success");
                }
              });

            });

          });


        </script>




  </body>
</html>
