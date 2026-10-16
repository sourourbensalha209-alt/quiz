<?php

?>
<div class="pt-breadcrumb">
	<div class="pt-title">
		<i class="icon-notebook icons ic"></i> <?=$lang['dash']['categories']?>
		<p><a href="<?=path?>"><?=$lang['header']['dashboard']?></a> <i class="fas fa-long-arrow-alt-right"></i> <?=$lang['dash']['categories']?></p>
	</div>

	<div class="pt-options">
		<a data-toggle="modal" href="#myModal" class="pt-btn"><i class="fas fa-plus"></i> <?=$lang['dash']['c_new']?></a>
	</div>
</div>


<div class="pt-box">
	<table class="table">
		<thead>
			<th colspan="2"><?=$lang['dash']['c_name']?></th>
			<th class="text-center"><?=$lang['dash']['quizzes']?></th>
			<th class="text-center"><?=$lang['created_at']?></th>
			<th class="text-center"><?=$lang['updated_at']?></th>
			<th></th>
		</thead>
		<tbody>
			<?php
			$sql = $db->query("SELECT * FROM ".prefix."categories ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
			if($sql->num_rows):
			while($rs = $sql->fetch_assoc()):
			?>
			<tr>
				<th width="1"><div class="pt-thumb" style="background: <?=$rs['color']?>"><i class="<?=$rs['icon']?>"></i></div></th>
				<td width="40%">
					<h3><a href="<?=path?>/quizzes.php?c=<?=$rs['id']?>&t=<?=fh_seoURL($rs['name'])?>"><?=$rs['name']?></a></h3>
				</td>
				<td class="text-center"><?=db_rows("quizzes WHERE category = '{$rs["id"]}'")?></td>
				<td class="text-center"><?=fh_ago($rs['created_at'])?></td>
				<td class="text-center"><?=($rs['updated_at']?fh_ago($rs['updated_at']):'--')?></td>
				<td class="pt-dot-options">
					<a class="pt-options-link"><i class="fas fa-ellipsis-h"></i></a>
					<ul class="pt-drop">
						<li><a data-toggle="modal" href="#myModal" class="pt-editcategorylink" data-id="<?=$rs['id']?>"><i class="far fa-edit"></i> <?=$lang['edit']?></a></li>
						<li><a href="#" class="pt-delete" data-type="cuisine" data-id="<?=$rs['id']?>"><i class="fas fa-trash-alt"></i> <?=$lang['delete']?></a></li>
					</ul>
				</td>
			</tr>
			<?php endwhile; ?>
			<tr><td colspan="6"><?php echo fh_pagination("categories",$limit, path."/dashboard.php?pg=categories&") ?></td></tr>
			<?php else: ?>
				<tr>
					<td colspan="6" class="text-center"><?=$lang['alerts']['no-data']?></td>
				</tr>
			<?php endif; ?>
			<?php $sql->close(); ?>
		</tbody>
	</table>
</div>



<!-- The Modal -->
<form id="sendcategory">
<div class="modal fade newmodal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?=$lang['dash']['c_new']?>:</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
				<div class="form-row">
					<div class="form-group mr-1">
						<label><?=$lang['dash']['c_name']?>:</label>
						<input type="text" name="name" placeholder="<?=$lang['dash']['c_name']?>">
					</div>
					<div class="form-group mr-1">
						<label><?=$lang['dash']['c_icon']?>:</label>
						<input type="text" name="icon" class="iconpicker" placeholder="<?=$lang['dash']['c_icon']?>">
					</div>
					<div class="form-group">
						<label><?=$lang['dash']['c_color']?>:</label>
						<input type="text" name="color" id="colorpicker-popup" value="" placeholder="type the category bg color">
						<input type="hidden" name="pg_bg_v" value="<?=$rs['button_border_color']?>">
					</div>
				</div>
      </div>
      <div class="modal-footer">
				<input type="hidden" name="id">
        <button type="submit" class="pt-btn"><?=$lang['save']?></button>
      </div>
    </div>
  </div>
</div>
</form>
