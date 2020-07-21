<?php

require "connect.php";

if ($_POST) {
    saveList($db, $_POST['list']);
    exit;
}

function motherZero($aay){
  if ($aay<1){
      $result=0;
      $save=$db->prepare("UPDATE menu SET menu_mother=:m WHERE id={$id}");
      $save->execute(array('m'=>$result));
  }
}



function saveList($db, $list, $parent_id = 0, & $menu_sira = 0) {
    foreach($list as $item) {
        $menu_sira++;

        $sql = "
            UPDATE menu
            SET
                parent_id = :parent_id,
                menu_sira = :menu_sira
            WHERE id = :id
        ";
        $statement = $db->prepare($sql);
        $statement->bindValue(":parent_id", $parent_id, PDO::PARAM_INT);
        $statement->bindValue(":id", $item["id"], PDO::PARAM_INT);
        $statement->bindValue(":menu_sira", $menu_sira, PDO::PARAM_INT);
        $statement->execute();
        /////////////////////
                $id=$item["id"];

                $result=0;
                $save=$db->prepare("UPDATE menu SET menu_mother=:m WHERE id={$id}");
                $save->execute(array('m'=>$result));


          ////////////////////////

        if (array_key_exists("children", $item)) {
            saveList($db, $item["children"], $item["id"], $menu_sira);

            /////////////////////
                    $id=$item["id"];

                    $sorgu=$db->prepare("SELECT * FROM menu WHERE parent_id=:xyz ");

                    $sorgu->execute(array('xyz'=>$id));

                    $say=$sorgu->rowCount();

                if ($say>0){
                    $result=1;
                    $save=$db->prepare("UPDATE menu SET menu_mother=:m WHERE id={$id}");
                    $save->execute(array('m'=>$result));
                }

              //////////////////////////
        }


    }
}

?>
