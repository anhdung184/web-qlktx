<?php 
    class HDPchuathanhtoanModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT * FROM hoadonphong,hopdong,sinhvien WHERE Conno > 0 AND hoadonphong.Mahd = hopdong.Mahd AND hopdong.Masv = sinhvien.Masv ";
            return mysqli_query($this->con,$sql);
        }
    }
  
?>