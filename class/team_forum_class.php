<?php
class forum_team{
    public function __construct()
    {
        
        $this->form = request_get('form_head_team','','POST');
        
        $this->form_text = request_get('form_head_team_text','','POST');
        return $this;

    }

    public function form_dobav(){
        
        $mysqli = connect_db();
        $form = sanitize($mysqli, $this->form);
        $cyr= transliterate($this->form);
        $cyr_mass = explode(" ", $cyr);
        $cyr_vivod =  implode("_",  $cyr_mass);
        $date = date("H:i d-m-Y");

        $text = $this->form_text;
        $avtor = $_SESSION['user'][1];
        $avtor_link = $_SESSION['user'][14];
        $avtor_img = $_SESSION['user'][5];
        $get_link = $_GET['path'];
        $str = substr($get_link,0,-6);
        
        if (!empty($this->form)) {
            $SQL = "INSERT INTO `forum_team1` (name , link ,date , avtor , avtor_link , avtor_img , get_link ,text) VALUES ('$form', '/{$cyr_vivod}' ,'$date', '$avtor' , '$avtor_link' , '$avtor_img' ,'$str' ,'$text')";
            query_db_all($mysqli, $SQL);
            $_SESSION['flash_dobav'] = 'Проверка предложенной темы в течение 24 часов';
        }
        
        
        
    }
    public function form_all($get){
        $mysqli = connect_db();
        $SQL = "SELECT * FROM `forum_team` WHERE `get_link`= '$get'";
        $user = query_db_all($mysqli, $SQL);
    
        $_SESSION["forum_team"."{$get}"] =  array_reverse(array_values($user));
        
    }

    public function comment_col($login){
        $mysqli = connect_db();
        $SQL = "SELECT * FROM `comment` WHERE `link_get`= '$login'";
        $user = query_db_all($mysqli, $SQL);
    
        $_SESSION["forum_team_comment123"] =  array_values($user);
        
        
        return count($_SESSION["forum_team_comment123"]);
    }
    public function comment_taim($login){
        $mysqli = connect_db();
        $SQL = "SELECT * FROM `comment` WHERE `link_get`= '$login'";
        $user = query_db_all($mysqli, $SQL);
    
        $_SESSION["forum_team_comment12322"] =  array_reverse(array_values($user));
        $taim = $_SESSION["forum_team_comment12322"][0][5];
        
        return $taim;
    }
    public function comment_login($login){
        $mysqli = connect_db();
        $SQL = "SELECT * FROM `comment` WHERE `link_get`= '$login'";
        $user = query_db_all($mysqli, $SQL);
    
        $_SESSION["forum_team_comment12322s"] =  array_reverse(array_values($user));
        $taim = $_SESSION["forum_team_comment12322s"][0][1];
        
        return $taim;
    }




}


?>