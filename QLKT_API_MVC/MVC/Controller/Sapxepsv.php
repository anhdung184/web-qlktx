<?php 
    class Sapxepsv extends controller{
        public $sxsv;

        function  __construct(){
            $this->sxsv=$this->model('SapxepsvModels');
        }
        function Getdata(){
            $this->view('TrangchuLogin',[
             'page'=>'SapxepsvView',
             'kq'=>$this->sxsv->lophoc_all(), 
            ]);
         }
    }
?>