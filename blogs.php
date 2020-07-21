<?php
include 'setting/connect.php';  //baglanti temin edildi *
include 'setting/function.php';

$opsor=$db->prepare("select * from `mainoptions` where option_id=:id");
$opsor->execute(array('id' => 1));
$opprint=$opsor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="UTF-8">

    <title>
        Blog
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


    <!--#########################################################################-->

    <div class="<?php echo $addlib['lib_mainclass'];?>" >
      <?php //content
        include 'blog/blogs.php'
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



      /////////////////////////////////////////////////////////////////////////////////////////////////
      //Get contents
      $(document).ready(function() {

          var limit = 2;
          var start = 0;
          var action = 'inactive';

          function load_country_data(limit, start) {
              $.ajax({
                  url: "blog/getblogs.php",
                  method: "POST",
                  data: {
                      limit: limit,
                      start: start,
                      <?php if (isset($_GET['search'])) { ?>search: '<?php echo $_GET['search'] ?>', <?php } ?>
                      <?php if (isset($_GET['group'])) { ?>group: '<?php echo $_GET['group'] ?>', <?php } ?>
                  },
                  cache: false,
                  success: function(data) {
                      $('#load_data').append(data);
                      if (data == '') {
                          $('#load_data_message').html("<p style=\"color: blue\">All pages was downloaded.</p>");
                          action = 'active';
                      } else {
                          var texttoshow = "Scroldown for load more page"
                          $('#load_data_message').html(texttoshow);
                          action = "inactive";
                      }
                  }
              });
          }

          if (action == 'inactive') {
              action = 'active';
              load_country_data(limit, start);
          }


            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                    action = 'active';
                    start = start + limit;
                    setTimeout(function() {
                        load_country_data(limit, start);
                    }, 100);
                }
            });

      });



      /////////////////////////////////////////////////////////////////////////////////////////////////
    </script>
  </body>
</html>
