<?php

?>
<ul class="pt-main-stats">
	<li>
		<div class="pt-box">
			<span><i class="icon-question icons"></i></span>
			<b><?=db_rows("quizzes")?></b><br /><small><?=$lang['dash']['t_quizzes']?></small>
		</div>
	</li>
	<li>
		<div class="pt-box">
			<span><i class="icons icon-people"></i></span>
			<b><?=db_rows("results")?></b><br /><small><?=$lang['dash']['t_takers']?></small>
		</div>
	</li>
	<li>
		<div class="pt-box">
			<span><i class="icons icon-user"></i></span>
			<b><?=db_rows("users")?></b><br /><small><?=$lang['dash']['t_users']?></small>
		</div>
	</li>
</ul>





<div class="row">

	<div class="col-3">
		<div class="pt-order-chart pt-box">
			<h3>24h <?=$lang['dash']['users']?></h3>
			<div class="pt-content pt-scroll">
				<ul>
					<?php
					$sql = $db->query("SELECT * FROM ".prefix."users WHERE date >= '".(time() - 3600*24)."' ORDER BY id DESC") or die ($db->error);
					if($sql->num_rows):
					while($rs = $sql->fetch_assoc()):
					?>
					<li>
						<div class="media">
							<div class="media-left">
								<div class="pt-thumb"><img src="<?=$rs['photo']?>" onerror="this.src='<?=noimage?>'" /></div>
							</div>
							<div class="media-body">
								<a><?=$rs['username']?></a>

								<p>
									<span><i class="far fa-clock"></i> <?=fh_ago($rs['date'])?></span>
								</p>
							</div>
						</div>
					</li>
					<?php
					endwhile;
					else:
						echo '<li class="text-center">'.$lang['alerts']['no-data'].'</li>';
					endif;
					$sql->close();
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="pt-order-chart pt-box">
			<h3>24h <?=$lang['dash']['quizzes']?></h3>
			<div class="pt-content pt-scroll">
				<ul>
					<?php
					$sql = $db->query("SELECT * FROM ".prefix."quizzes WHERE created_at >= '".(time() - 3600*24)."' ORDER BY id DESC") or die ($db->error);
					if($sql->num_rows):
					while($rs = $sql->fetch_assoc()):
					?>
					<li>
						<a href="<?=path?>/quizzes.php?id=<?=$rs['id']?>&t=<?=fh_seoURL($rs['title'])?>"><?=$rs['title']?></a>
						<div class="media">
							<div class="media-left">
								<div class="pt-thumb"><img src="<?=$rs['thumbnail']?>" onerror="this.src='<?=noimage?>'" /></div>
							</div>
							<div class="media-body">
								<p>
									<span><i class="far fa-clock"></i> <?=fh_ago($rs['created_at'])?></span><br />
									<span><i class="fas fa-user"></i> by <?=fh_user($rs['author'])?></span><br />
									<span><i class="fas fa-chart-pie"></i> <?=db_rows("results WHERE quiz = '{$rs['id']}'")?> <?=$lang['dash']['takers']?></span>
								</p>
							</div>
						</div>

					</li>
					<?php
					endwhile;
					else:
						echo '<li class="text-center">'.$lang['alerts']['no-data'].'</li>';
					endif;
					$sql->close();
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="pt-order-chart pt-box">
			<h3>24h <?=$lang['dash']['takers']?></h3>
			<div class="pt-content pt-scroll">
				<ul>
					<?php
					$sql = $db->query("SELECT * FROM ".prefix."results WHERE created_at >= '".(time() - 3600*24)."' ORDER BY id DESC") or die ($db->error);
					if($sql->num_rows):
					while($rs = $sql->fetch_assoc()):
					?>
					<li>
						<div class="media">
							<div class="media-left">
								<div class="pt-thumb"><img src="<?=db_get("quizzes", "thumbnail", $rs['quiz'])?>" onerror="this.src='<?=noimage?>'" /></div>
							</div>
							<div class="media-body">
								<a href="<?=path?>/quizzes.php?id=<?=$rs['quiz']?>&t=<?=fh_seoURL(db_get("quizzes", "title", $rs['quiz']))?>&request=results&r=<?=$rs['id']?>"><?=db_get("quizzes", "title", $rs['quiz'])?></a>

								<p>
									<span><i class="far fa-clock"></i> <?=fh_ago($rs['created_at'])?></span>
									<span><i class="fas fa-trophy"></i> <?=$rs['score']?> %</span>
								</p>
							</div>
						</div>
					</li>
					<?php
					endwhile;
					else:
						echo '<li class="text-center">'.$lang['alerts']['no-data'].'</li>';
					endif;
					$sql->close();
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
