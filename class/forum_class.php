<?php
class forum{

    public function __construct()
    {
        
        $this->form = request_get('form_head','','POST');


        
        return $this;

    }
    
    public function form_dobav(){
        
        $mysqli = connect_db();
        $form = sanitize($mysqli, $this->form);
        $cyr= transliterate($this->form);
        $cyr_mass = explode(" ", $cyr);
        $cyr_vivod =  implode("_",  $cyr_mass);
        if (!empty($this->form)) {
            $SQL = "INSERT INTO `forum` (name , link) VALUES ('$form', '/{$cyr_vivod}')";
            query_db_all($mysqli, $SQL);
        }
    }
    public function form_all(){
    $mysqli = connect_db();
    $SQL = "SELECT * FROM `forum` WHERE 1";
    $user = query_db_all($mysqli, $SQL);
    $_SESSION['forum'] =  array_values($user);

  
    
// числа фибоначи
//     function fibonacci($n)
// {
//  if ($n < 3) {
//  return 1;
//  }
//  else {
//  return fibonacci($n-1) + fibonacci($n-2);
//  }
// }
// for ($n = 1; $n <= 16; $n++) {
//  echo(fibonacci($n) . ",");
// }

    }
   public function form_tam_all($get ){
        $mysqli = connect_db();
        $SQL = "SELECT * FROM `forum_team` WHERE `get_link`= '$get'";
        $user = query_db_all($mysqli, $SQL);
        $_SESSION['team_all_forum'][] = array_reverse(array_values($user));

   }
}


?>