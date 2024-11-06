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
    <style type="text/css">
        .content__duoi-dau{
			display: flex;
			justify-content: center;
		}
		.input{
			height: 36px;
   			 margin-right: 6px;
		}
		.content__duoi-link {
			font-size: 1.2rem;
		}
    </style>
    
</head>
<form method="post" action="http://localhost/QLKT_API_MVC/DSNhanvien/Timkiem">
    <div class="content__bando">
						<span class="content__bando-tieude">Danh sách nhân viên kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/DSNhanvien" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/ThemNhanvien" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm nhân viên</a></li>
							</ul>
						</div>
						<div class="content__duoi-bang">
							<div class="content__duoi-dau">
										
										<input class="txt-tiemkiem input" type="text" name="txtTimkiem" placeholder="Tìm kiếm...">
										
										<button class="custom-btn btn-14"  type="submit" name="btnTimkiem" > 
										<span style="display: flex;" > 
										<i style="margin-right:5px;"> <img src="http://localhost/QLKT_API_MVC/Public/IMG/search.png"></i>  Tìm kiếm</span>
										</button>
							</div>
							<div class="nut__xuatnhap-ex"  style="padding-left:52px; padding-bottom: 20px ">
								<button class="custom-btn btn-13"  type="submit" name="btnXuatex" > 
								<span style="display: flex;" > 
								<i style="margin-right:5px;"> <img src="http://localhost/QLKT_API_MVC/Public/IMG/xls.gif"></i>  Xuất Excel</span>
								</button>
								<button class="custom-btn btn-15"  type="submit" name="btnUpdeteex"  > 
								<span style="display: flex;"> 
								<i style="margin-right:5px;"> <img src="http://localhost/QLKT_API_MVC/Public/IMG/xls.gif"></i>  Updete Excel</span>
								</button>
							</div>
								<table border="1" cellspacing="0px" class="bang__quanly">
									<tr class="hang-1">
										
										<th class="cot-2">Mã nhân viên</th>
										<th class="cot-3">Họ và tên</th>
										<th class="cot-4">Ngày sinh</th>
										<th class="cot-5">Giới tính</th>
										<th class="cot-7">Điện thoại</th>
										
										<th class="cot-8">Quê quán</th>
										<th class="cot-7">Chức vụ</th>
										<th >Chức năng</th>
									</tr>
									<?php
									$i=1;
									foreach ($data['kqtk'] as $row){
									?>
										<tr>
											
											<td><?php echo $row['Manv'] ?></td>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php $dinh_dang_moi = date("d-m-Y", strtotime($row['Ngaysinh']));
												
												$newdate = strtotime ( '+1 day' , strtotime (  $dinh_dang_moi ) ) ;
												$newdate = date ( 'd-m-Y' , $newdate );
											  echo $newdate ?></td>
											<td><?php echo $row['Gioitinh'] ?></td>
											<td><?php echo $row['Sdt'] ?></td>
											<td><?php echo $row['Quequan'] ?></td>
                                            <td><?php echo $row['Chucvu'] ?></td>
											<td>
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSNhanvien/suanhanvien/<?php echo $row['Manv'] ?>">
												<input type="button" name="btnSua" value="Sửa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
												
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSNhanvien/Xoa_nhanvien/<?php echo $row['Manv'] ?>">
												<input type="button" name="btnSua" value="Xóa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
											</td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
</form>