<?php
function index()
{	require_once 'app/config.php';
	$title = 'акаунт';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

    
    
    $acaunt = new accaunt;
    $acaunt->accunt();
	$acaunt->do_moderator();
	$acaunt->delite();
	$acaunt->ban();

	$mysqli = connect_db();
	$user2 = $_SESSION['accaunt'][0][1];
	$SQL = "SELECT * FROM `comment` WHERE `login`= '$user2 '";
	$user = query_db_all($mysqli, $SQL);
	$_SESSION['kol_komment'] = array_values($user);
	


	return render_template(
		'template/accaunt.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>