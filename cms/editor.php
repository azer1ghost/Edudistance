<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

 $contentsor=$db->prepare("select * from `pages` where page_id=:id");
 $contentsor->execute(array('id' => $_GET['page_id']));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>


<?php echo $print[ 'site_title'] ?>
<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contnet Editor</title>
    <!--theme adds on-->

<?php

$libsor=$db->prepare("select * from `library` where lib_name=:a");
$libsor->execute(array('a' => $print['library_name']));
$addlib=$libsor->fetch(PDO::FETCH_ASSOC);
echo $addlib['lib_headcode'];
?>

    <!--editor adds on-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href='editor/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='editor/froala_style.min.css' rel='stylesheet' type='text/css' />
    <!-- Include JS file. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body>

    <button style=" position: absolute; z-index: 1;" class="btn btn-success" id="save">Save</button>
    <button style=" position: relative; z-index: 1; left: 95px;" class="btn btn-primary" onClick="openNewTab()" >Publish</button>


    <div style="margin-top: 1px" id="froala-editor">
      <div class="editor <?php echo $addlib['lib_mainclass'];?>" id="editor"><?php echo trim($print['page_content']) ?></div>
    </div>



  <div class="md-modal" id="md-html" style="width: 60%; z-index: 10002; display: none;">
      <div class="md-content">
          <div class="md-body"><textarea id="txtHtml" class="inptxt" style="height:450px;"><?php echo $print['page_content'] ?></textarea></div>
          <div class="md-footer"><button onClick="closeCodeTab()" id="btnHtmlCancel" class="secondary"> Cancel </button><button onClick="saveCodeTab()" id="btnHtmlOk" class="primary"> Ok </button></div>
      </div>
  </div>


<?php echo $addlib['lib_footercode']; ?>


    <script type="text/javascript">
      $(document).ready(function(argument) {
        $('#save').click(function(){
          // Get edit field value
          $edit = $('#editor').html();
          $pageid = <?php echo $print['page_id'] ?>;
          $.ajax({
            url: '../setting/engine.php',
            type: 'post',
            data: {editordata: $edit, page_id: $pageid},
            datatype: 'html',
            success: function () {
              swal("Successfully!", "Your content saved!", "success");
            }
          });
        });
      });
    </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type='text/javascript' src='editor/froala_editor.pkgd.min.js'></script>
<script type='text/javascript' src='editor/image.min.js'></script>

    <script>
    $('#froala-editor').froalaEditor({
      toolbarInline: true,
      charCounterCount: false,
      toolbarButtons: ['bold', 'italic', 'underline', 'color', '-','fontSize',  /*'subscript', 'strikeThrough', 'superscript', '-', 'fullscreen', 'fontFamily', 'inlineStyle', 'paragraphStyle', 'paragraphFormat', 'align', '-', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote',*/ 'insertLink', 'insertImage', 'insertVideo', /* 'insertFile', 'insertTable', 'emoticons', 'specialCharacters', 'insertHR', '-','selectAll', 'clearFormatting', '|', 'print',*/ '-','help', 'html', '|', 'undo', 'redo'],
      imageManagerLoadURL: 'http://localhost/mycsm/images/index.html',
      imageEditButtons: ['imageReplace', 'imageAlign', 'imageRemove', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', /* '-', 'imageDisplay', 'imageStyle', 'imageAlt', 'imageSize'*/],
      imageInsertButtons: ['imageBack', '|', /*'imageUpload', 'imageManager', */ 'imageByURL'],
      linkEditButtons: ['linkEdit', 'linkRemove'],
      linkList: [
    {
      text: 'Google',
      href: 'https://google.com',
      target: '_blank'
    },
    {
      text: 'Instagram',
      href: 'https://instagram.com',
      target: '_blank'
    },
    {
      text: 'Facebook',
      href: 'https://facebook.com',
      target: '_blank'
    }
  ]
});


   </script>

	</body>
</html>
