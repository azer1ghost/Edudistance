<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

if (isset($_POST['blog_id'])) {
  $blogsor=$db->prepare("select * from `blog` where blog_id=:id");
  $blogsor->execute(array('id' => $_POST['blog_id']));
  $blogprint=$blogsor->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['blog_id'])) {
  $blogsor=$db->prepare("select * from `blog` where blog_id=:id");
  $blogsor->execute(array('id' => $_GET['blog_id']));
  $blogprint=$blogsor->fetch(PDO::FETCH_ASSOC);
}


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
      <input type="hidden" name="blogoptions" value="change">
      <input type="hidden" name="blog_id" value="<?php echo $blogprint['blog_id'] ?>">
      <div class="form-group">
          <label for="blog_name">Post name*:</label>
          <input required type="text" class="form-control" placeholder="Enter post name" value="<?php echo $blogprint['blog_name'] ?>" id="blog_name" name="blog_name">
      </div>
      <div class="form-group">
          <label for="blog_title">(SEO) Post Title*:</label>
          <input required type="text" class="form-control" placeholder="Enter post title" value="<?php echo $blogprint['blog_title'] ?>" id="blog_title" name="blog_title">
      </div>
      <div class="form-group">
          <label for="blog_wallpaper">Post Picture*:</label>
          <input required type="text" class="form-control" placeholder="Enter post wallpaper" value="<?php echo $blogprint['blog_wallpaper'] ?>" id="blog_wallpaper" name="blog_wallpaper">
      </div>
      <div class="form-group">
          <label for="blog_tag">Post Tags:</label>
          <input type="text" class="form-control" placeholder="Enter post tags" value="<?php echo $blogprint['blog_tag'] ?>" id="blog_tag" name="blog_tag">
      </div>

      <div class="form-group">
          <label for="blog_keywords">(SEO) Google Keywords:</label>
          <textarea style="height: 80px" class="form-control" placeholder="Enter keywords"  id="blog_keywords" name="blog_keywords"><?php echo $blogprint['blog_keywords'] ?></textarea>
      </div>
        <div class="form-group">
          <label for="sel1">Select catecory name (select one):</label>
          <select required class="form-control" id="sel1" name="blog_group">
            <?php $libsor=$db->prepare("SELECT * FROM `bloggroup` ORDER BY `blog_id` ASC");
                  $libsor->execute();
                  while($libprint=$libsor->fetch(PDO::FETCH_ASSOC)){  ?>
                    <option <?php if( $libprint['blog_id'] == $blogprint['blog_group'] ){ echo "selected"; } ?> value="<?php echo $libprint['blog_id'] ?>"><?php echo $libprint['blog_group'] ?></option>
            <?php } ?>
        </select>
      </div>
        <div class="form-group">
            <label for="blog_date">Dade:</label>
            <input type="date" id="blog_date" class="form-control" value="<?php echo $blogprint['blog_date'] ?>"  name="blog_date">
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
                  swal("Successfully!", "Your page setting was updated!", "success");
                }
              });

            });

          });


        </script>

  </body>
</html>
