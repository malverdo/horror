<?php 
class registration{

    

 

    public function __construct()
    {
        
        $login = htmlspecialchars(request_get('login_registr','','POST') , ENT_QUOTES);
        $email = htmlspecialchars(request_get('email','','POST'), ENT_QUOTES);
        $pasword1 = htmlspecialchars(request_get('password_registr','','POST'), ENT_QUOTES);
        $pasword2= htmlspecialchars(request_get('password_registr2','','POST'), ENT_QUOTES);
        $proverka_zemla = htmlspecialchars(request_get('proverka_registr','','POST'), ENT_QUOTES);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->email = htmlspecialchars($email);
        $this->pasword1 = htmlspecialchars($pasword1);
        $this->pasword2 = htmlspecialchars($pasword2);
        $this->proverka_zemla = htmlspecialchars($proverka_zemla);
        $this->login = htmlspecialchars($login);




        
        
        if (preg_match("/([\s^.<>{};?:,$&])/", $this->email) and strripos($this->email ,'script' )
          or preg_match("/([\s^.<>{};?:,$&])/", $this->pasword1) and strripos($this->pasword1 ,'script' )
         or preg_match("/([\s^.<>{};?:,$&])/", $this->pasword2) and strripos($this->pasword2 ,'script' )
          or preg_match("/([\s^.<>{};?:,$&])/", $this->proverka_zemla) and strripos($this->proverka_zemla ,'script' )
           or preg_match("/([\s^.<>{};?:,$&])/", $this->login) and strripos($this->login ,'script' )) {
            
            exit();
                
        }


        
        $this->title = 'Авторизация';
        $this->content = 'йу';
        return $this;

    }
    public function url_exit(){
        render_template(
            'template/registra.php',
            ['title'=>$this->title,
            'content'=>$this->content]
            );
            exit();
    }


    public function empty_input(){
        
       
        if ($this->method==='POST') {
            
	       
            

            if (empty($this->login) or empty($this->email) or empty($this->pasword1) or empty($this->pasword2) or empty($this->proverka_zemla)) {
                flash('Заполните все поля...');
                return $this->url_exit();
            }else{
                return true;
                
            }
        }
    }

    public function dlina_input(){
        if ($this->method==='POST' and !empty($this->login) or !empty($this->pasword1) or !empty($this->pasword2)) {
            if (mb_strlen($this->login) < 5  or mb_strlen($this->pasword1) < 4 or mb_strlen($this->pasword2) < 4) {
                flash('недопустимая длина значений');
                return $this->url_exit();
            }else{
                return true;
                
            }
        }
    }

    public function check_password(){
        if ($this->method==='POST' and !empty($this->pasword1) or !empty($this->pasword2)) {
            if ($this->pasword1 === $this->pasword2) {
                return true;
            }else{
                flash('пароли не совпадают');
                return $this->url_exit();
            }
        }
    }
    
    public function check_simvol(){
        if ($this->method==='POST' and !empty($this->pasword1) or !empty($this->login)) {
            if (preg_match("/([\s+^.<>{};?:,$])/", $this->pasword1) or preg_match("/([\s^.<>{};?:,$])/", $this->login)) {
                flash("строки содержит не допустимые символы");
                return $this->url_exit();
            }else{
                return true;
            }
        }

    }
    public function check_bot(){
        if ($this->method==='POST' and !empty($this->proverka_zemla)) {
            if ($this->proverka_zemla === 'земля') {
                return true;    
            }else{
                flash("подсказка: имя вашей планеты начинаеться на букву  'з' ");
                return $this->url_exit();
            }
        }

    }

    
    public function check_login_db(){
        $mysqli = connect_db();	
        $login = sanitize($mysqli, $this->login);
        $SQL = "SELECT * FROM `users` WHERE `login`= '$login'";
        $user = query_db_one($mysqli, $SQL);
        if (empty($user)) {
            
        }else{
            flash("такой логин существует");
                return $this->url_exit();
        }

        $mysqli = connect_db();	
        $email = sanitize($mysqli, $this->email);
        $SQL = "SELECT * FROM `users` WHERE `emal`= '$email'";
        $mail = query_db_one($mysqli, $SQL);
        if (empty($mail)) {
            
        }else{
            flash("такой E-mail существует");
                return $this->url_exit();
        }

    }

    public function user_good(){
        $mysqli = connect_db();	
        $login = sanitize($mysqli, $this->login);
        // $login = trim($login_new);
        // $login_bd = preg_replace("/\s+/", "", $login)


        $email = sanitize($mysqli, $this->email);
        $password = md5($this->pasword1);
        $data = date("H:i d-m-Y");
        $link = '/'.$this->login;
        $link_ac = '/ac_'.$this->login;
        $doljns = 'Пользователь';
        $SQL = "INSERT INTO `users` (login , emal , password , link , data_reg ,doljns , data_posl , ak_link) VALUES ('$login', '$email' , '$password' ,'$link' ,'$data' ,'$doljns' ,'$data' ,'$link_ac')";
        $good = query_db_one($mysqli, $SQL);
        
        $SQL_user = "SELECT * FROM `users` WHERE `login`= '$login'";
        $user = query_db_one($mysqli, $SQL_user);
        $_SESSION['user'] = array_values($user);
        
        

        redirect('?path='.$_SESSION['user'][4]);
        
        
    }

    
    
    
}

?>
