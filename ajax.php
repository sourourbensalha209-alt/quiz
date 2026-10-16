<?php


include __DIR__ . "/configs.php";

if(!isset($_SERVER['HTTP_REFERER'])){
	echo '<meta http-equiv="refresh" content="0;url='.path.'">';
	exit;
}

$alert = [];

switch ($pg) {
	case 'imageupload'    : include __DIR__ . "/ajax/imageupload.php"; break;
	case 'sendlogin'      : include __DIR__ . "/ajax/sendsignin.php"; break;
	case 'sendsignup'     : include __DIR__ . "/ajax/sendsignup.php"; break;
	case 'sendcategory'   : include __DIR__ . "/ajax/sendcategory.php"; break;
	case 'senduserdetails': include __DIR__ . "/ajax/senduserdetails.php"; break;
	case 'sendsettings'   : include __DIR__ . "/ajax/sendsettings.php"; break;



#--------------------- Logout ------------------------

	case 'logout':
		if($_SERVER['REQUEST_METHOD'] === 'POST' && us_level){
			session_destroy();
			unset($_COOKIE['login_keep']);
			setcookie('login_keep', null, -1);
		}
	break;



#--------------------- Edit Category ------------------------

	case 'editcategory':
		if( us_level == 6 ){
			echo json_encode(db_rs("categories WHERE id = '{$id}'"));
		}
	break;




#--------------------- Search ------------------------


	case 'search':
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$searsh = sc_sec($_POST["search"]);
			 	$aa = '';
			 	$sql = $db->query("SELECT * FROM ".prefix."quizzes WHERE title LIKE '%{$searsh}%'");
			 	$aa .='<ul class="pt-drop">';
				if(!empty($searsh)) {
				 	if($sql->num_rows){
					 	while($rs=$sql->fetch_assoc()){
						 	$aa .= "<li><a href='".path."/quizzes.php?id=".$rs['id']."&t=".fh_seoURL($rs['title'])."'>{$rs['title']}</a></li>";
					 	}
					} else {
						$aa .= "<li>{$lang['alerts']['no-data']}</li>";
					}
				} else {
					$aa .= "<li>{$lang['alerts']['no-data']}</li>";
				}
				$aa .='</ul>';
				 echo $aa;
			}
		break;




#--------------------- Change language ------------------------


		case 'lang':
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$id = isset($_POST['id'])?sc_sec($_POST['id']):'';
			$alert = ['type'  =>'success'];

			setcookie( "lang" , $id, time()+3600*24*30*6 );
			echo json_encode($alert);
		}
		break;




#--------------------- Sendsubscribe ------------------------

		case 'sendsubscribe':
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$email = isset($_POST['email']) ? sc_sec($_POST['email']) : '';
				if(!sc_check_email($email)){
					$alert = [
						'type'  =>'danger',
						'alert' => fh_alerts($lang['signup']['alert']['check_email'])
					];
				} elseif(db_rows("subscribers WHERE email = '{$email}'")){
					$alert = ["alert" => fh_alerts($lang['signup']['alert']['exist_email'], "danger"), "type" => "danger"];
				} else {
					db_insert("subscribers", ["email" => $email, "created_at" => time()]);
					$alert = ["alert" => fh_alerts($lang['alerts']['alldone'], "success"), "type" => "success"];
				}
				echo json_encode($alert);
			}
		break;



