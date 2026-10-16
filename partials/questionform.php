<?php

?>
<form id="sendquestion">
	<h3>
		<?=($qid ? $lang['newquiz']['quedit'] : $lang['newquiz']['qunew'])?>:
		<?php if ($qid): ?>
			<a href="<?=path?>/<?=page?>.php?pg=quizzes&request=new&id=<?=$id?>" class="bg-gr"><?=$lang['newquiz']['quback']?></a>
		<?php endif; ?>
	</h3>
	<hr/>
	<div class="form-group">
		<label><?=$lang['newquiz']['qutitle']?>: <small class="text-danger">*</small></label>
		<input type="text" name="title" placeholder="<?=$lang['newquiz']['qutitle']?>" value="<?=($qu_rs ? $qu_rs['title'] : '')?>">
	</div>
	<div class="form-group">
		<label><?=$lang['newquiz']['qutype']?>: <small class="text-danger">*</small></label>
		<select class="selectpicker" data-width="100%" name="type" title="<?=$lang['newquiz']['qutype']?>">
			<option value="normal"<?=($qu_rs && $qu_rs['type'] == 'normal' ? 'selected' : '')?>><?=$lang['newquiz']['qunormal']?></option>
			<option value="objective"<?=($qu_rs && $qu_rs['type'] == 'objective' ? 'selected' : '')?>><?=$lang['newquiz']['quobj']?></option>
			<option value="images"<?=($qu_rs && $qu_rs['type'] == 'images' ? 'selected' : '')?>><?=$lang['newquiz']['qutimg']?></option>
			<option value="fill"<?=($qu_rs && $qu_rs['type'] == 'fill' ? 'selected' : '')?>><?=$lang['newquiz']['qufill']?></option>
		</select>
	</div>
	<div class="form-inline mb-3 truefalse">
		<label><?=$lang['newquiz']['qucorrect']?>:</label>
		<div class="form-group">
			<input type="radio" name="truefalse" value="1" id="rc1" class="choice">
			<label for="rc1"><?=$lang['newquiz']['qutrue']?></label>
		</div>
		<div class="form-group">
			<input type="radio" name="truefalse" value="2" id="rc3" class="choice">
			<label for="rc3"><?=$lang['newquiz']['qufalse']?></label>
		</div>
	</div>
	<div class="form-group">
		<label><?=$lang['newquiz']['quimg']?>:</label>
		<input type="hidden" name="image" rel="#chooseQuestion" value="">
		<input type="hidden" name="oimage" value="<?=($qu_rs ? $qu_rs['image'] : '')?>">
		<div class="pt-question-image">
			<div class="file-upload">
				<div class="file-select">
					<input type="file" name="chooseFile" id="chooseQuestion" rel="answerfile">
				</div>
			</div>
			<div id="thumbnailsQst" class="thumbnails"><img src="<?=($qu_rs ? path.'/'.$qu_rs['image'] : '')?>" onerror="this.src='<?=noimage?>'" /></div>
		</div>
	</div>
	<div class="form-group">
		<input class="tgl tgl-light" id="cb2" value="1" name="single" type="checkbox"<?=($qu_rs && !$qu_rs['single'] ? '' : 'checked')?>/>
		<label class="tgl-btn" for="cb2"></label>
		<label><?=$lang['newquiz']['qusingle']?></label>
	</div>
	<hr/>
	<?php if (!$id): ?>
	<p class="pt-notice mb-3 text-warning">
		<i class="far fa-question-circle"></i> <?=$lang['newquiz']['qumustsave']?>
	</p>
	<?php endif; ?>
	<input type="hidden" name="quiz" value="<?=$id?>">
	<input type="hidden" name="question" value="<?=($qu_rs ? $qu_rs['id'] : '')?>">
	<button type="submit" class="pt-btn" <?=(!$id?'disabled="disabled"':'')?>><?=($qid ? $lang['newquiz']['quupdate'] : $lang['newquiz']['qusave'])?></button>
</form>
