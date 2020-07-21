<?php
include 'setting/connect.php';  //baglanti temin edildi *
include 'setting/function.php';


if (isset($_GET['page_id'])){

  $get_page_id = $_GET['page_id'];

} else {

  $home = 1;
  $control=$db->prepare("select * from `pages` where page_home=:id");
  $control->execute(array('id' => $home));
  $get=$control->fetch(PDO::FETCH_ASSOC);

  $get_page_id = $get['page_id'];
}

$contentsor=$db->prepare("select * from `pages` where page_id=:id");
$contentsor->execute(array('id' => $get_page_id ));
$print=$contentsor->fetch(PDO::FETCH_ASSOC);

$libsor=$db->prepare("select * from `library` where lib_name=:a");
$libsor->execute(array('a' => $print['library_name']));
$addlib=$libsor->fetch(PDO::FETCH_ASSOC);

$opsor=$db->prepare("select * from `mainoptions` where option_id=:id");
$opsor->execute(array('id' => 1));
$opprint=$opsor->fetch(PDO::FETCH_ASSOC);
?>

 <base href="<?php echo $sitename ?>" target="">

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">

    <title>
        <?php echo $print['page_title'] //title?>
    </title>

    <meta name="description" content="<?php echo $print['page_desc'] ?>">
    <meta name="keywords" content="<?php echo $print['page_keywords'] ?>">
    <meta name="author" content="<?php echo $print['page_author'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo $opprint['option_favicion'] ?>">
  	<link href="https://fonts.googleapis.com/css?family=Exo+2:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="navbar/css/stellarnav.css">

    <?php //style
      echo $addlib['lib_headcode'];
      include 'navbar/theme.php';
    ?>

  </head>

  <body>
    <!--#########################################################################-->
    <?php //header
      include 'header.php'
     ?>
    <!--#########################################################################-->

      <?php
            if ($home == 1) {
              include 'slider.php';
            }
      ?>

    <!--#########################################################################-->
    <div class="<?php echo $addlib['lib_mainclass'];?>" >
      <?php //content
        echo $print['page_content'];
      ?>
    <div>
    <!--#########################################################################-->
    <?php //footer
      include 'footer.php'
    ?>
    <!--#########################################################################-->
    <?php //scripts
      echo $addlib['lib_footercode'];
    ?>
    <!--#########################################################################-->
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  	<script type="text/javascript" src="navbar/js/stellarnav.js"></script>

    <div id="data" style="display: none;">
      <?php
        ob_start(); // turn on output buffering
        include('navbar/footerlinks.php');
        $res = ob_get_contents(); // get the contents of the output buffer
        ob_end_clean(); //  clean (erase) the output buffer and turn off output buffering
        echo $res;
      ?>
    </div>
    <script type="text/javascript">

      var data = $("#data").html();
      $("#footerlinks").append(data);

      $(document).ready(function(){
          $("#thisYear").text((new Date).getFullYear());
      });
    </script>

  </body>
</html>