#--------------------- Send Quiz ------------------------


	case 'sendquiz':
		if($_SERVER['REQUEST_METHOD'] === 'POST' && us_level){

			preg_match('/\/[a-z0-9]+.php/', sc_sec($_SERVER['HTTP_REFERER']), $match);

			$pagename = array_shift($match);
			$pagename = str_replace("/", "", $pagename);


			$title           = isset($_POST['title']) ? sc_sec($_POST['title'])                    : '';
			$description     = isset($_POST['description']) ? sc_sec($_POST['description'])        : '';
			$keywords        = isset($_POST['keywords']) ? sc_sec($_POST['keywords'])          : '';
			$background      = isset($_POST['background']) ? sc_sec($_POST['background'])          : '';
			$with_background = isset($_POST['with_background']) ? (int)($_POST['with_background']) : 0;
			$category        = isset($_POST['category']) ? (int)($_POST['category'])               : 0;
			$status          = isset($_POST['status']) ? (int)($_POST['status'])                   : 0;
			$boxed           = isset($_POST['boxed']) ? 1                                          : 0;
			$duration        = isset($_POST['duration']) ? sc_sec($_POST['duration'])              : 0;
			$quiz            = isset($_POST['quiz']) ? (int)($_POST['quiz'])              : 0;
			$randoms         = isset($_POST['randoms']) ? 1                          : 0;
			$private         = isset($_POST['private']) ? 1                          : 0;
			$image           = isset($_POST['image']) ? sc_sec($_POST['image'])      : '';

			$duration_to_arr = $duration ? explode(":", $duration) : [0, 0, 0];
			$q_title         = $quiz ? db_get("quizzes", "title", $quiz) : '';

			$durations = $duration ? (($duration_to_arr[2]) + ($duration_to_arr[1]*60) + $duration_to_arr[0]) : 0;


			if(empty($title)){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['alerts']['required'])
				];
			} elseif(($duration && count($duration_to_arr) < 3) || $durations < 5){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['newquiz']['alertduration'])
				];
			} elseif(($duration_to_arr[2] >= 60 || $duration_to_arr[1] >= 60 || $duration_to_arr[0] >= 8)){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['newquiz']['alertmax'])
				];
			} elseif(!$q_title && db_rows("quizzes WHERE title = '{$title}' && author = '".us_id."'")){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['newquiz']['alertexists'])
				];
			} else {

				$duration = $duration ? (($duration_to_arr[2]) + ($duration_to_arr[1]*60) + $duration_to_arr[0]) : 0;
				$data = [
					"title"           => $title,
					"description"     => $description,
					"background"      => $background,
					"with_background" => $with_background,
					"category"        => $category,
					"status"          => $status,
					"boxed"           => $boxed,
					"randoms"         => $randoms,
					"private"         => $private,
					"duration"        => $duration,
					"keywords"        => $keywords
				];

				if(!empty($image)){
					if(file_exists(__DIR__.'/'.$image)){
						$answer_i_rename = 'uploads/users/'.sc_folderName(us_username).'/quizzes'.str_replace('uploads/tmp', '', $image);
						fh_newImgFolder(__DIR__.'/uploads/users/'.sc_folderName(us_username).'/quizzes');
						rename(__DIR__.'/'.$image, $answer_i_rename);

						$data['thumbnail']     = $answer_i_rename;
					}
				}

				if($quiz){
					$data['updated_at'] = time();
					db_update("quizzes", $data, $quiz);
				} else {
					$data['created_at'] = time();
					$data['author'] = us_id;
					db_insert("quizzes", $data);
				}

				$q_id = db_get("quizzes", "id", $title, "title", "&& author = '".us_id."'");
				$alert = ["alert" => fh_alerts($lang['alerts']['alldone'], "success"), "type" => "success", "id" => $q_id, "pagename"=>$pagename];
			}
			echo json_encode($alert);
		}
	break;





