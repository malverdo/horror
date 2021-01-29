<?php
function index()
{	require_once 'app/config.php';
	$title = 'Страшная история';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

	
	 
		// $man = implode($_GET);
		//  print_r($man);
		$get = $_GET['path'];
		
	 	$_SESSION['history_read'] = [];
        $mysqli = connect_db();
		// Запрос к таблице пользователей
		sanitize($mysqli);
        // $SQL = "SELECT * FROM `books` WHERE `title`='$search' ";
        $SQL = "SELECT * FROM `history` WHERE `link_history` LIKE '%$get%' ";
       
        
        $history_read = query_db_all($mysqli, $SQL);
		
		$_SESSION['history_read'] = $history_read;


		$namber = $_SESSION['history_read'][0][0];
		$glaz = $_SESSION['history_read'][0][8];
		$glaz += 1;
		
		$SQLL = "UPDATE `history` SET glaz=$glaz WHERE id=$namber ";
		mysqli_query($mysqli, $SQLL);
		




		
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
		'template/history_read.php',
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