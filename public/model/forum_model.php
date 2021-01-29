<?php
function index()
{	require_once 'app/config.php';
	$title = 'форум';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';



	$forum = new forum;
	$forum->form_dobav();
	$forum->form_all();
	if (!isset($_SESSION['team_all_forum'])) {
		
		for ($i=0; $i < count($_SESSION['forum']) ; $i++) { 
			$forum->form_tam_all($_SESSION['forum'][$i][2]);
		}
		
	}
	

	if (isset($_POST['btn_delite'])) {
		
		$name = $_POST['name_forum'];
		$mysqli = connect_db();
        $SQL = "DELETE FROM `forum` WHERE `name`= '$name'";
		query_db_all($mysqli, $SQL);
		redirect('?path=/forum'); 

	}

	if (isset($_POST['btn_forum'])) {
		session_register_shutdown ();
		session_start(); 
		redirect('?path=/forum');
	}
		
	
	


	return render_template(
		'template/forum.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>