<?php

?>
<?php if (page=="quizzes" && $id): ?>
<?php else: ?>


<div class="container relative">
	<div class="pt-subscribe">
		<h3><?=$lang['home']['subs']?></h3>
		<form action="#" method="POST">
			<input type="text" name="email" placeholder="youremail@email.com">
			<button type="submit" class="pt-btn"><?=$lang['save']?></button>
		</form>
	</div>
</div>

<div class="pt-footer" style="background-image: url(<?=path?>/assets/css/img/footer<?=$lang['rtl']?>.png);">

	<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="pt-logo">
					<div class="pt-logo"><a href="<?=path?>"><img src="<?=path?>/<?=site_logo?>" alt="<?=site_title?>"></a></div>
				</div>
				<div class="pt-social">
					<?php if (site_facebook): ?>
					<a href="https://facebook.com/<?=site_facebook?>" target="_blank"><i class="fab fa-facebook"></i></a>
					<?php endif; ?>
					<?php if (site_instagram): ?>
					<a href="https://instagram.com/<?=site_instagram?>" target="_blank"><i class="fab fa-instagram"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-6">
				<div class="pt-links">
					<h3><?=$lang['home']['links']?></h3>
					<?php
					$sql = $db->query("SELECT * FROM ".prefix."pages WHERE footer = 0 ORDER BY sort ASC LIMIT 12");
          if($sql->num_rows):
          $i = 1;
          while($rs = $sql->fetch_assoc()):
          ?>
          <a href="<?=path?>/pages.php?id=<?=$rs['id']?>&t=<?=fh_seoURL($rs['title'])?>"><i class="fas fa-long-arrow-alt-<?=$lang['rtl']=='true'?'left':'right'?>"></i> <?=$rs['title']?></a>
          <?php
          $i++;
          if($i==7){
            echo'</div><div class="pt-links"><h3>&nbsp;</h3>';
            $i=0;
          }
          endwhile;
          endif;
          $sql->close();
          ?>
				</div>
			</div>
			<div class="col-3">
				<div class="pt-copy">
					<h3>&nbsp;</h3>
					<div class="pt-lang">
						<a hrfe="#" rel="en"><i class="flag-icon flag-icon-squared flag-icon-us"></i></a>
						<a hrfe="#" rel="fr"><i class="flag-icon flag-icon-squared flag-icon-fr"></i></a>
						<a hrfe="#" rel="ar"><i class="flag-icon flag-icon-squared flag-icon-tn"></i></a>
					</div>
					Copyright &copy; 2023 <a>Quiz</a>. All Rights Reserved.<br>
					Programming and design with <i class="fas fa-heart text-danger"></i> by <a href="#" target="_blanc">Vo</a> &  <a href="#" target="_blanc">Sourour</a>
				</div>
			</div>
		</div>
	</div>

</div>

<?php if(site_register && !us_level): ?>
<form id="sendsignup">
	<div class="modal fade newmodal pt-login-form" id="registerModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title"><?=$lang['signup']['title']?></h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">
					<div class="form-group pt-input-icon">
						<span><i class="icons icon-user"></i></span>
						<input type="text" name="reg_name" placeholder="<?=$lang['signup']['username']?>">
					</div>
					<div class="form-group pt-input-icon">
						<span><i class="icons icon-key"></i></span>
						<input type="password" name="reg_pass" placeholder="<?=$lang['signup']['password']?>">
					</div>
					<div class="form-group pt-input-icon">
						<span><i class="icons icon-lock-open"></i></span>
						<input type="password" name="reg_repass" placeholder="<?=$lang['signup']['rpassword']?>">
					</div>
					<div class="form-group pt-input-icon">
						<span><i class="icons icon-envelope"></i></span>
						<input type="text" name="reg_email" placeholder="<?=$lang['signup']['email']?>">
						<p class="small text-info"><i class="fas fa-info-circle"></i> <?=$lang['signup']['email_p']?></p>
					</div>
					<div class="pt-msg"></div>
					<button type="submit"><?=$lang['signup']['btn']?></button>

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
				</div>

			</div>
		</div>
	</div>
</form>
<?php endif; ?>

<?php endif; ?>
</div> <!-- End wrapper -->
</div> <!-- End fill page -->
<?php
include __DIR__."/scripts.php";
?>

</body>
</html>
