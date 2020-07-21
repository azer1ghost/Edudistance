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
    <title>CMS - Admin page</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
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
        <h4 class="modal-title">Create New Admin</h4>
      </div>
      <div class="modal-body">
        <form id="addnewadmin" onsubmit="return false" >
          <input type="hidden" name="adminadd" value="adminadd">

            <div class="form-group">
                <label for="admin_name">Admin Name*:</label>
                <input required type="text" class="form-control" placeholder="Enter name" id="admin_name" name="admin_name">
            </div>

            <div class="form-group">
                <label for="admin_surname">Admin Username*:</label>
                <input required type="text" class="form-control" placeholder="Enter login" id="admin_surname" name="admin_surname">
            </div>

            <div class="form-group">
                <label for="admin_login">Admin Login*:</label>
                <input required type="text" class="form-control" placeholder="Enter name" id="admin_login" name="admin_login">
            </div>

            <div class="form-group">
                <label for="admin_password">Admin Password:</label>
                <input required type="text" class="form-control" placeholder="Enter User Password" id="admin_password" name="admin_password">
            </div>

            <div class="form-group">
                <label for="admin_mission">Admin Rank:</label>
              <select class="form-control" name="admin_mission" id="admin_mission" >
                <option value="President">President</option>
                <option value="Designer">Designer</option>
                <option value="Blogger">Blogger</option>
              </select>
            </div>

            <div class="clearfix"></div>

            <button type="submit" class="btn btn-default">Create</button>
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
          	<h3><i class="fa fa-angle-right"></i>Admin Page</h3>
            <menu style="padding:10px" id="nestable-menu">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New</button>
            </menu>
<!--GEt CONTENTs-=====================================================  -->
<div class="row mt">
                  <div class="col-md-7">
                      <div class="content-panel">


                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Username</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class="fa fa-bookmark"></i> Misson</th>
                                  <th><i class="fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
<?php $adminrow=$db->prepare("SELECT * from admin order by admin_id ");
      $adminrow->execute();
while($printadmin=$adminrow->fetch(PDO::FETCH_ASSOC)){  ?>

                              <tr>
                                  <td><a href="#">@<?php echo $printadmin['admin_login'] ?></a></td>
                                  <td class="hidden-phone"><?php echo $printadmin['admin_name']." ".$printadmin['admin_surname'] ?></td>
                                  <td><?php echo $printadmin['admin_mission'] ?></td>
                                  <td>
                                    <?php if  ($printadmin['admin_durum']=="1"){ ?>
                                      <span class="label label-info label-mini">Active</span>
                                    <?php } else { ?>
                                      <span class="label label-danger label-mini">Passive</span>
                                    <?php } ?>
                                  </td>
                                  <td>

                                    <?php if($_SESSION['cms_admin_login']=="admin"){ ?>

                                      <button class="btn btn-primary btn-xs"><i onclick="openWindowWithPostRequest(<?php echo $printadmin['admin_id'] ?>)" class="fa fa-pencil"></i></button>

                                    <?php } if  ($printadmin['admin_mission']=="Developer"){ }  else {?>

                                    <?php if($_SESSION['cms_admin_login']!="admin"){ ?>
                                      <button onclick="openWindowWithPostRequest(<?php echo $printadmin['admin_id'] ?>)" class="btn btn-primary btn-xs"><i  class="fa fa-pencil"></i></button>
                                    <?php } ?>
                                      <button onclick="adminDelete(<?php echo $printadmin['admin_id'] ?>, '<?php echo $printadmin['admin_name'] ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                    <?php } ?>


                                  </td>
                              </tr>
<?php } ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->

                  <div class="col-md-5">
                      <div class="content-panel">


                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Ip address <span class="label label-info label-mini">Premium</span></th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Access </th>
                              </tr>
                              </thead>
                              <tbody>

                              <tr>
                                  <td>192.168.1.104</td>
                                  <td>true</td>
                              </tr>

                              <tr>
                                  <td>192.168.1.102</td>
                                  <td>true</td>
                              </tr>

                              <tr>
                                  <td>192.168.1.120</td>
                                  <td>true</td>
                              </tr>

                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
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
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->
<script type="text/javascript">
////////////////////////////////////////////////////////////////////////////////////////////////
// setting change ajax post popub window
function openWindowWithPostRequest(id) {
      var winName='Setting';
      var winURL='adminpopup.php';
      var windowoption='resizable=yes,height=800,width=1366,location=0,menubar=0,scrollbars=1';
      var params = { 'admin_id' : id};
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

function reloadPage()
 {
   window.location.reload()
 }
//////////////////////////////////////////////////////////////////////////////////////////////////
$(function () {

  $('#addnewadmin').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '../setting/engine.php',
      data: $('form').serialize(),
      success: function () {
        swal("Successfully!", "Your new user created!", "success").then(function(result){
          reloadPage();
       })

      }
    });

  });

});
/////////////////////////////////////////////////////////////////////////////////////////////////////////

      function adminDelete(admin_id,admin_name)
      {

      swal({
        html:true,
        title: "Are you sure delete *"+admin_name+"* user?",
        text: "Once deleted, you will not be able to recover this user !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          removeAdmin(admin_id);
        } else {
          swal("Your page is safe!");
        }
      });
      }

      /////////////////////////////////////////////////////////////////////////////////////////////////
      function removeAdmin(id){

          var url = "../setting/engine.php"; // the script where you handle the form input.

          $.ajax({
                 type: "POST",
                 url: url,
                 data: {admin_id: id, admindelete: 'ok'}, // serializes the form's elements.
                 success: function ()
                 {
                   swal("Poof! User has been deleted!", {
                     icon: "success",
                   }).then(function(result){
                     reloadPage();
                  })

                 }
               });
             }
      /////////////////////////////////////////////////////////////////////////////////////////////////

</script>


  </body>
</html>
