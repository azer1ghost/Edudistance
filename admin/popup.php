<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

 $contentsor=$db->prepare("select * from `pages` where page_id=:id");
 $contentsor->execute(array('id' => $_POST['page_id']));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

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
    <form id="updatepage" onsubmit="return false" >
      <input type="hidden" name="updatecontent" value="updatecontent">
      <input type="hidden" name="page_id" value="<?php echo $print['page_id'] ?>">
      <div class="form-group">
          <label for="name">Page name*:</label>
          <input required type="text" class="form-control" placeholder="Enter page name" value="<?php echo $print['page_name'] ?>" id="name" name="pagename">
      </div>
      <div class="form-group">
          <label for="pagetitle">(SEO) Page Title*:</label>
          <input required type="text" class="form-control" placeholder="Enter page title" value="<?php echo $print['page_title'] ?>" id="pagetitle" name="pagetitle">
      </div>
      <div class="form-group">
          <label for="author">(SEO) Page author:</label>
          <input type="text" class="form-control" placeholder="Enter page author" value="<?php echo $print['page_author'] ?>" id="author" name="author">
      </div>
      <div class="form-group">
          <label for="description">(SEO) Google Descripton:</label>
          <textarea style="height: 90px" class="form-control" placeholder="Enter descripton"  id="description" name="description"><?php echo $print['page_desc'] ?></textarea>
      </div>
      <div class="form-group">
          <label for="keywords">(SEO) Google Keywords:</label>
          <textarea style="height: 80px" class="form-control" placeholder="Enter keywords"  id="keywords" name="keywords"><?php echo $print['page_keywords'] ?></textarea>
      </div>
        <div class="form-group">
          <label for="sel1">Select library name (select one):</label>
          <select class="form-control" id="sel1" name="library_name">
            <?php $libsor=$db->prepare("SELECT * FROM `library` ORDER BY `lib_id` ASC");
                  $libsor->execute();
                  while($libprint=$libsor->fetch(PDO::FETCH_ASSOC)){  ?>
                    <option <?php if( $libprint['lib_name'] == $print['library_name'] ){ echo "selected"; } ?> value="<?php echo $libprint['lib_name'] ?>"><?php echo $libprint['lib_name'] ?></option>
            <?php } ?>
        </select>
      </div>
        <div class="form-group">
            <label for="datetime">Dade:</label>
            <input type="date" id="theDate" class="form-control" value="<?php echo $print['page_date'] ?>"  name="datetime">
        </div>

        <div class="form-group">
            <label for="code">Codes:</label>

            <textarea style="height: 190px" class="form-control" placeholder="Enter Html codes"  id="code" name="code">

                <?php echo $print['page_content'] ?>

            </textarea>

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
                data: $('form').serialize(),
                success: function () {
                  swal("Successfully!", "Your page setting was updated!", "success");
                }
              });

            });

          });
        </script>

  </body>
</html>
