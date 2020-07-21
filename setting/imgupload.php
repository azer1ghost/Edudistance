<?php
include 'connect.php';

########################## IMG UPLOAD (toplu)#####################################

if ($_POST['galleryimgadd']=="ok"){	 #sil duymesinden gelen ad

  if (!empty($_FILES)) {

      $file_type=array('gif','jpg','jpe','jpeg','png','JPG');
      $ext=strtolower(substr($_FILES['file']["name"],strpos($_FILES['file']["name"],'.')+1));
        if(in_array($ext, $file_type) === false) {
          exit;
        }

  $target_dir = "../images/";

  $x1=rand(100,9999);
  $x2=rand(1,100);
  $xxname=$x1.$x2;

  @$tmp_name=$_FILES["file"]["tmp_name"];
  @$name = $xxname.$_FILES['file']["name"];

  $save=$db->prepare("INSERT INTO gallery SET   	#tablo adi
  #sutun adi--> leqebi
  	pic_name=:a
  	");
  $save->execute(array(
   #sutun leqebi --> adi
  	'a'=>$name
  	));

//post to imagerresizer

  if (move_uploaded_file($tmp_name, $target_dir.$name)) {

      $status = 1;
    }

    if ($status = 1) {
      $source_url = $target_dir.$name;
      include 'imageresizer.php';
    }


    $db=null;//end connection
    }



}

########################## img delete #################################

	if ($_POST['imagedelete']=="ok"){	 #sil duymesinden gelen ad

  $resim_sil=$_POST['imagename'];

  $sil=$db->prepare("DELETE from gallery where pic_name=:name"); #ne silinecek

  $sil->execute(array('name' => $resim_sil));	#ne silinecek hardan

  $sil=$db->prepare("DELETE from slider where slider_picurl=:name"); #ne silinecek
  $sil->execute(array('name' => $resim_sil));	#ne silinecek hardan

  unlink("../images/$resim_sil");

  $db=null;//end connection

}

########################## img delete toplu #################################

if ($_POST['gallerydell']=="ok"){

$images = $_POST['Allimage'];

foreach($images as $image){
  $sil=$db->prepare("DELETE from gallery where pic_name=:name"); #ne silinecek
  $sil->execute(array('name' => $image));	#ne silinecek hardan

  $sil=$db->prepare("DELETE from slider where slider_picurl=:name"); #ne silinecek
  $sil->execute(array('name' => $image));	#ne silinecek hardan
  unlink("../images/$image");
  }
    $db=null;//end connection
}


########################## img catecory toplu #################################

if ($_POST['catecoryupdate']=="ok"){

$images = $_POST['Allimage'];
$labName = $_POST['catname'];

foreach($images as $image){
    $save=$db->prepare("UPDATE gallery SET  #tablo adi
    #sutun adi--> leqebi
    pic_labname=:a

    WHERE pic_name=:name");
    $save->execute(array(

     #sutun leqebi --> adi
    'a'=> $labName,
    'name'=> $image
    ));
  }
}




//rename ("/folder/file.ext", "/folder/newfile.ext");

//$my_text = 'The quick brown [fox].';
//preg_match('#\[(.*?)\]#', $my_text, $match);
//echo $match[1]



########################## Slider IMG UPLOAD (toplu)#####################################

if ($_POST['sliderimgadd']=="ok"){	 #sil duymesinden gelen ad

  if (!empty($_FILES)) {

      $file_type=array('gif','jpg','jpe','jpeg','png','JPG');
      $ext=strtolower(substr($_FILES['file']["name"],strpos($_FILES['file']["name"],'.')+1));
        if(in_array($ext, $file_type) === false) {
          exit;
        }

  $target_dir = "../images/";

  $x1=rand(100,9999);
  $x2=rand(1,100);
  $xxname=$x1.$x2;

  @$tmp_name=$_FILES["file"]["tmp_name"];
  @$name = $xxname.$_FILES['file']["name"];

  $save=$db->prepare("INSERT INTO gallery SET   	#tablo adi
  #sutun adi--> leqebi
  	pic_name=:a,
    pic_labname=:b
  	");
  $save->execute(array(
   #sutun leqebi --> adi
  	'a'=>$name,
    'b'=>"Slider"
  	));

    $saveslide=$db->prepare("INSERT INTO slider SET   	#tablo adi
    #sutun adi--> leqebi
    	slider_picurl=:a,
      slider_sira=:b
    	");
    $saveslide->execute(array(
     #sutun leqebi --> adi
    	'a'=>$name,
      'b'=>"0"
    	));

  if (move_uploaded_file($tmp_name, $target_dir.$name)) {
      $status = 1;
    }

    $db=null;//end connection

    }
}
########################## slider img delete toplu #################################

if ($_POST['sliderdell']=="ok"){

  $images = $_POST['Allimage'];

  foreach($images as $image){
    $sil=$db->prepare("DELETE from slider where slider_picurl=:name"); #ne silinecek
    $sil->execute(array('name' => $image));	#ne silinecek hardan
    }
      $db=null;//end connection
}


############################ slider durum ############################################
if ($_POST['sliderDurumCH']=="ok"){

  $id = $_POST['slider_id'];
  $durum = $_POST['slider_durum'];

      $save=$db->prepare("UPDATE slider SET  #tablo adi
      #sutun adi--> leqebi
      slider_durum=:a

      WHERE slider_id=:id");
      $save->execute(array(

       #sutun leqebi --> adi
      'a'=> $durum,
      'id'=> $id
      ));


}

?>
