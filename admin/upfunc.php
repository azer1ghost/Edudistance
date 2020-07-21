<?php
ob_start();				//Sesia basladildi *
session_start();
date_default_timezone_set("Asia/Baku");
include '../setting/connect.php';  //baglanti temin edildi *

/////////////////////////////////////////////////////////////////////
//Upate date controller
function updateControl($url,$username,$password){

  $usernamePassword = $username . ':' . $password;
  $headers = array('Authorization: Basic ' . base64_encode($usernamePassword), 'Content-Type: application/json');

  //SETTING UP CURL REQUEST
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_FILETIME, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $exec = curl_exec($ch);

  $fileTime = curl_getinfo($ch, CURLINFO_FILETIME);
  if ($fileTime > -1) {
     $Date = date("Y-m-d H:i", $fileTime);
  }

    include 'uplog.txt';

      if ($Date == $lastUpdate) { return 0; }
      else {  return 1; }

    //CONNECTION CLOSE
    curl_close($ch);
  }


/////////////////////////////////////////////////////////////////////
//Update function
function Update($url,$username,$password){
  //API KEY AND PASSWORD
  $usernamePassword = $username . ':' . $password;
  $headers = array('Authorization: Basic ' . base64_encode($usernamePassword), 'Content-Type: application/json');

  //FILE NAME
  $filename = 'updates.zip';

  //DOWNLOAD PATH
  $path = 'downloads/'.$filename;

  //FOLDER PATH
  $fp = fopen($path, 'w');

  //SETTING UP CURL REQUEST
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_FILETIME, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $exec = curl_exec($ch);

  $fileTime = curl_getinfo($ch, CURLINFO_FILETIME);
  if ($fileTime > -1) {
      $Date = date("Y-m-d H:i", $fileTime);
  }

  $updatesDate = 'uplog.txt';
  // Open the file to get existing content
  $current = file_get_contents($updatesDate);
  // Append a new person to the file
  $current .= "<?php $"."lastUpdate = '".$Date."'; ?>\n";
  // Write the contents back to the file
  file_put_contents($updatesDate, $current);

  //unzip and delete old zip
    $file="downloads/updates.zip";

    if(unzip_file($file,'../')){

      //delete old files
    $deletefiles = '../delete.txt';

    if (file_exists($deletefiles)) {

      fclose($fp);
      include $deletefiles;
      foreach ($DellFiles as $filesofdell) {

        if (pathinfo($filesofdell, PATHINFO_EXTENSION)){
          unlink($filesofdell);
        }
        if (!pathinfo($filesofdell, PATHINFO_EXTENSION)){
          delete_files($filesofdell);
        }

      }

      unzip_file($file,'../');
      unlink($deletefiles);
    }
    else {
      fclose($fp);
    }

    unlink($file);

        return 1;

    } else{

        return 0;
    }
  //

  //CONNECTION CLOSE
  curl_close($ch);
}


function unzip_file($file, $destination){
    // create object
    $zip = new ZipArchive() ;
    // open archive
    if ($zip->open($file) !== TRUE) {
        return false;
    }
    // extract contents to destination directory
    $zip->extractTo($destination);
    // close archive
    $zip->close();
        return true;
}

  // folder deleter
  function delete_files($dir) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir")
             delete_files($dir."/".$object);
          else unlink   ($dir."/".$object);
        }
      }
      reset($objects);
      rmdir($dir);
    }
   }


 ?>
