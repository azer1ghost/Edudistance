<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include '../setting/function.php';


if (isset($_GET['post_name'])) {
  $blogseo = seo($_GET['post_name']);
  $blogsor=$db->prepare("select * from `blog` where blog_seoname=:name");
  $blogsor->execute(array('name' => $blogseo));
  $blogprint=$blogsor->fetch(PDO::FETCH_ASSOC);
}
else  {
  $blogsor=$db->prepare("select * from `blog` where blog_id=:id");
  $blogsor->execute(array('id' => $_GET['blog_id']));
  $blogprint=$blogsor->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Footer editor</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <!--editor adds on-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='../cms/editor/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='../cms/editor/froala_style.min.css' rel='stylesheet' type='text/css' />
    <!-- Include JS file. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>
    <button style=" position: relative; z-index: 500;" class="btn btn-success" id="save">Save</button>

    <div style="margin-top: 20px" id="froala-editor">
      <div id="editor"><?php echo $blogprint['blog_content'] ?></div>
    </div>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(argument) {
        $('#save').click(function(){
          // Get edit field value
          $edit = $('#editor').html();
          $pageid = <?php echo $blogprint['blog_id'] ?>;
          $.ajax({
            url: '../setting/engine.php',
            type: 'post',
            data: {blogcontent: $edit, blog_id: $pageid},
            datatype: 'html',
            success: function () {
              swal("Successfully!", "Your post saved!", "success").then(function(result){
              <?php  if (isset($_GET['post_name'])) { ?>
                  window.location.replace("postpopup.php?blog_id=<?php echo $blogprint['blog_id'] ?>");
              <?php  } ?>
            })
            }
          });
        });
      });
    </script>
    <script type='text/javascript' src='../cms/editor/froala_editor.pkgd.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/plugins/image.min.js'></script>

        <script>
        $('#froala-editor').froalaEditor({
        	toolbarInline: true,
          charCounterCount: false,
          toolbarButtons: ['bold', 'italic', 'underline', 'color', '-',  /*'subscript', 'strikeThrough', 'superscript', '-', 'fullscreen', 'fontFamily', 'fontSize',  'inlineStyle', 'paragraphStyle', 'paragraphFormat', 'align', '-', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote',*/ 'insertLink', 'insertImage', 'insertVideo', /* 'insertFile', 'insertTable', 'emoticons', 'specialCharacters', 'insertHR', '-','selectAll', 'clearFormatting', '|', 'print',*/ '-','help', 'html', '|', 'undo', 'redo'],
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
  </script>

  </body>
</html>
