<?php 
    class DSNhanvienModels extends connectDB{
        public function Nhanvien_ListAll()
        {
            $url = 'http://localhost:3000/nhanvien'; // URL API nganhhoc
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
        public function NhanvienSearch($timkiem)
        {
            $url = 'http://localhost:3000/nhanvien/Search';
            $data = array(
                'Manv' => $timkiem,
                'Hoten' => $timkiem,
                'Chucvu' => $timkiem // Sửa tên trường 'manganh' thành 'nganhhoc'
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
        public function AddNhanvien($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv)
    {
        $url = 'http://localhost:3000/nhanvien/Insert';
        $data = array(
            "Manv"=> $manv,
            "Hoten"=> $tnv,
            "Ngaysinh"=> $ngs,
            "Gioitinh"=> $gt,
            "Sdt"=> $sdt,
            "Quequan"=> $dc,
            "Chucvu"=> $cv,
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
// loicheck
    public function CheckMaNV($manv)
    {
        $url = 'http://localhost:3000/nhanvien/Check?Manv=' . $manv;

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

    public function NhanvienUpdate($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv)
    {
        $url = 'http://localhost:3000/nhanvien/Edit/' . $manv;

        $data = array(
            "Hoten"=> $tnv,
            "Ngaysinh"=> $ngs,
            "Gioitinh"=> $gt,
            "Sdt"=> $sdt,
            "Quequan"=> $dc,
            "Chucvu"=> $cv,
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

    function NhanvienDelete($manv)
    {
        $url = 'http://localhost:3000/nhanvien/Delete/' . $manv;

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
            $sql="Select * From quanly";
            return mysqli_query($this->con,$sql);
        }

        public function TimkiemNV($timkiem){
            $sql="Select * from quanly where Manv like '%$timkiem%'  or Hoten like '%$timkiem%'or Chucvu like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Nhanvien_upd($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv){
            $sql="UPDATE quanly SET Hoten='$tnv',Ngaysinh='$ngs',
            Gioitinh='$gt',Sdt='$sdt',Quequan='$dc',Chucvu='$cv' 
            WHERE Manv='$manv'";
            return mysqli_query($this->con,$sql);
        }
        public function checktrungMNV($manv){
            $sql="SELECT Manv from quanly where Manv='$manv'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function nhanvien_ins($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv){
            $sql="  INSERT INTO `quanly`(`Manv`, `Hoten`, `Ngaysinh`, `Gioitinh`, `Sdt`, `Quequan`, `Chucvu`) 
            VALUES ('$manv','$tnv','$ngs','$gt','$sdt','$dc','$cv')";
          
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Nhanvien_xoa($manv){
            $sql="DELETE FROM quanly WHERE Manv='$manv'";
            return mysqli_query($this->con,$sql);
        }
    }
?>