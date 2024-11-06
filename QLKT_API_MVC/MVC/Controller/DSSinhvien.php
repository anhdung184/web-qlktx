<?php 
    class DSSinhvien extends controller{
        public $dssv;
        public $msv;
        function  __construct(){
            $this->dssv=$this->model('DSSinhvienModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSSinhvienView',
            'kq'=>$this->dssv->Sinhvien_ListAll(),
            'kqtk'=>$this->dssv->SinhvienSearch(''),
            'tk'=>'',
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dssv->SinhvienSearch($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSSinhvienView',
                    'kqtk'=>$this->dssv->Sinhvien_ListAll(),
                    'kq'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
        function suasinhvien($msv){
            $_SESSION['Masv']=$msv;
            $this->view('TrangchuLogin',[
                'page'=>'SuaSinhvienView',
                'result'=>$this->dssv->Sinhvien_ListAll(),
                'thongbao'=>'',
                'kqtk'=>$this->dssv->SinhvienSearch($msv)
            ]);
        }
        function themsinhvien(){
          
            $this->view('TrangchuLogin',[
                'page'=>'ThemSinhvienView'
                
            ]);
        }
        function Sua_sinhvien(){
            if(isset($_POST['btnLuu'])){
               $msv=$_POST['txtMasv'];
               $tsv=$_POST['txtHoten'];
               $ngs=$_POST['txtNgaysinh'];
               $gt=$_POST['gender'];
               $l=$_POST['txtLop'];
               $sdt=$_POST['txtSdt'];
               $dc=$_POST['txtQuequan'];
               $kq=$this->dssv-> SinhvienUpdate($msv,$tsv,$ngs,$gt,$l,$sdt,$dc);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaSinhvienView',
                    'result'=>$this->dssv->Lophoc_All(),
                    'thongbao'=>'Sửa thành công',
                    'kqtk'=>$this->dssv->SinhvienSearch($msv)
                ]);
               }
               else{
                $this->view('TrangchuLogin',[
                    'page'=>'SuaSinhvienView',
                    'result'=>$this->dssv->Sinhvien_ListAll(),
                    'thongbao'=>'Sửa thất bại',
                    'kqtk'=>$this->dssv->SinhvienSearch($msv)
                ]);
               }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSSinhvienView',
                    'kq'=>$this->dssv->Sinhvien_ListAll(),
                    'kqtk'=>$this->dssv->SinhvienSearch('')
                   ]);
            }
        }
        function Xoa_sinhvien($msv){
            
               $kq1=$this->dssv->SinhvienSearch('');
               $kq=$this->dssv->SinhvienDelete($msv);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSSinhvienView',
                    'result'=>$this->dssv->Sinhvien_ListAll(),
                    'kqtk'=>$kq1,
                    'thongbao'=>'Xóa thành công',
                ]);
               }else{
                $this->view('TrangchuLogin',[
                    'page'=>'DSSinhvienView',
                    'result'=>$this->dssv->Sinhvien_ListAll(),
                    'kqtk'=>$kq1,
                    'thongbao'=>'Xóa thất bại',
                ]);
               }
            }
    }
?> 