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

    <title>CMS - Slider</title>

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
        <h3><i class="fa fa-angle-right"></i> Slider </h3>
        <menu style="padding:10px" id="nestable-menu">
            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Upload new</button>
            <!--    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i> Select from gallery</button> -->
            <button type="button" style="display:none;float:left; margin-right:10px" id="DeleteAll" class="btn btn-danger" onclick="deleteSliderAllImage()"><i class="fa fa-trash-o"></i> Delete selected</button>
        </menu>
        <!--GEt CONTENTs-=====================================================  -->
        <div class="content-panel col-md-5">

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>№</th>
                        <th><i class="fa fa-image"></i> Slides</th>
                    </tr>
                </thead>
                <tbody>

                    <form id="Gallery" onsubmit="return false">

  <?php
        $slide=$db->prepare("SELECT * from slider order by slider_id DESC");
        $slide->execute();
        $num=0;
  while($print=$slide->fetch(PDO::FETCH_ASSOC)){
        $num++;
    ?>

                            <tr>
                                <td>
                                    <?php echo $num ?>
                                </td>

                                <td>
                                  <div  style="max-width:300px;float:left;">
                                      <?php if($print['slider_durum']==1){ ?>

                                      <div class="switch switch-square" onclick="sendDurum(<?php echo $print['slider_id'] ?>)" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                                          <input class="durumu" id="<?php echo $print['slider_id'] ?>" name="slider_durum" type="checkbox" checked />
                                      </div>

                                      <?php } else { ?>

                                      <div class="switch switch-square" onclick="sendDurum(<?php echo $print['slider_id'] ?>)" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                                          <input class="durumu" id="<?php echo $print['slider_id'] ?>" name="slider_durum" type="checkbox" />
                                      </div>

                                      <?php } ?>
                                  </div>

                                  <div style="padding-left: 10px; float:left;">
                                    <button onclick="openWindowWithPostRequest(<?php echo $print['slider_id'] ?>)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <input style="margin-left:100px;" onclick="ShowDeleteBTN()" class="checked" type="checkbox" id="<?php echo $print['slider_picurl'] ?>" name="Allimage[]" value="<?php echo $print['slider_picurl'] ?>">
                                  </div>

                                    <div style="max-width:300px">
                                        <label for="<?php echo $print['slider_picurl'] ?>">
                                          <img style="width:100%" src="../images/<?php echo $print['slider_picurl'] ?>">
                                        </label>
                                    </div>
                                </td>

                            </tr>
                            <?php } ?>
                    </form>
                </tbody>
            </table>
        </div>

<div style="float:right" class="content-panel col-md-4">

<h2>slider options <span class="label label-info label-mini">Premium</span></h2>
<p style="color:green;">comming soon</p>

<div>



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

          /////////////////////////////////////////////////////////////////////////////////////////////////
          // setting change ajax post popub window
          function openWindowWithPostRequest(id) {
                var winName='Setting';
                var winURL='sliderpopup.php';
                var windowoption='resizable=yes,height=400,width=300,location=0,menubar=0,scrollbars=1';
                var params = { 'slider_id' : id};
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
          success: function () {}
          });

}

</script>

  </body>
</html>
