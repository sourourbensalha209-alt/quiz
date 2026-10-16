<?php


include __DIR__."/head.php";

?>

<div id="full-page-container">
<div class="pt-wrapper">
	<?php if (page=="quiz" && $id): ?>
	<?php else: ?>
	<div class="pt-header" style="background-image: url(<?=path?>/assets/css/img/slider<?=$lang['rtl']?>.png);">
		<div class="pt-header-top">

			<div class="container">
				<div class="pt-logo"><a href="<?=path?>"><img src="<?=path?>/<?=site_logo?>" alt="<?=site_title?>"></a></div>
				<div class="pt-menu">
					<ul>
						<li class="active"><a href="<?=path?>"><?=$lang['header']['home']?></a></li>
						<li class="thedropdown">
							<a href="#" class="pt-showcats"><?=$lang['header']['quizzes']?> <i class="fas fa-sort-down"></i></a>
							<ul class="dropdown">
								<li>
									<a href="<?=path?>/quizzes.php">
										<span class="bg-b"><i class="fas fa-question-circle"></i></span>
										<?=$lang['header']['all']?>
									</a>
								</li>
							<?php
							$sql = $db->query("SELECT * FROM ".prefix."categories ORDER BY id DESC LIMIT 27");
							if($sql->num_rows):
								while($rs = $sql->fetch_assoc()):
								?>
								<li>
									<a href="<?=path?>/quizzes.php?c=<?=$rs['id']?>&t=<?=fh_seoURL($rs['name'])?>">
										<span style="background: <?=$rs['color']?>"><i class="<?=$rs['icon']?>"></i></span>
										<?=$rs['name']?>
									</a>
								</li>
								<?php
								endwhile;
							endif;
							$sql->close();
							?>
							</ul>
						</li>
						<?php if (!site_plans): ?>
						<li><a href="<?=path?>/plans.php"><?=$lang['header']['plans']?></a></li>
						<?php endif; ?>
						<?php if(us_level): ?>
							<li class="pt-img">
								<div class="pt-thumb"><img src="<?=path?>/<?=us_photo?>" onerror="this.src='<?=nophoto?>'"></div>
							</li>
							<li class="pt-author">
								<span class="pt-showmenudetails"><?=us_username?> <i class="fas fa-caret-down"></i></span>
								<ul class="pt-drop">
									<?php if(us_level == 6): ?>
									<li><a href="<?=path?>/dashboard.php"><i class="icons icon-speedometer"></i> <?=$lang['header']['dashboard']?></a></li>
									<li><a href="<?=path?>/newquiz.php?request=new"><i class="icons icon-plus"></i> <?=$lang['header']['new']?></a></li>
									<li><a href="<?=path?>/quizzes.php?request=my"><i class="far fa-question-circle"></i> <?=$lang['header']['my']?></a></li>
									<?php endif; ?>
									

									<li><a href="<?=path?>/userdetails.php"><i class="fas fa-pencil-alt"></i> <?=$lang['header']['edit_details']?> <span><?=db_get("plans", "plan", us_plan)?></span></a></li>
									<li><a href="#" class="pt-logout"><i class="icons icon-power"></i> <?=$lang['header']['logout']?></a></li>
								</ul>
							</li>
						<?php else: ?>
							<li class="pt-login"><a class="bg-gr" data-toggle="modal" href="#registerModal"><i class="icon-key icons"></i> Join</a></li>
							<li class="pt-login pt-login-form">
								<a class="bg-o" href="#login"><i class="icon-user icons"></i> <?=$lang['header']['login']?></a>
								<div class="pt-drops">
										<form id="sendlogin">
										<label class="pt-input-icon">
											<span><i class="icons icon-user"></i></span>
											<input type="text" name="sign_name" placeholder="<?=$lang['login']['username']?>" />
										</label>
										<label class="pt-input-icon">
											<span><i class="icons icon-key"></i></span>
											<input type="password" name="sign_pass" placeholder="<?=$lang['login']['password']?>" />
										</label>
										<button type="submit"><?=$lang['header']['login']?></button>
										<?php if(site_register && (login_facebook || login_twitter || login_google)): ?>
										<div class="pt-social-login">
											<b><?=$lang['signup']['social']?></b>
											<?php if(login_facebook): ?>
											<a class="facebook" href="<?=$facebookLoginUrl?>"><i class="fab fa-facebook"></i></a>
											<?php endif; ?>
											<?php if(login_twitter): ?>
											<a class="twitter" href="<?=$twitterLoginUrl?>"><i class="fab fa-twitter"></i></a>
											<?php endif; ?>
											<?php if(login_google): ?>
											<a class="google" href="<?=$googleLoginUrl?>"><i class="fab fa-google"></i></a>
											<?php endif; ?>
										</div>
										<?php endif; ?>
									</form>
								</div>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div><!-- End header top -->

		<?php if (page=="index"): ?>
		<div class="pt-header-content">
			<div class="container">
				<div class="pt-left">
					<h1><?=$lang['home']['slider_t']?></h1>
					<p><?=$lang['home']['slider_d']?></p>
					<?php if (!us_level): ?>
					<div class="pt-link"><a data-toggle="modal" href="#registerModal"><?=$lang['home']['slider_b']?></a></div>
					<?php else: ?>
					<div class="pt-link"><a href="<?=path?>/quizzes.php?request=new"><?=$lang['home']['slider_b']?></a></div>
					<?php endif; ?>
				</div>
				<div class="pt-right">
					<img src="<?=path?>/assets/css/img/slider4.png" alt="">
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
