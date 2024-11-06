<?php 
    class DSNhanvien extends controller{
        public $dsnv;
        public $mnv;
        function  __construct(){
            $this->dsnv=$this->model('DSNhanvienModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSNhanvienView',
            'kq'=>$this->dsnv->Nhanvien_ListAll(),
            'kqtk'=>$this->dsnv->NhanvienSearch(''),
            'tk'=>'',
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dsnv->NhanvienSearch($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'kqtk'=>$this->dsnv->Nhanvien_ListAll(),
                    'kq'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
        function suanhanvien($mnv){
            $_SESSION['Manv']=$mnv;
            $this->view('TrangchuLogin',[
                'page'=>'SuaNhanvienView',
                'result'=>$this->dsnv->Nhanvien_ListAll(),
                'thongbao'=>'',
                'kqtk'=>$this->dsnv->NhanvienSearch($mnv)
            ]);
        }
        function themnhanvien(){
          
            $this->view('TrangchuLogin',[
                'page'=>'ThemNhanvienView'
                
            ]);
        }
        function Sua_nhanvien(){
            if(isset($_POST['btnLuu'])){
               $mnv=$_POST['txtManv'];
               $tnv=$_POST['txtHoten'];
               $ngs=$_POST['txtNgaysinh'];
               $gt=$_POST['gender'];
               $sdt=$_POST['txtSdt'];
               $dc=$_POST['txtQuequan'];
               $cv=$_POST['ddlChucvu'];
               $kq=$this->dsnv-> NhanvienUpdate($mnv,$tnv,$ngs,$gt,$sdt,$dc,$cv);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaNhanvienView',
                    'result'=>$this->dsnv->Lophoc_All(),
                    'thongbao'=>'Sửa thành công',
                    'kqtk'=>$this->dsnv->NhanvienSearch($mnv)
                ]);
               }
               else{
                $this->view('TrangchuLogin',[
                    'page'=>'SuaNhanvienView',
                    'result'=>$this->dsnv->Nhanvien_ListAll(),
                    'thongbao'=>'Sửa thất bại',
                    'kqtk'=>$this->dsnv->NhanvienSearch($mnv)
                ]);
               }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'kq'=>$this->dsnv->Nhanvien_ListAll(),
                    'kqtk'=>$this->dsnv->NhanvienSearch('')
                   ]);
            }
        }
        function Xoa_nhanvien($mnv){
            
               $kq1=$this->dsnv->NhanvienSearch('');
               $kq=$this->dsnv->NhanvienDelete($mnv);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'result'=>$this->dsnv->Nhanvien_ListAll(), 
                    'kqtk'=>$kq1,
                    'thongbao'=>'Xóa thành công',
                ]);
               }else{
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'result'=>$this->dsnv->Nhanvien_ListAll(),
                    'kqtk'=>$kq1,
                    'thongbao'=>'Xóa thất bại',
                ]);
               }
            }
    }
?>