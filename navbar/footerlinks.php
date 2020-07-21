
<ul>
<?php $menusor=$db->prepare("SELECT * from menu  Where parent_id=0 order by  menu_sira ASC limit 7");
			$menusor->execute();
while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){  ?>


<?php if ($menucek['menu_durum']==1) {?>

		<li class="footerlinks">
				<a style="font-size: 14px;" href="<?php echo $menucek['menu_link']; ?> <?php if  ($menucek['menu_blank']==1) {?> target="_blank"<?php }?>"><?php echo $menucek['menu_name']; if ($menucek['menu_mother']==1) {?></a>
		</li>

	<?php }  elseif ($menucek['menu_mother']==0){?>

	</a></li>

	<?php }  elseif ($menucek['menu_durum']==0){    }}}?>
</ul>
