<?php
function index()
{	require_once 'app/config.php';
	$title = 'темы форума';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';
	
	
	$forum_team = new forum_team;
	$forum_team->form_dobav();
	$forum_team->form_all($_GET['path']);
	
	
	$forum = new forum;
	
	if ($_SESSION['team_all_forum']) {
		
		for ($i=0; $i < count($_SESSION['forum']) ; $i++) { 
			$forum->form_tam_all($_SESSION['forum'][$i][2]);
		}
		array_shift($_SESSION['team_all_forum']);
		array_shift($_SESSION['team_all_forum']);
		array_shift($_SESSION['team_all_forum']);
		array_shift($_SESSION['team_all_forum']);
		
		
		
	}
	
	if (isset($_POST['btn_forum_team'])) {
		session_register_shutdown ();
		session_start(); 
		$mass = explode("/",$_GET['path']);
		
		return redirect("?path=/{$mass[1]}");
	}
	
	if (isset($_POST['btn_delite'])) {
		
		$name = $_POST['name_forum'];
		$mysqli = connect_db();
        $SQL = "DELETE FROM `forum_team` WHERE `id`= '$name'";
		query_db_all($mysqli, $SQL);
		redirect('?path=/forum'); 

	}



	


	return render_template(
		'template/team_forum.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>