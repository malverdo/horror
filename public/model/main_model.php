<?php
function index()
{	require_once 'app/config.php';
	$title = 'Horrified - страшные рассказы';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';


	$_SESSION['top'] = [];
	$mysqli = connect_db();
	// Запрос к таблице пользователей
	sanitize($mysqli);
	
	$SQL = "SELECT * FROM `top` WHERE 1";
	
	
	$top = query_db_all($mysqli, $SQL);

	$_SESSION['top'] = $top;
	
	



	$_SESSION['history'] = [];
	$mysqli = connect_db();
	// Запрос к таблице пользователей
	sanitize($mysqli);
	
	$SQL = "SELECT * FROM `history` WHERE 1";
	
	
	$history = query_db_all($mysqli, $SQL);

	$_SESSION['history'] = $history;
	$random_min = $_SESSION['history'][0][0];

	$_SESSION['history'] = array_reverse($history);
	$random_max = $_SESSION['history'][0][0] -1; 

	$random1 = rand($random_min,$random_max);
	$random2 = rand($random_min,$random_max);
	$random3 = rand($random_min,$random_max);
	$random4 = rand($random_min,$random_max);

	
	// random zapros
	

	return render_template(
		'template/main.php',
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
