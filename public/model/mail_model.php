<?php
function vxod()
{	require_once 'app/config.php';
	$title = 'входящие';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';
	
	
    // v class mail_otpraV_class


	


	return render_template(
		'template/mail.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}

// -----------------------------------------------------------------------------------------------------------------------------------------

function otprav()
{	require_once 'app/config.php';
	$title = 'отправленые';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

	$user = new mail_otprav;
	$user->mail();
    


	


	return render_template(
		'template/mail.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}

// -----------------------------------------------------------------------------------------------------------------------------------------

function spam()
{	require_once 'app/config.php';
	$title = 'спам';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

	$spam = new mail_vxod_acc;
	$spam->mail_spam();
	
    // $user = new mail_otprav;
	// $user->mail();
    


	


	return render_template(
		'template/mail.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}

?>