<?php


include __DIR__."/header.php";


if($id):
	$quiz = db_rs("quizzes WHERE id = '{$id}'");

	if(!$quiz){
		fh_go(path);
		exit;
	}


	$questions = db_rows("questions where quiz = '{$id}'");
	$share_url = path."/quizzes.php?id={$id}&t=".fh_seoURL($quiz['title']);

	$randoms = $quiz['randoms'] ? 'rand()' : 'id';

?>
<style>
.pt-quiz-wrapper .pt-right #example-async .steps ul li { width: <?=($questions ? 100/$questions : 0)?>%; }
</style>


<div class="pt-quiz-wrapper<?=(!$quiz['boxed'] ? ' quiz-boxed' : '')?><?=($quiz['with_background']==2 ? ' quiz-top' : '')?><?=(!$quiz['with_background'] ? ' quiz-top quiz-none' : '')?>">
	<div class="pt-left">
		<div class="pt-image-left" style="background-image: url('<?=path?>/<?=$quiz['background']?>')"></div>
		<div class="pt-left-content">
			<div class="pt-logo">
				<a href="<?=path?>/quizzes.php"><img src="<?=path?>/<?=(!$quiz['with_background'] ? 'assets/img/logo-color.png' : site_logo)?>" alt="<?=site_title?>"></a>
				<div class="pt-social">
					<b><?=$lang['quiz']['share']?>:</b>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$share_url?>" target="_blank"><i class="fab fa-facebook"></i></a>
					<a href="https://twitter.com/intent/tweet/?text=<?=urlencode($quiz['title'])?>&mp;url=<?=$share_url?>&amp;via=khalidpuerto" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=&su=<?=($quiz['title'])?>&body=<?=($quiz['title'])?> <?=$share_url?>&ui=2&tf=1&pli=1" target="_blank"><i class="fas fa-envelope"></i></a>
				</div>
			</div>
			<div class="pt-content">
				<div class="pt-links">
					<?php
					if ($quiz['keywords']):
						$keys = explode(",", $quiz['keywords']);
						foreach ($keys as $key => $value) {
							echo '<a >'.$value.'</a>';
						}
					endif;
					?>
				</div>

				<!-- ADS -->
				<?php if (!$quiz['with_background']): ?>
				<?php if (!fh_access("show_ads")): ?>
					<div class="ads1">
						<?=site_ads5?>
					</div>
					<div class="ads2">
						<?=site_ads3?>
					</div>
					<div class="ads3">
						<?=site_ads4?>
					</div>
				<?php endif; ?>
				<?php endif; ?>
				<!-- END ADS -->

				<h3><?=$quiz['title']?></h3>
				<p><?=$quiz['description']?></p>
			</div>
		</div>
	</div>
	<div class="pt-right">
		<div class="pt-questions">
			<?php
			if($request == 'results'):
				include __DIR__.'/partials/quizresults.php';
			else:
			?>
			<div class="count-down"><span><?=($quiz['duration'])?></span></div>
			<form id="sendresponses">
				<div id="example-async">
					<script>
MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  }
};
</script>
					<?php
					$q_sql = $db->query("SELECT * FROM ".prefix."questions WHERE quiz = '{$id}' ORDER BY {$randoms} ASC");
					if($q_sql->num_rows):
					$i = 0;
					while($q_rs = $q_sql->fetch_assoc()):
					$i++;
					?>
					<h3></h3>
			    <section>
						<h3 class="pt-subtitle"><?=$lang['quiz']['question']?> <?=$i?> / <?=db_rows("questions WHERE quiz = '{$id}'")?></h3>
						<h3 class="pt-title"><?=$q_rs['title']?></h3>
						<?php if ($i==2): ?>
							<?php if (!fh_access("show_ads")): ?>
							<div class="ads5">
								<?=site_ads6?>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($q_rs['image']): ?>
						<div class="pt-question-thumb"><img src="<?=path.'/'.$q_rs['image']?>" onerror="this.src='<?=noimage?>'" /></div>
						<?php endif; ?>

						<div class="pt-content<?=($q_rs['type'] == 'images'?' pt-question-images':'')?>">
						<?php
						$qa_sql = $db->query("SELECT * FROM ".prefix."answers WHERE question = '{$q_rs["id"]}' ORDER BY {$randoms} ASC");
						if($qa_sql->num_rows):
						while($qa_rs = $qa_sql->fetch_assoc()):
							switch ($q_rs['type']) :
								case 'normal':
								case 'objective':
									?>
									<div class="form-group">
										<input type="<?=($q_rs['single'] ? 'radio' : 'checkbox')?>" value="<?=$qa_rs['id']?>" name="answer[<?=$q_rs['id']?>]<?=($q_rs['single'] ? '' : '[]')?>" id="an_r<?=$qa_rs['id']?>" class="choice custom">
										<label for="an_r<?=$qa_rs['id']?>"><b><?=$qa_rs['title']?></b></label>
									</div>
									<?php
								break;
								case 'images':
									?>
									<div class="form-group">
										<input type="<?=($q_rs['single'] ? 'radio' : 'checkbox')?>" value="<?=$qa_rs['id']?>" name="answer[<?=$q_rs['id']?>]" id="an_r<?=$qa_rs['id']?>" class="choice image">
										<label for="an_r<?=$qa_rs['id']?>"><b><img src="<?=path.'/'.$qa_rs['image']?>" onerror="this.src='<?=noimage?>'" /></b></label>
									</div>
									<?php
								break;
								case 'fill':
									?>
									<div class="form-group">
										<input type="text" name="answer[<?=$q_rs['id']?>]" class="input" placeholder="<?=$lang['quiz']['youranswer']?>">
									</div>
									<?php
								break;
							endswitch;
						?>

						<?php endwhile; ?>
						<?php endif; ?>
						<?php $qa_sql->close(); ?>

						</div>
			    </section>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php $q_sql->close(); ?>
				</div>
				<input type="hidden" name="quiz" value="<?=$id?>" />
				<input type="hidden" name="duration" class="dur" value="" />
			</form>

			<!-- ADS -->
			<?php if (!fh_access("show_ads")): ?>
			<div class="ads1">
				<?=site_ads2?>
			</div>
			<?php endif; ?>
			<!-- END ADS -->

			<div class="pt-results">
				<div class="bb1 pt-dtable">
					<div class="bb2 pt-vmiddle">
						<i class="icons icon-trophy"></i>
						<h1>83%</h1>
						<h3><?=$lang['quiz']['congratulations']?></h3>
						<p><?=str_replace(['{b1}', '{b2}'], ['<b class="correct"></b>', '<b class="all"></b>'], $lang['quiz']['got'])?></p>
						<div class="pt-links">
							<a href="<?=path?>/quizzes.php?id=<?=$id?>&t=<?=fh_seoURL($quiz['title'])?>" class="pt-btn bg-gr"><?=$lang['quiz']['retake']?></a>
							<a href="<?=path?>/quizzes.php?id=<?=$id?>&t=<?=fh_seoURL($quiz['title'])?>&request=results" class="pt-btn"><?=$lang['quiz']['your']?></a>
						</div>

						<!-- ADS -->
						<?php if (!fh_access("show_ads")): ?>
						<div class="ads4">
							<?=site_ads1?>
						</div>
						<?php endif; ?>
						<!-- END ADS -->

					</div>
				</div>

			</div>
			<?php endif; ?>

			<div class="pt-copy">
			Copyright &copy; 2020 <a href="<?=path?>"><?=site_title?></a>. All Rights Reserved.<br>
			Programming and design with <i class="fas fa-heart text-danger"></i> by <a href="https://www.facebook.com/viore.digital" target="_blanc">Viore Digital</a> &  <a href="https://www.facebook.com/sourour.bensalha.94/" target="_blanc">Sourour Ben Salha</a>.
			</div>
		</div>


	</div>
</div>


<?php
else:
?>

