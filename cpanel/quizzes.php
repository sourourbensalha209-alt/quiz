<?php

?>

<?php if (page != 'newquiz'): ?>
<div class="pt-breadcrumb">
	<div class="pt-title">
		<i class="icon-notebook icons ic"></i> <?=$lang['dash']['quizzes']?>
		<p><a href="<?=path?>"><?=$lang['header']['dashboard']?></a> <i class="fas fa-long-arrow-alt-right"></i> <?=$lang['dash']['quizzes']?></p>
	</div>

	<div class="pt-options">
		<a href="<?=path?>/dashboard.php?pg=quizzes&request=new" class="pt-btn"><i class="fas fa-plus"></i> <?=$lang['dash']['newquiz']?></a>
	</div>
</div>
<?php endif; ?>



<div class="pt-box pt-newquiz">
<?php
if( $request == "new" ):
$rs = ($id ? db_rs("quizzes WHERE id = '".$id."' LIMIT 1") : '');
?>
	<div class="modal-body">
		<div class="row">
			<div class="col-8">
				<?php include __DIR__.'/../partials/quizform.php'; ?>
				<?php if (db_rows("questions WHERE quiz = '{$id}'")): ?>
				<div class="pt-box">
					<h3><?=$lang['newquiz']['questions']?>:</h3>
					<hr>
					<?php
					$q_sql = $db->query("SELECT * FROM ".prefix."questions WHERE quiz = '{$id}' ORDER BY id ASC");
					if($q_sql->num_rows):
					while($q_rs = $q_sql->fetch_assoc()):
					?>
					<div>
					<div class="pt-quiz-question">
						<?php if ($q_rs['image']): ?>
							<a href="<?=path.'/'.$q_rs['image']?>" data-lightbox="image-1"><?=($q_rs["title"] ? $q_rs["title"] : $lang['quiz']['notitle'])?></a>
						<?php else: ?>
							<?=($q_rs["title"] ? $q_rs["title"] : $lang['quiz']['notitle'])?>
						<?php endif; ?>

						<div class="pt-right">
							<a href="<?=path?>/<?=page?>.php?pg=quizzes&request=new&id=<?=$id?>&qid=<?=$q_rs["id"]?>"><i class="fas fa-pencil-alt"></i></a>
							<a href="#" class="pt-delete" data-id="<?=$q_rs['id']?>" data-type="question"><i class="fas fa-trash-alt"></i></a>
						</div>
					</div>
					<div>
						<?php
						$qa_sql = $db->query("SELECT * FROM ".prefix."answers WHERE question = '{$q_rs["id"]}' ORDER BY id ASC");
						if($qa_sql->num_rows):
						while($qa_rs = $qa_sql->fetch_assoc()):
						?>
						<div class="pt-quiz-answer">
							<?php echo $qa_rs["title"] ?>
							<div class="pt-right">
								<a href="<?=path?>/<?=page?>.php?pg=quizzes&request=new&id=<?=$id?>&qid=<?=$q_rs["id"]?>&aid=<?=$qa_rs["id"]?>"><i class="fas fa-pencil-alt"></i></a>
								<a href="#" class="pt-delete" data-id="<?=$qa_rs['id']?>" data-type="answer"><i class="fas fa-trash-alt"></i></a>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php $qa_sql->close(); ?>
					</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php $q_sql->close(); ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-4">
				<div class="pt-box">
					<?php $qu_rs = ($qid ? db_rs("questions WHERE id = '{$qid}'") : ''); ?>
					<?php include __DIR__.'/../partials/questionform.php'; ?>
				</div>
				<?php if ($qid && !in_array(db_get("questions", "type", $qid),['objective'])): ?>
				<?php if (!$aid && db_get("questions", "type", $qid) == 'fill' && db_rows("answers WHERE question = '{$qid}'")): ?>
				<?php else: ?>
				<div class="pt-box">
					<?php include __DIR__.'/../partials/answerform.php'; ?>
				</div>
				<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="modal-footer">
		<?php if ( isset($rs['status']) && $rs['status'] ): ?>
			<?php else: ?>
			<button type="button" class="pt-btn quizsave"><?=$lang['quiz']['svquiz']?></button>
		<?php endif; ?>

		<a <?php if ($id): ?>href="<?=path.'/quizzes.php?id='.$id.'&t='.fh_seoURL($rs['title'])?>" target="_blank"<?php endif; ?> class="pt-btn bg-o<?=(!$id?' pt-disabled': '')?>"><?=$lang['quiz']['preview']?></a>
		<button type="button" class="pt-btn bg-gr quizpublish"<?=(!db_rows("answers WHERE quiz = '{$id}'")?' disabled="disabled"': '')?> data-id="<?=$id?>"><?=$lang['quiz']['publish']?></button>
	</div>


<?php else: ?>
<div class="table-responsive">
	<table class="table">
		<thead>
			<th colspan="2"><?=$lang['dash']['quiz']?></th>
			<th class="text-center"><?=$lang['dash']['author']?></th>
			<th class="text-center"><?=$lang['dash']['category']?></th>
			<th class="text-center"><?=$lang['dash']['takers']?></th>
			<th class="text-center"><?=$lang['created_at']?></th>
			<th class="text-center"><?=$lang['updated_at']?></th>
			<th></th>
		</thead>
		<tbody>
			<?php
			$sql = $db->query("SELECT q.id, q.title, q.author, q.thumbnail, q.created_at, q.updated_at, c.color, c.icon FROM ".prefix."quizzes AS q LEFT JOIN ".prefix."categories AS c ON(c.id=q.category) ORDER BY q.id DESC LIMIT {$startpoint} , {$limit}");
			if($sql->num_rows):
			while($rs = $sql->fetch_assoc()):
			?>
			<tr>
				<th width="1"><div class="pt-thumb"><img src="<?=path?>/<?=$rs['thumbnail']?>" onerror="this.src='<?=noimage?>'"></div></th>
				<td>
					<h3><a href="<?=path?>/quizzes.php?id=<?=$rs['id']?>&t=<?=fh_seoURL($rs['title'])?>"><?=$rs['title']?></a></h3>
				</td>
				<td class="text-center"><?=fh_user($rs['author'])?></td>
				<td class="text-center"><div class="pt-thumb" style="background: <?=$rs['color']?>"><i class="<?=$rs['icon']?>"></i></div></td>
				<td class="text-center"><?=db_rows("results WHERE quiz = '{$rs["id"]}'")?></td>
				<td class="text-center"><?=fh_ago($rs['created_at'])?></td>
				<td class="text-center"><?=($rs['updated_at']?fh_ago($rs['updated_at']):'--')?></td>
				<td class="pt-dot-options">
					<a class="pt-options-link"><i class="fas fa-ellipsis-h"></i></a>
					<ul class="pt-drop">
						<li><a href="<?=path?>/dashboard.php?pg=quizzes&request=new&id=<?=$rs['id']?>"><i class="far fa-edit"></i> <?=$lang['edit']?></a></li>
						<li><a href="#" class="pt-delete" data-id="<?=$rs['id']?>" data-type="quiz"><i class="fas fa-trash-alt"></i> <?=$lang['delete']?></a></li>
					</ul>
				</td>
			</tr>
			<?php endwhile; ?>
			<tr><td colspan="7"><?=fh_pagination("quizzes",$limit, path."/dashboard.php?pg=quizzes&")?></td></tr>
			<?php else: ?>
				<tr>
					<td colspan="7" class="text-center"><?=$lang['alerts']['no-data']?></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>

</div>
