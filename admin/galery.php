<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS - Gallery</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../assets/css/dropzone.css" rel="stylesheet">
    <link href="../assets/css/w3.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
        .column {
          display: none; /* Hide all elements by default */
        }
        .show {
          display: block;
        }
    </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
    <?php include 'header.php' ?>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
    <?php include 'sidebar.php' ?>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->


      <!-- Modal create new page -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload New Images</h4>
        </div>
        <div class="modal-body">
          <form class="dropzone" action="../setting/imgupload.php"  id="myAwesomeDropzone">
            <input type="hidden" name="test" value="ok">
          </form>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------------------->


    <!-- Modal create new page -->
<div class="modal fade" id="catecoryModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change selected images catecory</h4>
        </div>
        <div class="modal-body">
            <select class="form-control" id="library" name="library">
              <option disabled selected >Select one</option>
              <?php $Catsor=$db->prepare("SELECT * FROM `galerycatecory` ORDER BY `catecory_id` ASC");
                    $Catsor->execute();
                    while($catprint=$Catsor->fetch(PDO::FETCH_ASSOC)){  ?>
                      <option value="<?php echo $catprint['catecory_name'] ?>" ><?php echo $catprint['catecory_name'] ?></option>
              <?php } ?>
            </select><br>
            <button type="button" class="btn btn-primary" onclick="addCatecory()" ><i class="fa fa-folder-open-o"></i> Change catecory</button>
            <button type="button" class="btn btn-success" onclick="createCatecory()" ><i class="fa fa-plus"></i> Create new catecory</button>
        <!--    <button type="button" class="btn btn-danger" onclick="createCatecory()" ><i class="fa fa-trash-o"></i> Delete catecory</button> -->
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------------------->






      <!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
  	<h3><i class="fa fa-angle-right"></i> Gallery</h3>
  	<hr>
    <menu style="padding:10px" >
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Upload new</button>
        <button type="button" style="display:none;float:left; margin-right:10px" id="DeleteAll" class="btn btn-danger" onclick="deleteAllImage()" ><i class="fa fa-trash-o"></i> Delete selected</button>
    <!--    <button type="button" style="display:none;float:left; margin-right:10px" id="CatChange" class="btn btn-primary" data-toggle="modal" data-target="#catecoryModal"><i class="fa fa-folder-open-o"></i> Change catecory</button> -->
    </menu>
      <div id="load_data_message"></div>
          <form id="Gallery" onsubmit="return false">
            <input type="hidden" id="catname" name="catname" >
              <!-- /galery -->
			          <div class="row" id="load_data"></div>
              <!-- /galery -->
          </form>
		    </section><!--/wrapper -->
    </section><!-- /MAIN CONTENT -->


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content end-->
      <!--footer start-->
<?php include 'copyright.php'; ?>
      <!--footer end-->
  </section>

    <script src="../assets/js/dropzone.js"></script>
    <script type="text/javascript">
            // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 10, // MB
        acceptedFiles: ".jpg,.png,.jpeg,.gif,.JPG",
        params  : {
                galleryimgadd : 'ok'
            },
        queuecomplete: function(){
          reloadPage()
        },

        };

    </script>




<!-- js placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery-1.10.2.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/jquery.scrollTo.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/js/fancybox/jquery.fancybox.js"></script>
    <!--common script for all pages-->
<script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->
<script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
</script>

<script src="script.js"></script>

<script type="text/javascript">
/////////////////////////////////////////////////////////////////////////////////////////////////
//Get galery
$(document).ready(function() {

    var limit = 6;
    var start = 0;
    var action = 'inactive';

    function load_country_data(limit, start) {
        $.ajax({
            url: "getgallery.php",
            method: "POST",
            data: {
                limit: limit,
                start: start
            },
            cache: false,
            success: function(data) {
                $('#load_data').append(data);
                if (data == '') {
                    $('#load_data_message').html("<p style=\"color: blue\">All images was downloaded.</p>");
                    action = 'active';
                } else {
                    var texttoshow = "<i class=\"fa fa-spinner w3-spin\" style=\"font-size:24px;color:green\"></i> Scroldown for load more page<br>"
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
