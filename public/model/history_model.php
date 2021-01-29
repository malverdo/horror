<?php
function index()
{	require_once 'app/config.php';
	$title = 'Короткие страшные истории';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';


	$random_max = $_SESSION['history'][0][0] -1; 
	
	$random1 = rand(0,$random_max);
	$random2 = rand(0,$random_max);
	$random3 = rand(0,$random_max);
	$random4 = rand(0,$random_max);
	$random5 = rand(0,$random_max);
	$random6 = rand(0,$random_max);
	$random7 = rand(0,$random_max);
	$random8 = rand(0,$random_max);
	$random9 = rand(0,$random_max);
	$random10 = rand(0,$random_max);
	$random11 = rand(0,$random_max);
	$random12 = rand(0,$random_max);


	


	return render_template(
		'template/history.php',
		[
			'title'=> $title,
			'content'=>$content,
			'random1'=>$random1,
			'random2'=>$random2,
			'random3'=>$random3,
			'random4'=>$random4,
			'random5'=>$random5,
			'random6'=>$random6,
			'random7'=>$random7,
			'random8'=>$random8,
			'random9'=>$random9,
			'random10'=>$random10,
			'random11'=>$random11,
			'random12'=>$random12,

		]
	);
}




?>