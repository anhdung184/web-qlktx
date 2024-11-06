<?php 
    class DSHopdongModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT * FROM hopdong";
            return mysqli_query($this->con,$sql);
        }
        public function hopdong_all(){
            $sql="SELECT Mahd FROM `hopdong` WHERE Mahd=(SELECT MAX(Mahd) FROM `hopdong`);";
            return mysqli_query($this->con,$sql);
        }
        public function phong_all(){
            $sql="SELECT * FROM phong WHERE Songuoio<Soluongtd ";
            return mysqli_query($this->con,$sql);
        }
        public function laythongtin_SV($timkiemSV){
            $sql="SELECT * FROM sinhvien WHERE Masv='".$timkiemSV."' ";
            return mysqli_query($this->con,$sql);
        }
        public function sinhvien_all(){
            $sql="SELECT * FROM sinhvien WHERE Masv NOT IN (SELECT Masv FROM `hopdong` WHERE 1) ";
            return mysqli_query($this->con,$sql);
        }
        public function phong_allS($timkiem){
            $sql="SELECT * FROM phong WHERE Songuoio<Soluongtd and Maphong!=(SELECT Maphong FROM `hopdong` WHERE Mahd='".$timkiem."')" ;
            return mysqli_query($this->con,$sql);
        }
        public function TimkiemP($timkiem){
            $sql='SELECT * FROM phong
            WHERE  Maphong="'.$timkiem.'"';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function TimkiemHDKT($mdh){
            $sql='SELECT * FROM `hopdong` WHERE Tienphong>Tiencoc AND Mahd="'.$mdh.'"';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function TimkiemHD($timkiem){
            $sql='SELECT * FROM hopdong,quanly
            WHERE  hopdong.Manv=quanly.Manv AND   
            (hopdong.Mahd LIKE "%'.$timkiem.'%" OR  hopdong.Masv LIKE "%'.$timkiem.'%"  OR  
            quanly.Hoten LIKE "%'.$timkiem.'%" OR  hopdong.Maphong LIKE "%'.$timkiem.'%")';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function TimkiemHDS($timkiem){
            $sql='SELECT * FROM hopdong,sinhvien,quanly WHERE hopdong.Manv=quanly.Manv AND 
            hopdong.Masv=sinhvien.Masv AND Mahd="'.$timkiem.'"';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function checktrungMSV($masv){
            $sql="SELECT Masv from sinhvien where Masv='$masv'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function checktrungHD($mhd){
            $sql="SELECT * from hopdong where Tienphong>Tiencoc AND Mahd='$mhd'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function hopdong_ins($mahd,$masv,$p,$manv,$nl,$nd,$nhh,$tp,$tc,$tt,$cn){
            $sql="INSERT INTO `hopdong`(`Mahd`, `Manv`, `Maphong`, `Masv`, `Ngaylap`, `Ngayden`, `Ngayhethan`, `Tienphong`, `Tiencoc`, `Tinhtrang`) 
            VALUES ('$mahd','$manv','$p','$masv','$nl','$nd','$nhh','$tp','$tc','$tt')";
            $kq=mysqli_query($this->con,$sql);
            $sql2="INSERT INTO `hoadonphong`(`Mahd`, `Ngaylaphdp`, `Datra`, `Conno`) 
            VALUES ('$mahd','$nl','$tc','$cn')";
            mysqli_query($this->con,$sql2);
            return $kq;
        }
        // public function phong_sua($p){
        //     $sql="UPDATE `phong` SET `Songuoio`= Songuoio+1 WHERE Maphong='$p';"
        //     $kq=mysqli_query($this->con,$sql);
        //     return $kq;
        // }
        public function phong_ins($p){
            $sql="UPDATE `phong` SET `Songuoio`= Songuoio+1 WHERE Maphong='$p'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function phong_insXao($mhd){
            $sql="UPDATE `phong` SET `Songuoio`= Songuoio-1 WHERE Maphong=(SELECT Maphong FROM `hopdong` WHERE Mahd='$mhd')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Hopdong_upd($mhd){
            $sql="UPDATE `hopdong` SET `Tinhtrang`='Đã kết thúc' 
            WHERE Mahd='$mhd'";
             $kq = mysqli_query($this->con,$sql);
             $sql="UPDATE `phong` SET `Songuoio`= Songuoio-1 WHERE Maphong=(SELECT Maphong FROM `hopdong` WHERE 
             Mahd='$mhd')";
             $kq2 = mysqli_query($this->con,$sql);
             return $kq;
        }
        public function Hopdong_xoa($mhd){
            $sql="DELETE FROM hopdong WHERE Mahd='$mhd'";
            $kq1 = mysqli_query($this->con,$sql);
            $sql2="UPDATE `phong` SET `Songuoio`= Songuoio-1 WHERE Maphong=(SELECT Maphong FROM `hopdong` WHERE 
            Mahd='$mhd')";
            $kq2 = mysqli_query($this->con,$sql2);
            return $kq1;
        }
    }
?>