<?php
class mail_vxod{


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
    

}




?>