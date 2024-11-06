<?php 
    class ThemHopdong extends controller{
        public $hd;
      
        public function __construct(){
            $this -> hd=$this->model('DSHopdongModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',[
                'page'=>'ThemHopdongView',
            'kq'=>$this->hd->phong_all(),
            'kq1'=>$this->hd->lophoc_all() ,
            'kq2'=>$this->hd->hopdong_all() ,
            'kq3'=>$this->hd->sinhvien_all() 
        ]);

        }
        public function ThemmoiHopdong(){
            if(isset($_POST['btnChonphong'])){
                $timkiem=$_POST['ddlMaphong'];
                $timkiemSV=$_POST['ddlSinhVien'];
                $ngayden=$_POST['txtNgayden'];
                $ngayhethan=$_POST['txtNgayhethan'];
                $kqSV=$this->hd->laythongtin_SV($timkiemSV);
                $kq1=$this->hd->TimkiemP($timkiem);
                if(empty($timkiem)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all(), 
                        'thongbao'=>'Bạn chưa chọn phòng. Vui lòng chọn!',
                        'kqphong'=>$kq1,
                        'kqsinhvien'=>$kqSV,
                        'sv'=>$timkiemSV,
                        'nd'=>$ngayden,
                        'nhh'=>$ngayhethan,
                        
                     ]);
                }else{
                   
                   
                    if($kq1){
                            $this->view('TrangchuLogin',[
                                'page'=>'ThemHopdongView',
                                'kq'=>$this->hd->phong_all(),
                                'kq1'=>$this->hd->lophoc_all() ,
                                'kq2'=>$this->hd->hopdong_all() ,
                                'kq3'=>$this->hd->sinhvien_all() ,
                                'kqphong'=>$kq1,
                                'kqsinhvien'=>$kqSV,
                                'p'=>$timkiem,
                                'sv'=>$timkiemSV,
                                'nd'=>$ngayden,
                                'nhh'=>$ngayhethan,
                                
                             ]);
                            }
                }
               
            }
            if(isset($_POST['btnChonSV'])){
                $timkiemSV=$_POST['ddlSinhVien'];
                $timkiem=$_POST['ddlMaphong'];
                $ngayden=$_POST['txtNgayden'];
                $ngayhethan=$_POST['txtNgayhethan'];
                $kqSV=$this->hd->laythongtin_SV($timkiemSV);
                $kq1=$this->hd->TimkiemP($timkiem);
                if(empty($timkiemSV)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all(),
                        'kqsinhvien'=>$kqSV,
                        'kqphong'=>$kq1, 
                        'thongbao'=>'Bạn chưa chọn sinh viên. Vui lòng chọn!',
                        'p'=>$timkiem,
                        'sv'=>$timkiemSV,
                        'nd'=>$ngayden,
                        'nhh'=>$ngayhethan,
                        
                     ]);
                }else{
                    
                    if($kqSV){
                            $this->view('TrangchuLogin',[
                                'page'=>'ThemHopdongView',
                                'kq'=>$this->hd->phong_all(),
                                'kq1'=>$this->hd->lophoc_all() ,
                                'kq2'=>$this->hd->hopdong_all() ,
                                'kq3'=>$this->hd->sinhvien_all() ,
                                'kqsinhvien'=>$kqSV,
                                'kqphong'=>$kq1,
                                'sv'=>$timkiemSV,
                                'p'=>$timkiem,
                                'nd'=>$ngayden,
                                'nhh'=>$ngayhethan,
                             ]);
                            }
                }
                
             
               
            }
          
            if(isset($_POST['btnDangky'])){
                $mahd=$_POST['txtMahopdong'];
                $masv=$_POST['ddlSinhVien'];
                $manv=$_POST['txtNguoilap'];
                $tsv=$_POST['txtHoten'];
                $l=$_POST['txtLop'];
                $p=$_POST['ddlMaphong'];
                $lp=$_POST['txtLoaiphong'];
                $gp=$_POST['txtGiaphong'];
                $ttp=$_POST['txtThongtinphong'];
                $ngl=$_POST['txtNguoilap'];
                $nl=$_POST['txtNgaylap'];
                $nd=$_POST['txtNgayden'];
                $nhh=$_POST['txtNgayhethan'];
                $tp=$_POST['txtTienphong'];
                $tc=$_POST['txtTiencoc'];
                $cn=$_POST['txtConno'];
                $tt=$_POST['ddlTinhtrang'];
                $kqSV=$this->hd->laythongtin_SV($masv);
                $kq1=$this->hd->TimkiemP($p);
                if(empty($masv)&&empty($p)&&empty($tc)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all() ,
                        'thongbao'=>'Bạn chưa nhập thông tin. Vui lòng nhập lại!',
                        'mahd'=>$mahd,
                        'sv'=>$masv,
                        'tsv'=>$tsv,
                        'l'=>$l,
                        'p'=>$p,
                        'lp'=>$lp,
                        'gp'=>$gp,
                        'ttp'=>$ttp,
                        'ngl'=>$ngl,
                        'nl'=>$nl,
                        'nd'=>$nd,
                        'nhh'=>$nhh,
                        'tp'=>$tp,
                        'tc'=>$tc,
                        'tt'=>$tt,
                        'kqsinhvien'=>$kqSV,
                        'kqphong'=>$kq1,
                     ]);
                }else if(empty($masv)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all() ,
                        'thongbao'=>'Bạn chưa chon mã sinh viên. Vui lòng chọn!',
                        'mahd'=>$mahd,
                        'sv'=>$masv,
                        'tsv'=>$tsv,
                        'l'=>$l,
                        'p'=>$p,
                        'lp'=>$lp,
                        'gp'=>$gp,
                        'ttp'=>$ttp,
                        'ngl'=>$ngl,
                        'nl'=>$nl,
                        'nd'=>$nd,
                        'nhh'=>$nhh,
                        'tp'=>$tp,
                        'tc'=>$tc,
                        'tt'=>$tt,
                        'kqsinhvien'=>$kqSV,
                        'kqphong'=>$kq1,
                     ]);
                }elseif(empty($p)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all() ,
                        'thongbao'=>'Bạn chưa chọn phòng. Vui lòng chọn!',
                        'mahd'=>$mahd,
                        'sv'=>$masv,
                        'tsv'=>$tsv,
                        'l'=>$l,
                        'p'=>$p,
                        'lp'=>$lp,
                        'gp'=>$gp,
                        'ttp'=>$ttp,
                        'ngl'=>$ngl,
                        'nl'=>$nl,
                        'nd'=>$nd,
                        'nhh'=>$nhh,
                        'tp'=>$tp,
                        'tc'=>$tc,
                        'tt'=>$tt,
                        'kqsinhvien'=>$kqSV,
                        'kqphong'=>$kq1,
                     ]);
                }elseif(empty($tc)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all() ,
                        'thongbao'=>'Bạn chưa nhập tiền cọc. Vui đặt cọc tối thiểu 500k!',
                        'mahd'=>$mahd,
                        'sv'=>$masv,
                        'tsv'=>$tsv,
                        'l'=>$l,
                        'p'=>$p,
                        'lp'=>$lp,
                        'gp'=>$gp,
                        'ttp'=>$ttp,
                        'ngl'=>$ngl,
                        'nl'=>$nl,
                        'nd'=>$nd,
                        'nhh'=>$nhh,
                        'tp'=>$tp,
                        'tc'=>$tc,
                        'tt'=>$tt,
                        'kqsinhvien'=>$kqSV,
                        'kqphong'=>$kq1,
                     ]);
                }elseif($tc<500000){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHopdongView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                        'kq3'=>$this->hd->sinhvien_all() ,
                        'thongbao'=>'Tiền đặt cọc tối thiểu 500k!',
                        'mahd'=>$mahd,
                        'sv'=>$masv,
                        'tsv'=>$tsv,
                        'l'=>$l,
                        'p'=>$p,
                        'lp'=>$lp,
                        'gp'=>$gp,
                        'ttp'=>$ttp,
                        'ngl'=>$ngl,
                        'nl'=>$nl,
                        'nd'=>$nd,
                        'nhh'=>$nhh,
                        'tp'=>$tp,
                        'tc'=>$tc,
                        'tt'=>$tt,
                        'kqsinhvien'=>$kqSV,
                        'kqphong'=>$kq1,
                     ]);
                } else {
                    $kq=$this->hd->hopdong_ins($mahd,$masv,$p,$manv,$nl,$nd,$nhh,$tp,$tc,$tt,$cn);
                    $kqSV=$this->hd->laythongtin_SV($masv);
                    $kq1=$this->hd->TimkiemP($p);
                    if($kq){
                        $this->hd->phong_ins($p);
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemHopdongView',
                            'kq'=>$this->hd->phong_all(),
                            'kq1'=>$this->hd->lophoc_all() ,
                            'kq2'=>$this->hd->hopdong_all() ,
                            'kq3'=>$this->hd->sinhvien_all() ,
                            'thongbao'=>'Thêm mới thành công',
                            'mahd'=>$mahd,
                            'sv'=>$masv,
                            'tsv'=>$tsv,
                            'l'=>$l,
                            'p'=>$p,
                            'lp'=>$lp,
                            'gp'=>$gp,
                            'ttp'=>$ttp,
                            'ngl'=>$ngl,
                            'nl'=>$nl,
                            'nd'=>$nd,
                            'nhh'=>$nhh,
                            'tp'=>$tp,
                            'tc'=>$tc,
                            'tt'=>$tt,
                            'kqsinhvien'=>$kqSV,
                            'kqphong'=>$kq1,
                                
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemSinhvienView',
                            'kq'=>$this->hd->phong_all(),
                            'kq1'=>$this->hd->lophoc_all() ,
                            'kq2'=>$this->hd->hopdong_all() ,
                            'thongbao'=>'Thêm mới thất bại',
                            'mahd'=>$mahd,
                            'sv'=>$masv,
                            'tsv'=>$tsv,
                            'l'=>$l,
                            'p'=>$p,
                            'lp'=>$lp,
                            'gp'=>$gp,
                            'ttp'=>$ttp,
                            'ngl'=>$ngl,
                            'nl'=>$nl,
                            'nd'=>$nd,
                            'nhh'=>$nhh,
                            'tp'=>$tp,
                            'tc'=>$tc,
                            'tt'=>$tt,
                            'kqsinhvien'=>$kqSV,
                            'kqphong'=>$kq1,
                         ]);
                    }

                }

               
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',['page'=>'ThemSinhvienView',
             
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all() ,
                        'kq2'=>$this->hd->hopdong_all() ,
                 ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin', [
                'page'=>'DSHopdongView',
                'kq'=>$this->hd->lophoc_all(),
                'kqtk'=>$this->hd->TimkiemHD(''),
            ]);
            }
        }
    }
?>