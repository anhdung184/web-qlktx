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
<form method="post" action="">
<div class="content__bando">
						<span class="content__bando-tieude">Danh sách sinh viên sắp xếp theo mã hd</span>
					</div>
					
					<div class="content__duoi">
						
						<div class="content__duoi-bang">							
								<table border="1" cellspacing="0px" class="bang__quanly">
									<tr class="hang-1">
										<th class="cot-5">Tên sinh viên</th>
										<th class="cot-5">Mã sinh viên</th>
									    <th class="cot-5">Mã hợp đồng</th>
                                        <th class="cot-6">Giới tính</th>
										<th class="cot-2">Lớp</th>
										<th class="cot-2">SĐt</th>
                                        <th class="cot-2">Quê quán</th>
                                        <th class="cot-2">Ngày hết hạn HĐ</th>

									</tr>
									<?php
									$i=1;
										while($row=mysqli_fetch_assoc($data['kq'])){
									?>
										<tr>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php echo $row['Masv'] ?></td>
										    <td><?php echo $row['Mahd'] ?></td>
											<td><?php echo $row['Gioitinh'] ?></td>
                                            <td><?php echo $row['Lop'] ?></td>
											<td><?php echo $row['Sdt'] ?></td>
											<td><?php echo $row['Quequan'] ?></td>
                                            <td><?php echo $row['Ngayhethan'] ?></td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
</form>