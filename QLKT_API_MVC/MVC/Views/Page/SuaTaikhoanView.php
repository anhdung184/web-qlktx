<form method="POST" action="http://localhost/QLKT_API_MVC/DSTaikhoan/Sua_taikhoan">
<div class="content__bando">
					<span class="content__bando-tieude">Sửa thông tin tài khoản nhân viên kí túc xá</span>
				</div>
				<div class="content__duoi">
					<div class="content__duoi-menu">
						<h3 class="content__duoi-link">Chỉnh sửa thông tin tài khoản nhân viên</h3>
						<?php 
							if(isset($data['thongbao'])){
								if($data['thongbao']=="Sửa thành công")
									echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
									else
									echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
							}
							// echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                    	?>	
						</div>
                        <?php
                            while($r=mysqli_fetch_array($data['kqtk'])){
                        ?>
						<div class="content__duoi-inputthem">
							<span class="content__duoi-tieude" >ID</span>
							<input type="text" name="txtId" class="content__duoi-them" value="<?php echo $r['Id']; ?>" readonly>
							<span class="content__duoi-tieude">Danh sách nhân viên</span>
							<input type="text" name="txtManv" class="content__duoi-them"value="<?php echo $r['Manv']; ?>" readonly>
							
							<span class="content__duoi-tieude">Tên đăng nhập</span>
							<input type="text" name="txtTendangnhap" class="content__duoi-them" value="<?php echo $r['Tendangnhap']; ?>" >

							<span class="content__duoi-tieude">Mật khẩu </span>
							<input type="text" name="txtMatkhau" class="content__duoi-them" value="<?php echo $r['Matkhau']; ?>">
							
							<span class="content__duoi-tieude">Xác nhận mật khẩu</span>
							<input type="text" name="txtXacnhan" class="content__duoi-them" value="<?php if(isset($data['nlmk'])) echo $data['nlmk']; ?>">

							<input type="submit" name="btnThemmoi" value="Cập nhập" class="btn">
							<input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
						</div>
                        <?php
                            }
                        ?>
					</div>
</form>