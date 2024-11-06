<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/Login.css">
	
    <title>Document</title>
</head>
<body>
<form method="post" action="./Login/Login">
    <div class="login">
		<div class="login__left">
			
		</div>
		<div class="login__right">
			<div class="login__right-list">

				<img class="login__right-logo" src="https://utt.edu.vn/publics/template/default/img/logo-utt.png">
				
					<?php
					if(isset($data["result"])){
						if($data["result"]=="true"){

						}
						else{ ?>
							<h3 style="font-size: 1.6rem">
								<?php
								echo "Tên đang nhập không tồn tại.
								Vui lòng kiểm tra lại."
								?>
							</h3>
						<?php }
					}
					?>
				
				<h2 class="login__right-quyen">Dành CHO QUẢN LÝ</h2>
				<input type="text" name="txtTendangnhap" required="" placeholder="Tên đăng nhập" class="login__right-input">
				<input type="text" name="txtMatkhau" required="" placeholder="Mật khẩu" class="login__right-input">
				<div class="login__right-baolink">
					<label for="huongdan__check"><span class="login__right-link login__right-mess ">Xem hướng dẫn</span></label>
					
					<a href="" class="login__right-link">Quên mật khẩu</a>
				</div>
				<input type="checkbox" name=""  id="huongdan__check" class="huongdan__click-input">
				<label for="huongdan__check" class="baotrum"></label>
				<div class="huongdan">
					<div class="huongdan-header">
						<h5 class="huongdan-title" >Hướng dẫn đăng nhập</h5>
						<label for="huongdan__check"  class="close" >
							<span>×</span>
						</label>
					</div>
					<div class="huongdan__message">
						<span class="huongdan__message-inline">
							<h3 style="margin-bottom: 15px;">Hướng dẫn đăng nhập</h3>
							<p>
								1. Sinh viên, học viên đăng nhập bằng cách:<br>
								 - Sử dụng tài khoản Sinh viên (tại trang <a href="https://student.ueh.edu.vn" target="_blank">https://student.ueh.edu.vn</a>) để đăng nhập.<br>
								 - Sử dụng Email UEH (@st.ueh.edu.vn) để đăng nhập.<br>
								2. Lưu ý:<br>
								 - Quên mật khẩu tài khoản Sinh viên: <a href="https://loginst.ueh.edu.vn/Account/ForgotPassword" target="_blank">tại đây</a>.<br>
								 - Quên mật khẩu tài khoản Email ST: <a href="https://cntt.ueh.edu.vn/Email" target="_blank">tại đây</a>.<br>
								 - Quên cả mật khẩu tài khoản Sinh viên và Email:<br>
								  + Người học hiện tại liên hệ các đơn vị quản lý đào tạo phụ trách (Phòng Đào tạo/Phòng Đào tạo thường xuyên/Viện Đào tạo Sau đại học)<br>
								  + Cựu người học liên hệ Phòng Chăm sóc và hỗ trợ người học (DSA) - 028 7306 1976 ext 1007 &amp; 1009 - dsa@ueh.edu.vn<br>
							</p>
						</span>
					</div>
				</div>
				<button class="login__right-btn" type="submit" name="btnDanhnhap" >ĐĂNG NHẬP</button>
				
			</div>
		</div>
		
	</div>
    </form>
</body>
</html>