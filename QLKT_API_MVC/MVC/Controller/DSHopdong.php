<?php 
    class DSHopdong extends controller{
        public $dshd;
        public $mhd;
        function  __construct(){
            $this->dshd=$this->model('DSHopdongModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSHopdongView',
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
                    'page'=>'DSHopdongView',
                    'kq'=>$this->dshd->lophoc_all(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
           
        }
      
        function suahopdong($mhd){
            $_SESSION['Mahd']=$mhd;
            $kqhd=$this->dshd->checktrungHD($mhd);
            if($kqhd){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaHopdongView',
                    'kq'=>$this->dshd->lophoc_all(),
                    'kqtk'=>$this->dshd->TimkiemHD(''),
                    'tk'=>'',
                    'kqhd'=>$kqhd,
                ]);
               }else{
                $kthd=$this->dshd->Hopdong_upd($mhd);
                if($kthd){
                    $this->view('TrangchuLogin',[
                        'page'=>'DSHopdongView',
                        'kq'=>$this->dshd->lophoc_all(),
                        'kqtk'=>$this->dshd->TimkiemHD(''),
                        'kthd'=>$kthd,
                    ]);
               }
            }
                
            
        }
        // function Ketthuchopdong($mhd){
        //     $_SESSION['Mahd']=$mhd;
        //     $tk=$_POST['txtTimkiem'];
        //     $kq=$this->dshd->TimkiemHD($tk);
        //     $this->view('TrangchuLogin',[
        //         'page'=>'SuaHopdongView',
        //         'kq'=>$this->dshd->lophoc_all(),
        //         'kqtk'=>$kq,
        //         'timkiem'=>$tk
               
        //             ]);

        // }
        function CapnhapHopdong(){ 
                // $kq11=$this->dshd->phong_insXoa($p);

            if(isset($_POST['btnDangky'])){
                $mhd=$_POST['txtMahopdong'];
                $p=$_POST['ddlMaphong'];
                $nd=$_POST['txtNgayden'];
                $nhh=$_POST['txtNgayhethan'];
                $tt=$_POST['ddlTinhtrang'];
                
                // $kq=$this->dshd->Hopdong_upd($mhd,$p,$nd,$nhh,$tt);
                if($kq){
                   
                    $this->view('TrangchuLogin',[
                        'page'=>'SuaHopdongView',
                        'result'=>$this->dshd->Lophoc_All(),
                        'thongbao'=>'Cập nhập thành công',
                        'kq'=>$this->dshd->phong_allS($mhd),
                        'kqtk'=>$this->dshd->TimkiemHDS($mhd),
                    
                     ]);
                    
                     $kq12=$this->dshd->phong_ins($p);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'SuaHopdongView',
                            'result'=>$this->dshd->Lophoc_All(),
                            
                            'kq'=>$this->dshd->phong_allS($mhd),
                            'kqtk'=>$this->dshd->TimkiemHDS($mhd),
                         ]);
                    }
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',['page'=>'ThemHopdongView',
                'result'=>$this->dshd->Lophoc_All(),
                            
                'kq'=>$this->dshd->phong_allS($mhd),
                'kqtk'=>$this->dshd->TimkiemHDS($mhd),
                 ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin', [
                'page'=>'DSHopdongView',
                'kq'=>$this->dshd->lophoc_all(),
                'kqtk'=>$this->dshd->TimkiemHD(''),
            ]);
            }
        }
        function Xoa_hopdong($mhd){
          
               $kq1=$this->dshd->TimkiemHD('');
               $kq=$this->dshd->Hopdong_xoa($mhd);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSHopdongView',
                    'result'=>$this->dshd->Lophoc_All(),
                    'kqtk'=>$kq1
                ]);
               }
            }
    }
?>