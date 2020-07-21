<!--######################################### Engine of CMS ########################################-->
<?php

include 'connect.php';  //baglanti temin edildi *
include 'function.php';

$sitesor=$db->prepare("select * from `site_options` where site_id=?");
$sitesor->execute(array(1));
$print=$sitesor->fetch(PDO::FETCH_ASSOC);
########################## admin login ######################
//---------------------------------------------------------------------//

if (isset($_POST['loggin'])) {
	ob_start();				//Sesia basladildi *
	session_start();

$admin_login=$_POST['admin_name'];
$admin_password=md5($_POST['admin_password']);

		if ($admin_login && $admin_password ) {

		$sorgu=$db->prepare("SELECT * from admin WHERE admin_login=:name and  admin_password=:password");

		$sorgu->execute(array(
			'name'=>$admin_login,
			'password'=>$admin_password
		));

		$say=$sorgu->rowCount();

		if ($say>0) {

		$_SESSION['cms_admin_login'] = $admin_login;


$site= "$sitename$adminpanelname/index.php?login=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else {

$site= "$sitename$adminpanelname/index.php?login=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}

//---------------------------------------------------------------------//



#######################################################################
##########################  Parametr Update  ##########################
if (isset($_POST['esasparametrupdate'])) {          #duyme adi

if($_FILES['site_logourl']["size"] > 3000000) {

$site= "$sitename/$adminpanelname/pages/site_options/parametr.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;
}

if($_FILES['site_logourl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['site_logourl']["name"],strpos($_FILES['site_logourl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/$adminpanelname/pages/site_options/parametr.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;
}

		$uploads_dir = '../../images';                      #sekil yeri
		@$tmp_name = $_FILES['site_logourl']["tmp_name"];
		@$name = $_FILES['site_logourl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$site_logourl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");

$save=$db->prepare("UPDATE site_options SET  #tablo adi

#sutun adi--> leqebi
site_title=:a,
site_sitename=:b,
site_author=:c,
site_analystic=:d,
site_keywords=:e,
site_description=:f,
site_logourl=:h


WHERE site_id={$_POST['site_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
'a'=>$_POST['site_title'],
'b'=>$_POST['site_sitename'],
'c'=>$_POST['site_author'],
'd'=>$_POST['site_analystic'],
'e'=>$_POST['site_keywords'],
'f'=>$_POST['site_description'],
'h'=>$site_logourl
 ));

$site_id=$_POST['site_id'];

if($update) {

		 	$resim_sil=$_POST['site_logourl'];
		 	unlink("../../$resim_sil");

$site= "$sitename/$adminpanelname/pages/site_options/parametr.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else {

$site= "$sitename/$adminpanelname/pages/site_options/parametr.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

} else {

$save=$db->prepare("UPDATE site_options SET  #tablo adi

#sutun adi--> leqebi
site_title=:a,
site_sitename=:b,
site_author=:c,
site_analystic=:d,
site_keywords=:e,
site_description=:f

WHERE site_id={$_POST['site_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
'a'=>$_POST['site_title'],
'b'=>$_POST['site_sitename'],
'c'=>$_POST['site_author'],
'd'=>$_POST['site_analystic'],
'e'=>$_POST['site_keywords'],
'f'=>$_POST['site_description']
));

if($update) {

$site= "$sitename/$adminpanelname/pages/site_options/parametr.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else {

$site= "$sitename/$adminpanelname/pages/site_options/parametr.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
################################################################################################
//---------------------------------------------------------------------//






#######################################################################################
##########################  content Update  ##########################################
if (isset($_POST['editordata'])) {

$editData = $_POST['editordata'];

$save=$db->prepare("UPDATE pages SET  #tablo adi

#sutun adi--> leqebi
page_content=:a

WHERE page_id={$_POST['page_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
'a'=> $editData

));

}

//---------------------------------------------------------------------//




#######################################################################################
##########################  blog content Update  ##########################################
if (isset($_POST['blogcontent'])) {

$editData = $_POST['blogcontent'];

$save=$db->prepare("UPDATE blog SET  #tablo adi

#sutun adi--> leqebi
blog_content=:a

WHERE blog_id={$_POST['blog_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
'a'=> $editData

));

}

//---------------------------------------------------------------------//


#######################################################################################
##########################  footer Update  ##########################################
if (isset($_POST['footerdata'])) {

$editData = $_POST['footerdata'];

$save=$db->prepare("UPDATE footer SET  #tablo adi

#sutun adi--> leqebi
footer_content=:a

WHERE footer_id={$_POST['footer_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
'a'=> $editData

));

}

//---------------------------------------------------------------------//



#######################################################################################################
##########################  new page add  #############################################################
if (isset($_POST['addnew'])) {

$pagename = $_POST['pagename'];
$code = $_POST['code'];
$date = $_POST['datetime'];
$library_name = $_POST['library_name'];
$pagetitle = $_POST['pagetitle'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];
$author = $_POST['author'];

$save=$db->prepare("INSERT INTO pages SET   	#tablo adi
#sutun adi--> leqebi
	page_name=:a,
	page_content=:c,
	page_reset=:c,
	page_date=:d,
	library_name=:e,
	page_title=:g,
	page_desc=:h,
	page_keywords=:j,
	page_author=:k
	");
$save->execute(array(
 #sutun leqebi --> adi
	'a'=>$pagename,
	'c'=>$code,
	'd'=>$date,
	'e'=>$library_name,
	'g'=>$pagetitle,
	'h'=>$description,
	'j'=>$keywords,
	'k'=>$author
	));
}

##########################  update page   #########################################################
if (isset($_POST['updatecontent'])) {

	$pagename = $_POST['pagename'];
	$code = $_POST['code'];
	$date = $_POST['datetime'];
	$library_name = $_POST['library_name'];
	$pagetitle = $_POST['pagetitle'];
	$description = $_POST['description'];
	$keywords = $_POST['keywords'];
	$author = $_POST['author'];

$save=$db->prepare("UPDATE pages SET  #tablo adi
#sutun adi--> leqebi
page_name=:a,
page_content=:c,
page_date=:d,
library_name=:e,
page_title=:g,
page_desc=:h,
page_keywords=:j,
page_author=:k

WHERE page_id={$_POST['page_id']}");
$save->execute(array(
 #sutun leqebi --> adi
 'a'=>$pagename,
 'c'=>$code,
 'd'=>$date,
 'e'=>$library_name,
 'g'=>$pagetitle,
 'h'=>$description,
 'j'=>$keywords,
 'k'=>$author
	));

}
########################## page delete ###########################################################################

  if ($_POST['pagedelete']=="ok"){	            #sil duymesinden gelen ad

  	#islemkontrol ();

  		$sil=$db->prepare("DELETE from pages where page_id=:page_id"); #ne silinecek

  		$sil->execute(array('page_id' => $_POST['page_id']));	#ne silinecek hardan

  }

########################## multi page delete ######################################################################

if ($_POST['pagedell']=="ok"){

	$id = $_POST["deleteAllpage"];
	$in  = str_repeat('?,', count($id) - 1) . '?';  // Dizideki veri sayısı kadar soru işareti koy
	$sil = $db->prepare("DELETE FROM pages WHERE page_id IN($in)"); // Soru işaretlerini sorguya ekle
	$sil->execute($id); // Seçilen id değerlerini gönder
	$hata = $sil->errorInfo();
	if($hata[2])
	{
		echo "Silme işlemi başarısız";
	}else
	{
		echo "Silme işlemi başarılı";
	}
	}
  ###############################################################################################################
  //-------------------------------------------------------------------------------------------------------------//





	#######################################################################################################################
	########################## menu add   #################################################################################
	//---------------------------------------------------------------------//
	if (isset($_POST['menuadd'])) {   			#duyme adi

	if ($_POST['menu_blank']) {$resultblank=1 ;}
	else {$resultblank=0 ;}

	$save=$db->prepare("INSERT INTO menu SET   	#tablo adi
	 #sutun adi--> leqebi
		menu_name=:a,
		menu_link=:b,
		menu_blank=:h,
		menu_durum=:c ");
	$insert=$save->execute(array(
	 #sutun leqebi --> adi
		'a'=>$_POST['menu_name'],
		'b'=>$_POST['menu_link'],
		'h'=>$resultblank,
		'c'=>$_POST['menu_durum']
		 ));

	}

	########################## menu update ######################################################################

	if (isset($_POST['menuupdate'])) {          #duyme adi

	if ($_POST['menu_blank']) {$resultblank=1 ;}
	else {$resultblank=0 ;}

	$menusave=$db->prepare("UPDATE menu SET  #tablo adi

	 #sutun adi--> leqebi
		menu_name=:a,
		menu_link=:b,
		menu_blank=:h,
		menu_durum=:c

	WHERE id={$_POST['menu_id']}");
	$update=$menusave->execute(array(

	 #sutun leqebi --> adi
		'a'=>$_POST['menu_name'],
		'b'=>$_POST['menu_link'],
		'h'=>$resultblank,
		'c'=>$_POST['menu_durum']

	));

}
########################## menu delete #####################################################################

	if ($_POST['menudelete']=="ok"){	            #sil duymesinden gelen ad

			$sil=$db->prepare("DELETE from menu where id=:id"); #ne silinecek

			$sil->execute(array('id' => $_POST['menu_id']));	#ne silinecek hardan

}

########################## menu color ######################################################################

if ($_POST['color']=="ok") {          #duyme adi

$menusave=$db->prepare("UPDATE menutheme SET  #tablo adi
 #sutun adi--> leqebi
	theme_back=:a,
	theme_openback=:b,
	theme_fontweight=:c,
	theme_font=:d,
	theme_fontsize=:e,
	theme_hovercolor=:k,
	theme_hovertextcolor=:l

WHERE theme_id={$_POST['theme_id']}");
$menusave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['background_color'],
	'b'=>$_POST['background_opener'],
	'c'=>$_POST['theme_fontweight'],
	'd'=>$_POST['background_font'],
	'e'=>$_POST['theme_fontsize'],
	'k'=>$_POST['theme_hovercolor'],
	'l'=>$_POST['theme_hovertextcolor']

));

}
################################################################################################################
//--------------------------------------------------------------------------------------------------------//


########################## menu update ######################################################################

if (isset($_POST['libupdate'])) {         #duyme adi

$libsave=$db->prepare("UPDATE library SET  #tablo adi

 #sutun adi--> leqebi
	lib_name=:a,
	lib_headcode=:b,
	lib_footercode=:c

WHERE lib_id={$_POST['lib_id']}");
$update=$libsave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['lib_name'],
	'b'=>$_POST['lib_headcode'],
	'c'=>$_POST['lib_footercode']

));

}
################################################################################################################
//--------------------------------------------------------------------------------------------------------//



	########################## admin update ######################################################################

	if (isset($_POST['adminupdate'])) {          #duyme adi

	$adminsave=$db->prepare("UPDATE admin SET  #tablo adi

	 #sutun adi--> leqebi
		admin_name=:a,
		admin_surname=:b,
		admin_date=:c,
		admin_login=:d,
		admin_email=:e,
		admin_city=:h,
		admin_country=:g,
		admin_durum=:j,
		admin_picurl=:l

	WHERE admin_id={$_POST['admin_id']}");
	$update=$adminsave->execute(array(

	 #sutun leqebi --> adi
		'a'=>$_POST['admin_name'],
		'b'=>$_POST['admin_surname'],
		'c'=>$_POST['admin_date'],
		'd'=>$_POST['admin_login'],
		'e'=>$_POST['admin_email'],
		'h'=>$_POST['admin_city'],
		'g'=>$_POST['admin_country'],
		'j'=>$_POST['admin_durum'],
		'l'=>$_POST['admin_picurl']

	));

}
//------------------------------------------------------------------------//
if (isset($_POST['adminwithpassupdate'])) {          #duyme adi

$adminsave=$db->prepare("UPDATE admin SET  #tablo adi

 #sutun adi--> leqebi
	admin_name=:a,
	admin_surname=:b,
	admin_date=:c,
	admin_login=:d,
	admin_email=:e,
	admin_city=:h,
	admin_country=:g,
	admin_durum=:j,
	admin_picurl=:l,
	admin_password=:p

WHERE admin_id={$_POST['admin_id']}");
$update=$adminsave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['admin_name'],
	'b'=>$_POST['admin_surname'],
	'c'=>$_POST['admin_date'],
	'd'=>$_POST['admin_login'],
	'e'=>$_POST['admin_email'],
	'h'=>$_POST['admin_city'],
	'g'=>$_POST['admin_country'],
	'j'=>$_POST['admin_durum'],
	'l'=>$_POST['admin_picurl'],
	'p'=> md5($_POST['admin_password'])

));

}

	########################## admin add   #################################################################################
	//---------------------------------------------------------------------//
	if (isset($_POST['adminadd'])) {   			#duyme adi

	$save=$db->prepare("INSERT INTO admin SET   	#tablo adi
	 #sutun adi--> leqebi
		admin_name=:a,
		admin_surname=:b,
		admin_password=:c,
		admin_mission=:d,
		admin_login=:e
		");
  $save->execute(array(
	 #sutun leqebi --> adi
		'a'=>$_POST['admin_name'],
		'b'=>$_POST['admin_surname'],
		'c'=>md5($_POST['admin_password']),
		'd'=>$_POST['admin_mission'],
		'e'=>$_POST['admin_login']
		 ));

	}
//---------------------------------------------------------------------//
########################## admin delete ###########################################################################

  if ($_POST['admindelete']=="ok"){	            #sil duymesinden gelen ad

  	#islemkontrol ();

  		$sil=$db->prepare("DELETE from admin where admin_id=:id"); #ne silinecek

  		$sil->execute(array('id' => $_POST['admin_id']));	#ne silinecek hardan

  }





########################## main update ######################################################################

		if ($_POST['mainoptions']=="ok") {          #duyme adi

		$opsave=$db->prepare("UPDATE mainoptions SET  #tablo adi

		 #sutun adi--> leqebi
			option_favicion=:a,
			option_logo=:b,
			option_test=:c

		WHERE option_id={$_POST['option_id']}");
		$update=$opsave->execute(array(

		 #sutun leqebi --> adi
			'a'=>$_POST['option_favicion'],
			'b'=>$_POST['option_logo'],
			'c'=>$_POST['option_test']

		));

	}



########################## blog add   #################################################################################
//---------------------------------------------------------------------//
		if (isset($_POST['Blogadd'])) {   			#duyme adi

		$save=$db->prepare("INSERT INTO blog SET   	#tablo adi
		 #sutun adi--> leqebi
			blog_name=:a,
			blog_author=:b,
			blog_seoname=:c
			");
	  $save->execute(array(
		 #sutun leqebi --> adi
			'a'=>$_POST['blog_name'],
			'b'=>$_POST['blog_author'],
			'c'=>seo($_POST['blog_name'])
			 ));

		}
	//---------------------------------------------------------------------//


	########################## blog delete toplu #################################

	if ($_POST['Blogdell']=="ok"){

	$blog = $_POST['Allposts'];

	foreach($blog as $post){
	  $sil=$db->prepare("DELETE from blog where blog_id=:id"); #ne silinecek
	  $sil->execute(array('id' => $post));	#ne silinecek hardan
	  }
	    $db=null;//end connection
	}



	############################ blog durum ############################################
	if ($_POST['blogDurumCH']=="ok"){

	  $id = $_POST['blog_id'];
	  $durum = $_POST['blog_durum'];

	      $save=$db->prepare("UPDATE blog SET  #tablo adi
	      #sutun adi--> leqebi
	      blog_durum=:a

	      WHERE blog_id=:id");
	      $save->execute(array(

	       #sutun leqebi --> adi
	      'a'=> $durum,
	      'id'=> $id
	      ));


	}
	##########################  update blog options   #########################################################
	if (isset($_POST['blogoptions'])) {

	$save=$db->prepare("UPDATE blog SET  #tablo adi
	#sutun adi--> leqebi
	blog_name=:a,
	blog_title=:c,
	blog_tag=:d,
	blog_keywords=:e,
	blog_group=:f,
	blog_wallpaper=:l,
	blog_date=:g

	WHERE blog_id={$_POST['blog_id']}");
	$save->execute(array(
	 #sutun leqebi --> adi
	 'a'=>$_POST['blog_name'],
	 'c'=>$_POST['blog_title'],
	 'd'=>$_POST['blog_tag'],
	 'e'=>$_POST['blog_keywords'],
	 'f'=>$_POST['blog_group'],
	 'l'=>$_POST['blog_wallpaper'],
	 'g'=>$_POST['blog_date']
		));

	}
	#####################################################################################################



	########################## blogtheme color ######################################################################

	if ($_POST['blogcolor']=="ok") {          #duyme adi

	$menusave=$db->prepare("UPDATE blogtheme SET  #tablo adi
	 #sutun adi--> leqebi
		theme_main=:a

	WHERE theme_id={$_POST['theme_id']}");
	$menusave->execute(array(

	 #sutun leqebi --> adi
		'a'=>$_POST['theme_main']

	));

	}
	################################################################################################################
	//--------------------------------------------------------------------------------------------------------//

	########################## blog texts ######################################################################

	if ($_POST['blogcolor']=="ok") {          #duyme adi

	$menusave=$db->prepare("UPDATE blogtheme SET  #tablo adi
	 #sutun adi--> leqebi
		main_text=:a,
		follow_us=:b,
		catecory=:c,
		last_post=:d,
		tags=:e,
		social_icon1=:q,
		social_icon2=:w,
		social_icon3=:r,
		social_icon4=:t,
		social_link1=:y,
		social_link2=:u,
		social_link3=:i,
		social_link4=:o

	WHERE theme_id={$_POST['theme_id']}");
	$menusave->execute(array(

	 #sutun leqebi --> adi
		'a'=>$_POST['main_text'],
		'b'=>$_POST['follow_us'],
		'c'=>$_POST['catecory'],
		'd'=>$_POST['last_post'],
		'e'=>$_POST['tags'],
		'q'=>$_POST['social_icon1'],
		'w'=>$_POST['social_icon2'],
		'r'=>$_POST['social_icon3'],
		't'=>$_POST['social_icon4'],
		'y'=>$_POST['social_link1'],
		'u'=>$_POST['social_link2'],
		'i'=>$_POST['social_link3'],
		'o'=>$_POST['social_link4']

	));

	}
	################################################################################################################




		#######################################################################################################################
		########################## blog catecory add   #################################################################################
		//---------------------------------------------------------------------//
		if (isset($_POST['CAtadd'])) {   			#duyme adi

		$save=$db->prepare("INSERT INTO bloggroup SET   	#tablo adi
		 #sutun adi--> leqebi
			blog_group=:a

			");
		$insert=$save->execute(array(
		 #sutun leqebi --> adi
			'a'=>$_POST['cat_name']

			 ));

		}
	//--------------------------------------------------------------------------------------------------------//

	##########################  update blog catecory name   #########################################################
	if (isset($_POST['CAtchange'])) {

	$save=$db->prepare("UPDATE bloggroup SET  #tablo adi
	#sutun adi--> leqebi
	blog_group=:a

	WHERE blog_id={$_POST['blog_id']}");
	$save->execute(array(
	 #sutun leqebi --> adi
	 'a'=>$_POST['blog_group']
		));

	}
	#####################################################################################################

	########################## catecory delete #####################################################################

		if ($_POST['catdelete']=="ok"){	            #sil duymesinden gelen ad

				$sil=$db->prepare("DELETE from bloggroup where blog_id=:id"); #ne silinecek

				$sil->execute(array('id' => $_POST['blog_id']));	#ne silinecek hardan

	}


		########################## slider update ######################################################################

		if (isset($_POST['sliderpicoptions'])) {          #duyme adi

		$slidesave=$db->prepare("UPDATE slider SET  #tablo adi
		 #sutun adi--> leqebi
			slider_picurl=:a,
			slider_link=:b

		WHERE slider_id={$_POST['slider_id']}");
		$update=$slidesave->execute(array(

		 #sutun leqebi --> adi
			'a'=>$_POST['slider_picurl'],
			'b'=>$_POST['slider_link']

		));

	}
?>
