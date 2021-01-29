<?php
require_once 'app/config.php';
require_once 'core/core.php';
include 'class/registration_class.php';
include 'class/profil_class.php';
include 'class/autorization_class.php';
include 'class/forum_class.php';
include 'class/team_forum_class.php';
include 'class/accaunt_class.php';
include 'class/comment_class.php';
include 'class/mail_vxod_class.php';
include 'class/pismo_class.php';
include 'class/mail_otprav_class.php';
include 'class/mail_redac_class.php';
include 'class/oblako_class.php';
session_start();
error_reporting(1);
date_default_timezone_set('Europe/Moscow');






$acaunt = new accaunt;
$acaunt->accunt();
$acaunt->accunt_vse();

$vxod = new mail_vxod_acc;
$vxod->mail_vxod();


// главная
router('/','main');
// end главная

router('/history','history');

router('/top','top');

router('/random','history_random');



router('/updates','updates');







router('/history_read','history_read');
router('/history_read/problem_kstovo','history_read');
for ($i=0; $i < count($_SESSION['history']); $i++) { 
    router($_SESSION['history'][$i][5],'history_read');
}


// форум
router('/forum','forum');
// forum team
for ($i=0; $i <count($_SESSION['forum']) ; $i++) { 
    router("{$_SESSION['forum'][$i][2]}",'team_forum');
}
for ($i=0; $i < count($_SESSION['forum']); $i++) { 
    router("{$_SESSION['forum'][$i][2]}"."/redac",'team_forum');
}


// forum team _komment
for ($i=0; $i <count($_SESSION['team_all_forum']) ; $i++) { 

   for ($q=0; $q < count($_SESSION['team_all_forum'][$i]); $q++) { 
    router("{$_SESSION['team_all_forum'][$i][$q][4]}/komment",'komment');
   }
}




// mail
router('/mail/vxod','mail','vxod');
router('/mail/otprav','mail','otprav');
router('/mail/spam','mail', 'spam');

router('/mail/pismo','pismo');
for ($i=0; $i < count($_SESSION['user_otprav']) ; $i++) { 
    router("/mail/{$_SESSION['user_otprav'][$i][8]}",'read_pismo');
}
for ($i=0; $i < count($_SESSION['user_vxod']) ; $i++) { 
    router("/mail/{$_SESSION['user_vxod'][$i][8]}",'read_pismo');
}


for ($i=0; $i < count($_SESSION['user_spam']) ; $i++) { 
    router("/mail/{$_SESSION['user_spam'][$i][8]}",'read_pismo');
}


router('/mail/vxod/redac','mail_redac','vxod_redac');
router('/mail/otprav/redac','mail_redac', 'otprav_redac');
router('/mail/spam/redac','mail_redac', 'spam_redac');

// end mail



// oblako
router("/{$_SESSION['user'][1]}/oblako",'oblako');
router("/{$_SESSION['user'][1]}/oblako/redac",'oblako','oblako_redac');

// end oblako



// registr
router('/registra','registra');

// profile
router("{$_SESSION['user'][4]}",'profile');
router("{$_SESSION['user'][4]}/redactirovat",'profile');
// log_out
router('/log_out','profile');



// accaunt
for ($i=0; $i < count($_SESSION['accaunt_user']); $i++) { 
    router("{$_SESSION['accaunt_user'][$i][14]}",'accaunt');
}



#админ
router('/check_taem','admin');
router('/add_history','admin');


router('/top_read','top_read');

for ($i = 0; $i < count($_SESSION['top']); $i++) { 
    router($_SESSION['top'][$i][1],'top_read');
}
router("/top_read/10top_strah",'top_read');


// пользователи
router('/users','users');
router('/users_search','/users_search');
for ($i=0; $i <= ceil(count($_SESSION['users_count']) / 10); $i++) { 
    router("/users/$i",'users');
}



$route = request_get('path','/');

start_app($route);



?>
