<?php 
    class Trangchu extends controller{
       
        function  __construct(){
            // $this->dshd=$this->model('DSHoadonphongModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'TrangchuView',
           
            
           
           ]);
        }
      
       
    }
?>