
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
					*{
				padding: 0;
				margin: 0;
				box-sizing: border-box;
			}
			:root{
				--while-color: #fff;
				--black-color: #000;
			    --text-color: #333; 
			}
			.header{
				width: 100%;
				height: 160px;
				background: #003d71;
			}
			.header_navbar{
				height: 102px;
				display: flex;
				justify-content: space-between;
			}
			.navbar-img{
				width: 150px;
				height: 100%;
                float: left;
			}
            .navbar-txt{
                width: 500px;
                color: #fe6433;
            }
			.navbar_list-item{
				list-style: none;
				color: var(--while-color);
				display: inline-block;
				margin: 4px 10px;
				cursor: pointer;
			}
			.header_menu{
				height: 58px;
				display: flex;
				/* justify-content: center; */
				background-color: #fe6433;
			}
			.header_menu-list{
				list-style: none;
				display: flex;
				height: 100%;
				align-items: center;
			}
			.menu-list-link{
				color: var(--while-color);
				margin: 0 40px;
				display: block;
			}
			.header_menu-list:hover,
			.menu-list-link:hover{
				background: #ec593c;
				cursor: pointer;
			}
            .left{
				float: left;
                height: 455px;
                width: 150px;
                background: #4caf50;
            }
            .left_content-list{
                display:flex;
                list-style: none;
                justify-content: center;
                width: 100%;
                padding: 20px 0px;
                border-bottom: 1px solid var(--text-color);
            }
            .left_content-link{
                color: var(--while-color);
                display: block;
                text-align: center;
                text-decoration: none;
            }
            .left_content-list:hover,
            .left_content-link:hover{
            background: #65c069;
            }
            .content{
				display: flex;
				justify-content: center;
			}
	</style>
</head>
<body>
	<div class="header">
		<div class="header_navbar">
			<ul class="navbar_list">
				<li><img src="http://localhost:8080/TT24_MVC/Public/IMG/logoUTT.png" alt="" class="navbar-img">
                <span class="navbar-txt">BỘ GIAO THÔNG VẬN TẢI</span>
                <h2 class="navbar-txt">ĐẠI HỌC CÔNG NGHỆ GTVT</h2>
                <span class="navbar-txt">UNIVERSITY OF TRANSPORT TECHNOLOGY</span>
                </li>
			</ul>
			<ul class="navbar_list">
				<li class="navbar_list-item">Đăng nhập</li>
				<li class="navbar_list-item">Đăng xuất</li>
			</ul>
		</div>
		<div class="header_cap">
			 <ul class="header_menu">
				<li class="header_menu-list"><a class="menu-list-link">Home</a></li>
				<li class="header_menu-list"><a class="menu-list-link">About</a></li>
				<li class="header_menu-list"><a class="menu-list-link">Services</a></li>
				<li class="header_menu-list"><a class="menu-list-link">Work</a></li>
				<li class="header_menu-list"><a class="menu-list-link">Team</a></li>
				<li class="header_menu-list"><a class="menu-list-link">Contact</a></li>

			</ul> 
		</div>
	</div>
    <div class="left">
        <ul class="left_content">
            <li class="left_content-list">
                <a href="" class="left_content-link">Services 1</a>
            </li>
            <li class="left_content-list">
                <a href="" class="left_content-link">Services 2</a>
            </li>
            <li class="left_content-list">
                <a href="" class="left_content-link">Services 3</a>
            </li>
            <li class="left_content-list">
                <a href="" class="left_content-link">Services 4</a>
            </li>
        </ul>
    </div>
	<div class="content">
			<?php 
			include_once './MVC/Views/Page/'.$data['page'].'.php';
			?>
    </div>
        


</body>
</html>