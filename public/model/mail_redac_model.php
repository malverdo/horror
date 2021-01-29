<? ob_start(); ?><?php
function vxod_redac()
{	require_once 'app/config.php';
	$title = 'редактировать почту';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

    
    $otprav = new mail_redac;
	$otprav->redac_mail();
	$otprav->redac_prohitan();
	$otprav->redac_no_prohitan();
	$otprav->redac_spam();
	$otprav->redac_no_spam();


	return render_template(
		'template/mail_redac.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}

function otprav_redac()
{	require_once 'app/config.php';
	$title = 'редактировать почту';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

	$otprav = new mail_redac;
	$otprav->redac_mail();
    $otprav->redac_prohitan();
	$otprav->redac_no_prohitan();
	$otprav->redac_spam();
	$otprav->redac_no_spam();


	return render_template(
		'template/mail_redac.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}



function spam_redac()
{	require_once 'app/config.php';
	$title = 'редактировать почту';
	$method = $_SERVER['REQUEST_METHOD'];
	$content = 'йу';

    $otprav = new mail_redac;
	$otprav->redac_mail();
    $otprav->redac_prohitan();
	$otprav->redac_no_prohitan();
	$otprav->redac_spam();
	$otprav->redac_no_spam();


	


	return render_template(
		'template/mail_redac.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}
?><? ob_flush(); ?>