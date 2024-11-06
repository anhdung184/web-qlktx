<?php 
    class ThemNhanvien extends controller{
        public $nv;
      
        public function __construct(){
            $this -> nv=$this->model('DSNhanvienModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',[
                'page'=>'ThemNhanvienView',
            // 'kq'=>$this->nv->phong_all(),
            // 'kq1'=>$this->nv->lophoc_all() ,
            // 'kq2'=>$this->nv->hopdong_all() ,
        ]);
        }
        public function ThemmoiNhanvien(){
            
          
            if(isset($_POST['btnThemmoi'])){
                $manv=$_POST['txtManv'];
                $tnv=$_POST['txtHoten'];
                $ngs=$_POST['txtNgaysinh'];
                $gt=$_POST['gender'];
                $sdt=$_POST['txtSdt'];
                $dc=$_POST['txtQuequan'];
                $cv=$_POST['ddlChucvu'];
                $kq1=$this->nv->CheckMaNV($manv);
                if(empty($manv)&& empty($tnv)&&empty($ngs)&&empty($sdt)&&empty($dc)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'thongbao'=>'Bạn chưa nhập thông tin. Vui lòng nhập lại!',
                        'manv'=>$manv,
                        'tnv'=>$tnv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                        'cv'=>$cv,
                        
                     ]);
                }else if(empty($manv)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'thongbao'=>'Bạn chưa chọn mã nhân viên. Vui lòng chọn!',
                        'manv'=>$manv,
                        'tnv'=>$tnv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                        'cv'=>$cv,
                     ]);
                }elseif(empty($tnv)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'thongbao'=>'Bạn chưa nhập tên nhân viên. Vui lòng nhập!',
                        'manv'=>$manv,
                        'tnv'=>$tnv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                        'cv'=>$cv,
                     ]);
                }elseif(empty($ngs)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'thongbao'=>'Bạn chưa nhập ngày sinh. Vui lòng nhập!',
                        'manv'=>$manv,
                        'tnv'=>$tnv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                        'cv'=>$cv,
                     ]);
                }  elseif(empty($sdt)){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemNhanvienView',
                            'thongbao'=>'Bạn chưa nhập số điện thoại. Vui lòng nhập!',
                            'manv'=>$manv,
                            'tnv'=>$tnv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                            'cv'=>$cv,
                         ]);    
                }else if(empty($dc))
                {
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'thongbao'=>'Bạn chưa nhập quê quán. Vui lòng nhập!',
                        'manv'=>$manv,
                        'tnv'=>$tnv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                        'cv'=>$cv,
                     ]);
                }
                else if($kq1['message'] === 'Mã nhân viên không tồn tại'){
                    $kq=$this->nv->AddNhanvien($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv);
                    if($kq){
                        
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemNhanvienView',
                            'thongbao'=>'Thêm mới thành công',
                            'manv'=>$manv,
                            'tnv'=>$tnv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                            'cv'=>$cv,
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemNhanvienView',
                            'thongbao'=>'Thêm mới thất bại',
                            'manv'=>$manv,
                            'tnv'=>$tnv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                            'cv'=>$cv,
                         ]);
                    }

                }else{
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'thongbao'=>'Mã nhân viên đã tồn tại. Vui lòng nhập lại!',
                        'manv'=>$manv,
                            'tnv'=>$tnv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            'sdt'=>$sdt,
                            'dc'=>$dc, 
                            'cv'=>$cv,
                     ]);
                }

               
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',[
                    'page'=>'ThemNhanvienView',
             
                 ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin', [
                    'page'=>'DSNhanvienView',
                    'kq'=>$this->nv->Nhanvien_ListAll(),
                    'kqtk'=>$this->nv->NhanvienSearch(''),
                    'tk'=>'',
            ]);
            }
        }
    }
?>