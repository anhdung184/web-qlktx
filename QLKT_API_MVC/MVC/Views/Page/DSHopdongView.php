<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
		.cotsv-1,.cotsv-2,.cotsv-3,.cotsv-4,.cotsv-5,.cotsv-6,.cotsv-7,.cotsv-8{
		    padding: 0 10px;
			min-width: 100px;
		}
		.content__duoi {
    	overflow-x: auto;
		}
		.cotsv-5,.cotsv-6,.cotsv-7{
			min-width: 130px;
		}
		.cotsv-8{
		    min-width: 150px;
		}
		.cotcn{
			min-width: 88px;
		}
	</style>
	<title></title>
</head>
<form method="post" action="http://localhost/QLKT_API_MVC/DSHopdong/Timkiem">
<div class="content__bando">
						<span class="content__bando-tieude">Danh sách hợp đồng kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/ThemHopdong" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm hơp đồng</a></li>
							</ul>
						</div>
						<div class="content__duoi-bang">
							<div class="content__duoi-dau">
										<input class="btn btn-Excel" type="submit" name="btnExcel" value="Xuất ra excel">
										<input class="txt-tiemkiem input" type="text" name="txtTimkiem" placeholder="Tìm kiếm...">
										<input class="btn " type="submit" name="btnTimkiem" value="Tìm kiếm">
							</div>
							
								<table border="1" cellspacing="0px" class="bang__quanly">
									<tr class="hang-1">
										
									<th class="cotsv-1">Mã HĐ</th>
										<th class="cotsv-5">Mã SV</th>
										<!-- <th class="cotsv-8">Tên sinh viên</th> -->
										<th class="cotsv-2">Phòng</th>
										<th class="cotsv-8">Người lập</th>
										<th class="cotsv-2">Ngày lập</th>
										<th class="cotsv-2">Ngày đến</th>
										<th class="cotsv-7">Ngày hết hạn</th>
										<th class="cotsv-1">Tiền phòng</th>
										<th class="cotsv-1">Tiền cọc</th>
										<th class="cotsv-7">Tình trạng</th>
										<th class="cotcn">Chức năng</th>
									</tr>
									<?php
									$i=1;
										while($row=mysqli_fetch_assoc($data['kqtk'])){
									?>
										<tr>
											
										<td><?php echo $row['Mahd'] ?></td>
											<td><?php echo $row['Masv'] ?></td>
											<td><?php echo $row['Maphong'] ?></td>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php echo $row['Ngaylap'] ?></td>
											<td><?php echo $row['Ngayden'] ?></td>
											<td><?php echo $row['Ngayhethan'] ?></td>
											<td><?php echo $row['Tienphong'] ?></td>
											<td><?php echo $row['Tiencoc'] ?></td>
											<td><?php echo $row['Tinhtrang'] ?> </td>
											<td>
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSHopdong/suahopdong/<?php echo $row['Mahd'] ?>">
												<input type="button" class="btnHien" name="btnKetthuc" value="Kết thúc" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
										
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSHopdong/Xoa_hopdong/<?php echo $row['Mahd'] ?>">
												<input type="button" name="btnXoa" value="Xóa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
											</td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
					<script type="text/javascript">
						<?php
							if($data['kthd']){
								echo'	alert("Kết thúc hợp đồng thành công!");';
							}
						?>
					
					</script>
				
</form>