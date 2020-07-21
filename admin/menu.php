<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
$list=getFullListFromDB($db);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS Menu</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="menu/jquery-nestable.css" rel="stylesheet" />
    <style media="screen">
      .primary_color{
        border-radius: 100%;
        height: 40px;
        width: 40px;
        border: none;
        outline: none;
        -webkit-appearance: none;
      }

      .primary_color::-webkit-color-swatch-wrapper {
        padding: 0;
      }
      .primary_color::-webkit-color-swatch {
        border: none;
        border-radius: 100%;
      }
    </style>
    <script>
      var colorButton = document.getElementById("primary_color");
      var colorDiv = document.getElementById("color_val");
      colorButton.onchange = function() {
          colorDiv.innerHTML = colorButton.value;
          colorDiv.style.color = colorButton.value;
      }
    </script>
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
  <h4 class="modal-title">Create New Menu</h4>
</div>
<div class="modal-body">
  <form id="addnew" onsubmit="return false" >
    <input type="hidden" name="menuadd" value="addnew">

      <div class="form-group">
          <label for="menu_name">Menu name*:</label>
          <input required type="text" class="form-control" placeholder="Enter page name" id="menu_name" name="menu_name">
      </div>

      <div class="form-group">
          <label for="menu_link">Menu link:</label>
          <textarea style="height: 90px" class="form-control" placeholder="Enter link"  id="menu_link" name="menu_link"><?php echo $print['menu_link'] ?></textarea>
      </div>

      <div class="col-md-4">
				<div class="form-group">
					<label for="optionsRadios1">Status</label>
					<div class="radio">
							<label>
							    <input type="radio" name="menu_durum" id="optionsRadios1" value="1" checked="">Active
							</label>

							<label>
							    <input type="radio" name="menu_durum" id="optionsRadios1" value="0" >Passive
							</label>
					</div>

				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>BLANK</label><br>
      				<input type="checkbox" class="form-check"  value="1" name="menu_blank" >
					<p class="help-block">Open in new tab	</p>
				</div>
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
    	<h3><i class="fa fa-angle-right"></i>Menu options</h3>

<!--GEt CONTENTs-=====================================================  -->

<!-- Draggable Handles -->
<div class="col-lg-6 col-md-6 ">
  <menu style="padding:10px" id="nestable-menu">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New</button>
    <button type="button" class="btn" data-action="expand-all">Open all</button>
    <button type="button" class="btn btn-danger" data-action="collapse-all">Close all</button>
  </menu>
  <div class="body">
    <div class="clearfix m-b-20">
      <div class="cf nestable-lists">
        <div class="dd" id="nestable">
          <?php displayList($list); ?>
        </div>
      </div>
    </div>
  </div>
</div>  <!-- #END# Draggable Handles -->



<form  id="colorup">


<div class="col-lg-6 col-md-6 ">
  <menu style="padding:27px" id="nestable-menu"></menu>
  <div class="body">
    <div class="clearfix m-b-20">
      <div class="nestable-lists">

        <input type="hidden" name="color" value="ok">
        <input type="hidden" name="theme_id" value="1">

        <div class="col-md-2">
          <label for="theme_fontsize">Font size</label>
          <input style="width:80px" type="number" id="theme_fontsize" class="form-control themech" name="theme_fontsize" >
        </div>

        <div style="padding-left:40px" class="col-md-3">
          <label for="theme_fontweight">Font weight</label>
          <input style="width:80px" type="number" id="theme_fontweight" class="form-control themech" name="theme_fontweight" >
        </div>
        <div class="clearfix">

        </div>
            <hr>
          <input type="color" class="primary_color themech" class="field-radio" id="background_color" name="background_color">
          <label style="position:absolute;margin-top:12px" for="background_color">Select menu main background color</label>
          <span class="container" class="color_val"></span>
            <hr>
          <input type="color" class="primary_color themech" class="field-radio" id="background_opener" name="background_opener">
          <label style="position:absolute;margin-top:12px" for="background_opener">Select opener menu background color</label>
          <span class="container" class="color_val"></span>
            <hr>
          <input type="color" class="primary_color themech" class="field-radio" id="background_font" name="background_font">
          <label style="position:absolute;margin-top:12px" for="background_font">Font color</label>
          <span class="container" class="color_val"></span>
            <hr>
          <input type="color" class="primary_color themech" class="field-radio" id="theme_hovertextcolor" name="theme_hovertextcolor">
          <label style="position:absolute;margin-top:12px" for="theme_hovertextcolor">Mouse on hover font color</label>
          <span class="container" class="color_val"></span>
            <hr>
          <input type="color" class="primary_color themech" class="field-radio" id="theme_hovercolor" name="theme_hovercolor">
          <label style="position:absolute;margin-top:12px" for="theme_hovercolor">Mouse on hover background color</label>
          <span class="container" class="color_val"></span>
      </div>
    </div>
  </div>
</div>  <!-- #END# Draggable Handles -->

</form>


