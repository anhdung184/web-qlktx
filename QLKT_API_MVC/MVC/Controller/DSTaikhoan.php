<?php 
    class DSTaikhoan extends controller{
        public $dstk;
        public $id;
        function  __construct(){
            $this->dstk=$this->model('DSTaikhoanModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSTaikhoanView',
            'kq'=>$this->dstk->lophoc_all(),
            'kqtk'=>$this->dstk->TimkiemTK(''),
            'tk'=>'',
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dstk->TimkiemTK($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSTaikhoanView',
                    'kq'=>$this->dstk->lophoc_all(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
       
        function suataikhoan($id){
            $_SESSION['Id']=$id;
            $this->view('TrangchuLogin',[
                'page'=>'SuaTaikhoanView',
                'result'=>$this->dstk->Lophoc_All(),
                'kqtk'=>$this->dstk->TimkiemTK($id)
            ]);
        }
        // function themsinhvien(){
          
        //     $this->view('TrangchuLogin',[
        //         'page'=>'ThemSinhvienView'
                
        //     ]);
        // }
        function Sua_taikhoan(){
            if(isset($_POST['btnThemmoi'])){
               $id=$_POST['txtId'];
               $dsnv=$_POST['txtManv'];
               $tdn=$_POST['txtTendangnhap'];
               $mk=$_POST['txtMatkhau'];
               $nlmk=$_POST['txtXacnhan'];
               $kq1=$this->dstk->checktrungTKS($tdn,$id);
               if(empty($nlmk)){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaTaikhoanView',
                   'result'=>$this->dstk->Lophoc_All(),
                   'kqtk'=>$this->dstk->TimkiemTK($id),
                   'thongbao'=>'Xác nhập mật khẩu bắt buộc phải nhâp. Vui lòng nhập!',
                   'nlmk'=>$nlmk
              
                 ]);
            }elseif($mk != $nlmk)
               {
                   $this->view('TrangchuLogin',[
                        'page'=>'SuaTaikhoanView',
                       'result'=>$this->dstk->Lophoc_All(),
                       'kqtk'=>$this->dstk->TimkiemTK($id),
                       'thongbao'=>'Mật khẩu xác nhận không khớp!',
                       'nlmk'=>$nlmk
                    ]);
               }elseif(!$kq1){
                $kq=$this->dstk->Taikhoan_upd($id,$dsnv,$tdn,$mk);
                if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaTaikhoanView',
                    'result'=>$this->dstk->Lophoc_All(),
                    'thongbao'=>'Sửa thành công',
                    'kqtk'=>$this->dstk->TimkiemTK($id),
                    'nlmk'=>$nlmk
                ]);
               }
               else{
                $this->view('TrangchuLogin',[
                    'page'=>'SuaTaikhoanView',
                    'result'=>$this->dstk->Lophoc_All(),
                    'thongbao'=>'Sửa thất bại',
                    'kqtk'=>$this->dstk->TimkiemTK($id),
                    'nlmk'=>$nlmk
                ]);
               }
            }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSTaikhoanView',
                    'kq'=>$this->dstk->lophoc_all(),
                    'kqtk'=>$this->dstk->TimkiemTK('')
                   ]);
            }
        }
        function Xoa_taikhoan($id){
            
               $kq1=$this->dstk->TimkiemTK('');
               $kq=$this->dstk->Taikhoan_xoa($id);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSTaikhoanView',
                    'result'=>$this->dstk->Lophoc_All(),
                    'kqtk'=>$kq1
                ]);
               }
            }
    }
?>