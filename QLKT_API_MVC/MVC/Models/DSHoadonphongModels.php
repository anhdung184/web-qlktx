<?php 
    class DSHoadonphongModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT * FROM hoadonphong";
            return mysqli_query($this->con,$sql);
        }
        
        public function hopdong_all(){
            $sql="SELECT * FROM hopdong WHERE Tiencoc < Tienphong ";
            return mysqli_query($this->con,$sql);
        }
        public function mahdp_all(){
            $sql="SELECT Mahdp FROM `hoadonphong` WHERE Mahdp=(SELECT MAX(Mahdp) FROM `hoadonphong`);";
            return mysqli_query($this->con,$sql);
        }
        public function TimkiemP($timkiem){
            $sql="Select * from phong where Maphong like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function TimkiemSV($timkiem){
            $sql="Select * from sinhvien where Masv like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function TimkiemHD($timkiem){
            $sql='SELECT * FROM hoadonphong,hopdong WHERE hoadonphong.Mahd=hopdong.Mahd AND ( hopdong.Mahd LIKE "%'.$timkiem.'%"OR hopdong.Masv LIKE "%'.$timkiem.'%" OR hoadonphong.Mahdp LIKE "%'.$timkiem.'%");';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Hoadonphong_ins($mahdp,$mahd,$nl,$dt,$cn){
            $sql="INSERT INTO `hoadonphong`(`Mahdp`, `Mahd`, `Ngaylaphdp`, `Datra`, `Conno`) 
            VALUES ('$mahdp','$mahd','$nl','$dt','$cn')";
            $kq = mysqli_query($this->con,$sql);
           
            $sql2="UPDATE `hopdong` SET `Tiencoc`='$dt'WHERE Mahd='$mahd'" ;
            mysqli_query($this->con,$sql2);
            return $kq;
           
        }
        public function hoadonphong_xoa($mhd){
            $sql="DELETE FROM hoadonphong WHERE Mahdp='$mhd'";
            return mysqli_query($this->con,$sql);
        }
    }
?>