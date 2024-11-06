<?php 
    class DSPhong extends controller{
        public $dsp;
        public $map;
        
        function  __construct(){
            $this->dsp=$this->model('DSPhongModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSPhongView',
            'kq'=>$this->dsp->Phong_ListAll(),
            'kqtk'=>$this->dsp->PhongSearch(''),
            'tk'=>'',
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dsp->PhongSearch($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSPhongView',
                    'kqtk'=>$this->dsp->Phong_ListAll(),
                    'kq'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
 
 
        function suaphong($map){
            $_SESSION['Maphong']=$map;
            $this->view('TrangchuLogin',[
                'page'=>'SuaPhongView',
                'result'=>$this->dsp->Phong_ListAll(),
                'thongbao'=>'',
                'kqtk'=>$this->dsp->PhongSearch($map)
            ]);
        }
        function themphong(){
          
            $this->view('TrangchuLogin',[
                'page'=>'ThemPhongView'
                
            ]);
        }
        function CapnhapPhong(){
            if(isset($_POST['btnThemmoi'])){
                $map=$_POST['txtMaphong'];
                $lp=$_POST['loaiphong'];
                $gp=$_POST['txtGiaphong'];
                $tt=$_POST['tinhtrang'];
                $ht=$_POST['txtSonguoio'];
                $td=$_POST['txtSonguoitd'];
                $mt=$_POST['txtMota'];
                $kq=$this->dsp->PhongUpdate($map,$lp,$gp,$tt,$ht,$td,$mt);
                if($kq){
                    $this->view('TrangchuLogin',[
                        'page'=>'SuaPhongView',
                        'result'=>$this->dsp->Lophoc_All(),
                        'thongbao'=>'Cập nhập thành công',
                        'kqtk'=>$this->dsp->PhongSearch($map)
                    
                     ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'SuaPhongView',
                            'result'=>$this->dsp->Phong_ListAll(),
                            'thongbao'=>'Cập nhập thất bại',
                            'kqtk'=>$this->dsp->PhongSearch($map)
                           
                         ]);
                    }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                'page'=>'DSPhongView',
                'kq'=>$this->dsp->Phong_ListAll(),
                'kqtk'=>$this->dsp->PhongSearch('')
            ]);
            }
        }
        function Xoa_phong($map){
          
               $kq1=$this->dsp->PhongSearch('');
               $kq=$this->dsp->PhongDelete($map);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSPhongView',
                    'result'=>$this->dsp->Phong_ListAll(),
                    'kqtk'=>$kq1,
                    'thongbao'=>'Xóa thành công',
                ]);
               }else{
                $this->view('TrangchuLogin',[
                    'page'=>'DSPhongView',
                    'result'=>$this->dsp->Phong_ListAll(),
                    'kqtk'=>$kq1,
                    'thongbao'=>'Xóa thất bại',
                ]);
               }
            }
    }
?>