#--------------------- Send Question ------------------------


	case 'sendquestion':
		if($_SERVER['REQUEST_METHOD'] === 'POST' && us_level){

			preg_match('/\/[a-z0-9]+.php/', sc_sec($_SERVER['HTTP_REFERER']), $match);

			$pagename = array_shift($match);
			$pagename = str_replace("/", "", $pagename);

			$title     = isset($_POST['title']) ? sc_sec($_POST['title'], true)  : '';
			$image     = isset($_POST['image']) ? sc_sec($_POST['image'])        : '';
			$type      = isset($_POST['type']) ? sc_sec($_POST['type'])          : '';
			$quiz      = isset($_POST['quiz']) ? (int)($_POST['quiz'])           : 0;
			$single    = isset($_POST['single']) ? 1                             : 0;
			$question  = isset($_POST['question']) ? (int)($_POST['question'])   : 0;
			$truefalse = isset($_POST['truefalse']) ? (int)($_POST['truefalse']) : 0;

			if((empty($title) && empty($image)) || !$type){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['alerts']['required'])
				];
			} else {

				$data = [
					"title"   => $title,
					"type"    => $type,
					"single"  => $single,
					"quiz"    => $quiz
				];
				if(!empty($image)){
					if(file_exists(__DIR__.'/'.$image)){
						$answer_i_rename = 'uploads/users/'.sc_folderName(us_username).'/questions'.str_replace('uploads/tmp', '', $image);
						fh_newImgFolder(__DIR__.'/uploads/users/'.sc_folderName(us_username).'/questions');
						rename(__DIR__.'/'.$image, $answer_i_rename);

						$data['image']     = $answer_i_rename;
					}
				}
				if($question){
					$data['updated_at'] = time();
					db_update("questions", $data, $question);
				} else {
					$data['created_at'] = time();
					$data['author'] = us_id;
					db_insert("questions", $data);
					if($type == 'objective'){
						db_insert("answers", [
							"title"      => "True",
							"correct"    => ($truefalse == 1 ? 1 : 0),
							"question"   => db_get("questions", "id", us_id, "author", "&& quiz = '{$quiz}' ORDER BY id DESC LIMIT 1"),
							"quiz"       => $quiz,
							"created_at" => time(),
							"author"     => us_id,
						]);
						db_insert("answers", [
							"title"      => "False",
							"correct"    => ($truefalse == 2 ? 1 : 0),
							"question"   => db_get("questions", "id", us_id, "author", "&& quiz = '{$quiz}' ORDER BY id DESC LIMIT 1"),
							"quiz"       => $quiz,
							"created_at" => time(),
							"author"     => us_id,
						]);
					}
				}

				$alert = ["alert" => fh_alerts($lang['alerts']['alldone'], "success"), "type" => "success", "id" => $quiz, "pagename"=>$pagename];
			}
			echo json_encode($alert);
		}
	break;





#--------------------- Send Answer ------------------------


	case 'sendanswer':
		if($_SERVER['REQUEST_METHOD'] === 'POST' && us_level){

			$title    = isset($_POST['title']) ? sc_sec($_POST['title'])      : '';
			$image    = isset($_POST['image']) ? sc_sec($_POST['image'])      : '';
			$correct  = isset($_POST['correct']) ? 1                          : 0;
			$question = isset($_POST['question']) ? (int)($_POST['question']) : 0;
			$quiz     = isset($_POST['quiz']) ? (int)($_POST['quiz'])         : 0;
			$answer   = isset($_POST['answer']) ? (int)($_POST['answer'])     : 0;

			$qtype   = db_get("questions", "type", $question) == 'fill' ? 1 : 0;
			$correct = $correct ? $correct : $qtype;

			if(empty($title) || !db_rows("questions WHERE id = '{$question}'")){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['alerts']['required'])
				];
			} else {

				$data = [
					"title"    => $title,
					"correct"  => $correct,
					"question" => $question,
					"quiz"     => $quiz
				];

				if(!empty($image)){
					if(file_exists(__DIR__.'/'.$image)){
						$answer_i_rename = 'uploads/users/'.sc_folderName(us_username).'/answers'.str_replace('uploads/tmp', '', $image);
						fh_newImgFolder(__DIR__.'/uploads/users/'.sc_folderName(us_username).'/answers');
						rename(__DIR__.'/'.$image, $answer_i_rename);

						$data['image']     = $answer_i_rename;
					}
				}

				if($answer){
					$data['updated_at'] = time();
					db_update("answers", $data, $answer);
				} else {
					$data['created_at'] = time();
					$data['author'] = us_id;
					db_insert("answers", $data);
				}

				$alert = ["alert" => fh_alerts($lang['alerts']['alldone'], "success"), "type" => "success"];

			}
			echo json_encode($alert);
		}
	break;





