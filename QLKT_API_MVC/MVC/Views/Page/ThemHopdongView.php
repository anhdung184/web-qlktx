<?php
	$user=  $_SESSION['User'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/Button.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/ThemSinhvien.css">
    

	
	<title></title>
</head>
<style>
        .content__duoi-thembao{
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: space-between;
            margin-bottom:20px;
        }
        .btn_magin_lefp{
            margin-left: 10px;
           min-width:100px ;
        }
        .bo{
            position: inherit;
            padding: 1px;
        }
       
    </style>

<form method="POST" action="http://localhost/QLKT_API_MVC/ThemHopdong/ThemmoiHopdong">
    <div class="content__bando-mg">
        <h1><i class="fa fa-edit"></i> Đăng ký nội trú</h1>
        <p>Đơn đăng ký nội trú dành cho sinh viên</p>
    </div>
    <div class="content__duoi">
    <div class="content__duoi-menu">
    <h3 class="content__duoi-link">Biểu mẫu đăng kí nội trú</h3>
    <?php 
							if(isset($data['thongbao'])){
								if($data['thongbao']=="Sửa thất bại")
									echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px ">'.$data['thongbao'].'</span>';
									else
									echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
							}
						
                    	?>	
    </div>
    <h5 class="content__duoi-h5">Thông tin sinh viên</h5>
   
    <div class="content__duoi-inputthem">
        <div class="content__duoi-l-2  content__duoi-mg1">
                <span class="content__duoi-tieude">Mã hợp đồng</span>
                <?php
								$i=0;
								if(isset($data['kq2'])){
								$row=mysqli_fetch_assoc($data['kq2']);
									$i=$row['Mahd'];
								}
							
								$i=$i+1;
								$chuoi=str_pad($i,6,"0",STR_PAD_LEFT);
							?>
                <input type="text" name="txtMahopdong" class="content__duoi-them" value="<?php if(isset($data['mahd'])) echo $data['mahd']; else echo $chuoi; ?>">
                <span class="content__duoi-tieude">Người lập</span>
                <input type="text" name="txtNguoilapp" class="content__duoi-them"  value="<?php  
                if(isset($user['Hoten'])) echo $user['Hoten']; ?>">
                 <input type="text" name="txtNguoilap" class="content__duoi-them"   value="<?php  
                if(isset($user['Manv'])) echo $user['Manv']; ?>" hidden="">
                <span class="content__duoi-tieude">Ngày lập</span>
       
                
       
                <input type="date" name="txtNgaylap" class="content__duoi-them" id="d1">
                <script>
			                    var d= new Date()
			                    var yr=d.getFullYear();
			                    var month=d.getMonth()+1
			                    if(month<10){
			                        month='0'+date
			                    }
			                    var date=d.getDate();
			                    if(date<10){
			                        date='0'+date
			                    }
			                    var c_date=yr+"-"+month +"-"+date;
			                   document.getElementById('d1').value=c_date;
                              
			                   
			    </script>
                     <span class="content__duoi-tieude">Ngày đến</span>
							<input type="date" name="txtNgayden"  class="valueInp content__duoi-them" value="<?php if(isset($data['nd'])){  echo $data['nd']; }else echo '"id="d2""'; ?>">

			                <script>
			                    var d= new Date()
			                    var yr=d.getFullYear();
			                    var month=d.getMonth()+1
			                    if(month<10){
			                        month='0'+date
			                    }
			                    var date=d.getDate();
			                    if(date<10){
			                        date='0'+date
			                    }
			                    var c_date=yr+"-"+month +"-"+date;
			                   document.getElementById('d2').value=c_date;
			                    
			                   
			                </script>
                <span class="content__duoi-tieude">Ngày hết hạn</span>
                <input type="date" name="txtNgayhethan" class="content__duoi-them"  id ="d3" value="<?php if(isset($data['nhh'])) echo $data['nhh']; ?>">
                <span class="content__duoi-tieude">Tiền phòng</span>
                <input type="text" name="txtTienphong" class="content__duoi-them" id="d4"  value="<?php if(isset($data['tp'])) echo $data['tp']; ?>">
                <span class="content__duoi-tieude">Tiền cọc</span>
                <input type="text" name="txtTiencoc" class="content__duoi-them" id="d6" oninput="tinhtien()"  onmouseout="myfunction()"  value="<?php if(isset($data['tc'])) echo $data['tc']; ?>">
                <span class="content__duoi-tieude">Tình trạng</span>
                <select class="content__duoi-them " style="height: 25px; width:100%;    height: calc(1.5em + 0.75rem + 4px);" name="ddlTinhtrang">
                        <option value="Chưa kết thúc"
                        <?php if(isset($data['tt'])){
                            if($data['tt']=='Chưa kết thúc') echo 'selected';
                        } 
                        ?>>Chưa kết thúc</option>
                        <option value="Đã kết thúc" 
                        <?php if(isset($data['tt'])){
                            if($data['tt']=='Đã kết thúc') echo 'selected';
                        } 
                        ?>>Đã tkết thúc</option>
                     
                    </select>

                    <script type="text/javascript">
                        function myfunction(){
                            var lay= document.getElementsByClassName("valueInp")[0].value;
                            var lay1=   document.getElementById('d3').value;
                            var lay2=   document.getElementById('tienphong').value;
                            console.log(lay1)
                            console.log(lay)
                            console.log(lay2)
                            var d1 = new Date(lay); 
                            var d2 = new Date(lay1)  
                            var diff =  Math.round(Math.ceil(lay1-lay));
                            var diff1 =  Math.ceil(d2-d1);
                            var soa=  Math.round(diff1/(24*3600*1000*30));
                            var tong=soa* parseInt(lay2);
                            console.log(tong);
                            console.log(diff1/(24*3600*1000*30) )
                            document.getElementById('d4').value=tong;
};
                </script> 
                <input type="submit" name="btnDangky" value="Đăng ký" class="btn" >
                <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
                <input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
        </div>
        <div class="content__duoi-l-2 content__duoi-mg2">
            
                 <span class="content__duoi-tieude">Mã sinh viên</span>
                 <div class="content__duoi-thembao">
                 <select class="content__duoi-them " id="select" style="height: 40px; width:100%;    " name="ddlSinhVien" >
                        <option value="" ><?php if(isset($data['sv'])) echo $data['sv'];else echo'--Chọn sinh viên--' ?></option>
                        <?php
                                    while($row=mysqli_fetch_assoc($data['kq3'])){
										 var_dump($row);
                                        if(isset($data['sv'])){
                                            if($row['Masv']==$data['sv']){
                                                  echo '<option value='.$row['Masv'].' selected >'.$row['Masv'].'</option>';
                                            }
                                            else{
                                                echo '<option value='.$row['Masv'].' >'.$row['Masv'].'</option>';
                                            }
                                        }
                                        else{
                                        echo '<option value='.$row['Masv'].'>'.$row['Masv'].'</option>';
                                        }
                                    
                                    }
                                ?>
                    </select>
                 <button class="custom-btn btn-1 btn_magin_lefp bo"  type="submit" name="btnChonSV" >  <span  > 
										 Xem sinh viên</span>
            </div> 
                <span class="content__duoi-tieude">Danh sách phòng</span>
                <div class="content__duoi-thembao">
                 <select class="content__duoi-them " id="select" style="height: 40px; width:100%;   " name="ddlMaphong" id="ddlMaphong">
                        <option value="" >--Chọn phòng--</option>
                        <?php
                                    while($row=mysqli_fetch_assoc($data['kq'])){
										 var_dump($row);
                                        if(isset($data['p'])){
                                            if($row['Maphong']==$data['p']){
                                                  echo '<option value='.$row['Maphong'].' selected >'.$row['Maphong'].'</option>';
                                            }
                                            else{
                                                echo '<option value='.$row['Maphong'].' >'.$row['Maphong'].'</option>';
                                            }
                                        }
                                        else{
                                        echo '<option value='.$row['Maphong'].'>'.$row['Maphong'].'</option>';
                                        }
                                    
                                    }
                                ?>
                    </select>
                    <button class="custom-btn btn-5 btn_magin_lefp"  type="submit" name="btnChonphong"   >  <span  > 
										  Xem phòng</span>
            </div> 
            <?php
                 if(isset($data['kqsinhvien'])){while( $r=mysqli_fetch_array($data['kqsinhvien'])){
                ?>
                <span class="content__duoi-tieude">Họ và tên</span>
                <input type="text" name="txtHoten" class="content__duoi-them"  value="<?php if(isset($r['Hoten'])) echo $r['Hoten']; ?>"> 
                <span class="content__duoi-tieude">Lớp</span>
                <input type="text" name="txtLop" class="content__duoi-them"  value="<?php if(isset($r['Lop'])) echo $r['Lop'] ?>">
                <?php
                    }}
                ?>
               <?php
                 if(isset($data['kqphong'])){while( $r=mysqli_fetch_array($data['kqphong'])){
                ?>
                <span class="content__duoi-tieude">Giá phòng</span>
                <input type="text" name="txtGiaphong" class="content__duoi-them" id="tienphong"  value="<?php if(isset($r['Giaphong'])) echo $r['Giaphong']; ?>">
                <span class="content__duoi-tieude">Loại phòng</span>
                <input type="text" name="txtLoaiphong" class="content__duoi-them"   value="<?php if(isset($r['Loaiphong'])) echo $r['Loaiphong'] ?>">
                <span class="content__duoi-tieude">Thông tin phòng ở</span>
                <input type="text" name="txtThongtinphong" class="content__duoi-them"   value="<?php if(isset($r['Mota'])) echo $r['Mota'] ?>">
                <?php
                    }}
                ?> 
                <!-- <span class="content__duoi-tieude">Còn nợ</span> -->
                <input type="text" name="txtConno" class="content__duoi-them" id="tien"  value="<?php if(isset($r['Giaphong'])) echo $r['Giaphong']; ?>" hidden="">
                <script type="text/javascript">
                        function tinhtien(){
                            var lay= document.getElementsByClassName("valueInp")[0].value;
                            var lay1=   document.getElementById('d4').value;
                            var lay2=   document.getElementById('d6').value;
                            console.log(lay1)
                            console.log(lay2)
                            var tong=parseInt(lay1)- parseInt(lay2);
                            console.log(tong);
                            document.getElementById('tien').value=tong;
};
                </script> 
        
    </div>
    </div> 
    
    </div>
</form>

