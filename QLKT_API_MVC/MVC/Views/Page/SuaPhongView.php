<form method="POST" action="http://localhost/QLKT_API_MVC/DSPhong/CapnhapPhong">
<div class="content__bando">
						<span class="content__bando-tieude">Cập nhập phòng kí túc xá</span>
					</div>
					<div class="content__duoi">
						<div class="content__duoi-menu">
						<h3 class="content__duoi-link">Câp nhập phòng kí túc xá</h3>
						<?php 
							if(isset($data['thongbao'])){
								if($data['thongbao']=="Sửa thất bại")
									echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
									else
									echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
							}
							// echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                    	?>
						</div>
						<?php
							foreach ($data['kqtk'] as $row){
						?>
						<div class="content__duoi-inputthem">
							<span class="content__duoi-tieude">Mã phòng</span>
							<input type="text" name="txtMaphong" class="content__duoi-them" value="<?php  echo $r['Maphong']; ?>">
							<span class="content__duoi-tieude">Loại phòng</span>
							<div class="gender   " style="margin-bottom: 14px; " >
								<label for="Nam" ><input type="radio" name="loaiphong" value="Nam" id="Nam" class=" genderfs" checked=""
									<?php 
								if($r['Loaiphong']=='Nam') echo 'checked=""';
							 
							?>> Nam</label>
								<label for="Nu" ><input type="radio" name="loaiphong" value="Nữ" id="Nu" class="gendermr genderfs"
								<?php if($r['Loaiphong']=='Nữ') echo 'checked=""';
								?>
								> Nữ</label>
								
							</div>


							<span class="content__duoi-tieude">Giá phòng</span>
							<input type="text" name="txtGiaphong" class="content__duoi-them" value="<?php  echo $r['Giaphong']; ?>" >
				

							<span class="content__duoi-tieude">Số người hiện tại</span>
							<input type="text" name="txtSonguoio" class="content__duoi-them" value="<?php  echo $r['Songuoio']; ?>">
							<span class="content__duoi-tieude">Số người tối đa</span>
							<input type="text" name="txtSonguoitd" class="content__duoi-them" value="<?php echo $r['Soluongtd']; ?>">
							<span class="content__duoi-tieude">Tình trạng</span>
							<div class="gender   " style="margin-bottom: 14px; ">
								<label for="Trong" ><input type="radio" name="tinhtrang" value="Còn trống" id="Trong" class=" genderfs" checked=""
								<?php if($r['Tinhtrang']=='Còn trống') echo 'checked=""';
							?>
								>  Còn trống</label>
								<label for="Du" ><input type="radio" name="tinhtrang" value="Đã đủ" id="Du" class="gendermr genderfs"
								<?php  if($r['Tinhtrang']=='Đã đủ') echo 'checked=""';
							?>
								>  Đã đủ</label>
								
							</div>
							<span class="content__duoi-tieude">Mô tả</span>
							<input type="text" name="txtMota" class="content__duoi-them" value="<?php echo $r['Mota']; ?>">
							<input type="submit" name="btnThemmoi" value="Câp nhập" class="btn">
							
							<input type="submit" name="btnDanhsach" value="Quay lại" class="btn">
						</div>
                        <?php
							}
						?>
					</div>
</form>