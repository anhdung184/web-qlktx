<?php 
    class ThemHoadon extends controller{
        public $hd;
        public function __construct(){
            $this -> hd=$this->model('DSHoadonModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',['page'=>'ThemHoadonView',
            'kq'=>$this->hd->phong_all(),
            'kq1'=>$this->hd->lophoc_all(),
        ]);
        }
        public function ThemmoiHoadon(){
            if(isset($_POST['btnTimkiem'])){
                $timkiem=$_POST['txtTimkiem'];
                if(empty($timkiem)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHoadonView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all(),
                        'thongbao'=>'Bạn chưa chon phòng. Vui lòng chọn!',
                        'p'=>$timkiem,
                     ]);
                }else{
                    $kq1=$this->hd->TimkiemP($timkiem);
                   
                    if($kq1){
                            $this->view('TrangchuLogin',[
                                'page'=>'ThemHoadonView',
                                'kq'=>$this->hd->phong_all(),
                                'kq1'=>$this->hd->lophoc_all(),
                                'kqp'=>$kq1,
                                'p'=>$timkiem,
                                
                             ]);
                            }
                }
               
            }
               

            if(isset($_POST['btnThanhtoan'])){
                $timkiem=$_POST['txtTimkiem'];
                $mahd=$_POST['txtMaHoadon'];
                $map=$_POST['txtMaphong'];
                $nl=$_POST['txtNgaylap'];
                $sd=$_POST['txtSodien'];
                $sn=$_POST['txtSonuoc'];
                $m=$_POST['txtMang'];
                $ttien=$_POST['txtThanhtien'];
                $tongt=$_POST['txtTongtien'];
                $cn=$_POST['txtConno'];
                $kq1=$this->hd->TimkiemP($timkiem);
                if($sd<=0 && $sn<=0 && $m<= 0){
                     $this->view('TrangchuLogin',[
                        'page'=>'ThemHoadonView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all(),
                        'thongbao'=>'Bạn chưa nhập dữ liệu. Vui lòng nhập',
                        'mahoadon'=>$mahd,
                        'maphong'=>$map,
                        'ngaylap'=>$nl,
                        'sodien'=>$sd,
                        'sonuoc'=>$sn,
                        'mang'=>$m,
                        'thanhtien'=>$ttien,
                        'tongtien'=>$tongt,
                        'cn'=>$cn,
                        'kqp'=>$kq1,
                        'p'=>$timkiem,
                      ]);
                 }else if($sd<=0 ){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemHoadonView',
                            'kq'=>$this->hd->phong_all(),
                            'kq1'=>$this->hd->lophoc_all(),
                            'thongbao'=>'Bạn chưa nhập số điện. Vui lòng nhập',
                            'mahoadon'=>$mahd,
                            'maphong'=>$map,
                            'ngaylap'=>$nl,
                            'sodien'=>$sd,
                            'sonuoc'=>$sn,
                            'mang'=>$m,
                            'thanhtien'=>$ttien,
                            'tongtien'=>$tongt,
                            'cn'=>$cn,
                            'kqp'=>$kq1,
                            'p'=>$timkiem,
                      ]);
                 }elseif($sn<=0 ){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHoadonView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all(),
                        'thongbao'=>'Bạn chưa nhập số nước. Vui lòng nhập',
                        'mahoadon'=>$mahd,
                        'maphong'=>$map,
                        'ngaylap'=>$nl,
                        'sodien'=>$sd,
                        'sonuoc'=>$sn,
                        'mang'=>$m,
                        'thanhtien'=>$ttien,
                        'tongtien'=>$tongt,
                        'cn'=>$cn,
                        'kqp'=>$kq1,
                        'p'=>$timkiem,
                  ]);
                 }elseif($m<= 0){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHoadonView',
                        'kq'=>$this->hd->phong_all(),
                        'kq1'=>$this->hd->lophoc_all(),
                        'thongbao'=>'Bạn chưa nhập tiền mạng. Vui lòng nhập',
                        'mahoadon'=>$mahd,
                        'maphong'=>$map,
                        'ngaylap'=>$nl,
                        'sodien'=>$sd,
                        'sonuoc'=>$sn,
                        'mang'=>$m,
                        'thanhtien'=>$ttien,
                        'tongtien'=>$tongt,
                        'cn'=>$cn,
                        'kqp'=>$kq1,
                        'p'=>$timkiem,
                  ]);
                 }
                  else{
                    $kq=$this->hd->Hoadon_ins($mahd,$map,$nl,$sd,$sn,$m,$ttien,$tongt,$cn);
                    if($kq){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemHoadonView',
                            'kq'=>$this->hd->phong_all(),
                            'kq1'=>$this->hd->lophoc_all(),
                            'thongbao'=>'Thanh toán thành công',
                            'mahoadon'=>$mahd,
                            'maphong'=>$map,
                            'ngaylap'=>$nl,
                            'sodien'=>$sd,
                            'sonuoc'=>$sn,
                            'mang'=>$m,
                            'thanhtien'=>$ttien,
                            'tongtien'=>$tongt,
                            'cn'=>$cn,
                            'kqp'=>$kq1,
                            'p'=>$timkiem,
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemHoadonView',
                            'kq'=>$this->hd->phong_all(),
                            'kq1'=>$this->hd->lophoc_all(),
                            'thongbao'=>'Thanh toán thất bại',
                            'mahoadon'=>$mahd,
                            'maphong'=>$map,
                            'ngaylap'=>$nl,
                            'sodien'=>$sd,
                            'sonuoc'=>$sn,
                            'mang'=>$m,
                            'thanhtien'=>$ttien,
                            'tongtien'=>$tongt,
                            'cn'=>$cn,
                            'kqp'=>$kq1,
                            'p'=>$timkiem,
                         ]);
                    }
                 }
                 

                

               
            }
            if(isset($_POST['btnNhaplai'])){
                $timkiem=$_POST['txtTimkiem'];
                $kq1=$this->hd->TimkiemP($timkiem);
                $this->view('TrangchuLogin',['page'=>'ThemHoadonView',
                'kq'=>$this->hd->phong_all(),
                'kq1'=>$this->hd->lophoc_all(),
                'kqp'=>$kq1,
                 'p'=>$timkiem, 
            ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSHoadonView',
                    'kq'=>$this->hd->lophoc_all(),
                    'kqtk'=>$this->hd->TimkiemHD(''),
            ]);
            }
            }
        
    }
?>