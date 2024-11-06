<?php 
    class Themtaikhoan extends controller{
        public $tk;
      
        public function __construct(){
            $this -> tk=$this->model('DSTaikhoanModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',['page'=>'ThemTaikhoanView',
            'kq'=>$this->tk->laymanv(),
            'kq1'=>$this->tk->lophoc_all() ,
            'kq2'=>$this->tk->danhnhap_all() ,
        ]);
        }
        public function ThemmoiTaikhoan(){
          
            if(isset($_POST['btnThemmoi'])){
                $id=$_POST['txtId'];
                $manv=$_POST['ddlManv'];
                $tdn=$_POST['txtTendangnhap'];
                $mk=$_POST['txtMatkhau'];
                $nlmk=$_POST['txtXacnhan'];
                $kq1=$this->tk->checktrungTK($tdn);
                if(empty($manv)&& empty($tdn)&&empty($mk) && empty($nlmk)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Bạn chưa nhập thông tin. Vui lòng nhập lại!',
                        'id'=>$id,
                        'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                }else if(empty($manv)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Bạn chưa chon mã nhân viên. Vui lòng chọn!',
                        'id'=>$id,
                        'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                }elseif(empty($tdn)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Bạn chưa nhập tên dăng nhâp. Vui lòng nhập!',
                        'id'=>$id,
                        'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                }elseif(empty($mk)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Bạn chưa nhập mật khẩu. Vui lòng nhập!',
                        'id'=>$id,
                        'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                } elseif(empty($nlmk)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Xác nhập mật khẩu bắt buộc phải nhâp. Vui lòng nhập!',
                        'id'=>$id,
                        'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                }else if($mk!=$nlmk)
                {
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Mật khẩu xác nhận không khớp!',
                        'id'=>$id,
                        'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                }else if(!$kq1){
                    $kq=$this->tk->taikhoan_ins($id,$manv,$tdn,$mk);
                    if($kq){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemTaikhoanView',
                               'kq'=>$this->tk->laymanv(),
                            'kq1'=>$this->tk->lophoc_all() ,
                            'kq2'=>$this->tk->danhnhap_all() ,
                            'thongbao'=>'Thêm mới thành công',
                            'id'=>$id,
                            'manv'=>$manv,
                            'tdn'=>$tdn,
                            'mk'=>$mk,
                            'nlmk'=>$nlmk
                            
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemTaikhoanView',
                               'kq'=>$this->tk->laymanv(),
                            'kq1'=>$this->tk->lophoc_all() ,
                            'kq2'=>$this->tk->danhnhap_all() ,
                            'thongbao'=>'Thêm mới thất bại',
                            'id'=>$id,
                            'manv'=>$manv,
                            'tdn'=>$tdn,
                            'mk'=>$mk,
                            'nlmk'=>$nlmk
                         ]);
                    }

                }else{
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemTaikhoanView',
                           'kq'=>$this->tk->laymanv(),
                        'kq1'=>$this->tk->lophoc_all() ,
                        'kq2'=>$this->tk->danhnhap_all() ,
                        'thongbao'=>'Tên đăng nhập đã tồn tại. Vui lòng nhập lại!',
                        'id'=>$id,
                         'manv'=>$manv,
                        'tdn'=>$tdn,
                        'mk'=>$mk,
                        'nlmk'=>$nlmk
                     ]);
                }

               
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',['page'=>'ThemTaikhoanView',
                   'kq'=>$this->tk->laymanv(),
                'kq1'=>$this->tk->lophoc_all() ,
                'kq2'=>$this->tk->danhnhap_all() ,
                 ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',['page'=>'DSTaikhoanView',
                'kq'=>$this->tk->lophoc_all(),
                'kqtk'=>$this->tk->TimkiemTK('')
            ]);
            }
        }
    }
?>