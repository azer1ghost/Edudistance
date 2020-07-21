<?php
ob_start();
session_start();
include '../setting/connect.php';


if(isset($_SESSION['cms_admin_login'])) { //if sesion exsist run this command

  $adminsor=$db->prepare("select * from `admin` where admin_login=:id");
  $adminsor->execute(array('id' => $_SESSION['cms_admin_login']));
  $adminprint=$adminsor->fetch(PDO::FETCH_ASSOC);

    if ($adminprint['admin_durum']=="1") { //if status = 1  apply login user

      $_SESSION['admin_picurl'] = $adminprint['admin_picurl'];  //user image to sesion
      $_SESSION['admin_name'] = $adminprint['admin_name']." ".$adminprint['admin_surname']; //user name and surnmae to sesion

      header("Location:homepage.php"); //go home page

    } else { //if status = 0  false login user

      header("Location:login.php?status=false"); //go home page
      session_destroy(); //destroy sesion
      exit;

    }

} else { header("Location:login.php"); } //if sesion not exsist go login page



// for unlock
if (isset($_POST['admin_password'])) { // if password send run this command

  $adminsor=$db->prepare("select * from `admin` where admin_login=:id");
  $adminsor->execute(array('id' => $_SESSION['lock_login']));
  $adminprint=$adminsor->fetch(PDO::FETCH_ASSOC);

  $admin_password = $adminprint['admin_password']; // get admin password
  $_SESSION['admin_picurl'] = $adminprint['admin_picurl']; //user image to sesion
  $_SESSION['admin_name'] = $adminprint['admin_name']." ".$adminprint['admin_surname']; //user name and surnmae to sesion

  if ($admin_password == md5($_POST['admin_password'])) { //if password the same run this
      $_SESSION['cms_admin_login'] = $_SESSION['lock_login']; // complate sesion re connect
      header("Location:homepage.php"); //go to hme page
  } else { //if password false go lock screen again
      header("Location:lockscreen.php?status=password-wrong");
  }
}


?>
