<?php

?>

<div class="pt-breadcrumb">
	<div class="pt-title">
		<i class="icon-settings icons ic"></i> <?=$lang['dash']['set_title']?>
		<p><a href="<?=path?>"><?=$lang['header']['dashboard']?></a> <i class="fas fa-long-arrow-alt-right"></i> <?=$lang['dash']['settings']?></p>
	</div>
</div>


<div class="pt-box mt-4">
	<h3 class="cp-form-title mt-0"><?=$lang['dash']['set_title']?></h3>
	<form class="pt-sendsettings" id="sendsettings">
	<div class="pt-admin-setting">
		<div class="form-row">
			<div class="col">
				<div class="form-group">
					<label><?=$lang['dash']['set_logo']?></label>
					<div class="file-upload">
					  <div class="file-select">
					    <div class="file-select-button" id="fileName2"><?=$lang['details']['image_c']?></div>
					    <div class="file-select-name" id="noFile2"><?=$lang['details']['image_n']?></div>
					    <input type="file" name="chooseFile" id="chooseFile2">
					  </div>
					</div>
					<input type="hidden" name="site_logo" rel="#dropZone2" value="<?=site_logo?>">
					<div id="thumbnails2"><img src="<?=site_logo?>" onerror="this.src='<?=nophoto?>'" class="nophoto" /></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label><?=$lang['dash']['set_favicon']?></label>
					<div class="file-upload">
					  <div class="file-select">
					    <div class="file-select-button" id="fileName1"><?=$lang['details']['image_c']?></div>
					    <div class="file-select-name" id="noFile1"><?=$lang['details']['image_n']?></div>
					    <input type="file" name="chooseFile" id="chooseFile1">
					  </div>
					</div>
					<input type="hidden" name="site_favicon" rel="#dropZone1" value="<?=site_favicon?>">
					<div id="thumbnails1"><img src="<?=site_favicon?>" onerror="this.src='<?=nophoto?>'" class="nophoto" /></div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label><?=$lang['dash']['set_stitle']?></label>
			<input type="text" name="site_title" value="<?=site_title?>">
		</div>
		<div class="form-group">
			<label><?=$lang['dash']['set_keys']?></label>
			<input type="text" name="site_keywords" value="<?=site_keywords?>">
		</div>
		<div class="form-group">
			<label><?=$lang['dash']['set_desc']?></label>
			<textarea name="site_description"><?=site_description?></textarea>
		</div>
		<div class="form-group">
			<label><?=$lang['dash']['set_url']?></label>
			<input type="text" name="site_url" value="<?=site_url?>">
		</div>

		<div class="form-group">
			<label><?=$lang['dash']['set_noreply']?></label>
			<input type="text" name="site_noreply" value="<?=site_noreply?>">
		</div>
		<div class="form-row">
			<div class="col">
				<div class="form-group">
					<label>Facebook</label>
					<input type="text" name="site_facebook" value="<?=site_facebook?>">
				</div>
			</div>
			
			<div class="col">
				<div class="form-group">
					<label>Instagram</label>
					<input type="text" name="site_instagram" value="<?=site_instagram?>">
				</div>
			</div>
			
		</div>
		
		</div>

		<hr>
		<div class="mt-4">
			<button type="submit" class="pt-btn">
				<span><?=$lang['dash']['set_btn']?> <i class="fas fa-arrow-circle-right"></i></span>
			</button>
		</div>
	</div>

	</form>
</div>
