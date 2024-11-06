<?php 
    class DSPhongModels extends connectDB{
        public function lophoc_all(){
            $sql="Select * From phong";
            return mysqli_query($this->con,$sql);
        }
        public function phong_ins($map,$lp,$gp,$ht,$td,$tt,$mt){
            $sql="INSERT INTO `phong`(`Maphong`, `Loaiphong`, `Giaphong`, `Tinhtrang`, `Songuoio`, `Soluongtd`, `Mota`) VALUES 
            ('$map','$lp','$gp','$tt','$ht','$td','$mt')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }

        public function checktrungMP($map){
            $sql="SELECT Maphong from phong where Maphong='$map'";
            $ds=mysqli_query($this->con,$sql);
            $sq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
    }
?>