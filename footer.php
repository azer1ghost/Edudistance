<?php
 include 'setting/connect.php';  //baglanti temin edildi *
 $contentsor=$db->prepare("select * from `footer` where footer_id=:id");
 $contentsor->execute(array('id' => 1));
 $footerprint=$contentsor->fetch(PDO::FETCH_ASSOC);
 echo trim($footerprint['footer_content']);
 ?>
