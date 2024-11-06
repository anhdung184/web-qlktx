<?php 
    class ThemHoadonphong extends controller{
        public $hd;
        public function __construct(){
            $this -> hd=$this->model('DSHoadonphongModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',['page'=>'ThemHoadonphongView',
            'kq'=>$this->hd->hopdong_all(),
            'kq1'=>$this->hd->lophoc_all(),
        ]);
        }
        public function ThemmoiHoadon(){
            if(isset($_POST['btnTimkiem'])){
                $timkiem=$_POST['txtTimkiem'];
                if(empty($timkiem)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHoadonphongView',
                        'kq'=>$this->hd->hopdong_all(),
                        
                        'thongbao'=>'Bạn chưa chon mã sinh viên. Vui lòng chọn!',
                        
                     ]);
                }else{
                    $kq1=$this->hd->TimkiemHD($timkiem);
                   
                    if($kq1){
                            $this->view('TrangchuLogin',[
                                'page'=>'ThemHoadonphongView',
                                'kq'=>$this->hd->hopdong_all(),
                                'kq1'=>$this->hd->mahdp_all(),
                                'kqtsv'=>$this->hd->TimkiemSV($timkiem),
                                'kqp'=>$kq1,
                                'p'=>$timkiem,
                                
                             ]);
                            }
                }
               
            }
               

            if(isset($_POST['btnThanhtoan'])){
                $timkiem=$_POST['txtTimkiem'];
                $mahdp=$_POST['txtMaHoadon'];
                $tp=$_POST['txtTienphong'];
                $dt=$_POST['txtDatra'];
                $cn=$_POST['txtConno'];
                $nl=$_POST['txtNgaylap'];
                $mahd=$_POST['txtMahopdong'];
                $tt=$_POST['txtThanhtoan'];
                $kq1=$this->hd->TimkiemHD($timkiem);
               if($tt<= 0){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemHoadonphongView',
                        'kq'=>$this->hd->hopdong_all(),
                        'kq1'=>$this->hd->mahdp_all(),
                        'kqtsv'=>$kq1,
                        'thongbao'=>'Bạn chưa nhập đóng tiền. Vui lòng đóng!',
                        'mahoadon'=>$mahdp,
                        'mahopdong'=>$mahd,
                        'ngaylap'=>$nl,
                        'tienphong'=>$tp,
                        'datra'=>$dt,
                        'conno'=>$cn,
                        'thanhtoan'=>$tt,
                        'kqtsv'=>$this->hd->TimkiemSV($timkiem),
                        'kqp'=>$kq1,
                        'p'=>$timkiem,
                  ]);
                 }
                  else{
                    $kq=$this->hd->Hoadonphong_ins($mahdp,$mahd,$nl,$dt,$cn);
                    if($kq){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemHoadonphongView',
                            'kq'=>$this->hd->hopdong_all(),
                            'kq1'=>$this->hd->mahdp_all(),
                            'kqtsv'=>$kq1,
                            'thongbao'=>'Thanh toán thành công',
                            'mahoadon'=>$mahdp,
                            'mahopdong'=>$mahd,
                            'ngaylap'=>$nl,
                            'tienphong'=>$tp,
                            'datra'=>$dt,
                            'conno'=>$cn,
                            'thanhtoan'=>$tt,
                            'kqtsv'=>$this->hd->TimkiemSV($timkiem),
                            'kqp'=>$kq1,
                            'p'=>$timkiem,
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemHoadonphongView',
                            'kq'=>$this->hd->hopdong_all(),
                            'kq1'=>$this->hd->mahdp_all(),
                            'kqtsv'=>$kq1,
                            'thongbao'=>'Thanh toán thất bại',
                            'mahoadon'=>$mahdp,
                            'mahopdong'=>$mahd,
                            'ngaylap'=>$nl,
                            'tienphong'=>$tp,
                            'datra'=>$dt,
                            'conno'=>$cn,
                            'thanhtoan'=>$tt,
                            'kqtsv'=>$this->hd->TimkiemSV($timkiem),
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