<?php

class Application
{
    protected $controller = 'TaskController';
    protected $action = 'index';
    protected $prams = [];

    public function __construct(){

        $this->prepareURL();
        if(file_exists(CONTROLLER. $this->controller.'.php')){
            $this->controller = new $this->controller;
            if(method_exists($this->controller,$this->action)){
                //call function by name
                call_user_func_array([$this->controller,$this->action], $this->prams);
            }
        }else{
            $this->controller = new TaskController();
            $this->controller->index();
        }
    }

    /*
     Check params URL
    */
    protected function prepareURL(){
        $request = trim($_SERVER["REQUEST_URI"], "/");
        if(isset($request)){
            $url = explode('/' , $request);
            
            //setting api url
            if($url[0] == "api"){
                $this->controller = isset($url[1]) ? $url[1].'Controller' : 'TaskController';
                $this->action = isset($url[2]) ? $url[2] : 'index';
                unset($url[0],$url[1],$url[2]);
                $this->prams =!empty($url) ? array_values($url) : [];
            }else {
                $this->controller = isset($url[0]) ? $url[0].'Controller' : 'TaskController';
                $this->action = isset($url[1]) ? $url[1] : 'index';
                unset($url[0],$url[1]);
                $this->prams =!empty($url) ? array_values($url) : [];
            }
        }
    }
}