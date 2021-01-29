<?php
function index()
{	require_once 'app/config.php';
	$title = 'Последние страшные истории';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';



	


	return render_template(
		'template/updates.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>