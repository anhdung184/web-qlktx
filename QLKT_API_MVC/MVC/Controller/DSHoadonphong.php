<?php 
    class DSHoadonphong extends controller{
        public $dshd;
        public $mhd;
        function  __construct(){
            $this->dshd=$this->model('DSHoadonphongModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSHoadonphongView',
            'kq'=>$this->dshd->lophoc_all(),
            'kqtk'=>$this->dshd->TimkiemHD(''),
            'tk'=>'',
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dshd->TimkiemHD($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSHoadonphongView',
                    'kq'=>$this->dshd->lophoc_all(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
        function Xoahoadonphong($mhd){
            
            $kq1=$this->dshd->TimkiemHD('');
            $kq=$this->dshd->hoadonphong_xoa($mhd);
            if($kq){
             $this->view('TrangchuLogin',[
                'page'=>'DSHoadonphongView',
                 'result'=>$this->dshd->Lophoc_All(),
                 'kqtk'=>$kq1
             ]);
            }
         }
       
    }
?>