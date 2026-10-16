<?php


include __DIR__."/header.php";

if(!us_level){
	fh_go(path);
	exit;
}

if (!fh_access("quizzes")){
	echo '<div class="container pt-5">
		'.fh_alerts($lang["newquiz"]["alertperm"]).'
	</div>';
	fh_go(path, 3);
	include __DIR__."/footer.php";
	exit;
}

if($id && (!db_rows("quizzes WHERE id = '{$id}' && author = '".us_id."'") || us_level != 6) ){
	fh_go(path);
	exit;
}

?>
<div class="pt-breadcrumb-p">
	<div class="container">
		<div class="pt-dtable">
			<div class="pt-vmiddle">
				<h3><?=($id?$lang['newquiz']['edit']:$lang['newquiz']['new'])?></h3>
				<p><?=$lang['newquiz']['desc']?></p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<?php include __DIR__."/cpanel/quizzes.php"; ?>
</div>

<?php
include __DIR__."/footer.php";
