<?php
class profil{


    public function __construct()
    {
        
        $this->name = request_get('name','','POST');
        $this->gorod = request_get('gorod','','POST');
        $this->rojdenie = request_get('rojdenie','','POST');
        $this->o_sebe= request_get('o_sebe','','POST');
        $this->method = $_SERVER['REQUEST_METHOD'];


        $this->title = 'профиль';
        $this->content = 'йу';
        return $this;

        
    }
    
    public function redac_profil($login){
        $mysqli = connect_db();
        $name = substr(sanitize($mysqli, $this->name) , 0 , 30);
        $gorod = substr(sanitize($mysqli, $this->gorod) , 0 , 30);
        $rojdenie = substr(sanitize($mysqli, $this->rojdenie) , 0 , 30);
        $o_sebe = substr(sanitize($mysqli, $this->o_sebe) , 0 , 200);

        if (!empty($this->name)) {
            
            $SQL = "UPDATE `users` SET name='$name' WHERE login ='{$login}'";
            query_db_one($mysqli, $SQL);
        }

        if (!empty($this->gorod)) {
            $SQL = "UPDATE `users` SET mest_geolok='$gorod' WHERE login ='{$login}'";
            query_db_one($mysqli, $SQL);
        }

        if (!empty($this->rojdenie)) {
            $SQL = "UPDATE `users` SET data_heppy='$rojdenie' WHERE login ='{$login}'";
           query_db_one($mysqli, $SQL);
        }

        if (!empty($this->o_sebe)) {
            $mass =  explode(' ',$o_sebe);
            foreach ($mass as  $value) {
                if (mb_strlen($value) > 12) {
                    return false;
                }
            }
            $SQL = "UPDATE `users` SET o_sebe='$o_sebe' WHERE login ='{$login}'";
            query_db_one($mysqli, $SQL);
        }


        $SQL_user = "SELECT * FROM `users` WHERE `login`= '$login'";
        $user = query_db_one($mysqli, $SQL_user);
        $_SESSION['user'] = array_values($user);

    }

    public function img($login){

        $random = (String)rand(0,9000);
        if (!empty($_FILES['img']['name'])) {
            $uploadfile = "images/user/{$random}".$_FILES['img']['name'];

            $mysqli = connect_db();
            $SQL = "UPDATE `users` SET img='$uploadfile' WHERE login ='{$login}'";
            query_db_all($mysqli, $SQL);
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
            
            $SQLL = "UPDATE `forum_team` SET avtor_img='$uploadfile' WHERE avtor ='{$login}'";
            query_db_all($mysqli, $SQLL);

            $SQLLL = "UPDATE `comment` SET img_link='$uploadfile' WHERE login ='{$login}'";
            query_db_all($mysqli, $SQLLL);

            

            $SQLLLL = "UPDATE `mail` SET img_login_otprav='$uploadfile' WHERE login_otprav ='{$login}'";
            query_db_all($mysqli, $SQLLLL);
        }
        
    

    

    

    // print_r($_FILES);
    }

}




?>