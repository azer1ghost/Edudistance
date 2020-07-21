<?php
//datebase connection
try{
    $db=new PDO("mysql:host=localhost;dbname=cms-art-des",'root','4145124azer');
    $db->exec("set names utf8"); }

catch (PDOExpception $e) { echo $e->getMessage ();
}

//main options
$sitename="http://localhost/mycsm/";
$adminpanelname="admin";


//updates connection
$UpdateURL= 'http://localhost/mycsm/updates/updates.zip';
$username="fred";
$password="p29cmnwl4a0et";

?>
