<?php
	$user=  $_SESSION['User'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/TrangchuLogin.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/CapnhapSV.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/DSSinhvien.css">


	
	<title></title>
	<style type="text/css">
	.lopphu{
			position: fixed;
			top:0;
			height: 100vh;
			width: 100vw;
			background: rgba(0,0,0,0.6);
		}
		.thongbao{
			width: 400px;
			position: relative;
			top:30%;
			margin: auto;
			background: white;
			border-radius: 5px;
			overflow: hidden;
		}
		.thongbao_header{
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 15px;
			background: #e26e70;
			color: white;

		}
		.thongbao_body{
			padding: 15px;
		}
		.thongbao_footer{
			padding: 15px;
			text-align: right;
		}
		.thongbao_text{
			margin-top: 5px;
		}
		.btnthongbao{
			padding: 10px 20px;
			color: white;
			background: #e26e70;
			border-radius: 5px;
			border: none;
			outline: none;
			cursor: pointer;
		}
		.hide{
			display: none;
		}
		.content__menu {
    display: none;
   
}
.content__hienthi {
  width: 100%;
}
	</style>
</head>
<body>
	<div class="app">
		<div class="header">
			<div class="header__logo">
				<span class="header__logo-chu">UTT</span>
			</div>
			<div class="header__right">
				<ul class="header__right-list">
					<li id="thanhmenu" class="header__right-item header__right-hover"><span href="" class="header__right-link "><i class="header__right-icon menu-icon fa-solid fa-bars"></i></span></li>
					
				</ul>
				
				<ul class="header__right-list header__right-uers">	
					
					<li class="header__right-item header__right-uers"><a href=""class="header__right-link"><i class="header__right-icon fa-solid fa-user"> </i> <?php  echo '<span style="color:#ffffff;font-size:1rem;margin-left: -12px;">'.$user['Hoten'].'</span>';
					?></a></li>
				</ul>
				
			</div>
		</div>
		<div class="content">
			<div class="content__menu" id="ulmenu">
				<ul class="content__menu-list">
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/Trangchu" class="content__menu-link"><i class="content__menu-icon fa-solid fa-house"></i>Trang chủ</a></li>
					<li class="content__menu-item content__menu-item-bao">
						<label for="checkbox">
						<span  class="content__menu-link"><i class="content__menu-icon fa-sharp fa-solid fa-list-check"></i>Quản lý danh mục  <i class="content__menu-icon-right content__menu-icon-xoay fa-solid fa-chevron-right"></i></span>
					</label>
						

					</li>
					<input type="checkbox" name="" hidden="" id="checkbox" class="checkbox__input">
					
					<ul  class="content__quanlydm">
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSNhanvien" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý nhân viên</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSSinhvien" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý sinh viên</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSTaikhoan" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý tài khoản</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSPhong" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý phòng</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSHopdong" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý hợp đồng</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSHoadon" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý hóa đơn dịch vụ</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_API_MVC/DSHoadonphong" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý hóa đơn phòng</a></li>
						</ul>
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/ThemHopdong" class="content__menu-link"><i class="content__menu-icon fa-solid fa-pen"></i>Đăng kí phòng</a></li>
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/DSTaikhoan" class="content__menu-link"><i class="content__menu-icon fa-solid fa-people-roof"></i>Quản trị hệ thống<i class="content__menu-icon-right fa-solid fa-chevron-right"></i></a></li>
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/HDDNchuathanhtoan" class="content__menu-link"><i class="content__menu-icon fa-solid fa-chart-simple"></i>Thống kê HDDN chưa TT</a></li>
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/HDPchuathanhtoan" class="content__menu-link"><i class="content__menu-icon fa-solid fa-chart-simple"></i>Thống kê HDP chưa TT</a></li>
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/Sapxepsv" class="content__menu-link"><i class="content__menu-icon fa-solid fa-chart-simple"></i>Sắp xếp sv</a></li>
					<li class="content__menu-item"><a href="http://localhost/QLKT_API_MVC/Login" class="content__menu-link"><i class="content__menu-icon fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a></li>
				</ul>
			</div>
			
				<div class="content__hienthi" id="hienthi" >
				
				<?php 
					 if(isset($data['page']))
					include_once './MVC/Views/Page/'.$data['page'].'.php';
					?>
			</div>
			
		</div>
		
	</div>
	<script type="text/javascript">
		
		var header= document.getElementById('thanhmenu');
		// Lấy qua class
		// var mobileMenu=document.getElementsByClassName("mobile-menu-btn");
		var Menu=document.getElementById('ulmenu');
		var Hienthi=document.getElementById('hienthi');
		var  MenuWidth=Menu.clientWidth  ;
		
		header.onclick=function() {
			console.log(Menu.clientWidth);
			console.log(MenuWidth);
			
			if(Menu.clientWidth === MenuWidth){
				Menu.style.display='block';
				document.getElementById('hienthi').style.width='calc(100% - 250px)';
			}else{
				Menu.style.display='none';
				document.getElementById('hienthi').style.width='100%';
			}
			
		}

	</script>
	<div class="lopphu hide " id="dong">
		<div class="thongbao">
			<div class="thongbao_header">
			<p>Thông báo</p>
			
			<a href="http://localhost/QLKT_API_MVC/DSHopdong" style="text-decoration: none;"><i class="fa-solid fa-xmark"></i></a>
		</div>
		<div class="thongbao_body">
			<p>Bạn vẫn nợ tiền phòng.</p>
			<p class="thongbao_text">Vui lòng thanh toán trước khi kết thúc hợp đồng!</p>
		</div>
		<div class="thongbao_footer">
		<a href="http://localhost/QLKT_API_MVC/ThemHoadonphong"><button class="btnthongbao btnThanhtoan">Thanh toán</button></a>
			<a href="http://localhost/QLKT_API_MVC/DSHopdong"><button class="btnthongbao btnHuy">Huỷ</button></a>
			
		</div>
		</div>
	</div>
	<!-- <script type="text/javascript">
						var btnMo=document.querySelector('.btnHien');
						var modal=document.querySelector('.lopphu');
						console.log( btnMo );
						var btnThanhtoan=document.querySelector('.btnThanhtoan');
						var btnHuy=document.querySelector('.btnHuy');
						var iconClose=document.querySelector('.thongbao_header i');

						
						// btnMo.onclick = function mothongbao(){
						// 	modal.classList.toggle('hide');
						// }
						modal.onclick = function mothongbao(){
							modal.classList.toggle('hide');
						}
						btnMo.addEventListener('click',mothongbao());
						iconClose.addEventListener('click',mothongbao());
						btnHuy.addEventListener('click',mothongbao());
						modal.addEventListener('click',mothongbao());
					</script> -->
</body>
</html>

