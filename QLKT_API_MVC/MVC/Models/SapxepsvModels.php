<?php 
    class SapxepsvModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT * FROM sinhvien,hopdong WHERE hopdong.Masv = sinhvien.Masv ORDER BY mahd ASC " ;
            $kq= mysqli_query($this->con,$sql);
            return $kq;
        }
    }
  
?>