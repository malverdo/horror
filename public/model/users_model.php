<?php
function index()
{	require_once 'app/config.php';
	$title = 'Пользователи';
	$content = 'йу';
    
    


    if (address_verification('/users') or address_verification('/users/1')) {
        $mysqli = connect_db();
        $SQL = "SELECT * FROM `users` ORDER BY id DESC LIMIT 0,10";
        $user = query_db_all($mysqli, $SQL);
        if (isset($_SESSION['user_ac'])) {
            unset($_SESSION['user_ac']);
            $_SESSION['user_ac'] = $user;
            unset($_SESSION['link_user']);
            $_SESSION['link_user'] = [1 , 2 , 3 , 4];
        }else{
            $_SESSION['user_ac'] = $user;
            $_SESSION['link_user'] = [1 , 2 , 3 , 4];
        }

        $SQL = "SELECT * FROM `users` ";
        $qw =  query_db_all($mysqli, $SQL);
        unset($_SESSION['users_count']);
        $_SESSION['users_count'] = $qw;
        
        unset($_SESSION['namber_str_link']);
    }else{

        $mysqli = connect_db();
        
        
        
        $kol = ceil(count($_SESSION['users_count']) / 10);
        
        if (isset($_SESSION['namber_link'])) {
            unset($_SESSION['namber_link']);
        }

        $namber = explode('/',$_GET['path']);

        

        for ($i=1 ,$z=2 , $min = 1 ; $i <= $kol ; $i++ ,$z++ , $min += 1 ) { 
            
            if (isset($_SESSION['namber_link'])) {
                array_push($_SESSION['namber_link'] ,["{$min}0"]);
            }else{
                $_SESSION['namber_link'] = ["{$z}" => ["{$min}0"]];
            }
            

        }
        
        
        
        $namber_mal = $_SESSION['namber_link'][$namber[2]][0];
        

        
        unset($_SESSION['namber_str_link']);
        $_SESSION['namber_str_link'] = $namber[2];
        
        $SQL2 = "SELECT * FROM `users` ORDER BY id DESC LIMIT $namber_mal,10";
        $users = query_db_all($mysqli, $SQL2);

        unset($_SESSION['user_ac']);
        $_SESSION['user_ac'] = $users;

        
        unset($_SESSION['link_user']);
        if ( $namber[2] == count($_SESSION['namber_link']) - 1) {

            $nazad = $namber[2] - 2;
            $vpered = $namber[2] - 1;
            $vpered2 = $namber[2] ;
            $vpered3 = $namber[2] + 1;
            
        }
        elseif($namber[2] == count($_SESSION['namber_link'])) {

            $nazad = $namber[2] - 3;
            $vpered = $namber[2] - 2;
            $vpered2 = $namber[2] - 1 ;
            $vpered3 = $namber[2] ;

        } else {
            $nazad = $namber[2] - 1;
            $vpered = $namber[2] ;
            $vpered2 = $namber[2] + 1;
            $vpered3 = $namber[2] + 2;
        }
        
        
    

        $_SESSION['link_user'] = [$nazad , $vpered , $vpered2 , $vpered3];

        


    }

   
   





























    
    
	return render_template(
		'template/users.php',
		[
			'title'=> $title,
            'content'=>$content,
        
			

		]
	);
}



?>