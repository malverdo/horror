<?php
function index()
{	require_once 'app/config.php';
	$title = 'отправить письмо';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

	$pismo = new pismo;
	$pismo->pismo();
    


	


	return render_template(
		'template/pismo.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}
?>