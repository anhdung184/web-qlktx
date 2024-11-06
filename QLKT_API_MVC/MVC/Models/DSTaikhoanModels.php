<?php 
    class DSTaikhoanModels extends connectDB{
        public function lophoc_all(){
            $sql="SELECT * FROM dangnhap As o, quanly AS c WHERE o.Manv=c.Manv";
            return mysqli_query($this->con,$sql);
        }
        public function danhnhap_all(){
            $sql="SELECT Id FROM dangnhap";
            return mysqli_query($this->con,$sql);
        }
        public function laymanv(){
            $sql="SELECT * FROM quanly WHERE Manv NOT IN (SELECT Manv FROM dangnhap) ";
            return mysqli_query($this->con,$sql);
        }
        public function TimkiemTK($timkiem){
            $sql='SELECT * FROM dangnhap,quanly 
        WHERE  dangnhap.Manv=quanly.Manv AND  (dangnhap.Id LIKE "%'.$timkiem.'%" OR  dangnhap.Tendangnhap LIKE "%'.$timkiem.'%"  OR  quanly.Manv LIKE "%'.$timkiem.'%" OR  quanly.Hoten LIKE "%'.$timkiem.'%")';
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function taikhoan_ins($id,$manv,$tdn,$mk){
            $sql="INSERT INTO `dangnhap`(`Id`, `Manv`, `Tendangnhap`, `Matkhau`) VALUES 
            ('$id','$manv','$tdn','$mk')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function checktrungTK($tdn){
            $sql="SELECT Tendangnhap from dangnhap where Tendangnhap='$tdn'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function checktrungTKS($tdn,$id){
            $sql="SELECT Tendangnhap from dangnhap where Tendangnhap='$tdn'and Id!='$id'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function Taikhoan_upd($id,$dsnv,$tdn,$mk){
            $sql="UPDATE dangnhap SET Tendangnhap='$tdn',
            Matkhau='$mk'
            WHERE Id='$id' and Manv='$dsnv'";
            return mysqli_query($this->con,$sql);
        }
        public function Taikhoan_xoa($id){
            $sql="DELETE FROM dangnhap WHERE id='$id'";
            return mysqli_query($this->con,$sql);
        }
    }
?>