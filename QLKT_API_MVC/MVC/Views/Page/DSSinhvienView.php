<form method="post" action="http://localhost/QLKT_API_MVC/DSSinhvien/Timkiem">
	<div class="content__bando">
						<span class="content__bando-tieude">Thêm sinh viên kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/DSSinhvien" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/ThemSinhvien" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm sinh viên</a></li>
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
										
										<th class="cot-2">Mã Sinh viên</th>
										<th class="cot-3">Họ và tên</th>
										<th class="cot-4">Ngày sinh</th>
										<th class="cot-5">Giới tính</th>
										<th class="cot-6">Lop</th>
										<th class="cot-7">Điện thoại</th>
										<th class="cot-8">Quê quán</th>
										<th >Chức năng</th>
									</tr>
									<?php
									$i=1;
									foreach ($data['kqtk'] as $row){
									?>
										<tr>
											
											<td><?php echo $row['Masv'] ?></td>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php  $dinh_dang_moi = date("d-m-Y", strtotime($row['Ngaysinh']));
												
												$newdate = strtotime ( '+1 day' , strtotime (  $dinh_dang_moi ) ) ;
												$newdate = date ( 'd-m-Y' , $newdate );
											  echo $newdate ?></td>
											<td><?php echo $row['Gioitinh'] ?></td>
											<td><?php echo $row['Lop'] ?></td>
											<td><?php echo $row['Sdt'] ?></td>
											<td><?php echo $row['Quequan'] ?></td>
											<td>
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSSinhvien/suasinhvien/<?php echo $row['Masv'] ?>">
												<input type="button" name="btnSua" value="Sửa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
												
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSSinhvien/Xoa_sinhvien/<?php echo $row['Masv'] ?>">
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