<?php
function index()
{	require_once 'app/config.php';
	$title = 'письмо';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

    
	$pismo = explode('/',$_GET['path']);
	
	$mysqli = connect_db();

	$SQL = "SELECT * FROM `mail` WHERE `link_pohta`= '$pismo[2]'";

	$users = query_db_one($mysqli, $SQL);
	
	$_SESSION['user_mail_read']= array_values($users);

	
	if (empty($_SESSION['user_mail_read'])) {
		$SQL = "SELECT * FROM `mail_spam` WHERE `link_pohta`= '$pismo[2]'";
		$users = query_db_one($mysqli, $SQL);
	
		$_SESSION['user_mail_read']= array_values($users);
	}
	
		sanitize($mysqli);
		$SQLL = "UPDATE `mail` SET prohitan='1'  WHERE id='{$_SESSION['user_mail_read'][0]}' ";
		query_db_all($mysqli, $SQLL);


	return render_template(
		'template/read_pismo.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}
?>