<form method="POST" action="http://localhost/QLKT_API_MVC/DSNhanvien/Sua_nhanvien">


				
<div class="content__bando">
    <span class="content__bando-tieude">Sửa thông tin nhân viên kí túc xá</span>
</div>
<div class="content__duoi">
    <div class="content__duoi-menu">
        <h3 class="content__duoi-link">Chỉnh sửa thông tin nhân viên</h3>
        <?php
        if(isset($data['thongbao'])){
            if($data['thongbao']=="Sửa thất bại")
                echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                else
                echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
        }
        
        ?>
    </div> 
    <?php
        foreach ($data['kqtk']as $r){
    ?>
    <div class="content__duoi-inputthem">
							<span class="content__duoi-tieude">Mã nhân viên</span>
							<input type="text" name="txtManv" class="content__duoi-them" value="<?php echo $r['Manv']; ?>">
							<span class="content__duoi-tieude">Họ và tên</span>
							<input type="text" name="txtHoten" class="content__duoi-them" value="<?php echo $r['Hoten']; ?>">
							<span class="content__duoi-tieude">Ngày sinh</span>
							<input type="date" name="txtNgaysinh" class="content__duoi-them"  value="<?php 
							$dateString = $r['Ngaysinh'];
							$date = date_create_from_format("Y-m-d\TH:i:s.u\Z", $dateString);
							echo date_format($date, "Y-m-d");
							 ?>">
							
							<span class="content__duoi-tieude">Giới tính</span>
                                <div class="gender   ">
                                    <label for="Nam" ><input type="radio" name="gender" value="Nam" id="Nam" class=" genderfs"  
                                    <?php 
                                        if($r['Gioitinh']=='Nam') echo 'checked=""';
                                    
                                    ?>> Nam</label>
                                    <label for="Nu" ><input type="radio" name="gender" value="Nữ" id="Nu" class="gendermr genderfs"
                                    <?php 
                                        if($r['Gioitinh']=='Nữ') echo 'checked=""';
                                    
                                    ?>
                                    > Nữ</label>
                                    <label for="Khac" ><input type="radio" name="gender" value="Khác" id="Khac" class="gendermr genderfs"
                                    <?php 
                                        if($r['Gioitinh']=='Khác') echo 'checked=""';
                                    
                                    ?>
                                    > Khác</label>
                                </div>

						
							<span class="content__duoi-tieude">Số điện thoại</span>
							<input type="text" name="txtSdt" class="content__duoi-them" value="<?php echo $r['Sdt']; ?>">
							<span class="content__duoi-tieude">Chức vụ</span>
                            <select class="content__duoi-them"style="height: 25px; width:100%;    height: calc(1.5em + 0.75rem + 4px);" name="ddlChucvu">
                                <option value="Nhân viên" 
                                <?php if(isset($r['Chucvu'])){
                                    if($r['Chucvu']=='Nhân viên') echo 'selected';
                                } 
                                ?> >Nhân viên</option>
                                <option value="Quản lý" 
                                <?php if(isset($r['Chucvu'])){
                                    if($r['Chucvu']=='Quản lý') echo 'selected';
                                } 
                                ?>>Quản lý</option>
                                <option value="Giám đốc" 
                                <?php if(isset($r['Chucvu'])){
                                    if($r['Chucvu']=='Giám đốc') echo 'selected';
                                } 
                                ?>>Giám đốc</option>
                             </select>
							<span class="content__duoi-tieude">Quê quán</span>
							<input type="text" name="txtQuequan" class="content__duoi-them" value="<?php echo $r['Quequan']; ?>">

							<input type="submit" name="btnLuu" value="Cập nhập" class="btn">
							<input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
						</div>
    <?php
        }
    ?>
</div>






</form>