<div class="clearfix"></div>

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

  <?php
    $themeid=1;
    $th=$db->prepare("select * from `menutheme` where theme_id=:id");
    $th->execute(array('id' => $themeid ));
    $thprint=$th->fetch(PDO::FETCH_ASSOC);
  ?>
  <script type="text/javascript">
    document.getElementById("background_color").value = "<?php echo $thprint['theme_back']?>";
    document.getElementById("background_opener").value = "<?php echo $thprint['theme_openback']?>";
    document.getElementById("background_font").value = "<?php echo $thprint['theme_font']?>";
    document.getElementById("theme_fontsize").value = "<?php echo $thprint['theme_fontsize']?>";
    document.getElementById("theme_fontweight").value = "<?php echo $thprint['theme_fontweight']?>";
    document.getElementById("theme_hovertextcolor").value = "<?php echo $thprint['theme_hovertextcolor']?>";
    document.getElementById("theme_hovercolor").value = "<?php echo $thprint['theme_hovercolor']?>";
  </script>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <!--script for this page-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="menu/jquery.nestable.js"></script>

<script>
//////////////////////////////////////////////////////////////////////////////////////////////////////
//nestable button function adder
$(".dd a").on("mousedown", function(event) { // mousedown prevent nestable click
    event.preventDefault();
    return false;
});

$(".dd a").on("click", function(event) { // click event
    event.preventDefault();
    window.location = $(this).attr("href");
    return false;
});




//////////////////////////////////////////////////////////////////////////////////

function reloadPage()
 {
   window.location.reload()
 }

      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../setting/engine.php',
            data: $('form').serialize(),
            success: function () {
              swal("Successfully!", "Your new menu created!", "success").then(function(result){
                reloadPage();
             })

            }
          });

        });

      });




      function menuDelete(menu_id,menu_name)
      {

      swal({
        html:true,
        title: "Are you sure delete *"+menu_name+"* menu?",
        text: "Once deleted, you will not be able to recover this page !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          removeMenu(menu_id);
        } else {
          swal("Your page is safe!");
        }
      });
      }



/////////////////////////////////////////////////////////////////////////////////////////////////
function removeMenu(id){

    var url = "../setting/engine.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: {menu_id: id, menudelete: 'ok'}, // serializes the form's elements.
           success: function ()
           {
             swal("Poof! Your menu has been deleted!", {
               icon: "success",
             }).then(function(result){
               reloadPage();
            })

           }
         });
       }
/////////////////////////////////////////////////////////////////////////////////////////////////


  $(document).ready(function() {
    $('input.themech').change(function(){
      $.ajax({
        type: 'post',
        url: '../setting/engine.php',
        data: $('#colorup').serialize(),
        success: function () {}
      });
    });
});



/////////////////////////////////////////////////////////////////////////////////////////////////
// setting change ajax post popub window
function openWindowWithPostRequest(id) {
      var winName='Setting';
      var winURL='menupopup.php';
      var windowoption='resizable=yes,height=400,width=300,location=0,menubar=0,scrollbars=1';
      var params = { 'menu_id' : id};
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

/////////////////////////////////////////////////////////////////////////////////////////////////
//post menu data
$(document).ready(function () {
  var updateOutput = function (e) {
      var list = e.length ? e : $(e.target), output = list.data('output');

      $.ajax({
          method: "POST",
          url: "../setting/saveList.php",
          data: {
              list: list.nestable('serialize')
          }
      }).fail(function(jqXHR, textStatus, errorThrown){
          alert("Unable to save new list order: " + errorThrown);
      });
  };

  $('#nestable').nestable({
      group: 1,
      maxDepth: 4,
  }).on('change', updateOutput);
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//open and closer
$('#nestable-menu').on('click', function(e)
{
    var target = $(e.target),
        action = target.data('action');
    if (action === 'expand-all') {
        $('.dd').nestable('expandAll');
    }
    if (action === 'collapse-all') {
        $('.dd').nestable('collapseAll');
    }
});
</script>


  </body>
</html>

<?php //get menus
function getFullListFromDB($db, $parent_id = 0) {
    $sql = "
        SELECT id, parent_id, menu_name
        FROM menu
        WHERE parent_id = :parent_id
        ORDER BY menu_sira
    ";

    $statement = $db->prepare($sql);
    $statement->bindValue(':parent_id', $parent_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as &$value) {
        $subresult = getFullListFromDB($db, $value["id"]);

        if (count($subresult) > 0) {
            $value['children'] = $subresult;
        }
    }
    unset($value);

    return $result;
}

function displayList($list) {
?>
    <ol class="dd-list">
    <?php foreach($list as $item): ?>
    <li class="dd-item" data-id="<?php echo $item["id"]; ?>">
      <div class="dd-handle"><?php echo $item["menu_name"]; ?>
        <div class="buttons" style="float:right;">
          <a href="#" >
            <i onclick="menuDelete(<?php echo $item['id'] ?>, '<?php echo $item['menu_name'] ?>')" class="fa fa-trash-o itembutton"></i>
            <i onclick="openWindowWithPostRequest(<?php echo $item['id'] ?>)" class="fa fa-cog itembutton"></i>
          </a>
        </div>
      </div>

    <?php if (array_key_exists("children", $item)): ?>
    <?php displayList($item["children"]); ?>
    <?php endif; ?>
    </li>
    <?php endforeach; ?>
    </ol>
<?php
}
?>
