<?php
require_once 'app/config.php';
require_once 'core/core.php';
session_start();

// главная
router('/','main');#главная
// end главная

router('/history','history');#главная

router('/top','top');#главная

router('/random','history_random');#главная



router('/updates','updates');#главная






router('/history_read','history_read');#главная
router('/history_read/problem_kstovo','history_read');#главная

for ($i=0; $i < count($_SESSION['history']); $i++) { 
    router($_SESSION['history'][$i][5],'history_read');#главная
}





router('/top_read','top_read');#главная


for ($i=0; $i < 3; $i++) { 
    router($_SESSION['top'][$i][1],'top_read');#главная
}
router('/top_read/10top_strah','top_read');


$route = request_get('path','/');


start_app($route);


?>
