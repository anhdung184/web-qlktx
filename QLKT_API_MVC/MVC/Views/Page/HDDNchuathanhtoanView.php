<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
		.cotsv-1,.cotsv-2,.cotsv-3,.cotsv-4,.cotsv-5,.cotsv-6,.cotsv-7,.cotsv-8{
		    
			min-width: 80px;
		}
		.content__duoi {
    	overflow-x: auto;
		}
		.cotsv-5,.cotsv-6,.cotsv-7{
			min-width: 100px;
		}
		.cotsv-8{
		    min-width: 200px;
		}
		.cotcn{
			min-width: 88px;
		}
	</style>
	<title></title>
</head>
<form method="post" action="">
<div class="content__bando">
						<span class="content__bando-tieude">Danh sách hợp đồng kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						
						<div class="content__duoi-bang">							
								<table border="1" cellspacing="0px" class="bang__quanly">
									<tr class="hang-1">

									    <th class="cotsv-5">Mã hóa đơn</th>
										<th class="cotsv-2">Mã phòng</th>
                                        <th class="cotsv-6">Ngày lập</th>
										<th class="cotsv-2">Số điện</th>
										<th class="cotsv-2">Số nước</th>
										<th class="cotsv-7">Internet</th>
                                        <th class="cotsv-5">Thành tiền</th>
										<th class="cotsv-7">Đã thu</th>
										<th class="cotsv-5">Tình trạng</th>
									</tr>
									<?php
									$i=1;
										while($row=mysqli_fetch_assoc($data['kq'])){
									?>
										<tr>
											
										    <td><?php echo $row['Mahd'] ?></td>
											<td><?php echo $row['Maphong'] ?></td>
                                            <td><?php echo $row['Ngaylap'] ?></td>
											<td><?php echo $row['Sodien'] ?></td>
											<td><?php echo $row['Sonuoc'] ?></td>
											<td><?php echo $row['Mang'] ?></td>
											<td><?php echo $row['Thanhtien'] ?></td>
                                            <td><?php echo $row['Tiengiam'] ?></td>
											<td><?php echo $row['Tinhtranghd'] ?></td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
</form>