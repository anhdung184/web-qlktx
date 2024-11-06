<?php 
    class DSHoadonModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT Mahd FROM `hoadon` WHERE Mahd=(SELECT MAX(Mahd) FROM `hoadon`);";
            return mysqli_query($this->con,$sql);
        }
        
        public function phong_all(){
            $sql="SELECT * FROM phong WHERE 0 < Songuoio ";
            return mysqli_query($this->con,$sql);
        }
        public function TimkiemP($timkiem){
            $sql="Select * from phong where Maphong like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function TimkiemHD($timkiem){
            $sql='SELECT * FROM hoadon,phong
            WHERE  hoadon.Maphong=phong.Maphong AND   
            (hoadon.Mahd LIKE "%'.$timkiem.'%" OR  phong.Maphong LIKE "%'.$timkiem.'%" )';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function LayDLHD($mhd){
            $sql="SELECT * FROM `hoadon` WHERE  Mahd='$mhd'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Hoadon_ins($mahd,$map,$nl,$sd,$sn,$m,$ttien,$tongt,$cn){
            $sql="INSERT INTO `hoadon`(`Mahd`, `Maphong`, `Ngaylap`, `Sodien`, `Sonuoc`, `Mang`, `Tiengiam`, `Thanhtien`, `Conno`) 
            VALUES ('$mahd','$map','$nl','$sd','$sn','$m','$ttien','$tongt','$cn')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Hoadon_upd($mahd,$map,$nl,$sd,$sn,$m,$tongt,$ttien,$cn){
            $sql="  UPDATE `hoadon` SET `Sodien`='$sd',`Sonuoc`='$sn',`Mang`='$m',`Tiengiam`='$tongt',`Thanhtien`='$ttien',`Conno`='$cn' WHERE Mahd='$mahd'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function hoadon_xoa($mhd){
            $sql="DELETE FROM hoadon WHERE Mahd='$mhd'";
            return mysqli_query($this->con,$sql);
        }
    }
?>