<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

 $contentsor=$db->prepare("select * from `menu` where id=:id");
 $contentsor->execute(array('id' => $_POST['menu_id']));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menu Setting</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- Bootstrap core CSS -->

<div class="container">
  <h2>menu setting</h2>
    <form id="updatemenu" onsubmit="return false" >
      <input type="hidden" name="menuupdate" value="menuupdate">
      <input type="hidden" name="menu_id" value="<?php echo $print['id'] ?>">
      <div class="form-group">
          <label for="menu_name">Menu name*:</label>
          <input required type="text" class="form-control" placeholder="Enter menu name" value="<?php echo $print['menu_name'] ?>" id="menu_name" name="menu_name">
      </div>

      <div class="form-group">
          <label for="menu_link">Menu link:</label>
          <textarea style="height: 90px" class="form-control" placeholder="Enter link"  id="menu_link" name="menu_link"><?php echo $print['menu_link'] ?></textarea>
      </div>

    <div class="col-md-12">


        <label for="optionsRadios1" >Menu durumu</label>
        <div class="radio">
           <?php if  ($print['menu_durum']=="1"){ ?>

              <label>
                  <input type="radio" name="menu_durum" id="optionsRadios1" value="1" checked="">Aktiv
              </label>

              <label>
                  <input type="radio" name="menu_durum" id="optionsRadios1" value="0" >Passiv
              </label>
<?php } else { ?>
              <label>
                  <input type="radio" name="menu_durum" id="optionsRadios1" value="1" >Aktiv
              </label>

              <label>
                  <input type="radio" name="menu_durum" id="optionsRadios1" value="0" checked="">Passiv
              </label>
<?php } ?>

          <label style="padding-left:20px" >BLANK</label>
          <?php if ($print['menu_blank']==1) {?>
                  <input type="checkbox" class="form-check"  value="1" name="menu_blank" checked>
                <?php }  elseif ($print['menu_blank']==0) {?>
                   <input type="checkbox" class="form-check"  value="1" name="menu_blank" >
          <?php }?>


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
                  swal("Successfully!", "Your menu setting was updated!", "success");
                }
              });

            });

          });
        </script>

  </body>
</html>
