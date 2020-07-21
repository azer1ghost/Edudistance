<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include 'country.php';
 $contentsor=$db->prepare("select * from `admin` where admin_id=:id");
 $contentsor->execute(array('id' => $_POST['admin_id']));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin Setting</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- Bootstrap core CSS -->

<div class="container">
  <h2>Admin setting</h2>
    <form id="updateadmin" onsubmit="return false" >
      <input type="hidden" name="admin_picurl" value="<?php echo $print['admin_picurl'] ?>">
      <input type="hidden" name="admin_id" value="<?php echo $print['admin_id'] ?>">

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
          <label for="admin_login">Admin Username*:</label>
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

    <div class="col-md-12">

      <label for="optionsRadios1">Admin status</label>
        <div class="radio">
           <?php if  ($print['admin_durum']=="1"){ ?>

              <label>
                  <input type="radio" name="admin_durum" id="optionsRadios1" value="1" checked="">Allow
              </label>

              <label>
                  <input type="radio" name="admin_durum" id="optionsRadios1" value="0" >Passive
              </label>
<?php } else { ?>
              <label>
                  <input type="radio" name="admin_durum" id="optionsRadios1" value="1" >Allow
              </label>

              <label>
                  <input type="radio" name="admin_durum" id="optionsRadios1" value="0" checked="">Passive
              </label>
<?php } ?>

      </div>

        <button type="submit" class="btn btn-default">Update</button>
    </form>
  </div>
    <!-- js placed at the end of the document so the admins load faster -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
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
