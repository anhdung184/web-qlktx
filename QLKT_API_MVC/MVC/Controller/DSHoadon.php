<?php 
    class DSHoadon extends controller{
        public $dshd;
        public $mhd;
        function  __construct(){
            $this->dshd=$this->model('DSHoadonModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSHoadonView',
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
                    'page'=>'DSHoadonView',
                    'kq'=>$this->dshd->lophoc_all(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
        function suahoadon($mhd){
            $_SESSION['Mahd']=$mhd;
            $this->view('TrangchuLogin',[
                'page'=>'SuaHoadonView',
                'result'=>$this->dshd->Lophoc_All(),
                'thongbao'=>'',
                'kqtk'=>$this->dshd-> LayDLHD($mhd),
            ]);
        }
      
        function Sua_hoadon(){
            if(isset($_POST['btnThanhtoan'])){
               
                $mahd=$_POST['txtMaHoadon'];
                $map=$_POST['txtMaphong'];
                $nl=$_POST['txtNgaylap'];
                $sd=$_POST['txtSodien'];
                $sn=$_POST['txtSonuoc'];
                $m=$_POST['txtMang'];
                $ttien=$_POST['txtThanhtien'];
                $tongt=$_POST['txtTongtien'];
                $cn=$_POST['txtConno'];
               $kq=$this->dshd->Hoadon_upd($mahd,$map,$nl,$sd,$sn,$m,$tongt,$ttien,$cn);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaHoadonView',
                    'result'=>$this->dshd->Lophoc_All(),
                    'thongbao'=>'Sửa thành công',
                    'kqtk'=>$this->dshd-> LayDLHD($mahd),
                ]);
               }
               else{
                $this->view('TrangchuLogin',[
                    'page'=>'SuaNhanvienView',
                    'result'=>$this->dshd->Lophoc_All(),
                    'thongbao'=>'Sửa thất bại',
                    'kqtk'=>$this->dshd-> LayDLHD($mahd),
                ]);
               }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSHoadonView',
                    'kq'=>$this->dshd->lophoc_all(),
                    'kqtk'=>$this->dshd->TimkiemHD(''),
                    'tk'=>'',
                   ]);
            }
        }
        function Xoahoadon($mhd){
            
               $kq1=$this->dshd->TimkiemHD('');
               $kq=$this->dshd->hoadon_xoa($mhd);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSHoadonView',
                    'result'=>$this->dshd->Lophoc_All(),
                    'kqtk'=>$kq1
                ]);
               }
            }
    }
?>