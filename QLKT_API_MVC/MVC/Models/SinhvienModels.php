<?php 
    class SinhvienModels extends connectDB{
        public function lophoc_all(){
            $sql="Select * From lophoc";
            return mysqli_query($this->con,$sql);
        }

        public function sinhvien_ins($masv,$tensv,$ngaysinh,$gioitinh,$diachi,$dienthoai,$malop){
            $sql="INSERT INTO `sinhvien`(`Masv`, `Tensv`, `Ngaysinh`, `Gioitinh`, `Diachi`, `Dienthoai`, `Malop`) VALUES 
            ('$masv','$tensv','$ngaysinh','$gioitinh','$diachi','$dienthoai','$malop')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function checktrungMSV($masv){
            $sql="SELECT Masv from sinhvien where Masv='$masv'";
            $ds=mysqli_query($this->con,$sql);
            $sq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
    }
?>