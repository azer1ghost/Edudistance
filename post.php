<?php
include 'setting/connect.php';  //baglanti temin edildi *
include 'setting/function.php';

$opsor=$db->prepare("select * from `mainoptions` where option_id=:id");
$opsor->execute(array('id' => 1));
$opprint=$opsor->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['post_id'])) {
  $bgsor=$db->prepare("select * from `blog` where blog_id=:id");
  $bgsor->execute(array('id' => $_GET['post_id'] ));
  $bgprint=$bgsor->fetch(PDO::FETCH_ASSOC);

  $view = $bgprint['blog_view'] + 1;

  $save=$db->prepare("UPDATE blog SET  #tablo adi

  #sutun adi--> leqebi
  blog_view=:a

  WHERE blog_id={$_GET['post_id']}");
  $update=$save->execute(array(

   #sutun leqebi --> adi
  'a'=> $view

  ));

}

?>
<base href="<?php echo $sitename ?>" target="">
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">

    <title>
        <?php echo $bgprint['blog_title'] //title?>
    </title>

    <meta name="description" content="<?php echo $bgprint['blog_desc'] ?>">
    <meta name="keywords" content="<?php echo $bgprint['blog_keywords'] ?>">
    <meta name="author" content="<?php echo $bgprint['blog_author'] ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo $opprint['option_favicion'] ?>">
  	<link href="https://fonts.googleapis.com/css?family=Exo+2:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="navbar/css/stellarnav.css">
    <!-- Stylesheets -->

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

    <div class="<?php echo $addlib['lib_mainclass'];?>" >
      <?php //content
        include 'blog/post.php'
      ?>
    <div>

    <!--#########################################################################-->

    <?php //footer
      include 'footer.php'
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
