<?php 
    class HDDNchuathanhtoan extends controller{
        public $hddnchuathanhtoan;

        function  __construct(){
            $this->hddnchuathanhtoan=$this->model('HDDNchuathanhtoanModels');
        }
        function Getdata(){
            $this->view('TrangchuLogin',[
             'page'=>'HDDNchuathanhtoanView',
             'kq'=>$this->hddnchuathanhtoan->lophoc_all(), 
            ]);
         }
    }
?>