
<?php

			$mother3=$menucek2['id'];
	  	$menusor3=$db->prepare("SELECT * from menu Where parent_id=$mother3 order by  menu_sira ASC limit 10");
	  	$menusor3->execute();
while($menucek3=$menusor3->fetch(PDO::FETCH_ASSOC)){  ?>

		<?php if ($menucek3['menu_durum']==1) {?>

				<li>
						<a href="<?php echo $menucek3['menu_link']; ?>" <?php if  ($menucek3['menu_blank']==1) {?> target="_blank"<?php }?>><?php echo $menucek3['menu_name']; if ($menucek3['menu_mother']==1) {?></a>
						<ul>
							<?php include 'while3.php';?>
						</ul>
				</li>

			<?php }  elseif ($menucek3['menu_mother']==0){?>

			</a></li>

		<?php }  elseif ($menucek3['menu_durum']==0){    }}}?>
