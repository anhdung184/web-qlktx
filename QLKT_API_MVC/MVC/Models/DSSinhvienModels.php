<?php 
    class DSSinhvienModels extends connectDB{
        public function Sinhvien_ListAll()
        {
            $url = 'http://localhost:3000/sinhvien'; // URL API nganhhoc
            $curl = curl_init($url);
    
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
    
            if ($response === false) {
                $error = curl_error($curl);
                // Xử lý lỗi khi gọi API
                echo "Error: " . $error;
                return []; // Trả về một mảng rỗng nếu có lỗi
            }
    
            $data = json_decode($response, true);
            curl_close($curl);;
            // Kiểm tra key 'nganh' tồn tại trong mảng $data
            if (!empty($data)) {
                $data = json_decode($response, true);
                return $data;
                // Trả về mảng dữ liệu lớp học
            } else {
                echo "Không có dữ liệu lớp học";
                return []; // Trả về một mảng rỗng nếu không có dữ liệu
            }
            
        }
        public function SinhvienSearch($timkiem)
        {
            $url = 'http://localhost:3000/sinhvien/Search';
            $data = array(
                'Masv' => $timkiem,
                'Hoten' => $timkiem,
                'Quequan' => $timkiem // Sửa tên trường 'manganh' thành 'nganhhoc'
            );
    
            // Convert dữ liệu thành định dạng JSON
            $json_data = json_encode($data);
    
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data); // Gửi dữ liệu JSON
    
            $response = curl_exec($curl);
    
            if ($response === false) {
                $error = curl_error($curl);
                echo "Error: " . $error;
                return false;
            }
    
            $result = json_decode($response, true);
    
            return $result; // Trả về kết quả tìm kiếm (danh sách lớp học)
        }
        public function AddSinhvien($masv,$tsv,$ngs,$gt,$l,$sdt,$dc)
    {
        $url = 'http://localhost:3000/sinhvien/Insert';
        $data = array(
            "Masv"=> $masv,
            "Hoten"=> $tsv,
            "Ngaysinh"=> $ngs,
            "Gioitinh"=> $gt,
            "Lop"=> $l,
            "Sdt"=> $sdt,
            "Quequan"=> $dc
        );

        // Convert dữ liệu thành định dạng JSON
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        if ($result) {
            return true; // Trả về true nếu thêm mới thành công
        } else {
            return false; // Trả về false nếu thêm mới thất bại
        }
    }

    public function CheckMaSV($masv)
    {
        $url = 'http://localhost:3000/sinhvien/Check?malop=' . $masv;

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $data = json_decode($response, true);

        return $data;
    }

    public function SinhvienUpdate($masv,$tsv,$ngs,$gt,$l,$sdt,$dc)
    {
        $url = 'http://localhost:3000/sinhvien/Edit/' . $masv;

        $data = array(
            "Hoten"=> $tsv,
            "Ngaysinh"=> $ngs,
            "Gioitinh"=> $gt,
            "Lop"=> $l,
            "Sdt"=> $sdt,
            "Quequan"=> $dc
        );

        // Convert data to JSON format
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // Use PUT request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result; // Return the result of the update operation
    }

    function SinhvienDelete($masv)
    {
        $url = 'http://localhost:3000/sinhvien/Delete/' . $masv;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result;
    }



        public function lophoc_all(){
            $sql="Select * From sinhvien";
            return mysqli_query($this->con,$sql);
        }

        public function TimkiemSV($timkiem){
            $sql="Select * from sinhvien where Masv like '%$timkiem%'  or Hoten like '%$timkiem%'or Lop like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Sinhvien_upd($masv,$tsv,$ngs,$gt,$l,$sdt,$dc){
            $sql="UPDATE sinhvien SET Hoten='$tsv',Ngaysinh='$ngs',
            Gioitinh='$gt',Lop='$l',Sdt='$sdt',Quequan='$dc' 
            WHERE Masv='$masv'";
            return mysqli_query($this->con,$sql);
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
        public function sinhvien_ins($masv,$tsv,$ngs,$gt,$l,$sdt,$dc){
            $sql="  INSERT INTO `sinhvien`(`Masv`, `Hoten`, `Ngaysinh`, `Gioitinh`, `Lop`, `Sdt`, `Quequan`) 
            VALUES ('$masv','$tsv','$ngs','$gt','$l','$sdt','$dc')";
          
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Sinhvien_xoa($masv){
            $sql="DELETE FROM sinhvien WHERE Masv='$masv'";
            return mysqli_query($this->con,$sql);
        }
    }
?>