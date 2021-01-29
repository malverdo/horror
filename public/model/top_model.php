<?php
function index()
{	require_once 'app/config.php';
	$title = 'Топы';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';



	





	


	$_SESSION['history_read_2'] = [];
	$mysqli = connect_db();
	// Запрос к таблице пользователей
	sanitize($mysqli);
	
	$SQL = "SELECT * FROM `history` WHERE 1";
	
	
	$history = query_db_all($mysqli, $SQL);

	$_SESSION['history_read_2'] = $history;
	$random_min = $_SESSION['history_read_2'][0][0];

	$_SESSION['history_read_2'] = array_reverse($history);
	$random_max = $_SESSION['history_read_2'][0][0] -1; 

	$random1 = rand($random_min,$random_max);
	$random2 = rand($random_min,$random_max);
	$random3 = rand($random_min,$random_max);
	$random4 = rand($random_min,$random_max);


	return render_template(
		'template/top.php',
		[
			'title'=> $title,
			'content'=>$content,
			'random1'=>$random1,
			'random2'=>$random2,
			'random3'=>$random3,
			'random4'=>$random4,
		]
	);
}




?>