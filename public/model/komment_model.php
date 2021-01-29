<?php
function index()
{	require_once 'app/config.php';
	$title = $_SESSION["forum_comment"][0][1];
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';


	$coment = new comment;
	$coment->form_dobav();
	
    if (isset($_POST['btn_comment_team']) and !empty($_POST['form_head_comment_text'])) {
		$coment->comment_text();
		return redirect("?path={$_GET['path']}");

	}




	// тут просто не создалась функция
	$mysqli = connect_db();	

	$text = sanitize($mysqli);

	$get1 = explode('/',$_GET['path']);
	$get2 = "/".$get1[1]; 

	$SQL = "SELECT * FROM `comment` WHERE `link_get`= '$get2'";
	$user = query_db_all($mysqli, $SQL);
	$_SESSION['comment_all'] = array_values($user); # 19:12 18января изменине
// тут просто не создалась функция








	// print_r($_SESSION['comment_all']);

if (isset($_POST['btn_delite'])) {
		
	$name = $_POST['name_forum'];
	$mysqli = connect_db();
	$SQL = "DELETE FROM `comment` WHERE `id`= '$name'";
	query_db_all($mysqli, $SQL);
	redirect('?path='.$_GET['path']); 

}
	

	


	return render_template(
		'template/komment.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>