#--------------------- Send Responses ------------------------


	case 'sendresponses':
		$correct = 0;
		$incorrect = 0;

		$answers  = isset($_POST['answer']) ? sc_array($_POST['answer']) : [];
		$quiz     = isset($_POST['quiz']) ? (int)($_POST['quiz']) : 0;
		$duration = isset($_POST['duration']) ? sc_sec($_POST['duration']) : 0;

		foreach ($answers as $key => $value) {
			if(db_get("questions", "type", $key) == 'fill'){
				if(strtolower(db_get("answers", "title", $key, "question")) == strtolower($value)){
					$correct += 1;
				} else {
					$incorrect += 1;
				}
			} else {
				if(gettype($value) == "array"){
					$corrects = 0;
					$incorrects = 0;
					foreach ($value as $k => $v) {
						if(db_get("answers", "correct", $v)){
							$corrects = 1;
						} else {
							$incorrects = 1;
						}
					}
					$correct += $corrects;
					$incorrect += $incorrects;
				} else {
					if(db_get("answers", "correct", $value)){
						$correct += 1;
					} else {
						$incorrect += 1;
					}
				}

			}
		}

		$percentage = ceil($correct/(db_rows("answers WHERE quiz = '{$quiz}' && correct = 1"))*100);
		if($percentage > 80) {
			$icon = "fas fa-award";
			$title = $lang['quiz']['excelent'];
		}
		if($percentage < 80&&$percentage >= 50) {
			$icon = "icons icon-trophy";
			$title = $lang['quiz']['congratulations'];
		}
		if($percentage <  50) {
			$icon = "far fa-frown";
			$title = $lang['quiz']['harder'];
		}

		$alert = [
			"correct"    => $correct,
			"incorrect"  => $incorrect,
			"all"        => db_rows("answers WHERE quiz = '{$quiz}' && correct = 1"),
			"title"      => $title,
			"percentage" => $percentage."%",
			"icon"       => $icon,
		];

		$data = [
			"answers"      => json_encode($answers),
			"quiz"         => $quiz,
			"duration"     => $duration,
			"author"       => us_id,
			"created_at"   => time(),
			"score"        => $percentage,
			'ip'           => get_ipp,
			'os'           => get_os,
			'browser'      => get_browser,
			'device'       => get_device,
			'country_name' => get_country_name,
			'country_code' => get_country_code,
			'state'        => get_state,
			'city'         => get_city_name
		];

		db_insert("results", $data);

		echo json_encode($alert);

	break;





#--------------------- Delete ------------------------

	case 'delete':
		if($request == 'quiz') $request = 'quizzes';
		elseif($request == 'question') $request = 'questions';
		elseif($request == 'page') $request = 'pages';
		elseif($request == 'user') $request = 'users';
		elseif($request == 'answer') $request = 'answers';
		else $request = '';

		if(us_level == 6){
			$true = 1;
		} elseif(db_rows("{$request} WHERE id = '{$id}' && author = '".us_id."'")) {
			$true = 1;
		} else {
			$true = 0;
		}

		if( $request && $true ){
			db_delete($request, $id);
			if($request == 'question') db_delete("answers", $id, "question");
			echo true;
		}
	break;









