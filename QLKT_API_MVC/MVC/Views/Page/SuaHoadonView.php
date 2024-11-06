<?php
	$user=  $_SESSION['User'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/ThemSinhvien.css">
    

	
	<title></title>
    <style>
        .content__duoihh {
            margin-top: 25px;
            height: 129px;
            background-color: #fff;
            box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);
        }
        .content__duoi-dauhh{
            min-height: 25px;
            display: flex;
            
        }
        .btn{
            margin-left:10px;
        }
        .content__duoi-menu{
            padding-left: 50px;
            padding-top: 10px;
            border: none;
        }
        .content__text_hh{
            margin-bottom: 6px;
            margin-top: 8px;
            display: flex;
            font-size: 1.1rem;
        }
        .content__duoi-hthh{
            margin-top:16px;
            background-color: #fff; 
           
        }
        .widthchung{
            width: 80%;
            font-size: 1.1rem;
            color: #8693a0;
            height: 40px;
            border: 2px solid #cfd4da;
            outline-color: #5cb1e3;
        }
        .content__duoi-thembao{
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: space-between;
            margin-bottom:20px;
        }
        .text__tien{
            font-size: 1.2rem;
            line-height: 40px;
           
        }
        
    </style>
</head>

<form method="POST" action="http://localhost/QLKT_API_MVC/DSHoadon/Sua_hoadon">
    <div class="content__bando">
    <span class="content__bando-tieude">Sửa thông tin nhân viên kí túc xá</span>
</div>
<div class="content__duoi">
    <div class="content__duoi-menu">
        <h3 class="content__duoi-link">Chỉnh sửa thông tin nhân viên</h3>
        <?php
        if(isset($data['thongbao'])){
            if($data['thongbao']=="Sửa thất bại")
                echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                else
                echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
        }
        
        ?>
    </div>
   
        <div class="content__duoi-hthh"  >
               
    <div class="content__duoi-inputthem"  >
        <div class="content__duoi-l-2  content__duoi-mg1">
        <?php
        while($r=mysqli_fetch_array($data['kqtk'])){
    ?>
    <span class="content__duoi-tieude">Mã hóa đơn</span>
             
                <input type="text" name="txtMaHoadon" class="content__duoi-them" value="<?php if(isset($r['Mahd'])) echo $r['Mahd']; ?>">
                    <span class="content__duoi-tieude">Số điện</span>
                <div class="content__duoi-thembao" >
                <input type="number" name="txtSodien"   oninput="myfunction()" id="Sodien" class="widthchung"  value="<?php if(isset($r['Sodien'])) echo $r['Sodien']; else echo'0'; ?>">
                <span class="text__tien">3000đ/Số</span>
                </div>
                
                <span class="content__duoi-tieude">Khối nước </span>
                <div class="content__duoi-thembao">
                <input type="number" name="txtSonuoc"   oninput="myfunction()" id="Sonuoc" class="widthchung" value="<?php if(isset($r['Sonuoc'])) echo $r['Sonuoc']; else echo'0'; ?>"> 
                <span class="text__tien">5000đ/Khối</span>
                </div>
                <span class="content__duoi-tieude">Tiền mạng</span>
                <input type="number" name="txtMang"  oninput="myfunction()" id="Mang" class="content__duoi-them " value="<?php if(isset($r['Mang'])) echo $r['Mang']; else echo'0'; ?>">
                <span class="content__duoi-tieude">Thanh tiền</span>
                <input type="text" name="txtThanhtien" id="Tongthu" oninput="myfunctionconno()" class="content__duoi-them " placeholder="0"  value="<?php if(isset($r['Thanhtien'])) echo $r['Thanhtien']; ?>">
               
                
                
                
    
                <input type="submit" name="btnThanhtoan" value="Thanh toán" class="btn" >
                <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
                <input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
        </div>
        <div class="content__duoi-l-2 content__duoi-mg2">
                 
                <span class="content__duoi-tieude">Ngày lập</span>
                
                <input type="date" name="txtNgaylap" class="content__duoi-them" id="d1">
                <!-- <script>
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
                                
                                 -->
                <!-- </script> -->
               
                <span class="content__duoi-tieude">Phòng</span>
                <input type="text" name="txtMaphong" class="content__duoi-them"  value="<?php  
                if(isset($r['Maphong'])) echo $r['Maphong']; ?>">
               
              
               
               
                <span class="content__duoi-tieude">Tổng số tiền đã thu</span>
                <input type="number" name="txtTongtien" oninput="myfunctionconno()"  class="content__duoi-them" id="tongtien1" placeholder="0"  value="<?php if(isset($r['Tiengiam'])) echo $r['Tiengiam']; ?>">
                <input type="number"  oninput="myfunctionconno()"  class="content__duoi-them" id="tongtien" placeholder="0"  value="<?php if(isset($r['Tiengiam'])) echo $r['Tiengiam']; ?>"hidden="" >
                
                 <span class="content__duoi-tieude">Còn nợ</span>
                 <input type="number" name="txtConno" oninput="myfunctionconno()" id="Conno1" placeholder="0"   class="content__duoi-them"  value="<?php if(isset($r['Conno'])) echo $r['Conno'];  ?>"> 
                 <input type="number"  oninput="myfunctionconno()" id="Conno" placeholder="0"   class="content__duoi-them"  value="<?php if(isset($r['Conno'])) echo $r['Conno'];  ?>" hidden="" > 
                 <span class="content__duoi-tieude">Thanh toán</span>
                 <input type="number"  oninput="myfunctionthanhtoan()" id="Thanhtoan" placeholder="0"   class="content__duoi-them"  value="<?php if(isset($data['Conno'])) echo $data['Conno'];  ?>"> 
                 <script type="text/javascript">
                   
                    function myfunctionthanhtoan(){
                       
                       var Thanhtien =document.getElementById('Thanhtoan').value;
                       var Tiendanop=document.getElementById('tongtien').value;
                       var Tienthu=document.getElementById('Conno').value;
                       var conno=parseInt(Tienthu)- parseInt(Thanhtien);
                       var Noptien=parseInt(Tiendanop)+ parseInt(Thanhtien);
                        document.getElementById('Conno1').value= conno;
                        document.getElementById('tongtien1').value= Noptien;
                      
                       
                   }
                </script>


    </div>
    </div> 
        </div>
        <?php
        }
    ?>

</div>
</form>

