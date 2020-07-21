<?php
ob_start();
session_start();


function islemkontrol () {

    if (empty($_SESSION['admin_login'])) {

        Header("Location:../pages/login.php?durum=error");
        exit;
    }
}


function seo($s) {
 $az = array('ş','Ş','ə','Ə','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
 $eng = array('s','s','e','e','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
 $s = str_replace($az,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}


function seogetmethod($s) {
 $az = array('ş', 'Ş', 'ə', 'Ə', 'ı', 'I', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç', '(', ')', '/', ':', ',' );
 $eng = array('s', 's', 'e', 'e', 'i', 'i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c', '', '', '-', '-', '');
 $s = str_replace($az,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '+', $s);
 $s = preg_replace('|-+|', '+', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '+');
 return $s;
}

function stringdel($xxx) {
 $aza = '"';
 $enga = '\"';
 $xxx = str_replace($aza,$enga,$xxx);
 return $xxx;
}


function tarix($aaa) {
 $en = array('Jan','Feb','March','Apr','May','jun','jul','Aug','Sep','Oct','Nov','Dec');
 $aze = array('Yanvar','Fevral','Mart','Aptel','May','Iyun','Iyul','Avqust','Sentyabr','Oktyabr','Noyabr','Dekabr');
 $aaa = str_replace($en,$aze,$aaa);
 $aaa = trim($aaa, '-');
 return $aaa;
}


function makeClickableLinks($text)
{
        $text = html_entity_decode($text);
        $text = " ".$text;
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1" target=_blank>\\1</a>', $text);
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1" target=_blank>\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '\\1<a href="http://\\2" target=_blank>\\2</a>', $text);
        $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',
        '<a href="mailto:\\1" target=_blank>\\1</a>', $text);
        return $text;
}




function make_thumb($src, $dest, $desired_width) {
	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);

	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));

	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);

	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
}



?>
