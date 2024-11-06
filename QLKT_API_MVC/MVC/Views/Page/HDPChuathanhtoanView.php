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
						<span class="content__bando-tieude">Danh sách hợp đồng kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						
						<div class="content__duoi-bang">							
								<table border="1" cellspacing="0px" class="bang__quanly">
									<tr class="hang-1">
										<th class="cot-5">Tên sinh viên</th>
										<th class="cot-5">Mã sinh viên</th>
									    <th class="cot-5">Mã hóa đơn</th>
										<th class="cot-2">Mã hợp đồng phòng</th>
                                        <th class="cot-6">Ngày lập hợp đồng phòng</th>
										<th class="cot-2">Đã trả</th>
										<th class="cot-2">Còn nợ</th>

									</tr>
									<?php
									$i=1;
										while($row=mysqli_fetch_assoc($data['kq'])){
									?>
										<tr>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php echo $row['Masv'] ?></td>
										    <td><?php echo $row['Mahd'] ?></td>
											<td><?php echo $row['Mahdp'] ?></td>
                                            <td><?php echo $row['Ngaylaphdp'] ?></td>
											<td><?php echo $row['Datra'] ?></td>
											<td><?php echo $row['Conno'] ?></td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
</form>