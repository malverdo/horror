<?php
function index()
{	require_once 'app/config.php';
	$title = 'Облако';
	$content = 'йу';
	if (!isset($_SESSION['razmer'])) {
		for ($i=0; $i < count($_SESSION['file_user']) ; $i++) { 
			$_SESSION['razmer'] += $_SESSION['file_user'][$i][6];
		}
	   }
	$oblako = new oblako;
	
    $oblako->img();
    $oblako->get_file();

	
	
	
	


	return render_template(
		'template/oblako.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}
function oblako_redac()
{	require_once 'app/config.php';
	$title = 'Облако редактировать ';
	$content = 'йу';
	
	$oblako = new oblako;
	
    $oblako->img();
    $oblako->get_file();
	$oblako->redac_oblako_delite();
	if (!isset($_SESSION['razmer'])) {
		for ($i=0; $i < count($_SESSION['file_user']) ; $i++) { 
			$_SESSION['razmer'] += $_SESSION['file_user'][$i][6];
		}
	   }
	
	

    
	return render_template(
		'template/oblako.php',
		[
			'title'=> $title,
            'content'=>$content,
        
			

		]
	);
}



?>