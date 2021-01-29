<?php
function request_get($name, $default='', $method='GET')
{
	if ($method==='GET') {
		return !empty($_GET[$name]) ? $_GET[$name] : $default;
	} else {
		return !empty($_POST[$name]) ? $_POST[$name] : $default;
	}
}

function find_route($uri) {
	$routes = router();
	foreach ($routes as $route)
		if ($route['uri']===$uri)
			return True;
	return False;
}

function get_model_name($uri) {
	$routes = router();
	foreach ($routes as $route)
		if ($route['uri']===$uri)
			return $route['model'] . '_model.php';
	return False;
}

function get_action_name($uri) {
	$routes = router();
	foreach ($routes as $route)
		if ($route['uri']===$uri)
			return $route['action'];
	return False;
}

function get_params($uri)
{
	return False;
}

function render_template($tpl, $params=[]){
	include $tpl;
}

function router($uri=NULL,$model=NULL,$action='index',$methods=['GET']) {
	static $routes=[];
	if ($uri && $model) {
		$routes[] = [
			'uri'=>$uri,
			'model'=>$model,
			'action'=>$action,
			'methods'=>$methods
		];
	}
	return $routes;
}





function redirect($url) {
	header("Location:$url");
	die();
}

function url_for($model) {
	$routes = router();
	foreach ($routes as $route)
		if ($route['model']===$model)
			return '?path=' . $route['uri'];
	return False;
}

function start_app($route){

	if(find_route($route)){
		$model_name = get_model_name($route);
		$action_name = get_action_name($route);
		$params = get_params($route);
		if(file_exists('public/model/' . $model_name)) {
			require 'public/model/' . $model_name;
			if (function_exists($action_name)) {
				if ($params) {
					$action_name($params);
				} else
					$action_name();
			} else {
				create_bag();
				render_template('404/404.php');
			}
		} else {
			create_bag();
			render_template('404/404.php');
		}

	} else{
		create_bag();
		render_template('404/404.php');
	}
		
}





// -------db----------------------------------------------------------

function connect_db()
{
	
	$mysqli = mysqli_connect( db_host, db_user, db_pass, db_name);
	mysqli_set_charset($mysqli, 'utf8');
	if (mysqli_connect_errno()) {
    	echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
	    return false;
	} else
		return $mysqli;
		
}

function query_db_one($link, $sql)
{
	
	$res = mysqli_query($link, $sql);
	if($res)
		return mysqli_fetch_assoc($res);
	else
		return false;
}

function query_db_all($link, $sql)
{
	$res = mysqli_query($link, $sql);
	if($res)
		return mysqli_fetch_all($res);
	else
		return false;
}

function sanitize($link, $data = '')
{
	return mysqli_real_escape_string(
		$link,
		htmlspecialchars(strip_tags($data))
	);
}

function session_get($name, $default='')
{
	return !empty($_SESSION[$name]) ? $_SESSION[$name] : $default;
}function session_get1($name, $get ,$default='')
{
	$_SESSION[$name][] = $get;
	return !empty($_SESSION[$name]) ? $_SESSION[$name] : $default;
}
function session_add($name, $value='')
{
	if(!isset($_SESSION))
		session_start();
	$_SESSION[$name] = $value;
}
// --------close-db--------------------------










// -------------flash-------------------
function flash($message=NULL) {
	static $msgs = [];
	if($message)
		$msgs[]=$message;
	return $msgs;
}
function flash_autorization($message=NULL) {
	static $msgs = [];
	if($message)
		$msgs[]=$message;
	return $msgs;
}




// перевод латин в русские
function transliterate($input){
	$gost = array(
	"а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
	"е"=>"e", "ё"=>"yo","ж"=>"j","з"=>"z","и"=>"i",
	"й"=>"i","к"=>"k","л"=>"l", "м"=>"m","н"=>"n",
	"о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t",
	"у"=>"y","ф"=>"f","х"=>"h","ц"=>"c","ч"=>"ch",
	"ш"=>"sh","щ"=>"sh","ы"=>"i","э"=>"e","ю"=>"u",
	"я"=>"ya",
	"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
	"Е"=>"E","Ё"=>"Yo","Ж"=>"J","З"=>"Z","И"=>"I",
	"Й"=>"I","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
	"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
	"У"=>"Y","Ф"=>"F","Х"=>"H","Ц"=>"C","Ч"=>"Ch",
	"Ш"=>"Sh","Щ"=>"Sh","Ы"=>"I","Э"=>"E","Ю"=>"U",
	"Я"=>"Ya",
	"ь"=>"","Ь"=>"","ъ"=>"","Ъ"=>"",
	"ї"=>"j","і"=>"i","ґ"=>"g","є"=>"ye",
	"Ї"=>"J","І"=>"I","Ґ"=>"G","Є"=>"YE"
	);
	return strtr($input, $gost);
	}

