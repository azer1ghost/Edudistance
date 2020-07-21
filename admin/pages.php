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

    <title>CMS - Pages</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/w3.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <!--main content start-->

      <!-- Modal create new page -->
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Create New Page</h4>
              </div>
              <div class="modal-body">

                  <form id="addnewpage" onsubmit="return false" >
                    <input type="hidden" name="addnew" value="addnew">
                      <div class="form-group">
                          <label for="name">Page name*:</label>
                          <input required type="text" class="form-control" placeholder="Enter page name" id="name" name="pagename">
                      </div>
                      <div class="form-group">
                          <label for="pagetitle">(SEO) Page Title*:</label>
                          <input required type="text" class="form-control" placeholder="Enter page title" id="pagetitle" name="pagetitle">
                      </div>
                      <div class="form-group">
                          <label for="author">(SEO) Page author:</label>
                          <input type="text" class="form-control" placeholder="Enter page author" id="author" name="author">
                      </div>
                      <div class="form-group">
                          <label for="description">(SEO) Google Descripton:</label>
                          <textarea style="height: 90px" class="form-control" placeholder="Enter descripton" id="description" name="description"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="keywords">(SEO) Google Keywords:</label>
                          <textarea style="height: 80px" class="form-control" placeholder="Enter keywords" id="keywords" name="keywords"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="sel1">Select library name (select one):</label>
                        <select class="form-control" id="sel1" name="library_name">
                          <?php $libsor=$db->prepare("SELECT * FROM `library` ORDER BY `lib_id` ASC");
                                $libsor->execute();
                                while($libprint=$libsor->fetch(PDO::FETCH_ASSOC)){  ?>
                                  <option value="<?php echo $libprint['lib_name'] ?>"><?php echo $libprint['lib_name'] ?></option>
                          <?php } ?>
                      </select>
                    </div>
                      <div class="form-group">
                          <label for="datetime">Dade:</label>
                          <input type="date" id="theDate" class="form-control"  name="datetime">
                      </div>

                      <div class="form-group">
                          <label for="code">Codes:</label>
                          <textarea style="height: 190px" class="form-control" placeholder="Enter Html codes" id="code" name="code"></textarea>
                      </div>
                      <button type="button" onclick="AddNewPage()" class="btn btn-default">Create</button>
                  </form>


              </div>
              <div class="modal-footer">
                  <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>

      </div>
  </div>
  <!------------------------------------------------------------------------------------------------->

  <form id="removePages" onsubmit="return false">
    <input type="hidden" name="pagedell" value="ok">



      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Pages</h3>
            <hr>
            <menu style="padding:10px" id="nestable-menu">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create new</button>
             <button type="submit" id="DeleteAll"  class="btn btn-danger" style="display:none;float:left; margin-right:10px" ><i class="fa fa-trash-o"></i> Delete selected</button>
            </menu>

          	<div class="row mt">
          		<div class="col-lg-12"><br>
          		</div>
          	</div>

<!--GEt CONTENTs-=== -->
  <div class="row" id="load_data"></div>
<!--GEt CONTENTs -->
</form>

  <div id="load_data_message"></div>
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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/url2img.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->

    <script src="script.js"></script>

<script type="text/javascript">


/////////////////////////////////////////////////////////////////////////////////////////////////
//Get contents
$(document).ready(function() {

    var limit = 8;
    var start = 0;
    var action = 'inactive';

    function load_country_data(limit, start) {
        $.ajax({
            url: "getcontents.php",
            method: "POST",
            data: {
                limit: limit,
                start: start
            },
            cache: false,
            success: function(data) {
                $('#load_data').append(data);
                if (data == '') {
                    $('#load_data_message').html("<p style=\"color: blue\">All pages was downloaded.</p>");
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
</html>
