<?php 
    class LoginModels extends connectDB{
        public function Login($dn,$mk){
           
            $sql=" SELECT * FROM dangnhap,quanly WHERE dangnhap.Manv=quanly.Manv AND dangnhap.Tendangnhap = '$dn' and dangnhap.Matkhau LIKE '$mk';";
            return mysqli_query($this->con,$sql);
        }

       
    }
?>