<?php
function index()
{	require_once 'app/config.php';
	$title = 'Админ';
	$method = $_SERVER['REQUEST_METHOD'];
    $content = 'йу';
    
    $name_history = request_get('name_history','','POST');
    $text_history = request_get('text_history','','POST');
    $time_history = request_get('time_history','','POST').'мин';
    

    if (isset($_SESSION['user']) and $_SESSION['user'][9] == 'Админ' or $_SESSION['user'][9] == 'Модератор') {
         
    }else{
        render_template('404/404.php');
        exit();
    }

    

    
    if (isset($_POST['name_history']) and !empty($_POST)) {
        $mysqli = connect_db();

        
        
        $new_link = transliterate($name_history);
        $new_link2 = explode( ' ' , $new_link);
        $new_link3 = implode('_', $new_link2);
        $random = (String)rand(0,100);

        $link = $random . $new_link3;

        $link_history = "/history_read/".$random.$new_link3 ;
        $uploadfile = "images/history/{$link}".$_FILES['img']['name'];

        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

        $data = date('d.m.Y');
        $glaz = rand(5000,15000);

        $SQL = "INSERT INTO `history` ( title , description , link_img , link_history , taim , data , glaz)
VALUES ('$name_history', '$text_history', '$uploadfile' , '$link_history' , '$time_history' , '$data' , '$glaz')";
        
        query_db_one($mysqli, $SQL);
        redirect('?path=/add_history'); 
    }



    $mysqli = connect_db();
    $SQL = "SELECT * FROM `forum_team1` WHERE 1";
    $team = query_db_all($mysqli, $SQL);
	$_SESSION['team_check'] = array_reverse(array_values($team));





     if (isset($_POST['btn_delite']) and !empty($_POST)) {
        
                foreach ($_POST as $key => $value) {
                    
                    $mysqli = connect_db();

                $SQL = "DELETE FROM `forum_team1` WHERE `id`= '$key'";
                query_db_all($mysqli, $SQL);


                }

                $mysqli = connect_db();	
                $login = $_POST['login'];
                $text = $_POST['messege'];
                

                $data_mal = date("H:i");
                $data_bol = date("d-m-Y");
        
                $login_vxod = $_SESSION['user'][1];
                $img_login_otprav = $_SESSION['user'][5];


                $SQL_user = "SELECT * FROM mail ORDER BY id DESC LIMIT 1";
                $id = query_db_one($mysqli, $SQL_user);
                $_SESSION['mail_otprav']  = array_values($id) ;
                $link_pohta = $_SESSION['mail_otprav'][8] + 1;

                
                $link_login_otpr = $_SESSION['user'][14];
        
                $SQL = "INSERT INTO `mail` (text , login_vxod , login_otprav , data_mal , data_bol , img_login_otprav , link_pohta , 	link_login_otpr) VALUES 
                ('$text', '$login' , '$login_vxod' , '$data_mal' , '$data_bol' , '$img_login_otprav' , '$link_pohta' , '$link_login_otpr' )";
                query_db_one($mysqli, $SQL);
                redirect('?path=/check_taem'); 
        
     }





     if (isset($_POST['btn_add']) and !empty($_POST)) {
        
            
        foreach ($_POST as $key => $value) {
            print_r($key."<br>");
            $mysqli = connect_db();
            
            
        $SQL = "INSERT INTO `forum_team` SELECT * FROM `forum_team1` WHERE `id`= '$key'";
        query_db_all($mysqli, $SQL);
        
        }



        foreach ($_POST as $key => $value) {
            
            $mysqli = connect_db();

        $SQL = "DELETE FROM `forum_team1` WHERE `id`= '$key'";
        query_db_all($mysqli, $SQL);


        }

        $mysqli = connect_db();	
        $login = $_POST['login'];
        $text = $_POST['messege'];
        

        $data_mal = date("H:i");
        $data_bol = date("d-m-Y");

        $login_vxod = $_SESSION['user'][1];
        $img_login_otprav = $_SESSION['user'][5];


        $SQL_user = "SELECT * FROM mail ORDER BY id DESC LIMIT 1";
        $id = query_db_one($mysqli, $SQL_user);
        $_SESSION['mail_otprav']  = array_values($id) ;
        $link_pohta = $_SESSION['mail_otprav'][8] + 1;

        
        $link_login_otpr = $_SESSION['user'][14];

        $SQL = "INSERT INTO `mail` (text , login_vxod , login_otprav , data_mal , data_bol , img_login_otprav , link_pohta , 	link_login_otpr) VALUES 
        ('$text', '$login' , '$login_vxod' , '$data_mal' , '$data_bol' , '$img_login_otprav' , '$link_pohta' , '$link_login_otpr' )";
        query_db_one($mysqli, $SQL);
        redirect('?path=/check_taem'); 

}











    if (isset($_POST['btn_history'])) {
		return redirect("?path=/admin");
	}
	return render_template(
		'template/admin.php',
		[
			'title'=> $title,
			'content'=>$content,
			

		]
	);
}




?>