<div class="pt-breadcrumb-p">
	<div class="container">
		<div class="pt-dtable">
			<div class="pt-vmiddle">
				<h3><?=($c ? db_get("categories", "name", $c) : $lang['header']['all'])?> <?=$lang['header']['quizzes']?></h3>
				<p><?=$lang['quiz']['desc']?></p>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row" id="posts">
		<?php
		$my = $request == "my" && us_level ? "&& q.author = '".us_id."'" : '';
		$cat = $c ? "&& q.category = '{$c}'" : "";
		$qq_sql = $db->query("SELECT q.id, q.title, q.category, q.duration, q.author, q.thumbnail, c.color, c.icon, c.name, q.author, u.photo FROM ".prefix."quizzes AS q LEFT JOIN ".prefix."categories AS c ON(c.id=q.category) LEFT JOIN ".prefix."users AS u ON(u.id=q.author) WHERE (q.status = 0 || (q.status = 0 && q.author = '".us_id."')) && (q.private = 0 || (q.private = 1 && q.author = '".us_id."')) {$cat} {$my} ORDER BY q.id DESC LIMIT {$startpoint} , {$limit}");
		if($qq_sql->num_rows):
		while($qq_rs = $qq_sql->fetch_assoc()):
			list($r, $g, $b) = sscanf($qq_rs['color'], "#%02x%02x%02x");
			$qq_rs['rgb'] = $r.','.$g.','.$b;
		?>
		<div class="col-4">
			<div class="pt-item">
				<span class="pt-icon" style="background: <?=$qq_rs['color']?>;border-color: <?=$qq_rs['color']?>;box-shadow: 0 0 0 2px #FFF, 0 0 0 4px <?=$qq_rs['color']?>;"><i class="<?=$qq_rs['icon']?>"></i></span>
				<?php if (us_id == $qq_rs['author']): ?>
				<div class="pt-options">
					<a href="<?=path?>/statistics.php?id=<?=$qq_rs['id']?>&t=<?=fh_seoURL($qq_rs['title'])?>" class="bg-o"><i class="fas fa-chart-pie"></i></a>
					<a href="<?=path?>/newquiz.php?request=new&id=<?=$qq_rs['id']?>" class="bg-gr"><i class="fas fa-pencil-alt"></i></a>
					<a href="#" class="bg-r pt-delete" data-id="<?=$qq_rs['id']?>" data-type="quiz"><i class="fas fa-trash-alt"></i></a>
				</div>
				<?php endif; ?>
				<div class="pt-thumbs"><img src="<?=path?>/<?=$qq_rs['thumbnail']?>" onerror="this.src='<?=nophoto?>'" /></div>
				<h3><div class="pt-dtable"><div class="pt-vmiddle"><?=$qq_rs['title']?></div></div></h3>
				<p>
					<span>
						<span class="pt-thumb"><img src="<?=path?>/<?=$qq_rs['photo']?>" onerror="this.src='<?=nophoto?>'" /></span>
						<?=fh_user($qq_rs['author'], false)?>
					</span>
					<span><i class="fas fa-clock"></i> <?=gmdate("H:i:s", $qq_rs['duration'])?></span>
					<span><i class="<?=$qq_rs['icon']?>"></i> <a href="<?=path?>/quizzes.php?c=<?=$qq_rs['category']?>&t=<?=fh_seoURL($qq_rs['name'])?>"><?=$qq_rs['name']?></a></span>
				</p>
				<a href="<?=path?>/quizzes.php?id=<?=$qq_rs['id']?>&t=<?=fh_seoURL($qq_rs['title'])?>" class="pt-btn" style="border-color: <?=$qq_rs['color']?>;color: <?=$qq_rs['color']?>;box-shadow: 0 3px 10px rgba( <?=$qq_rs['rgb']?>, 0.5);"><?=$lang['start']?></a>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else: ?>
			<div class="text-center w-100 alert alert-warning"><?=$lang['alerts']['no-data']?></div>
		<?php endif; ?>
		<?php $qq_sql->close(); ?>
	</div>
	<?php echo fh_pagination("quizzes AS q LEFT JOIN ".prefix."categories AS c ON(c.id=q.category) WHERE (q.status = 1 || q.status = 0 && q.author = '".us_id."') {$cat} {$my}",$limit, path."/quizzes.php?".($c ? "c={$c}&t={$t}&" : '').($my ? "request=my&" : '')); ?>
</div>

<?php
endif;
include __DIR__."/footer.php";
