<?php
function index()
{	require_once 'app/config.php';
	$title = 'Авторизация';
	$content = 'йу';
	


	if (isset($_POST['btn_regisr'])) {
		$regist = new registration();
		$regist->check_login_db();
		$regist->empty_input();
		$regist->dlina_input();
		$regist->check_password();
		$regist-> check_bot();
		$regist->check_simvol();
		$regist->user_good();
		
		
	}
	if (isset($_POST['btn_autoriza'])) {
		$autorization = new autorization;
		$autorization->empty_input();
		
		$autorization->check_bot();
		$autorization->ban();
		$autorization->avtorization();

	}
	


	
	
	
	


	return render_template(
		'template/registra.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>