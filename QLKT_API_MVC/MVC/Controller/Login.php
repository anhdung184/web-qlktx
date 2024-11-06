<?php 
    class Login extends controller{
        public $dsql;
        function Getdata(){
           $this->view('Login',[
           ]);
        }
        public function __construct(){
            $this -> dsql=$this->model('LoginModels');
        }
        public function Login(){
            $kq_mess=false;
            if(isset($_POST["btnDanhnhap"])){
                $dn=$_POST["txtTendangnhap"];
                $mk=$_POST["txtMatkhau"];
                if(empty($_POST["txtTendangnhap"])|| empty($_POST["txtMatkhau"])){
                    $this->view('Login',[
                        "result"=>$kq_mess,
                    ]);
                }
              $kq= $this->dsql->Login($dn,$mk);
              $lay=mysqli_fetch_assoc($kq);
              if(mysqli_num_rows($kq)){
                $_SESSION['User']=$lay;
                $this->view('TrangchuLogin',[
                    'page'=>'TrangchuView',
                    "result"=>$kq_mess=true,
                   
            ]);
                //   while($row=mysqli_fetch_array($kq)){

                //   }  
              }else{
                $this->view('Login',[
                    "result"=>$kq_mess,
                ]);
              }
            }
        }
    }
?>