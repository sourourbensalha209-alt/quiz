<?php

?>
<form id="sendanswer">
	<?php $an_rs = ($aid ? db_rs("answers WHERE id = '{$aid}'") : ''); ?>
	<h3><?=($aid ? $lang['newquiz']['aedit'] : $lang['newquiz']['anew'])?>:</h3>
	<hr/>
	<div class="form-group">
		<label><?=(db_get("questions", "type", $qid) != 'fill' ? $lang['newquiz']['atitle'] : $lang['newquiz']['qucorrect'])?>: <small class="text-danger">*</small></label>
		<input type="text" name="title" value="<?=($an_rs ? $an_rs['title'] : '')?>" placeholder="<?=(db_get("questions", "type", $qid) != 'fill' ? $lang['newquiz']['atitle'] : $lang['newquiz']['qucorrect'])?>">
	</div>
	<?php if (db_get("questions", "type", $qid) != 'fill'): ?>
	<div class="form-group">
		<input class="tgl tgl-light" id="cb5" value="1" name="correct" type="checkbox"<?=($an_rs && $an_rs['correct'] ? 'checked' : '')?>/>
		<label class="tgl-btn" for="cb5"></label>
		<label><?=$lang['newquiz']['qucorrect']?></label>
	</div>
	<?php endif; ?>
	<?php if (db_get("questions", "type", $qid) == 'images'): ?>
	<div class="pt-answer-image">
		<input type="hidden" name="image" rel="#chooseAnswer" value="">
		<input type="hidden" name="oimage" value="<?=($an_rs ? $an_rs['image'] : '')?>">
		<div class="file-upload">
			<div class="file-select">
				<input type="file" name="chooseFile" id="chooseAnswer" rel="answerfile">
			 	<div class="file-select-name"><?=$lang['newquiz']['aselect']?></div>
			</div>
		</div>
		<p>
			<i class="far fa-question-circle"></i> <?=$lang['newquiz']['abest']?>
		</p>
		<div id="thumbnailsAns" class="thumbnails"><img src="<?=($an_rs ? path.'/'.$an_rs['image'] : '')?>" onerror="this.src='<?=noimage?>'" /></div>
	</div>
	<?php endif; ?>
	<hr/>
	<input type="hidden" name="answer" value="<?=($an_rs ? $an_rs['id'] : '')?>">
	<input type="hidden" name="question" value="<?=$qid?>">
	<input type="hidden" name="quiz" value="<?=$id?>">
	<button type="submit" class="pt-btn" <?=(!$qid?'disabled="disabled"':'')?>><?=($aid ? $lang['newquiz']['aupdate'] : $lang['newquiz']['asave'])?></button>
</form>
