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
        /* .content__bando-mg{
            position: fixed;
            width: 100%;
            margin: -65px -30px 0px;
                'thongbao'=>'Bạn chưa nhập dữ liệu. Vui lòng nhập',
                        'mahoadon'=>$mahd,
                        'maphong'=>$map,
                        'ngaylap'=>$nl,
                        'sodien'=>$sd,
                        'sonuoc'=>$sn,
                        'mang'=>$m,
                        'thanhtien'=>$ttien,
                        'tongtien'=>$tongt,
                        'tinhtrang'=>$tt,
                        'kqp'=>$kq1,
                        'p'=>$timkiem,
        } */
    </style>
</head>

<form method="POST" action="http://localhost/QLKT_API_MVC/ThemHoadon/ThemmoiHoadon">
    <div class="content__bando-mg">
        <h1><i class="fa fa-dollar"></i> Thanh toán dịch vụ</h1>
        <p >Thanh toán theo từng phòng</p>
    </div>
    <div class="content__duoihh" >
        <div class="content__duoi-menu"  >
        <span class="content__text_hh"> Tìm kiến theo mã phòng</span>
        <div class="content__duoi-dauhh">
                                            
                                            <select class="ctxt-tiemkiem input "  name="txtTimkiem" style="font-size: 1rem; height: 32px;">
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
                                            
                                            <input class="btn " type="submit" name="btnTimkiem" value="Tìm kiếm">
                                            <input class="btn btn-Excel" type="submit" name="btnExcel" value="Xuất ra excel">
                                            
                                </div>
                                <?php 
                                                if(isset($data['thongbao'])){
                                                        echo '<span style="color:red;font-size:1rem;">'.$data['thongbao'].'</span>';
                                                }
                                            ?>	
                
        
        </div> 
        <div class="content__duoi-hthh" <?php if( !isset($data['kqp'])) echo 'hidden'; ?> >
               
    <div class="content__duoi-inputthem"  >
        <div class="content__duoi-l-2  content__duoi-mg1">
                <span class="content__duoi-tieude">Mã hóa đơn</span>
                <?php
								
                                $i=0;
								if(isset($data['kq1'])){
                                    $row=mysqli_fetch_assoc($data['kq1']);
									$i=$row['Mahd'];}
							
								$i=$i+1;
								$chuoi=str_pad($i,6,"0",STR_PAD_LEFT);
							?>
                <input type="text" name="txtMaHoadon" class="content__duoi-them" value="<?php if(isset($data['mahoadon'])) echo $data['mahoadon']; else echo $chuoi; ?>">
                    <span class="content__duoi-tieude">Số điện</span>
                <div class="content__duoi-thembao" >
                <input type="number" name="txtSodien"   oninput="myfunction()" id="Sodien" class="widthchung"  value="<?php if(isset($data['sodien'])) echo $data['sodien']; else echo'0'; ?>">
                <span class="text__tien">3000đ/Số</span>
                </div>
                
                <span class="content__duoi-tieude">Khối nước </span>
                <div class="content__duoi-thembao">
                <input type="number" name="txtSonuoc"   oninput="myfunction()" id="Sonuoc" class="widthchung" value="<?php if(isset($data['sonuoc'])) echo $data['sonuoc']; else echo'0'; ?>"> 
                <span class="text__tien">5000đ/Khối</span>
                </div>
                <span class="content__duoi-tieude">Tiền mạng</span>
                <input type="number" name="txtMang"  oninput="myfunction()" id="Mang" class="content__duoi-them " value="<?php if(isset($data['mang'])) echo $data['mang']; else echo'0'; ?>">
                <span class="content__duoi-tieude">Thanh tiền</span>
                <input type="text" name="txtThanhtien" id="Tongthu" oninput="myfunctionconno()" class="content__duoi-them " placeholder="0"  value="<?php if(isset($data['thanhtien'])) echo $data['thanhtien']; ?>">
               
                
                
                
    
                <input type="submit" name="btnThanhtoan" value="Thanh toán" class="btn" >
                <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
                <input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
        </div>
        <div class="content__duoi-l-2 content__duoi-mg2">
                 
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
                <?php
                    while($r=mysqli_fetch_array($data['kqp'])){
                ?>
                <span class="content__duoi-tieude">Phòng</span>
                <input type="text" name="txtMaphong" class="content__duoi-them"  value="<?php  
                if(isset($r['Maphong'])) echo $r['Maphong']; ?>">
               
              
                <!-- <span class="content__duoi-tieude">Tiền phòng</span>
                <input type="text" name="txtTienphong"  oninput="myfunction()" id="Phong" class="content__duoi-them "  value="<?php  
                if(isset($r['Giaphong'])) echo $r['Giaphong']; ?>" >   -->
                <?php
                    }
                ?> 
               
                <span class="content__duoi-tieude">Tổng số tiền đã thu</span>
                <input type="number" name="txtTongtien" oninput="myfunctionconno()"  class="content__duoi-them" id="tongtien" placeholder="0"  value="<?php if(isset($data['tongtien'])) echo $data['tongtien']; ?>">
                <script type="text/javascript">
                    function myfunction(){
                       
                        var Sodien =document.getElementById('Sodien').value;
                        
                        var Sonuoc =document.getElementById('Sonuoc').value;
                        var Mang =document.getElementById('Mang').value;
                        var Tiendien=Sodien*3000;
                        var Tiennuoc=Sonuoc*5000;
                        var Tong=   (Tiendien) + parseInt(Tiennuoc) + parseInt(Mang);
                        document.getElementById('Tongthu').value= Tong;
                    }
                </script>
                <!--  id="Sonuoc" -->
                 <span class="content__duoi-tieude">Còn nợ</span>
                 <input type="number" name="txtConno" oninput="myfunctionconno()" id="Conno" placeholder="0"   class="content__duoi-them"  value="<?php if(isset($data['cn'])) echo $data['cn'];  ?>"> 
                 <script type="text/javascript">
                    function myfunctionconno(){
                       
                        var Thanhtien =document.getElementById('Tongthu').value;
                        var Tienthu=document.getElementById('tongtien').value;
                        var conno=parseInt(Thanhtien)- parseInt(Tienthu);
                         document.getElementById('Conno').value= conno;
                       
                        
                    }
                </script>


    </div>
    </div> 
        </div>
</div>
</form>

