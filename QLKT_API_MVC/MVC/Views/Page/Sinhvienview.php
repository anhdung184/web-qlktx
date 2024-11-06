
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nguyễn Văn Quân</title>
    <style type="text/css">
        *{margin: 0px;
            padding: 0;
        }
        .col2{
            width: 30%;
            text-align: left;
            height: 25px;
            padding: 5px 35px;
        }
        .cot1{
            padding: 5px 35px;
            margin-left: 30px;
            text-align: left;
        }
        .btnluu{
            padding: 0 30px;
        }
        </style>
</head>
<body>
    <div class="menuright">     
    <form method="post" action="http://localhost/TT24_MVC/Sinhvien/ThemmoiSV">
        <table>
            <caption style="padding-top: 20px;">Thêm thông tin về Sinh viên</caption>
            <tr>
                <td colspan="4" style="text-align: center; color: red;">
                    <?php 
                        if(isset($data['thongbao']))
                        echo $data['thongbao'];
                    
                    ?>
                </td>
            </tr>
            <tr>
                <td class="cot1">Mã SV:</td>
                <td class="cot2">
                    <input type="text" name="txtMasv" >
                </td>
            </tr>
            <tr>
                <td class="cot1">Tên SV:</td>
                <td class="cot2">
                    <input type="text" name="txtTensv">
                </td>
            </tr>
            <tr>
                <td class="cot1">Ngày sinh:</td>
                <td class="cot2">
                    <input type="date" name="txtdate">
                </td>
            </tr>
            <tr>
                <td class="cot1">Giới tính:</td>
                <td class="cot2">
                    <select name="txtgioitinh" id="">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td class="cot1">Địa chỉ:</td>
                <td class="cot2">
                    <input type="text" name="txtdiachi">
                </td>
            </tr>
            <tr>
                <td class="cot1">Điện thoại:</td>
                <td class="cot2">
                    <input type="text" name="txtphone">
                </td>
            </tr>
            <tr>
                <td class="cot1">Chọn lớp:</td>
                <td class="cot2">
                <select name="ddlLopHoc" class="dd1" style="width: 258px; height: 22px;">
                    <option>--Chọn lớp--</option>
                    <?php
                        while($row=mysqli_fetch_assoc($data['kq'])){
                            if(isset($data['malop'])){
                                if($row['Malop']==$data['malop']){
                                    echo '<option value='.$row['Malop'].' selected >'.$row['Tenlop'].'</option>';
                                }
                                else{
                                    echo '<option value='.$row['Malop'].'>'.$row['Tenlop'].'</option>';
                                }
                            }
                            else{
                               echo '<option value='.$row['Malop'].'>'.$row['Tenlop'].'</option>';
                            }
                           
                        }
                    ?>

                </select>
                </td>
            </tr>
            <tr>
                <td class="cot1"></td>
                <td class="cot2">
                    <input type="submit" name="btnluu" value="lưu" class="btnluu">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>