#--------------------- Pages ------------------------

	case 'sendpage':
		if($_SERVER['REQUEST_METHOD'] === 'POST' && us_level == 6){

			$pg_title    = sc_sec($_POST['pg_title']);
			$pg_sort     = (int)($_POST['pg_sort']);
			$pg_id       = (int)($_POST['id']);
			$pg_footer   = (isset($_POST['footer']) ? 1 : 0);
			$pg_content  = sc_sec($_POST['pg_content'], true);

			if(empty($pg_title) || empty($pg_content)){
				$alert = [
					'type'  =>'danger',
					'alert' => fh_alerts($lang['alerts']['required'])
				];
			} else {
				$data = [
					'title'      => $pg_title,
					'sort'       => $pg_sort,
					'footer'     => $pg_footer,
					'content'    => $pg_content
				];
				if($pg_id){
					$data['updated_at'] = time();
					db_update('pages', $data, $pg_id);
				} else {
					$data['created_at'] = time();
					db_insert( 'pages', $data );
				}

				$alert = [
					'type'  =>'success',
					'alert' => fh_alerts($lang['dash']['pg_alert'], 'success')
				];
			}
			echo json_encode($alert);
		}
	break;



#--------------------- Main Page ------------------------

	case 'world':
		if(us_level == 6){
			$aa = [];
			$ww = $id ? "&& quiz = '{$id}'" : '';
			foreach ($countries as $k => $c) {
				$aa[$k] = db_rows("results WHERE country_code = '{$k}' {$ww}");
			}
			echo json_encode($aa);
		}
	break;


	case 'orders-os':
	case 'orders-devices':
	case 'orders-cpgender':

		if($pg == "orders-os") $varr = 'os';
		elseif($pg == "orders-devices") $varr = 'device';
		elseif($pg == "orders-cpgender") $varr = 'browser';

		$varrr = $id ? "WHERE quiz = '{$id}'" : '';

		$aa = ["data" => [], "labels" => [], "colors" => [], "title" => ""];

		$sql = $db->query("SELECT {$varr}, count(id) AS co FROM ".prefix."results {$varrr} GROUP BY {$varr}");
		if($sql->num_rows){
			while ($rs = $sql->fetch_assoc()) {
				$aa['data'][] = $rs['co'];
				$aa['labels'][] = empty($rs[$varr]) ? $lang['unknown'] : $rs[$varr];

				$colors = randomColor();
				$aa['colors'][] = "#".$colors['hex'];
			}
		}
		$aa['title'] = "";

		echo json_encode($aa);
	break;

	case 'orders-cporders':
	case 'quizzes-states':
		$aa = [];
		if($request == "days"){
			$start    = new DateTime('now');
			$end      = new DateTime('- 7 day');
			$diff     = $end->diff($start);
			$interval = DateInterval::createFromDateString('-1 day');
			$period   = new DatePeriod($start, $interval, $diff->days);

			foreach ($period as $date) {
				$aa['data'][] = db_rows("results WHERE FROM_UNIXTIME(created_at,'%m-%d-%Y') = '".$date->format('m-d-Y')."'");
				$aa['labels'][] = $date->format('M d');
				$colors = randomColor();
				$aa['colors'][] = "#".$colors['hex'];
			}

		  $aa['data'] = array_reverse($aa['data']);
		  $aa['labels'] = array_reverse($aa['labels']);
		  $aa['title'] = $pg == 'quizzes-states' ? $lang['dash']['quizdays'] : $lang['dash']['takersdays'];
		} elseif($request == "months"){
			$aa = [];
			for ($i=1; $i <=12 ; $i++) {
				$aa['data'][] = db_rows("results WHERE MONTH(FROM_UNIXTIME(created_at)) = '{$i}' GROUP BY id");
				$aa['labels'][] = date('F', mktime(0, 0, 0, $i, 10));
				$colors = randomColor();
				$aa['colors'][] = "#".$colors['hex'];
			}

		  $aa['title'] = $pg == 'quizzes-states' ? $lang['dash']['quizmonths'] : $lang['dash']['takersmonths'];
		}

		echo json_encode($aa);
	break;

}
