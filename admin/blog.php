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

    <title>CMS - Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
      .selectedrow{
        background-color: #76acd87d;
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
      <!--main content start-->

      <!-- Modal create new page -->
      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Post</h4>
      </div>
      <div class="modal-body">
        <form id="newBlogposts" onsubmit="return false" >
          <input type="hidden" name="Blogadd" value="addnew">
          <input type="hidden" name="blog_author" value="<?php echo $admin ?>">
            <div class="form-group">
                <label for="newblog_name">Post name*:</label>
                <input required type="text" class="form-control" placeholder="Enter post name" id="newblog_name" name="blog_name">
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


      <!-- Modal create new page -->
      <div class="modal fade" id="catecory" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Catecory</h4>
      </div>
      <div class="modal-body">
        <form id="newCat" onsubmit="return false" >
          <input type="hidden" name="CAtadd" value="addnew">
            <div class="form-group">
                <label for="cat_name">Catecory name*:</label>
                <input required type="text" class="form-control" placeholder="Enter catecory name" id="cat_name" name="cat_name">
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


  <?php if(isset($_GET['cat_id'])){

    $CAtchange=$db->prepare("select * from `bloggroup` where blog_id=:id");
    $CAtchange->execute(array('id' => $_GET['cat_id'] ));
    $catprint=$CAtchange->fetch(PDO::FETCH_ASSOC);
    ?>
      <!-- Modal create new page -->
      <div class="modal fade" id="myCAtModal" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change catecory name</h4>
      </div>
      <div class="modal-body">
        <form id="updateCat" onsubmit="return false" >
          <input type="hidden" name="CAtchange" value="sdsd">
          <input type="hidden" name="blog_id" value="<?php echo $catprint['blog_id'] ?>">
            <div class="form-group">
                <label for="blog_group">Catecory name*:</label>
                <input required type="text" class="form-control" placeholder="Enter catecory name" value="<?php echo $catprint['blog_group'] ?>" id="blog_group" name="blog_group">
            </div>

            <div class="clearfix"></div>

            <button type="submit" class="btn btn-default">Change</button>
        </form>
      </div>
          <div class="modal-footer">
              <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>

      </div>
    </div>
      <!------------------------------------------------------------------------------------------------->
<?php } ?>

      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Blog Page</h3>

<!--GEt CONTENTs-=====================================================  -->
<menu style="padding:10px" id="nestable-menu">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New</button>
  <a href="blogtheme.php"><button type="button" class="btn"><i class="fa fa-paint-brush"></i> Options</button></a>
  <button type="button" style="display:none;float:left; margin-right:10px" id="DeleteAll" class="btn btn-danger" onclick="deleteAllposts()"><i class="fa fa-trash-o"></i> Delete selected</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#catecory"><i class="fa fa-plus"></i> New catecory</button>
</menu>
<!--GEt CONTENTs-=====================================================  -->
<div class="row mt">
      <div class="col-md-8">
          <div class="content-panel">


              <table class="table table-advance record_table" style="user-select: none;">
                  <thead>
                  <tr>
                      <th><i class="fa fa-bullhorn"></i> Blog name</th>
                      <th class="hidden-phone"><i class="fa fa-question-circle"></i> Author</th>
                      <th><i class="fa fa-bookmark"></i>Change Date</th>
                      <th><i class="fa fa-edit"></i> Status</th>
                      <th><label style="user-select: none;" for="selectAll">Select All</label> <input type="checkbox" id="selectAll"></th>
                  </tr>
                  </thead>
                  <tbody>
<form id="Blogposts" onsubmit="return false">
<?php $blogrow=$db->prepare("SELECT * from blog order by blog_id DESC");
      $blogrow->execute();
while($printblog=$blogrow->fetch(PDO::FETCH_ASSOC)){  ?>

                  <tr class="selectTarget">
                      <td><a href="#"><?php echo $printblog['blog_name'] ?></a></td>
                      <td class="hidden-phone"><?php echo $printblog['blog_author'] ?></td>
                      <td><?php echo $printblog['blog_date'] ?></td>
                      <td>
                        <?php if($printblog['blog_durum']==1){ ?>

                        <div class="switch switch-square" onclick="sendDurum(<?php echo $printblog['blog_id'] ?>)" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                            <input class="durumu" id="<?php echo $printblog['blog_id'] ?>" name="blog_durum" type="checkbox" checked />
                        </div>

                        <?php } else { ?>

                        <div class="switch switch-square" onclick="sendDurum(<?php echo $printblog['blog_id'] ?>)" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                            <input class="durumu" id="<?php echo $printblog['blog_id'] ?>" name="blog_durum" type="checkbox" />
                        </div>

                        <?php } ?>
                      </td>

                      <td>
                          <button onclick="openWindowWithPostRequest(<?php echo $printblog['blog_id'] ?>)" type="button" class="btn btn-primary"><i  class="fa fa-cog"></i></button>
                          <a href="posteditor.php?blog_id=<?php echo $printblog['blog_id'] ?>"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                          <input style="display:none;" onclick="ShowDeleteBTN()"  class="checked" type="checkbox"  name="Allposts[]" value="<?php echo $printblog['blog_id'] ?>">
                      </td>
                  </tr>
<?php } ?>
</form>
                  </tbody>
              </table>
          </div><!-- /content-panel -->
      </div><!-- /col-md-12 -->


<div class="col-md-4">
  <div class="content-panel">
    <table class="table table-advance record_table" style="user-select: none;">
      <thead>
        <tr>
            <th><i class="fa fa-bullhorn"></i> Catecory name</th>
            <th class="hidden-phone"><i class="fa fa-question-circle"></i> Count</th>
            <th><i class="fa fa-bookmark"></i>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $bloggr=$db->prepare("SELECT * from bloggroup order by blog_id DESC");
              $bloggr->execute();
        while($printbloggr=$bloggr->fetch(PDO::FETCH_ASSOC)){
            $groupname = $printbloggr['blog_id'];
            $count = $db->query("SELECT count(*) FROM `blog` WHERE blog_group = '".$groupname."'")->fetchColumn();?>

        <tr>
          <td><p><?php echo $printbloggr['blog_group'] ?></p></td>
          <td><p><?php echo $count ?></p></td>
          <td>
            <a href="?cat_id=<?php echo $groupname ?>"> <button type="button" class="btn btn-success btn-xs"><i  class="fa fa-pencil"></i></button></a>
            <button onclick="catDelete(<?php echo $groupname  ?>,'<?php echo $printbloggr['blog_group']; ?>')" type="button" class="btn btn-danger btn-xs"><i  class="fa fa-trash"></i></button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
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

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->

    <script type="text/javascript">

    function reloadPage()
     {
       window.location.reload()
     }

     <?php $editorurl=$sitename.$adminpanelname.'/posteditor.php?post_name='?>

     function goEditor(){
       var postname = $("#newblog_name").val()
       window.location.replace("<?php echo $editorurl ?>"+postname);
     }

$(function () {

  $('#newBlogposts').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '../setting/engine.php',
      data: $('#newBlogposts').serialize(),
      success: function () {
        swal({
          html:true,
          title: "Successfully!",
          text: "Your new post created! Lets Edit this !",
          icon: "success",
          buttons: {
                  cancel: "ok",
                  catch: {
                    text: "Edit Post",
                    value: "edit",
                  },
                },
          dangerMode: false,
        }).then((value) => { switch (value) {
                                  case "edit":
                                     goEditor();
                                     break;
                                  default:
                                     reloadPage();
                                }
                              });
      }
    });

  });

});







  $(function () {

    $('#newCat').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: '../setting/engine.php',
        data: $('#newCat').serialize(),
        success: function () {
          swal("Successfully!", "Your new catecory created!", "success").then(function(result){
          reloadPage();
         })

        }
      });

    });

  });


    $(function () {

      $('#updateCat').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
          type: 'post',
          url: '../setting/engine.php',
          data: $('#updateCat').serialize(),
          success: function () {
            swal("Successfully!", "Your catecory name changed!", "success").then(function(result){
              window.location = window.location.href.split("?")[0];
           })

          }
        });

      });

    });
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
               url: '../setting/engine.php',
               data: {
                      blog_id: id,
                      blog_durum: status,
                      blogDurumCH: "ok"
                      },
              success: function () { }
              });
    }





    /////////////////////////////////////////////////////////////////////////////////////////////////

    function deleteAllposts() {

        swal({
                html: true,
                title: "Are you sure delete all selected Posts?",
                text: "Once deleted, you will not be able to recover these posts !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post',
                        url: '../setting/engine.php',
                        data: $("#Blogposts").serialize() + "&Blogdell=ok",
                        success: function() {
                            swal("Successfully!", "Your posts has been deleted!", "success").then(function(result) {
                                reloadPage();
                            })
                        }
                    });
                } else {
                    swal("Your posts has been safe!");
                }
            });

    }




          function catDelete(menu_id,menu_name)
          {

          swal({
            html:true,
            title: "Are you sure delete *"+menu_name+"* catecory?",
            text: "Once deleted, you will not be able to recover this catecory !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              removeMenu(menu_id);
            } else {
              swal("Your catecory is safe!");
            }
          });
          }



    /////////////////////////////////////////////////////////////////////////////////////////////////
    function removeMenu(id){

        var url = "../setting/engine.php"; // the script where you handle the form input.

        $.ajax({
               type: "POST",
               url: url,
               data: {blog_id: id, catdelete: 'ok'}, // serializes the form's elements.
               success: function ()
               {
                 swal("Poof! Your catecory has been deleted!", {
                   icon: "success",
                 }).then(function(result){
                   reloadPage();
                })

               }
             });
           }
    /////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////


