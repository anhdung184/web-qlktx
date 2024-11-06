

        <form method="POST" action="http://localhost/QLKT_API_MVC/ThemSinhvien/ThemmoiSinhvien">


				
<div class="content__bando">
    <span class="content__bando-tieude">Thêm thông tin sinh viên kí túc xá</span>
</div>
<div class="content__duoi">
    <div class="content__duoi-menu">
        <h3 class="content__duoi-link">Thêm thông tin sinh viên</h3>
        <?php
        if(isset($data['thongbao'])){
            if($data['thongbao']=="Sửa thất bại")
                echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                else
                echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
        }
        
        ?>
    </div>
    <!-- 'masv'=>$masv,
                            'tsv'=>$tsv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            'l'=>$l,
                            'sdt'=>$sdt,
                            'dc'=>$dc, -->
    
    <div class="content__duoi-inputthem">
        <span class="content__duoi-tieude">Mã Sinh viên</span>
        <input  type="text" name="txtMasv" class="content__duoi-them" value="<?php if(isset($data['masv'])) echo $data['masv'];  ?>" >
        <span class="content__duoi-tieude">Họ và tên</span>
        <input type="text" name="txtHoten" class="content__duoi-them"  value="<?php if(isset($data['tsv'])) echo $data['tsv'];  ?>">
        <span class="content__duoi-tieude">Ngày sinh</span>
        <input type="date" name="txtNgaysinh" class="content__duoi-them"  value="<?php if(isset($data['ngs'])) echo $data['ngs'];   ?>">
        
        <span class="content__duoi-tieude">Giới tính</span>
        <div class="gender   ">
            <label for="Nam" ><input type="radio" name="gender"  checked="" value="Nam" id="Nam" class=" genderfs"  
            <?php if(isset($data['gt'])){
              if($data['gt']=='Nam') echo 'checked=""';
              } 
            ?>
            > Nam</label>
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
        <span class="content__duoi-tieude">Lớp</span>
        <input type="text" name="txtLop" class="content__duoi-them" value="<?php if(isset($data['l'])) echo $data['l']; ?>">
        <span class="content__duoi-tieude">Số điện thoại</span>
        <input type="text" name="txtSdt" class="content__duoi-them" value="<?php if(isset($data['sdt'])) echo $data['sdt']; ?>">
        <span class="content__duoi-tieude">Quê quán</span>
        <input type="text" name="txtQuequan" class="content__duoi-them" value="<?php if(isset($data['dc'])) echo $data['dc']; ?>">
        <input type="submit" name="btnThemmoi" value="Thêm mới" class="btn">
        <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
        <input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
    </div>
   
</div>






</form>

