<?php 
    class HDDNchuathanhtoanModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT * FROM hoadon WHERE Tinhtranghd like '%Chưa thanh toán%' ";
            return mysqli_query($this->con,$sql);
        }
    }
  
?>