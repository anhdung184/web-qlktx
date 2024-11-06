<form method="post" action="http://localhost/QLKT_API_MVC/DSTaikhoan/Timkiem">
<div class="content__bando">
						<span class="content__bando-tieude">Danh sách tài khoản kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/DSTaikhoan" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/Themtaikhoan" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm tài khoản</a></li>
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
										<th class="cot-6">ID</th>
										<th class="cot-2">Mã Sinh viên</th>
										<th class="cot-3">Tên nhân viên</th>
										<th class="cot-5">Tên đăng nhập</th>
										<th class="cot-3">Mật khẩu</th>
										<th class="cot-7">Chức vụ</th>
										<th >Chức năng</th>
									</tr>
									<?php
									$i=1;
										while($row=mysqli_fetch_assoc($data['kqtk'])){
									?>
										<tr>
											
											<td><?php echo $row['Id'] ?></td>
											<td><?php echo $row['Manv'] ?></td>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php echo $row['Tendangnhap'] ?></td>
											<td><?php echo $row['Matkhau'] ?></td>
											<td><?php echo $row['Chucvu'] ?></td>
										
										
											<td>
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSTaikhoan/suataikhoan/<?php echo $row['Id'] ?>">
												<input type="button" name="btnSua" value="Sửa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
												
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSTaikhoan/Xoa_taikhoan/<?php echo $row['Id'] ?>">
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