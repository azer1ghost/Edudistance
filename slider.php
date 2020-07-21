<!DOCTYPE html>
<html>
<head>

      <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.10/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.10/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.10/js/uikit-icons.min.js"></script>
</head>



<div class="uk-position-relative uk-visible-toggle uk-light"  uk-slideshow="ratio: 9:3; animation: push; autoplay: true; autoplay-interval: 3000">

<ul class="uk-slideshow-items">
  <!-- .slide -->
  <?php $slidersor=$db->prepare("select * from slider order by  slider_id ASC limit 8");
  	    $slidersor->execute();
  while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){  ?>

  <?php if ($slidercek['slider_durum']==1) {?>
    <li>
      <a href="<?php echo $slidercek['slider_link'] ?>">
        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
            <img src="images/<?php echo $slidercek['slider_picurl'] ?>" alt="" uk-cover>
        </div>
      </a>
    </li>

  <?php }  elseif ($slidercek['slider_durum']==0) {?>
  <?php }?>
  <!-- .slide --> <?php } ?>

</ul>

<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div>





</body>
</html>
