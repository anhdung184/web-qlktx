<form method="POST" action="http://localhost/QLKT_API_MVC/ThemNhanvien/ThemmoiNhanvien">


				
<div class="content__bando">
    <span class="content__bando-tieude">Thêm nhân viên kí túc xá</span>
</div>
<div class="content__duoi">
    <div class="content__duoi-menu">
        <h3 class="content__duoi-link">Thêm nhân viên kí túc xá</h3> 
        <?php
        if(isset($data['thongbao'])){
            if($data['thongbao']=="Sửa thất bại")
                echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                else
                echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
        }
        
        ?>
    </div>
    <div class="content__duoi-inputthem">
							<span class="content__duoi-tieude">Mã nhân viên</span>
							<input type="text" name="txtManv" class="content__duoi-them" value="<?php if(isset($data['manv'])) echo $data['manv']; ?>">
							<span class="content__duoi-tieude">Họ và tên</span>
							<input type="text" name="txtHoten" class="content__duoi-them" value="<?php if(isset($data['tnv'])) echo $data['tnv']; ?>">
							<span class="content__duoi-tieude">Ngày sinh</span>
							<input type="date" name="txtNgaysinh" class="content__duoi-them" value="<?php if(isset($data['ngs'])) echo $data['ngs']; ?>">
							
							<span class="content__duoi-tieude">Giới tính</span>
                                <div class="gender   ">
                                    <label for="Nam" ><input type="radio" name="gender" value="Nam" checked="" id="Nam" class=" genderfs"  
                                    <?php if(isset($data['gt'])){
                                    if($data['gt']=='Nam') echo 'checked=""';
                                      } 
                                    ?>> Nam</label>
                                    <label for="Nu" ><input type="radio" name="gender" value="Nữ" id="Nu" class="gendermr genderfs"
                                    <?php if(isset($data['gt'])){
                                    if($data['gt']=='Nữ') echo 'checked=""';
                                      } 
                                    ?>
                                    > Nữ</label>
                                    <label for="Khac" ><input type="radio" name="gender" value="Khác" id="Khac" class="gendermr genderfs"
                                    <?php if(isset($data['gt'])){
                                    if($data['gt']=='Khác') echo 'checked=""';
                                      } 
                                    ?>
                                    > Khác</label>
                                </div>

						
							<span class="content__duoi-tieude">Số điện thoại</span>
							<input type="text" name="txtSdt" class="content__duoi-them" value="<?php if(isset($data['sdt'])) echo $data['sdt']; ?>">
							
                            <span class="content__duoi-tieude">Quê quán</span>
							<input type="text" name="txtQuequan" class="content__duoi-them" value="<?php if(isset($data['dc'])) echo $data['dc']; ?>">
                            <span class="content__duoi-tieude">Chức vụ</span>
                            <select class="content__duoi-them"style="height: 25px; width:100%;    height: calc(1.5em + 0.75rem + 4px);" name="ddlChucvu">
                                <option value="Nhân viên" 
                                <?php if(isset($data['cv'])){
                                    if($data['cv']=='Nhân viên') echo 'selected';
                                } 
                                ?> >Nhân viên</option>
                                <option value="Quản lý" 
                                <?php if(isset($data['cv'])){
                                    if($data['cv']=='Quản lý') echo 'selected';
                                } 
                                ?>>Quản lý</option>
                                <option value="Giám đốc" 
                                <?php if(isset($data['cv'])){
                                    if($data['cv']=='Giám đốc') echo 'selected';
                                } 
                                ?>>Giám đốc</option>
                             </select>
							

							<input type="submit" name="btnThemmoi" value="Thêm mới" class="btn">
                            <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
							<input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
						</div>
    
</div>






</form>