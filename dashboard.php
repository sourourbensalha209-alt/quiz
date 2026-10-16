<?php


include __DIR__."/head.php";

if(us_level != 6){
	fh_go(path);
	exit;
}

?>

<div id="full-page-container" class="pt-dashboard<?=$pg?>">
<div class="pt-wrapper">

	<div class="pt-nav">
		<div class="pt-logo">
			<a href="<?=path?>/dashboard.php"><img src="<?=site_favicon?>" /> <b>My Quizzy</b></a>
		</div>
		<div class="pt-menu">
			<ul>
				<li><a href="<?=path?>"><i class="icon-globe icons"></i> <b><?=$lang['header']['home']?></b></a></li>
				<li<?=($pg==""?' class="pt-active"':'')?>>
					<a href="<?=path?>/dashboard.php"><i class="icon-speedometer icons"></i> <b><?=$lang['header']['dashboard']?></b></a>
				</li>
				
				<li<?=($pg=="quizzes"?' class="pt-active"':'')?>>
					<a href="<?=path?>/dashboard.php?pg=quizzes"><i class="icon-layers icons"></i> <b><?=$lang['dash']['quizzes']?></b></a>
				</li>
				<li<?=($pg=="users"?' class="pt-active"':'')?>><a href="<?=path?>/dashboard.php?pg=users"><i class="icon-people icons"></i> <b><?=$lang['dash']['users']?></b></a></li>
				<li<?=($pg=="categories"?' class="pt-active"':'')?>><a href="<?=path?>/dashboard.php?pg=categories"><i class="icon-organization icons"></i> <b><?=$lang['dash']['categories']?></b></a></li>
				
				<li<?=($pg=="pages"?' class="pt-active"':'')?>><a href="<?=path?>/dashboard.php?pg=pages"><i class="icon-docs icons"></i> <b><?=$lang['dash']['pages']?></b></a></li>
				<li<?=($pg=="settings"?' class="pt-active"':'')?>><a href="<?=path?>/dashboard.php?pg=settings"><i class="icon-settings icons"></i> <b><?=$lang['dash']['settings']?></b></a></li>
			</ul>
		</div>
	</div>
	<div class="pt-dash">
		<div class="pt-topmenu">
			<div class="pt-search">
				<div class="pt-input">
					<input type="text" name="search" placeholder="<?=$lang['header']['search']?>">
					<i class="icons icon-magnifier"></i>
					<div class="sresults"></div>
				</div>
			</div>
			<div class="pt-menu">
				<ul>
					<li class="pt-img">
						<div class="pt-thumb"><img src="<?=path?>/<?=us_photo?>" onerror="this.src='<?=nophoto?>'"></div>
					</li>
					<li class="pt-author">
						<?=us_username?>
					</li>
				</ul>
			</div>
		</div>
		<div class="pt-body">
			<?php
			switch ($pg) {
				case 'quizzes' : include __DIR__ ."/cpanel/quizzes.php"; break;
				case 'categories'    : include __DIR__ ."/cpanel/categories.php"; break;
				case 'plans'       : include __DIR__ ."/cpanel/plans.php"; break;
				case 'settings'    : include __DIR__ ."/cpanel/settings.php"; break;
				case 'pages'       : include __DIR__ ."/cpanel/pages.php"; break;
				case 'users'       : include __DIR__ ."/cpanel/users.php"; break;

				default            : include __DIR__ ."/cpanel/main.php"; break;
			}

			?>
			<div class="pt-copy">
				<h3>&nbsp;</h3>
				Copyright &copy; 2023 <a>Quiz</a>. All Rights Reserved.<br>
					Programming and design with <i class="fas fa-heart text-danger"></i> by <a href="https://www.facebook.com/viore.digital" target="_blanc">Viore Digital</a> &  <a href="#https://www.facebook.com/sourour.bensalha.94/" target="_blanc">Sourour Ben Salha</a>.
			</div>
		</div>
	</div>

</div>
</div>

<?php

include __DIR__."/scripts.php";
