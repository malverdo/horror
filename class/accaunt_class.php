<?php 
class accaunt{

    

 

    public function __construct()
    {
        
        $this->delite = request_get('delite','','POST');
        $this->moderator = request_get('moderator','','POST');

        $this->ban = request_get('ban','','POST');
        $this->btn_ban = request_get('btn_ban','','POST');
        
        $this->method = $_SERVER['REQUEST_METHOD'];


        $this->title = 'акаунт';
        $this->content = 'йу';
        return $this;

    }


    public function accunt(){
        $get_namber = array_values($_GET);

        $mysqli = connect_db();
        sanitize($mysqli);
        $SQL_user = "SELECT * FROM `users` WHERE `ak_link`= '$get_namber[0]'";
        
        $accaunt = query_db_all($mysqli, $SQL_user);
        
        $_SESSION['accaunt'] = array_values($accaunt);
    }
    public function accunt_vse(){
        $mysqli = connect_db();
        sanitize($mysqli);
        $SQL_user = "SELECT * FROM `users` WHERE 1";
        
        $accaunt = query_db_all($mysqli, $SQL_user);
        if (isset($_SESSION['accaunt_user'])) {
            unset($_SESSION['accaunt_user']);
            $_SESSION['accaunt_user'] = array_values($accaunt);
        }else{
            $_SESSION['accaunt_user'] = array_values($accaunt);
        }
        
    }

    public function do_moderator(){
        if (isset($this->moderator) and !empty($_POST['moderator'])) {
            $login = $_SESSION['accaunt'][0][1];
            $mysqli = connect_db();
            $SQL = "UPDATE `users` SET doljns='Модератор' WHERE login ='{$login}'";
            query_db_all($mysqli, $SQL);
            redirect('?path=/ac_'.$_SESSION['accaunt'][0][1]);
        }
    }

    public function delite(){
        if (!empty($_POST['delite'])) {
            $login = $_SESSION['accaunt'][0][1];
            $mysqli = connect_db();
            
            $SQL = "DELETE FROM `users` WHERE login ='{$login}'";
            query_db_all($mysqli, $SQL);
            redirect('?path=/forum');
        }
       
    }


    public function ban(){
        if (isset($this->ban) and isset($this->btn_ban) and !empty($_POST['ban'])) {
            $login = $_SESSION['accaunt'][0][1];
            $date = time() + (86400 * $this->ban);
            $mysqli = connect_db();
            

            
            $data_new = date(' h:i:s d.m.Y',$date);
            // $mass   = explode('-',$data);
            // $mass[0] += $this->ban; 
            // $data_new = implode('-',$mass);
            

            $SQL = "UPDATE `users` SET ban='$date' WHERE login ='{$login}'";
            query_db_all($mysqli, $SQL);
            $SQL = "UPDATE `users` SET data_ban='$data_new' WHERE login ='{$login}'";
            query_db_all($mysqli, $SQL);
            redirect('?path=/ac_'.$_SESSION['accaunt'][0][1]);
            
        }
    }

}

?>