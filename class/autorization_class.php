<?php

class autorization{


    public function __construct()
    {
        
        $login_autor = request_get('login_autor','','POST');
        $password_autor = request_get('password_autor','','POST');
        $proverka_avtor = request_get('proverka_avtor','','POST');
        $this->method = $_SERVER['REQUEST_METHOD'];

        

        $login = htmlspecialchars(request_get('login_registr','','POST') , ENT_QUOTES);
        $email = htmlspecialchars(request_get('email','','POST'), ENT_QUOTES);
        $pasword1 = htmlspecialchars(request_get('password_registr','','POST'), ENT_QUOTES);
        $pasword2= htmlspecialchars(request_get('password_registr2','','POST'), ENT_QUOTES);
        $proverka_zemla = htmlspecialchars(request_get('proverka_registr','','POST'), ENT_QUOTES);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->login_autor = htmlspecialchars($login_autor);
        $this->password_autor = htmlspecialchars($password_autor);
        $this->proverka_avtor = htmlspecialchars($proverka_avtor);
       




        
        
        if (preg_match("/([\s^.<>{};?:,$&])/", $this->login_autor) and strripos($this->login_autor ,'script' )
          or preg_match("/([\s^.<>{};?:,$&])/",$this->password_autor) and strripos($this->password_autor ,'script' )
         or preg_match("/([\s^.<>{};?:,$&])/", $this->proverka_avtor) and strripos($this->proverka_avtor ,'script' ))
          {
            
            exit();
                
        }








        $this->title = 'регистрация';
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
            if (empty($this->login_autor) or empty($this->password_autor) or empty($this->proverka_avtor)) {
                flash_autorization('Заполните все поля...');
                return $this->url_exit();
            }else{
                return true;
                
            }
        }
    }
    public function check_bot(){
        if ($this->method==='POST' and !empty($this->proverka_avtor)) {
            if ($this->proverka_avtor === 'земля') {
                return true;    
            }else{
                flash_autorization("подсказка: имя вашей планеты начинаеться на букву  'з' ");
                return $this->url_exit();
            }
        }

    }


    public function ban(){
        $mysqli = connect_db();	
        $login = sanitize($mysqli, $this->login_autor);
        $SQL = "SELECT * FROM `users` WHERE `login`= '$login'";
        $user = query_db_one($mysqli, $SQL);
        $_SESSION['userd'] = array_values($user);

        if ($this->method==='POST') {
            if ($_SESSION['userd'][15] > time() ) {
                flash_autorization('вы забанины до '.$_SESSION['userd'][16]);
                return $this->url_exit();
            }else{
                $null = null;
                $SQLL = "UPDATE `users` SET data_ban='$null' WHERE login ='{$login}'";
                query_db_one($mysqli, $SQLL);
                
            }
        }
    }




    public function avtorization(){
        $mysqli = connect_db();	

        $login = sanitize($mysqli, $this->login_autor);
        $pasword = md5(sanitize($mysqli, $this->password_autor));

        

        // найти user
        $SQL = "SELECT * FROM `users` WHERE `login`= '$login'";
        $user = query_db_one($mysqli, $SQL);
        
        
        
        if ($user['password'] === $pasword) {
            $_SESSION['user'] = array_values($user);
            

            redirect('?path='.$_SESSION['user'][4]);
            
            
        }else{
            flash_autorization('пароль или логин не верный');
            return $this->url_exit();
        }
        
        // добавить последние посещение
        




    }




}


?>