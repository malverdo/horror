<?php
class oblako{

    public function __construct()
    {
        
        $this->delite = request_get('delite','','POST');
        return $this;
    }
    
    
    public function img(){

       
        $login = $_SESSION['user'][1];
        $random = (String)rand(0,90000);
        
        if (!empty($_FILES['file']['name'])) {
            
            $uploadfile = "images/oblak/{$random}".$_FILES['file']['name'];
            
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
           
            $type1 = $_FILES['file']['type'];
            $type = explode('/',$type1);
            $date = date("d.m.Y");
            $mysqli = connect_db();
            $SQL = "INSERT INTO `oblako` (login ,link_file , type_file , data ,name_file , razmer) VALUES ('$login','$uploadfile','$type[0]','$date', '$name' ,'$size')";
            query_db_all($mysqli, $SQL);
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
            
            // session_regenerate_id();
            $_SESSION['params'] = 'загрузка прошла успешно!';

            if (isset($_SESSION['razmer'])) {
                unset($_SESSION['razmer']);
                
            }
            session_regenerate_id();
            return  redirect("?path=/{$_SESSION['user'][1]}/oblako/redac");
            
            

            
            
        }
        
    }
    public function get_file(){
        $mysqli = connect_db();
        sanitize($mysqli);
        $login = $_SESSION['user'][1];
        $SQL = "SELECT * FROM `oblako` WHERE `login`='$login'";
        
        $accaunt = query_db_all($mysqli, $SQL);
        
        $_SESSION['file_user'] = array_reverse(array_values($accaunt));
    
    }
    public function redac_oblako_delite(){
        if (isset($_POST['delite'])) {
            foreach ($_POST as $key => $value) {
                print_r($key."<br>");
                $mysqli = connect_db();
                
    
            $SQL = "DELETE FROM `oblako` WHERE `id`= '$key'";
            query_db_all($mysqli, $SQL);
            
            


            }
            if (isset($_SESSION['razmer'])) {
                unset($_SESSION['razmer']);
                
            }
            
            redirect('?path=/malverdo/oblako/redac');
        }
        
    }
}
?>