<?php 
    class Sinhvien extends controller{
        public $sv;
        public function __construct(){
            $this -> sv=$this->model('SinhvienModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('Masterlayout',['page'=>'Sinhvienview',
            // 'kq'=>$this->sv->lophoc_all() 
        ]);
        }
        // public function ThemmoiSV(){
        //     if(isset($_POST['btnluu'])){
        //         $masv=$_POST['txtMasv'];
        //         $ht=$_POST['txtTensv'];
        //         $ns=$_POST['txtdate'];
        //         $gt=$_POST['txtgioitinh'];
        //         $ml=$_POST['ddlLopHoc'];
        //         $dt=$_POST['txtphone'];
        //         $dc=$_POST['txtdiachi'];

        //         $kq1=$this->sv->checktrungMSV($masv);
        //         if(!$kq1){
        //             $kq=$this->sv->sinhvien_ins($masv,$ht,$ns,$gt,$dc,$dt,$ml);
        //             if($kq){
        //                 $this->view('Masterlayout',[
        //                     'page'=>'Sinhvienview',
        //                     'kq'=>$this->sv->lophoc_all(),
        //                     'thongbao'=>'Thêm mới thành công',
        //                     'masv'=>$masv,
        //                     'tensv'=>$ht,
        //                     'ngaysinh'=>$ns,
        //                     'gioitinh'=>$gt,
        //                     'diachi'=>$dc,
        //                     'sdt'=>$dt,
        //                     'malop'=>$ml
        //                  ]);
        //             }else{
        //                 $this->view('Masterlayout',[
        //                     'page'=>'Sinhvienview',
        //                     'kq'=>$this->sv->lophoc_all(),
        //                     'thongbao'=>'Thêm mới thất bại',
        //                     'masv'=>$masv,
        //                     'tensv'=>$ht,
        //                     'ngaysinh'=>$ns,
        //                     'gioitinh'=>$gt,
        //                     'diachi'=>$dc,
        //                     'sdt'=>$dt,
        //                     'malop'=>$ml
        //                  ]);
        //             }

        //         }else{
        //             $this->view('Masterlayout',[
        //                 'page'=>'Sinhvienview',
        //                 'kq'=>$this->sv->lophoc_all(),
        //                 'thongbao'=>'Mã sinh viên đã tồn tại. Vui lòng nhập lại!',
        //                 'masv'=>$masv,
        //                 'tensv'=>$ht,
        //                 'ngaysinh'=>$ns,
        //                 'gioitinh'=>$gt,
        //                 'diachi'=>$dc,
        //                 'sdt'=>$dt,
        //                 'malop'=>$ml
        //              ]);
        //         }

               
        //     }
        // }
    }
?>