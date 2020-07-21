<?php
ob_start();				//Sesia basladildi *
session_start();
include '../setting/connect.php';  //baglanti temin edildi *
include '../setting/function.php';  //baglanti temin edildi *
      if(isset($_POST["limit"], $_POST["start"])){

      $pagesor=$db->prepare("SELECT * from pages order by page_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ");
      $pagesor->execute();
      while($print=$pagesor->fetch(PDO::FETCH_ASSOC)){  ?>

    <div  class="col-lg-3 col-md-3 col-sm-4 col-xs-12 mb w3-animate-top" >
        <div class="content-panel">
          <div style="position:relative;" id="profile-02" >
            <div  class="user">
              <div class="opacity-thumbnail"></div>
              <div class="thumbnail-container">
                <div class="thumbnail" >
                  <iframe src="<?php echo $sitename ?>/cms/publish.php?page_id=<?php echo $id=$print['page_id'] ?>" frameborder="0"></iframe>
                </div>
              </div>
              <label for="<?php echo $print['page_id'] ?>">
                <h4 style="z-index: 2;"><?php echo $print['page_name'] ?></h4>
              </label>
            </div>
          </div>

          <div class="pr2-social centered">
            <a href="<?php echo $sitename.'pages/'.seo($print['page_name']).'/'.$print['page_id']; ?>" target="_blank" ><i class="fa fa-desktop"></i></a>
            <a href="../cms/editor.php?page_id=<?php echo $print['page_id'] ?>"><i class="fa fa-edit"></i></a>
            <a onclick="pageDelete(<?php echo $print['page_id'] ?>, '<?php echo $print['page_name'] ?>')" ><i class="fa fa-trash-o"></i></a>
            <a onclick="openWindowWithPostRequest(<?php echo $print['page_id'] ?>)" ><i class="fa fa-cog"></i></a>
            <input onclick="ShowDeleteBTN()" type="checkbox" class="checked" id="<?php echo $print['page_id'] ?>" name="deleteAllpage[]" value="<?php echo $print['page_id'] ?>">
          </div>
        </div><!--/panel -->
      </div>
</div>
<?php } } ?>
