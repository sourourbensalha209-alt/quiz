<?php

?>
<div class="pt-breadcrumb">
	<div class="pt-title">
		<i class="icon-docs icons ic"></i> <?=$lang['dash']['pages']?>
		<p><a href="<?=path?>"><?=$lang['dashboard']?></a> <i class="fas fa-long-arrow-alt-right"></i> <?=$lang['dash']['pages']?></p>
	</div>

	<div class="pt-options">
		<a href="<?=path?>/dashboard.php?pg=pages&request=new" class="pt-btn"><i class="fas fa-plus"></i> <?=$lang['dash']['cr_page']?></a>
	</div>
</div>

<?php if ($request != 'new'): ?>
	<div class="pt-box">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<th><?=$lang['dash']['pg_title']?></th>
					<th class="text-center"><?=$lang['dash']['pg_footer']?></th>
					<th class="text-center"><?=$lang['created_at']?></th>
					<th class="text-center"><?=$lang['updated_at']?></th>
					<th></th>
				</thead>
				<tbody>
					<?php
					$sql = $db->query("SELECT * FROM ".prefix."pages ORDER BY sort ASC");
					if($sql->num_rows):
					while($rs = $sql->fetch_assoc()):
					?>
					<tr>
						<td width="40%">
							<h3><a href="<?=path?>/pages.php?id=<?=$rs['id']?>&t=<?=fh_seoURL($rs['title'])?>"><?=$rs['title']?></a></h3>
						</td>
						<td class="text-center">
							<?=($rs['footer']?'<b class="badge bg-r"><i class="fas fa-times"></i></b>':'<b class="badge bg-gr"><i class="fas fa-check"></i></b>')?>
						</td>
						<td class="text-center"><?=fh_ago($rs['created_at'])?></td>
						<td class="text-center"><?=($rs['updated_at']?fh_ago($rs['updated_at']):'--')?></td>
						<td class="pt-dot-options">
							<a class="pt-options-link"><i class="fas fa-ellipsis-h"></i></a>
							<ul class="pt-drop">
								<li><a href="<?=path?>/dashboard.php?pg=pages&request=new&id=<?=$rs['id']?>"><i class="far fa-edit"></i> <?=$lang["edit"]?></a></li>
								<li><a href="#" class="pt-delete" data-id="<?=$rs['id']?>" data-type="page"><i class="fas fa-trash-alt"></i> <?=$lang["delete"]?></a></li>
							</ul>
						</td>
					</tr>
					<?php endwhile; ?>
					<?php else: ?>
						<tr>
							<td colspan="5" class="text-center"><?=$lang['alerts']['no-data']?></td>
						</tr>
					<?php endif; ?>
					<?php $sql->close(); ?>
				</tbody>
			</table>
		</div>
	</div>

<?php else: ?>

<?php $rs = ($id ? db_rs("pages WHERE id = '".$id."'") : ''); ?>
<div class="pt-box">
	<form id="sendpage">
		<div class="form-group">
			<label><?=$lang['dash']['pg_title']?> <small class="text-danger">*</small></label>
			<input type="text" name="pg_title" placeholder="<?=$lang['dash']['pg_title_p']?>" value="<?=($rs?$rs['title']:'')?>">
		</div>

		<div class="form-group">
			<label><?=$lang['dash']['pg_sort']?></label>
			<input type="text" name="pg_sort" placeholder="<?=$lang['dash']['pg_sort_p']?>" value="<?=($rs?$rs['sort']:'')?>">
		</div>

		<div class="form-group">
			<input class="tgl tgl-light" id="cb2" value="1" name="footer" type="checkbox"<?=($rs?($rs['footer'] ? ' checked' : ''):'')?>/>
			<label class="tgl-btn" for="cb2"></label>
			<label><?=$lang['dash']['pg_footer_p']?></label>
		</div>

		<div class="form-group">
			<label><?=$lang['dash']['pg_content']?> <small class="text-danger">*</small></label>
			<textarea name="pg_content" class="wysibb-editor" id="wysibb-editor"><?=($rs?$rs['content']:'')?></textarea>
		</div>

		<hr>
		<button type="submit" class="pt-btn"><?=$lang['save']?></button>
		<input type="hidden" name="id" value="<?=$id?>">
	</form>
</div>

<?php endif; ?>
