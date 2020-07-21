<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include '../setting/function.php';  //baglanti temin edildi *
      if(isset($_POST["limit"], $_POST["start"])){

      $pagesor=$db->prepare("SELECT * from gallery order by pic_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ");
      $pagesor->execute();
      while($print=$pagesor->fetch(PDO::FETCH_ASSOC)){
        $img = $print['pic_name'];
        $image = $sitename."images/".$img;
      ?>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 desc" style="padding-top:20px">
   <div class="project-wrapper" >
       <div class="project">
           <div class="photo-wrapper">
               <div class="photo">
                 <a class="fancybox" href="<? echo $image ?>"><img style="width:100%;height:153px"  src="<? echo $image ?>" alt=""></a>
               </div>
               <div class="overlay"></div>
           </div>
       </div>
   </div>
   <div class="pr2-social centered" style="border-bottom: solid black 1px; border-bottom-style: outset">
     <a href="<? echo $image ?>" download><i class="fa fa-download"></i></a>
     <a onclick="copytext('<? echo $image ?>')" ><i class="fa fa-link"></i></a>
     <a onclick="imgDelete('<?php echo $img ?>')" ><i class="fa fa-trash-o"></i></a>
      <input  onclick="ShowDeleteBTN()"  class="checked" type="checkbox" id="<?php echo $img ?>" name="Allimage[]" value="<?php echo $img ?>">
   </div>
 </div><!-- col-lg-4 -->

<?php  } } ?>
