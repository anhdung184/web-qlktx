<form method="POST" action="http://localhost/QLKT_API_MVC/Themtaikhoan/ThemmoiTaikhoan">
                <div class="content__bando">
					<span class="content__bando-tieude">Thêm tài khoản nhân viên kí túc xá</span>
				</div>
				<div class="content__duoi">
					<div class="content__duoi-menu">
						<h3 class="content__duoi-link">Thêm tài khoản nhân viên</h3>
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
						<div class="content__duoi-inputthem">
							<span class="content__duoi-tieude">ID</span>
							<?php
								$i=0;
								if(isset($data['kq2'])){
								while($row=mysqli_fetch_assoc($data['kq2'])){
									$i++;
								}
							}
								$i=$i+1;
								$chuoi=str_pad($i,5,"0",STR_PAD_LEFT);
							?>
							<input type="text" name="txtId" class="content__duoi-them"  value="<?php if(isset($data['id'])) echo $data['id']; else echo $chuoi; ?>">
							<span class="content__duoi-tieude">Danh sách nhân viên</span>
							<select class="content__duoi-them " style="height: 25px; width:100%;    height: calc(1.5em + 0.75rem + 4px);" name="ddlManv">
                                        
                            <option value="">--Chọn nhân viên--</option>
                                <?php
                                    while($row=mysqli_fetch_assoc($data['kq'])){
										
                                        if(isset($data['manv'])){
                                            if($row['Manv']==$data['manv']){
                                                  echo '<option value='.$row['Manv'].' selected >'.$row['Manv'].'</option>';
                                            }
                                            else{
                                                echo '<option value='.$row['Manv'].' >'.$row['Manv'].'</option>';
                                            }
                                        }
                                        else{
                                        echo '<option value='.$row['Manv'].'>'.$row['Manv'].'</option>';
                                        }
                                    
                                    }
                                ?>
                            </select>
						
							<span class="content__duoi-tieude">Tên đăng nhập</span>
							<input type="text" name="txtTendangnhap" class="content__duoi-them" value="<?php if(isset($data['tdn'])) echo $data['tdn']; ?>">
							
							
						
							<span class="content__duoi-tieude">Mật khẩu </span>
							<input type="text" name="txtMatkhau" class="content__duoi-them" value="<?php if(isset($data['mk'])) echo $data['mk']; ?>">
							
							<span class="content__duoi-tieude">Xác nhận mật khẩu</span>
							<input type="text" name="txtXacnhan" class="content__duoi-them" value="<?php if(isset($data['nlmk'])) echo $data['nlmk']; ?>">

							<input type="submit" name="btnThemmoi" value="Thêm mới" class="btn">
                            <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
							<input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
						</div>
					</div>
</form>