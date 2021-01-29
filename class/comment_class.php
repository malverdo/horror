<?php
class comment{

    public function __construct()
    {
        
        $this->login_autor = request_get('form_head_comment_text','','POST');


        
        return $this;

    }

    
    
    public function form_dobav(){
        $mass = explode("/",$_GET['path']);
        $string = "/{$mass[1]}";
        
        $mysqli = connect_db();
        

        $SQL = "SELECT * FROM `forum_team` WHERE `link`= '$string' ";
        $user = query_db_all($mysqli, $SQL);
        $_SESSION["forum_comment"] =  array_values($user);

        
            online_vse($_SESSION["forum_comment"][0][5]);
        
        

        $glaz = $_SESSION["forum_comment"][0][3];
        $glaz++;
        $SQL = "UPDATE `forum_team` SET glaz='$glaz' WHERE link ='{$string}'";
        query_db_all($mysqli, $SQL);



// --------------------------------------
        $SQL = "SELECT * FROM `users` WHERE `login`= '{$_SESSION["forum_comment"][0][5]}' ";
        $online = query_db_all($mysqli, $SQL);
        if (isset($_SESSION['online_coment'])) {
            unset($_SESSION['online_coment']);
            $_SESSION['online_coment'] = array_values($online);
        }else{
            $_SESSION['online_coment'] = array_values($online);
        }
        // ---------------------------

    }

    public function comment_text(){
            $mysqli = connect_db();	

            $text = sanitize($mysqli, $this->login_autor);
           
            $data1 = date("H:i");
            $data = date("H:i d-m-Y");

            $login = $_SESSION['user'][1];
            $img = $_SESSION['user'][5];
            $login_link = $_SESSION['user'][14];
            $text2 = $this->login_autor;
            

            
            $get1 = explode('/',$_GET['path']);
            $get2 = "/".$get1[1]; 

            $SQL = "INSERT INTO `comment` (login , img_link ,login_link, date , date_mal , text , link_get) VALUES ('$login', '$img' , '$login_link' , '$data' , '$data1' , '$text2' , '$get2')";
            $good = query_db_all($mysqli, $SQL);
        
            

    }


    


}


?>