<?php
function index()
{	require_once 'app/config.php';
	$title = 'профиль';
	
	$content = 'йу';


	$profil = new profil;
	$profil->redac_profil($_SESSION['user'][1]);
	$profil->img($_SESSION['user'][1]);

	
    if (isset($_POST['buttom_red'])) {
		return redirect("?path={$_SESSION['user'][4]}");
	}
	if (isset($_POST['btn_img'])) {
		return redirect("?path={$_SESSION['user'][4]}");
	}
	if ($_SESSION['user'][9]) {
		$mysqli = connect_db();
		$user2 = $_SESSION['user'][1];
		$SQL = "SELECT * FROM `comment` WHERE `login`= '$user2 '";
		$user = query_db_all($mysqli, $SQL);
		$_SESSION['kol_komment_profile'] = array_values($user);
		
	}
	if ($_SESSION['user'][9] === 'Пользователь') {
		$mysqli = connect_db();
		$user2 = $_SESSION['user'][1];
		$SQL = "SELECT * FROM `comment` WHERE `login`= '$user2 '";
		$user = query_db_all($mysqli, $SQL);
		$_SESSION['kol_komment'] = array_values($user);
		if (count($user) > 200 ) {
			$SQLL = "UPDATE `users` SET doljns='Продвинутый пользователь'  WHERE login='$user2'    ";
		}
	}

	if (isset($_SESSION['user'])) {
		$login = $_SESSION['user'][1];
		$name = null;
		$mysqli = connect_db();
		$SQL = "UPDATE `users` SET data_ban='$name' WHERE login ='{$login}'";
		query_db_all($mysqli, $SQL_user);
	}
	
	
	


	if (address_verification('/log_out')) {
		$mysqli = connect_db();
		sanitize($mysqli);
		$SQLL = "UPDATE `users` SET onlain='offline'  WHERE login='{$_SESSION['user'][1]}'    ";
		$history = query_db_all($mysqli, $SQLL);

		session_save_path();
		session_destroy();
		return redirect('?path=/');
	}

	online('online');
	data_pol();
	


	




	


	return render_template(
		'template/profile.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>