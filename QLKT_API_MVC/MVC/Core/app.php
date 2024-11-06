<?php 
    class app{
        protected $controller="Home";
        protected $action="Getdata";
        protected $param=[];
        function __construct()
    {
        $arr=$this->Urlprocess();
        //Xử lý controller
        if($arr != null){
            if(file_exists('./MVC/Controller/'.$arr[0].'.php')){
                $this->controller=$arr[0];
                unset($arr[0]);
            }
        }
        include_once './MVC/Controller/'.$this->controller.'.php';
        $this->controller=new $this->controller;
        //Xử lý action
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action=$arr[1];
            }
            unset($arr[1]);
        }
        //Xử lý params
        $this->param=$arr?array_values($arr):[];
        //tạo biến có 3 tham số
        call_user_func_array([$this->controller,$this->action],$this->param);
    }

        function Urlprocess(){
            if(isset($_GET["url"])){
                $flags = NULL ? "/": 0;
                return explode("/",filter_var(trim($_GET["url"]),FILTER_DEFAULT, $flags));
              // return explode("/",filter_var(trim($_GET["url"]),FILTER_DEFAULT,"/"));
            }
        }   
    
    }
?>