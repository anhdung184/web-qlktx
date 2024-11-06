<?php 
    class Themphong extends controller{
        public $po;
        public function __construct(){
            $this -> po=$this->model('DSPhongModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',[
                'page'=>'ThemPhongView',
            //'kq'=>$this->po->lophoc_all() 
        ]);
        }
        public function ThemmoiPhong(){
            if(isset($_POST['btnThemmoi'])){
                $map=$_POST['txtMaphong'];
                $lp=$_POST['loaiphong'];
                $gp=$_POST['txtGiaphong'];
                $tt=$_POST['tinhtrang'];
                $ht=$_POST['txtSonguoio'];
                $td=$_POST['txtSonguoitd'];                
                $mt=$_POST['txtMota'];
                $kq1=$this->po->CheckMP($map);
                if(empty($map)&&empty($gp)&&$ht<0&&empty($td)&&empty($mt)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemPhongView',
                        'thongbao'=>'Bạn chưa nhập thông tin. Vui lòng nhập lại!',
                        'Maphong'=> $map,
                        'Loaiphong'=> $lp,
                        'Giaphong'=> $gp,
                        'Tinhtrang'=> $tt,
                        'Songuoio'=> $ht,
                        'Soluongtd'=> $td,
                        'Mota'=> $mt,
                        
                     ]);
                }else if(empty($map)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemPhongView',
                        'thongbao'=>'Bạn chưa chon mã phòng. Vui lòng chọn!',
                        'Maphong'=> $map,
                        'Loaiphong'=> $lp,
                        'Giaphong'=> $gp,
                        'Tinhtrang'=> $tt,
                        'Songuoio'=> $ht,
                        'Soluongtd'=> $td,
                        'Mota'=> $mt,
                     ]);
                }elseif(empty($gp)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemPhongView',
                        'thongbao'=>'Bạn chưa nhập giá phòng. Vui lòng nhập!',
                        'Maphong'=> $map,
                        'Loaiphong'=> $lp,
                        'Giaphong'=> $gp,
                        'Tinhtrang'=> $tt,
                        'Songuoio'=> $ht,
                        'Soluongtd'=> $td,
                        'Mota'=> $mt,
                     ]);
                
                    }if($ht<0){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemPhongView',
                            'thongbao'=>'Thêm mới thất bại. Vui lòng nhập lại! ',
                            'Maphong'=> $map,
                            'Loaiphong'=> $lp,
                            'Giaphong'=> $gp,
                            'Tinhtrang'=> $tt,
                            'Songuoio'=> $ht,
                            'Soluongtd'=> $td,
                            'Mota'=> $mt,
                         ]);
                        }
                    elseif(empty($td)){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemPhongView',
                            'thongbao'=>'Bạn chưa nhập số người tối đa. Vui lòng nhập!',
                            'Maphong'=> $map,
                            'Loaiphong'=> $lp,
                            'Giaphong'=> $gp,
                            'Tinhtrang'=> $tt,
                            'Songuoio'=> $ht,
                            'Soluongtd'=> $td,
                            'Mota'=> $mt,
                         ]);  
                        }elseif(empty($mt)){
                            $this->view('TrangchuLogin',[
                                'page'=>'ThemPhongView',
                                'thongbao'=>'Bạn chưa nhập mô tả. Vui lòng nhập!',
                                'Maphong'=> $map,
                                'Loaiphong'=> $lp,
                                'Giaphong'=> $gp,
                                'Tinhtrang'=> $tt,
                                'Songuoio'=> $ht,
                                'Soluongtd'=> $td,
                                'Mota'=> $mt,
                             ]);    
                      
                }else
                 if($kq1['message'] === 'Mã không tồn tại'){
                    $kq=$this->po->AddPhong($map,$lp,$gp,$tt,$ht,$td,$mt);
                    if($kq){
                        
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemPhongView',
                            'thongbao'=>'Thêm mới thành công',
                            'Maphong'=> $map,
                            'Loaiphong'=> $lp,
                            'Giaphong'=> $gp,
                            'Tinhtrang'=> $tt,
                            'Songuoio'=> $ht,
                            'Soluongtd'=> $td,
                            'Mota'=> $mt,
                            
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemPhongView',
                            'thongbao'=>'Thêm mới thất bại',
                            'Maphong'=> $map,
                            'Loaiphong'=> $lp,
                            'Giaphong'=> $gp,
                            'Tinhtrang'=> $tt,
                            'Songuoio'=> $ht,
                            'Soluongtd'=> $td,
                            'Mota'=> $mt,
                         ]);
                    }
                }
                else{
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemPhongView',
                        'thongbao'=>$kq1['message'],
                        'Maphong'=> $map,
                        'Loaiphong'=> $lp,
                        'Giaphong'=> $gp,
                        'Tinhtrang'=> $tt,
                        'Songuoio'=> $ht,
                        'Soluongtd'=> $td,
                        'Mota'=> $mt,
                     ]);
                }
                
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',[
                    'page'=>'ThemPhongView',
                ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                'page'=>'DSPhongView',
                'kq'=>$this->po->Phong_ListAll(),
                'kqtk'=>$this->po->PhongSearch(''),
                'tk'=>'',
            ]);
            }
        }
    }
?>