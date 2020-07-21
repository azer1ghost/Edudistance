<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *

 $contentsor=$db->prepare("select * from `pages` where page_id=:id");
 $contentsor->execute(array('id' => $_GET['page_id']));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>


<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Publish</title>


    <?php

    $libsor=$db->prepare("select * from `library` where lib_name=:a");
    $libsor->execute(array('a' => $print['library_name']));
    $addlib=$libsor->fetch(PDO::FETCH_ASSOC);
    echo $addlib['lib_headcode'];
    ?>
	</head>
	<body>

    <div style="margin-top: 1px">
      <div class="editor <?php echo $addlib['lib_mainclass'];?>" id="editor"><?php echo $print['page_content'] ?></div>
    </div>
    <?php echo $addlib['lib_footercode']; ?>
    <script type="text/javascript" src="editor/libs/jquery-1.10.2.min.js"></script>

	</body>
</html>
