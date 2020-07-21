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

    <title>CMS - Library</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../assets/css/dropzone.css" rel="stylesheet">

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
          <h4 class="modal-title">Upload New Images</h4>
        </div>
        <div class="modal-body">
          <form action="../setting/imgupload.php" class="dropzone"  id="my-awesome-dropzone">

          </form>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------------------------------------->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Library </h3>
        <menu style="padding:10px" id="nestable-menu">
            <br>
      <!--        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Upload new</button>
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i> Select from gallery</button> -->
            <button type="button" style="display:none;float:left; margin-right:10px" id="DeleteAll" class="btn btn-danger" onclick="deleteSliderAllImage()"><i class="fa fa-trash-o"></i> Delete selected</button>
        </menu>
        <!--GEt CONTENTs-=====================================================  -->
        <div class="content-panel col-md-5">

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>№</th>
                        <th><i class="fa fa-book"></i> Library Names</th>
                        <th><i class="fa fa-button"></i> Library Names</th>
                    </tr>
                </thead>
                <tbody>

                    <form id="Gallery" onsubmit="return false">

  <?php
        $lib=$db->prepare("SELECT * from library order by lib_id DESC");
        $lib->execute();
        $num=0;
  while($libprint=$lib->fetch(PDO::FETCH_ASSOC)){
        $num++;
    ?>

                            <tr>
                                <td>
                                    <?php echo $num ?>
                                </td>

                                <td>
                                  <p><?php echo $libprint['lib_name'] ?></p>
                                </td>

                                <td>
                                  <p> <i onclick="openWindowWithPostRequest(<?php echo $libprint['lib_id'] ?>)"class="fa fa-cog fa-2x"></i> </p>
                                </td>

                            </tr>
                            <?php } ?>
                    </form>
                </tbody>
            </table>
        </div>




<!--GEt CONTENTs -->

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
<script src="../assets/js/bootstrap-switch.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/jquery.scrollTo.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<!--common script for all pages-->
<script src="../assets/js/common-scripts.js"></script>
<!--script for this page-->
<script src="script.js"></script>
<script src="../assets/js/dropzone.js"></script>
<script type="text/javascript">
    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 10, // MB
  acceptedFiles: '.gif,.jpg,.png,.jpe,.jpeg,.JPG',
  params  : {
          sliderimgadd : 'ok'
      },
  queuecomplete: function(){
    reloadPage()
  },

  };
</script>



<script type="text/javascript">

function sendDurum(id) {

  if ($("#"+id).is(':checked')) {
      var status = 1;
    }
    else {
      var status = 0;
    }
    $.ajax({
           type: 'post',
           url: '../setting/imgupload.php',
           data: {
                  slider_id: id,
                  slider_durum: status,
                  sliderDurumCH: "ok"
                  },
          success: function () { }
          });

}

</script>



<script type="text/javascript">

/////////////////////////////////////////////////////////////////////////////////////////////////
// setting change ajax post popub window
function openWindowWithPostRequest(id) {
      var winName='Setting';
      var winURL='libpopup.php';
      var windowoption='resizable=yes,height=600,width=1000,location=0,menubar=0,scrollbars=1';
      var params = { 'lib_id' : id};
      var form = document.createElement("form");
      form.setAttribute("method", "post");
      form.setAttribute("action", winURL);
      form.setAttribute("target",winName);
      for (var i in params) {
        if (params.hasOwnProperty(i)) {
          var input = document.createElement('input');
          input.type = 'hidden';
          input.name = i;
          input.value = params[i];
          form.appendChild(input);
        }
      }
      document.body.appendChild(form);
      window.open('', winName,windowoption);
      form.target = winName;
      form.submit();
      document.body.removeChild(form);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
</script>
  </body>
</html>
