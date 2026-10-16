<?php

?>
<form id="sendquiz">
	<div class="pt-box">
		<div class="form-group">
			<label><?=$lang['newquiz']['qtitle']?>: <small class="text-danger">*</small></label>
			<input type="text" name="title" value="<?=($rs ? $rs['title'] : '')?>" placeholder="<?=$lang['newquiz']['qtitle']?>">
			<input type="hidden" name="quiz" value="<?=($rs ? $rs['id'] : '')?>">
		</div>
		<div class="form-inline mb-3">
			<div class="form-group">
				<input type="radio" name="with_background" value="0" id="r1" class="choice"<?=($rs && 0 == $rs['with_background'] ? 'checked' : '')?>>
				<label for="r1"><?=$lang['newquiz']['wbg']?></label>
			</div>
			<div class="form-group">
				<input type="radio" name="with_background" value="1" id="r2" class="choice" <?=($rs && 1 == $rs['with_background'] ? 'checked' : '')?><?=(!$id?'checked':'')?>>
				<label for="r2"><?=$lang['newquiz']['sbg']?></label>
			</div>
			<div class="form-group">
				<input type="radio" name="with_background" value="2" id="r3" class="choice"<?=($rs && 2 == $rs['with_background'] ? 'checked' : '')?>>
				<label for="r3"><?=$lang['newquiz']['tbg']?></label>
			</div>
		</div>
		<?php if (fh_access("backgound")): ?>
		<div class="editor-bgs">
			<ul>
				<li>
					<input type="radio" name="background" value="assets/img/bg/1.png" id="rr1" class="choice image"<?=($rs && "assets/img/bg/1.png" == $rs['background'] ? 'checked' : '')?><?=(!$rs ? 'checked' : '')?>>
					<label for="rr1"><b><img src="<?=path?>/assets/img/bg/1.png" /></b></label>
				</li>
				<li>
					<input type="radio" name="background" value="assets/img/bg/2.png" id="rr2" class="choice image"<?=($rs && "assets/img/bg/2.png" == $rs['background'] ? 'checked' : '')?>>
					<label for="rr2"><b><img src="<?=path?>/assets/img/bg/2.png" /></b></label>
				</li>
				<li>
					<input type="radio" name="background" value="assets/img/bg/3.jpg" id="rr3" class="choice image"<?=($rs && "assets/img/bg/3.jpg" == $rs['background'] ? 'checked' : '')?>>
					<label for="rr3"><b><img src="<?=path?>/assets/img/bg/3.jpg" /></b></label>
				</li>
				<li>
					<input type="radio" name="background" value="assets/img/bg/4.png" id="rr4" class="choice image"<?=($rs && "assets/img/bg/4.png" == $rs['background'] ? 'checked' : '')?>>
					<label for="rr4"><b><img src="<?=path?>/assets/img/bg/4.png" /></b></label>
				</li>
				<li>
					<input type="radio" name="background" value="assets/img/bg/5.jpg" id="rr5" class="choice image"<?=($rs && "assets/img/bg/5.jpg" == $rs['background'] ? 'checked' : '')?>>
					<label for="rr5"><b><img src="<?=path?>/assets/img/bg/5.jpg" /></b></label>
				</li>
				<li>
					<input type="radio" name="background" value="assets/img/bg/6.jpg" id="rr6" class="choice image"<?=($rs && "assets/img/bg/6.jpg" == $rs['background'] ? 'checked' : '')?>>
					<label for="rr6"><b><img src="<?=path?>/assets/img/bg/6.jpg" /></b></label>
				</li>
				<li>
					<input type="radio" name="background" value="assets/img/bg/7.jpg" id="rr7" class="choice image"<?=($rs && "assets/img/bg/7.jpg" == $rs['background'] ? 'checked' : '')?>>
					<label for="rr7"><b><img src="<?=path?>/assets/img/bg/7.jpg" /></b></label>
				</li>
			</ul>
		</div>
		<?php endif; ?>
		<div class="form-group">
			<input class="tgl tgl-light" id="cb3" value="1" name="randoms" type="checkbox"<?=($rs && $rs['randoms'] ? 'checked' : '')?>/>
			<label class="tgl-btn" for="cb3"></label>
			<label><?=$lang['newquiz']['random']?></label>
		</div>
		<div class="form-group">
			<input class="tgl tgl-light" id="cb31" value="1" name="private" type="checkbox"<?=($rs && $rs['private'] ? 'checked' : '')?>/>
			<label class="tgl-btn" for="cb31"></label>
			<label><?=$lang['newquiz']['private']?></label>
		</div>
		<div class="form-group">
			<label><?=$lang['newquiz']['qdesc']?>: </label>
			<textarea name="description" placeholder="<?=$lang['newquiz']['qdesc']?>"><?=($rs ? $rs['description'] : '')?></textarea>
		</div>

		<div class="form-row">
			<div class="col">
				<div class="form-group">
					<label><?=$lang['newquiz']['duration']?>:</label>
					<input type="text" name="duration" class="time" value="<?php echo ($rs ? gmdate("H:i:s", $rs['duration']) : '') ?>" placeholder="hh:mm:ss">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label><?=$lang['newquiz']['cat']?>:</label>
					<select class="selectpicker" data-live-search="true" data-width="100%" name="category" title="<?=$lang['newquiz']['cat']?>">
						<?php
						$c_sql = $db->query("SELECT * FROM ".prefix."categories ORDER BY name ASC");
						if($c_sql->num_rows):
						while($c_rs = $c_sql->fetch_assoc()):
						?>
						<option data-tokens="<?=$c_rs['name']?>" value="<?=$c_rs['id']?>"<?=($rs && $c_rs['id'] == $rs['category'] ? ' selected' : '')?>><?=$c_rs['name']?></option>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php $c_sql->close(); ?>
					</select>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label><?=$lang['newquiz']['keys']?>:</label>
					<input type="text" name="keywords" value="<?php echo ($rs ? $rs['keywords'] : '') ?>" placeholder="key1, key2...">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label><?=$lang['newquiz']['qthumb']?>:</label>
			<input type="hidden" name="image" rel="#chooseQuiz" value="">
			<input type="hidden" name="oimage" value="<?=($rs ? $rs['thumbnail'] : '')?>">
			<div class="pt-question-image">
				<div class="file-upload">
					<div class="file-select">
						<input type="file" name="chooseFile" id="chooseQuiz" rel="answerfile">
					</div>
				</div>
				<div id="thumbnailsQuiz" class="thumbnails"><img src="<?=($rs ? path.'/'.$rs['thumbnail'] : '')?>" onerror="this.src='<?=noimage?>'" /></div>
			</div>
		</div>
	</div>
</form>
