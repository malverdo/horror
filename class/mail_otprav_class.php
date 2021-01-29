<?php
class mail_otprav{


    public function __construct()
    {
        
        


        
        return $this;

        
    }
    public function url_exit(){
        render_template(
            'template/pismo.php',
            ['title'=>$this->title,
            'content'=>$this->content]
            );
            exit();
    }

    public function mail(){
        $mysqli = connect_db();

        $user = $_SESSION['user'][1];
        $SQL = "SELECT * FROM `mail` WHERE `login_otprav`= '$user'";

        $users = query_db_all($mysqli, $SQL);
        
            $_SESSION['user_otprav']= array_reverse(array_values($users));
        
       
        
        


        
    }

}

class mail_vxod_acc{


    public function __construct()
    {
        
        


        
        return $this;

        
    }
    

    function mail_vxod(){
        $mysqli = connect_db();

		$user = $_SESSION['user'][1];
		
        $SQL = "SELECT * FROM `mail` WHERE `login_vxod`= '$user'";

        $users = query_db_all($mysqli, $SQL);
        
		$_SESSION['user_vxod'] = array_reverse(array_values($users));
        
        

        $SQL = "SELECT * FROM `mail` WHERE `login_vxod`= '$user' and `prohitan`= 0";

        $users = query_db_all($mysqli, $SQL);
        
		$_SESSION['user_vxod_kol'] = count($users);
			
        
			
			

			
    }
    function mail_spam(){
        $mysqli = connect_db();

		$user = $_SESSION['user'][1];
		
        $SQL = "SELECT * FROM `mail_spam` WHERE `login_vxod`= '$user'";

        $users = query_db_all($mysqli, $SQL);
        
		$_SESSION['user_spam'] = array_reverse(array_values($users));
        
        
		
			
        
			
			

			
    }

}




?>