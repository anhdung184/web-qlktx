<?php 
    class NhanvienModels extends connectDB{
        public function lophoc_all(){
            $sql="Select * From quanly";
            return mysqli_query($this->con,$sql);
        }

        public function nhanvien_ins($manv,$tennv,$ngaysinh,$gioitinh,$diachi,$dienthoai,$chucvu){
            $sql="INSERT INTO `quanly`(`Manv`, `Tennv`, `Ngaysinh`, `Gioitinh`, `Diachi`, `Dienthoai`, `Chucvu`) VALUES 
            ('$manv','$tennv','$ngaysinh','$gioitinh','$diachi','$dienthoai','$chucvu')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function checktrungMNV($manv){
            $sql="SELECT Manv from quanly where Manv='$manv'";
            $ds=mysqli_query($this->con,$sql);
            $sq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
    }
?>