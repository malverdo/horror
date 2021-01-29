<?php
class pismo{


    public function __construct()
    {
        
        $this->login = request_get('login_accaunt_otprav','','POST');
        $this->text = request_get('text_accaunt_otprav','','POST');
        $this->method = $_SERVER['REQUEST_METHOD'];


        
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

    public function pismo(){
        if (!empty($this->login) and !empty($this->text)) {
            $mysqli = connect_db();	
            $login = sanitize($mysqli, $this->login);
            $text = sanitize($mysqli, $this->text);
            


            $SQL = "SELECT * FROM `users` WHERE `login`= '$login'";
            $user = query_db_one($mysqli, $SQL);
            if (empty($user)) {
                flash("такой логин не  существует");
                    return $this->url_exit();
            }else{
                
            }

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

            redirect('?path=/mail/otprav');
        }

        
        
        
    }


}




?>