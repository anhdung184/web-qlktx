

<form method="post" action="http://localhost/QLKT_API_MVC/DSPhong/Timkiem">
	<div class="content__bando">
						<span class="content__bando-tieude">Danh sách phòng kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/DSPhong" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/Themphong" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm phòng</a></li>
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
										
										<th class="cot-2">Mã phòng</th>
										<th class="cot-3">Loại phòng</th>
										<th class="cot-4">Giá phòng</th>
										<th class="cot-5">Số SVHT</th>
										<th class="cot-6">Số SVTĐ</th>
										<th class="cot-7">Tình trạng</th>
                                        <th class="cot-8">Mô tả</th>
										<th >Chức năng</th>
									</tr>
									<?php
									$i=1;
									foreach ($data['kqtk'] as $row){
									?>
										<tr>
											
											<td><?php echo $row['Maphong'] ?></td>
											<td><?php echo $row['Loaiphong'] ?></td>
											<td><?php echo $row['Giaphong'] ?></td>
											<td><?php echo $row['Tinhtrang'] ?></td>
											<td><?php echo $row['Songuoio'] ?></td>
											<td><?php echo $row['Soluongtd'] ?></td>
                                            <td><?php echo $row['Mota'] ?></td>
											<td>
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSPhong/suaphong/<?php echo $row['Maphong'] ?>">
												<input type="button" name="btnSua" value="Sửa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
												
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSPhong/Xoa_phong/<?php echo $row['Maphong'] ?>">
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