<?php


function fh_check_true($c, $a){
	if(gettype($c) == "array"){
		$vr = (in_array($a,$c)) ? (db_get("answers", "correct", $a) ? 't' : 'f') : '';
		return in_array($a,$c).' '.($vr =='t'?'alert-success':($vr =='f'?'alert-danger':''));
	} else {
		$vr = ($c == $a) ? (db_get("answers", "correct", $a) ? 't' : 'f') : '';
		return $c.' '.($vr =='t'?'alert-success':($vr =='f'?'alert-danger':''));
	}
}

$u_answers = json_decode(($r?db_get("results", "answers", $r):db_get("results", "answers", $id, "quiz"," && author ='".us_id."' ORDER BY id DESC LIMIT 1")), true);
?>
<div class="pt-quizresults">

	<h4><?=$lang['quiz']['your']?></h4>
	<hr />

	<div class="pt-box">
		<?php
		$q_sql = $db->query("SELECT * FROM ".prefix."questions WHERE quiz = '{$id}' ORDER BY id ASC");
		if($q_sql->num_rows):
		$i = 0;
		while($q_rs = $q_sql->fetch_assoc()):
		$i++;
		$dd = $db->query("SELECT count(a.id) as cc, a.question from ".prefix."quizzes as q left join ".prefix."answers as a on(a.quiz=q.id) where q.id='{$id}' group by a.question order by count(a.id) DESC LIMIT 1") or die($db->error);
		$rr = $dd->fetch_assoc();

		?>
		<div class="pt-box bg-gy">
			<b>Q<?=$i?>: </b>
			<?php if ($q_rs['image']): ?>
				<a href="<?=path.'/'.$q_rs['image']?>" data-lightbox="image-1"><?=($q_rs["title"] ? $q_rs["title"] : $lang['quiz']['img'].' '.$i)?></a>
			<?php else: ?>
				<?=($q_rs["title"] ? $q_rs["title"] : $lang['quiz']['notitle'])?>
			<?php endif; ?>
		</div>
		<div class="form-row">
			<?php
			$qa_sql = $db->query("SELECT * FROM ".prefix."answers WHERE question = '{$q_rs["id"]}' ORDER BY id ASC");
			if($qa_sql->num_rows):
			while($qa_rs = $qa_sql->fetch_assoc()):
				switch ($q_rs['type']) :
					case 'normal':
					case 'objective':
						?>
						<div class="col">
							<div class="pt-box text-center <?=fh_check_true($u_answers[$q_rs['id']], $qa_rs['id'])?>"><?=$qa_rs['title']?></div>
						</div>
						<?php
						break;
					case 'images':
						?>
						<div class="col">
							<div class="pt-box text-center <?=fh_check_true($u_answers[$q_rs['id']], $qa_rs['id'])?>">
								<img src="<?=path.'/'.$qa_rs['image']?>" onerror="this.src='<?=noimage?>'" />
							</div>
						</div>
						<?php
						break;
					case 'fill':
						?>
						<div class="col">
							<div class="pt-box text-center <?=strtolower($u_answers[$q_rs['id']]) == strtolower($qa_rs['title']) ? 'alert-success' : 'alert-danger'?>"><?=$u_answers[$q_rs['id']]?></div>
							</div>
						<?php
						break;
				endswitch;
			endwhile;
			endif;
			$qa_sql->close();
			?>

		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php $q_sql->close(); ?>

	</div>

	<?php if (!fh_access("show_ads")): ?>
	<div class="ads1">
		<?=site_ads2?>
	</div>
	<?php endif; ?>

</div>
