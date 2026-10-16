<?php


include __DIR__."/header.php";
?>

<div class="pt-how">
	<div class="container">
		<div class="pt-title">
			<h1><?=$lang['home']['how']?></h1>
			<span></span>
		</div>
		<div class="row">
			<div class="col">
				<div class="pt-item">
					<div class="pt-icon">
						<img src="<?=path?>/assets/css/img/abs1<?=$lang['rtl']?>.png" />
						<i class="icons icon-note"></i>
					</div>
					<h3><?=$lang['home']['how_t1']?></h3>
					<p><?=$lang['home']['how_d1']?></p>
				</div>
			</div>
			<div class="col">
				<div class="pt-item">
					<div class="pt-icon">
						<img src="<?=path?>/assets/css/img/abs1<?=$lang['rtl']?>.png" />
						<i class="icons icon-share-alt"></i>
					</div>
					<h3><?=$lang['home']['how_t2']?></h3>
					<p><?=$lang['home']['how_d2']?></p>
				</div>

			</div>
			<div class="col">
				<div class="pt-item">
					<div class="pt-icon">
						<img src="<?=path?>/assets/css/img/abs1<?=$lang['rtl']?>.png" />
						<i class="icons icon-pie-chart"></i>
					</div>
					<h3><?=$lang['home']['how_t3']?></h3>
					<p><?=$lang['home']['how_d3']?></p>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="pt-who">
	<div class="container">
		<div class="pt-title">
			<h1><?=$lang['home']['who']?></h1>
			<span></span>
		</div>
		<div class="pt-item">
			<div class="row">
				<div class="col-6">
					<img src="<?=path?>/assets/css/img/de4.png" />
				</div>
				<div class="col-1"></div>
				<div class="col-5">
					<div class="pt-dtable">
						<div class="pt-vmiddle">
							<h3><?=$lang['home']['who_t1']?></h3>
							<p><?=$lang['home']['who_d1']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pt-item">
			<div class="row">
				<div class="col-5">
					<div class="pt-dtable">
						<div class="pt-vmiddle">
							<h3><?=$lang['home']['who_t2']?></h3>
							<p><?=$lang['home']['who_d2']?></p>
						</div>
					</div>
				</div>
				<div class="col-1"></div>
				<div class="col-6">
					<img src="<?=path?>/assets/css/img/de5.png" />
				</div>
			</div>
		</div>
		<div class="pt-item">
			<div class="row">
				<div class="col-6">
					<img src="<?=path?>/assets/css/img/de6.png" />
				</div>
				<div class="col-1"></div>
				<div class="col-5">
					<div class="pt-dtable">
						<div class="pt-vmiddle">
							<h3><?=$lang['home']['who_t3']?></h3>
							<p><?=$lang['home']['who_d3']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="pt-discover">
	<div class="container">
		<div class="pt-title">
			<h1><?=$lang['home']['discover']?></h1>
			<span></span>
		</div>
		<div class="row">
			<?php
			$cat = $c ? "&& q.category = '{$c}'" : "";
			$qq_sql = $db->query("SELECT q.id, q.title, q.category, q.duration, q.thumbnail, c.color, c.icon, c.name, q.author, u.photo FROM ".prefix."quizzes AS q LEFT JOIN ".prefix."categories AS c ON(c.id=q.category) LEFT JOIN ".prefix."users AS u ON(u.id=q.author) WHERE q.private = '0' {$cat} ORDER BY q.id DESC LIMIT 6");
			if($qq_sql->num_rows):
			while($qq_rs = $qq_sql->fetch_assoc()):
				list($r, $g, $b) = sscanf($qq_rs['color'], "#%02x%02x%02x");
				$qq_rs['rgb'] = $r.','.$g.','.$b;
			?>
			<div class="col-4">
				<div class="pt-item">
					<span class="pt-icon" style="background: <?=$qq_rs['color']?>;border-color: <?=$qq_rs['color']?>;box-shadow: 0 0 0 2px #FFF, 0 0 0 4px <?=$qq_rs['color']?>;"><i class="<?=$qq_rs['icon']?>"></i></span>
					<div class="pt-thumbs"><img src="<?=$qq_rs['thumbnail']?>" onerror="this.src='<?=nophoto?>'" /></div>
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
			<?php endif; ?>
			<?php $qq_sql->close(); ?>
		</div>
	</div>
</div>


<?php
include __DIR__."/footer.php";


$path = dirname(__FILE__).'/uploads/tmp';
$fi = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);

if(iterator_count($fi)>1){
if ($handle = opendir($path)) {
  while (false !== ($file = readdir($handle))) {
    if (time() > (filectime($path.'/'.$file) + 86400)) {
      if(!preg_match('/\.html$/i', $file)) {
				if(file_exists($path.'/'.$file))
        	unlink($path.'/'.$file);
      }
    }
  }
}
}