function ShowDeleteBTN() {

    var delbtn = document.getElementById("DeleteAll");

    if ($('input.checked').is(':checked')) {
        delbtn.style.display = "block";

    } else {
        delbtn.style.display = "none";

    }
}




          /////////////////////////////////////////////////////////////////////////////////////////////////
          // setting change ajax post popub window
          function openWindowWithPostRequest(id) {
                var winName='Setting';
                var winURL='postpopup.php';
                var windowoption='resizable=yes,height=600,width=900,location=0,menubar=0,scrollbars=1';
                var params = { 'blog_id' : id};
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


        //////////////////////////////////////select with press down///////////////////////////////////////////////////////////

        var divCount = $('.selectTarget').length;//count select box divs

        var a = divCount;

        // checkbox id creator
        for (i = 0; i < a; i++) {
            var b = document.getElementsByClassName("checked")[i]
            var c = document.getElementsByClassName("selectTarget")[i]
            var id = "box" + i;
            b.setAttribute("id", id);
            c.setAttribute("id", i);
        }

        $('.record_table tr').on({

            mousedown: function() {
                var id = $(this).attr('id');

                $(this).data('timer', setTimeout(function() {
                     $('#box'+id).trigger('click');

                     if ($('#box'+id).is(':checked')) {
                         $( "#"+id ).addClass( "selectedrow" );
                     } else {
                       $( "#"+id ).removeClass( "selectedrow" );
                     }

                }, 350));


            },
            mouseup: function() {
                clearTimeout( $(this).data('timer') );
            }
        });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////select all ///////////////////////////////
$('#selectAll').change(function(){
  if ($('#selectAll').is(':checked') ) {
      $(".checked").prop("checked",true);
      $(".selectTarget").addClass( "selectedrow" );
      ShowDeleteBTN();
  } else {
      $(".checked").prop("checked",false);
      $(".selectTarget").removeClass( "selectedrow" );
      ShowDeleteBTN();
  }
});
////////////////////////////////////////////////////////


<?php if (isset($_GET['cat_id'])) { ?>
//show modal of catecory change
    $(window).on('load',function(){
        $('#myCAtModal').modal('show');
    });
<?php } ?>

    </script>

  </body>
</html>
