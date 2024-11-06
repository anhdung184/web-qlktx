<?php 
    class DSPhongModels extends connectDB{
        public function Phong_ListAll()
        {
            $url = 'http://localhost:3000/phong'; // URL API nganhhoc
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
        public function PhongSearch($timkiem)
        {
            $url = 'http://localhost:3000/phong/Search';
            $data = array(
                'Maphong' => $timkiem,
                'Loaiphong' => $timkiem
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
        public function AddPhong($map,$lp,$gp,$tt,$ht,$td,$mt)
    {
        $url = 'http://localhost:3000/phong/Insert';
        $data = array(
            "Maphong"=> $map,
            "Loaiphong"=> $lp,
            "Giaphong"=> $gp,
            "Tinhtrang"=> $tt,
            "Songuoio"=> $ht,
            "Soluongtd"=> $td,
            "Mota"=> $mt
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

    public function CheckMP($map)
    {
        $url = 'http://localhost:3000/phong/Check?Maphong='. $map;

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

    public function PhongUpdate($map,$lp,$gp,$tt,$ht,$td,$mt)
    {
        $url = 'http://localhost:3000/phong/Edit/' . $map;

        $data = array(

            "Loaiphong"=> $lp,
            "Giaphong"=> $gp,
            "Tinhtrang"=> $tt,
            "Songuoio"=> $ht,
            "Soluongtd"=> $td,
            "Mota"=> $mt
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

    function PhongDelete($map)
    {
        $url = 'http://localhost:3000/phong/Delete/' . $map;

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
            $sql="Select * From phong";
            return mysqli_query($this->con,$sql);
        }

        public function Timkiemphong($timkiem){
            $sql="Select * from phong where Maphong like '%$timkiem%'  or Loaiphong like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Phong_upd($map,$lp,$gp,$tt,$ht,$td,$mt){
            $sql="UPDATE phong SET Loaiphong='$lp',Giaphong='$gp',
            Tinhtrang='$tt',Songuoio='$ht',Soluongtd='$td',Mota='$mt' 
            WHERE Maphong='$map'";
            return mysqli_query($this->con,$sql);
        }
        public function checktrungMP($map){
            $sql="SELECT Maphong from phong where Maphong='$map'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function phong_ins($map,$lp,$gp,$tt,$ht,$td,$mt){
            $sql="INSERT INTO `phong`(`Maphong`, `Loaiphong`, `Giaphong`, `Tinhtrang`, `Songuoio`, `Soluongtd`, `Mota`) VALUES 
            ('$map','$lp','$gp','$tt','$ht','$td','$mt')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Phong_xoa($map){
            $sql="DELETE FROM phong WHERE Maphong='$map'";
            return mysqli_query($this->con,$sql);
        }
    }
?>