// ac_online
function online_vse($login){
	$qq = $login;
	$mysqli = connect_db();
        $SQL = "SELECT * FROM `users` WHERE `login`= '$qq' ";
        $user = query_db_all($mysqli, $SQL);
        $_SESSION["ac_coment_online"] =  array_values($user);
}





// offlaine
function online($online){
	$mysqli = connect_db();
	sanitize($mysqli);
	$SQLL = "UPDATE `users` SET onlain='{$online}' WHERE login='{$_SESSION['user'][1]}'    ";
	query_db_all($mysqli, $SQLL);
	

}
// data_pol
function data_pol(){
	$mysqli = connect_db();
	sanitize($mysqli);
	$data = date("H:i d-m-Y");
    $SQL_posseh = "UPDATE `users` SET data_posl='{$data}'  WHERE login='{$_SESSION['user'][1]}'   ";
    query_db_all($mysqli, $SQL_posseh);

}
function online_user($online){
	$mysqli = connect_db();
	sanitize($mysqli);
	$SQL = "SELECT * FROM `users` WHERE `login`= '$online'";
	$qwe = query_db_all($mysqli, $SQL);
	
	$_SESSION['online_user_all'] = array_values($qwe);
	$string  = $_SESSION['online_user_all'][0][6];
	return $string;
}

// ----------END--------------flash-------------------
















function log_out(){
	if (isset($_GET['log_out'])) {
		session_save_path();
		session_destroy();
		return redirect('?path=/');
	}


}

// gb
function get_size( $bytes )
{
if ( $bytes < 1000 * 1024 ) {
 return number_format( $bytes / 1024, 2 ) . " KB";
 }
elseif ( $bytes < 1000 * 1048576 ) {
 return number_format( $bytes / 1048576, 2 ) . " MB";
 }
elseif ( $bytes < 1000 * 1073741824 ) {
 return number_format( $bytes / 1073741824, 2 ) . " GB";
 }
else {
 return number_format( $bytes / 1099511627776, 2 ) . " TB";
 }
}




function button_red(){

	if (isset($_POST['buttom_red'])) {
		return redirect('?path=/profile');
	}
}
function button_search(){

	if (isset($_GET['button_search'])) {
		return redirect('?path=/search');
	}
}





function address_verification($get){
	if (in_array($get,$_GET)) {
		
		return true;
	}

}

//nav 


function delete($get,$name){
	if (address_verification($get)) {
		$_SESSION[$name] += 1;
	}
}
function delete2($get,$name){
	if (address_verification($get)) {
		$_SESSION[$name] -= 1;
	}
}












function create_INFO()
    {      
        $ip = $_SERVER['HTTP_USER_AGENT'];
        $ip2 = $_SERVER['REMOTE_ADDR'];
        $login = '';
        foreach ($_SESSION['user'] as  $value) {
            $login .= " {$value}{$value}";
        }
        $today = date("Y-m-d H:i:s");  
        $info = "INFO: {$today}||{$login}||браузер: {$ip}||id: {$ip2} ";

		if (file_exists("INFO.txt")){
			if (!empty($_GET)) {
				foreach ($_GET as $key => $value) {
					$info .= " GET:{$key}{$value}";
				}
				
				
				
				$fdq = fopen("INFO.txt", 'a') or die("не11 удалось создать файл");
				fwrite($fdq,$info. PHP_EOL);
				
				fclose($fdq);
			}
		}else {
			if (!empty($_GET)) {
				foreach ($_GET as $key => $value) {
					$info .= " GET:{$key}";
				}
				
				
				
				$fdq = fopen("INFO.txt", 'w+') or die("не22 удалось создать файл");
				fwrite($fdq,$info. PHP_EOL);
				
				fclose($fdq);
			}
		}

        
       
	}
	function create_bag()
    {      
        $ip = $_SERVER['HTTP_USER_AGENT'];
        $ip2 = $_SERVER['REMOTE_ADDR'];
        $login = '';
        foreach ($_SESSION['user'] as  $value) {
            $login .= " {$value}";
        }
        $today = date("Y-m-d H:i:s");  
        $info = "попытка подключения несуществующего файла INFO: {$today}||{$login}||браузер: {$ip}||id: {$ip2} ";

        if (file_exists("warning.txt")){
			if (!empty($_GET)) {
				foreach ($_GET as $key => $value) {
					$info .= " GET:{$key}{$value}";
				}
				
				
				
				$fdq = fopen("warning.txt", 'a') or die("не удалось создать файл");
				fwrite($fdq,$info. PHP_EOL);
				
				fclose($fdq);
			}
		}else {
			if (!empty($_GET)) {
				foreach ($_GET as $key => $value) {
					$info .= " GET:{$key}";
				}
				
				
				
				$fdq = fopen("warning.txt", 'w') or die("не удалось создать файл");
				fwrite($fdq,$info. PHP_EOL);
				
				fclose($fdq);
			}
		}
       
    }








?>
