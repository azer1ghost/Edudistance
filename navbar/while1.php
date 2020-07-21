
<?php

			$mother1=$menucek['id'];
		  $menusor1=$db->prepare("SELECT * from menu Where parent_id=$mother1 order by  menu_sira ASC limit 10");
	  	$menusor1->execute();
while($menucek1=$menusor1->fetch(PDO::FETCH_ASSOC)){  ?>

		<?php if ($menucek1['menu_durum']==1) {?>

				<li>
						<a href="<?php echo $menucek1['menu_link']; ?>" <?php if  ($menucek1['menu_blank']==1) {?> target="_blank"<?php }?> > <?php echo $menucek1['menu_name']; if ($menucek1['menu_mother']==1) {?></a>
						<ul>
							<?php include 'while2.php';?>
						</ul>
				</li>

			<?php }  elseif ($menucek1['menu_mother']==0){?>

			</a></li>

		<?php }  elseif ($menucek1['menu_durum']==0){    }}}?>
