<?php 
    class HDPchuathanhtoan extends controller{
        public $hdpchuathanhtoan;

        function  __construct(){
            $this->hdpchuathanhtoan=$this->model('HDPchuathanhtoanModels');
        }
        function Getdata(){
            $this->view('TrangchuLogin',[
             'page'=>'HDPchuathanhtoanView',
             'kq'=>$this->hdpchuathanhtoan->lophoc_all(), 
            ]);
         }
    }
?>