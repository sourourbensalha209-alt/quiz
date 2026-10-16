<?php


if( $_SERVER['REQUEST_METHOD'] === 'POST' && us_level == 6 ){

	$p_name  = isset($_POST['name']) ? sc_sec($_POST['name'])   : '';
	$icon  = isset($_POST['icon']) ? sc_sec($_POST['icon'])   : 0;
	$color  = isset($_POST['color']) ? sc_sec($_POST['color'])   : 0;
	$p_id    = isset($_POST['id']) ? (int)($_POST['id'])   : 0;

	if(empty($p_name) || !$icon || !$color){
		$alert = ["alert" => fh_alerts($lang['alerts']['required']), "type" => "danger"];
	} else {

		$data = [
			"name"   => $p_name,
			"icon"   => $icon,
			"color"  => $color,
			"author" => us_id
		];

		if( $p_id && (db_rows("categories WHERE id = '{$p_id}' && author = '".us_id."'") || us_level == 6) ){
			$data['updated_at'] = time();
			db_update('categories', $data, $p_id);
		} else {
			$data['created_at'] = time();
			$data['author']     = us_id;
			db_insert('categories', $data);
		}

		$alert = ["alert" => fh_alerts($lang['alerts']['alldone'], "success"), "type" => "success"];

	}

	echo json_encode($alert);
}
