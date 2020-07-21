
<?php
  $themeid=1;
  $th=$db->prepare("select * from `menutheme` where theme_id=:id");
  $th->execute(array('id' => $themeid ));
  $thprint=$th->fetch(PDO::FETCH_ASSOC);
?>
<style media="screen">
.sticky {
position: fixed;
width: 100%;
z-index: 9999;
transition: 0.3s;
}
#logo{
  transition: 0.3s;
}
/* styles for this sample only */
*{ margin: 0; padding: 0; }
@media only screen and (max-width : 1000px) {
  .stellarnav > ul > li > a { padding: 20px 23px; }
}
/* styles for this sample only */
.header {
  background-color: white;
  padding: 20px 10px;
  padding-left: 20px;
}

.header-right {
  float: right;
}

#logo{
  max-width:110px;
}

@media screen and (max-width: 600px) {
  #logo{
    max-width:80px;
  }
  .header-right {
    display: flex;
  }
}

@media screen and (min-width: 1000px) {
  .header {
    padding: 20px 10px;
    padding-left: 100px;
  }
}

@media screen and (max-width: 200px) {
  .header a {
    text-align: right;
    padding-left: 10px;
  }

}
/* mytheme theme */
.stellarnav.mytheme { background: <?php echo $thprint['theme_back']?>; }/*header background color*/
.stellarnav.mytheme ul ul { background: <?php echo $thprint['theme_openback']?>; }/*dropdown background color*/
.stellarnav.mytheme li a { color: <?php echo $thprint['theme_font']?>;font-weight: <?php echo $thprint['theme_fontweight']?>; } /*font color*/
.stellarnav.mytheme li a:hover {
    background-color: <?php echo $thprint['theme_hovercolor']?>;
    color: <?php echo $thprint['theme_hovertextcolor']?>;
}
.stellarnav.mytheme .menu-toggle, .stellarnav.mytheme .call-btn-mobile, .stellarnav.mytheme .location-btn-mobile { color: rgba(0, 0, 0, 1); }/*menu color*/
.stellarnav.mobile ul { background: <?php echo $thprint['theme_openback']?>; }/*mobile background color*/

.stellarnav li { list-style: none; display: block; margin: 0; padding: 0; position: relative; line-height: normal; vertical-align: middle; }
.stellarnav li a { padding: 10px; display: block; text-decoration: none; color: #777; font-size: <?php echo $thprint['theme_fontsize']?>px; font-family: inherit; box-sizing: border-box; -webkit-transition: all .3s ease-out; -moz-transition: all .3s ease-out; transition: all .3s ease-out; }

/* main level */
.stellarnav > ul > li { display: inline-block;  }
.stellarnav > ul > li > a { padding: 10px 20px; }

/* first level dd */
.stellarnav ul ul { top: auto; width: 120px; position: absolute; z-index: 9900; text-align: left; display: none; background: #fff; }
.stellarnav li li { display: block; }

/* second level dd */
.stellarnav ul ul ul { top: 0; /* dd animtion - change to auto to remove */ left: 120px; }
.stellarnav > ul > li:hover > ul > li:hover > ul { opacity: 1; visibility: visible; top: 0; }

/* .drop-left */
.stellarnav > ul > li.drop-left > ul { right: 0; }
.stellarnav li.drop-left ul ul { left: auto; right: 120px; }

</style>
