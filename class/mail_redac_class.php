<?php
class mail_redac{


    
        
        public function __construct()
        {
            
            $this->delite = request_get('delite','','POST');
            $this->prohitan = request_get('','','POST');
            $this->no_prohitan = request_get('no_prohitan','','POST');
            $this->sapm = request_get('sapm','','POST');
            $this->method = $_SERVER['REQUEST_METHOD'];
    
    
            
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
        public function redac_mail(){
            if (isset($_POST['delite'])) {
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
        
                $SQL = "DELETE FROM `mail` WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);
                
                    $SQL = "DELETE FROM `mail_spam` WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);


                }
                redirect('?path=/mail/vxod');
            }
            
        }
        public function redac_prohitan(){
            if (isset($_POST['prohitan'])) {
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
        
                    $SQL = "UPDATE `mail` SET prohitan='1' WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);


                }
                redirect('?path=/mail/vxod');
            }
            
        }
        public function redac_no_prohitan(){
            if (isset($_POST['no_prohitan'])) {
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
        
                $SQL = "UPDATE `mail` SET prohitan='0' WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);


                }
                redirect('?path=/mail/vxod');
            }
           
        }

        public function redac_spam(){
            if (isset($_POST['spam'])) {
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
                    
                $SQL = "INSERT INTO `mail_spam` SELECT * FROM `mail` WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);
                
                }
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
        
                $SQL = "DELETE FROM `mail` WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);


                }
                redirect('?path=/mail/spam');
            }
        

        }

        public function redac_no_spam(){
            if (isset($_POST['no_spam'])) {
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
                    
                $SQL = "INSERT INTO `mail` SELECT * FROM `mail_spam` WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);
                
                }
                foreach ($_POST as $key => $value) {
                    print_r($key."<br>");
                    $mysqli = connect_db();
                    
        
                $SQL = "DELETE FROM `mail_spam` WHERE `link_pohta`= '$key'";
                query_db_all($mysqli, $SQL);


                }
                redirect('?path=/mail/spam');
            }
        
            
        }
        


        
    

}



?>