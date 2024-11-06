
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
		.cotsv-1,.cotsv-2,.cotsv-3,.cotsv-4,.cotsv-5,.cotsv-6,.cotsv-7,.cotsv-8{
		    padding: 0 10px;
			min-width: 100px;
		}
		.content__duoi {
    	overflow-x: auto;
		}
		.cotsv-5,.cotsv-6,.cotsv-7{
			min-width: 130px;
		}
		.cotsv-8{
		    min-width: 150px;
		}
		.cotcn{
			min-width: 88px;
		}
      
	</style>
    <style type="text/css">
	.lopphu{
			position: fixed;
			top:0;
			height: 100vh;
			width: 100vw;
			/* background: rgba(0,0,0,0.6); */
		}
		.thongbao{
			width: 400px;
			position: relative;
			top:50%;
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
            <?php 
                if($data['kqhd']){
                    echo'display: block;';
                }else{
                    echo'display: none;';
                }
                
                ?>
			
		}
        .thongbao{
			
			top:30%;
			
		}

	</style>
	<title></title>
</head>
<form method="post" action="">
<div class="content__bando">
						<span class="content__bando-tieude">Danh sách hợp đồng kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="http://localhost/QLKT_API_MVC/ThemHopdong_SV" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm hơp đồng</a></li>
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
										
									<th class="cotsv-1">Mã HĐ</th>
										<th class="cotsv-5">Mã SV</th>
										<!-- <th class="cotsv-8">Tên sinh viên</th> -->
										<th class="cotsv-2">Phòng</th>
										<th class="cotsv-8">Người lập</th>
										<th class="cotsv-2">Ngày lập</th>
										<th class="cotsv-2">Ngày đến</th>
										<th class="cotsv-7">Ngày hết hạn</th>
										<th class="cotsv-1">Tiền phòng</th>
										<th class="cotsv-1">Tiền cọc</th>
										<th class="cotsv-7">Tình trạng</th>
										<th class="cotcn">Chức năng</th>
									</tr>
									<?php
									$i=1;
										while($row=mysqli_fetch_assoc($data['kqtk'])){
									?>
										<tr>
											
										<td><?php echo $row['Mahd'] ?></td>
											<td><?php echo $row['Masv'] ?></td>
											<td><?php echo $row['Maphong'] ?></td>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php echo $row['Ngaylap'] ?></td>
											<td><?php echo $row['Ngayden'] ?></td>
											<td><?php echo $row['Ngayhethan'] ?></td>
											<td><?php echo $row['Tienphong'] ?></td>
											<td><?php echo $row['Tiencoc'] ?></td>
											<td><?php echo $row['Tinhtrang'] ?> </td>
											<td>
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSHopdong/suahopdong/<?php echo $row['Mahd'] ?>">
												<input type="button" class="btnHien" name="btnKetthuc" value="Sửa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
										
												<a style="text-decoration: none;" href="http://localhost/QLKT_API_MVC/DSHopdong/Xoa_hopdong/<?php echo $row['Mahd'] ?>">
												<input type="button" name="btnXoa" value="Xóa" style="margin: 5px; padding: 3px; background-color: #5cb1e3;border: none;">
											</a>
											</td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
                    <!-- <div class="lopphu hide " id="lopphuid">
		<div class="thongbao">
			<div class="thongbao_header">
			<p>Thông báo</p>
			<i class="fa-solid fa-xmark"></i>
		</div>
		<div class="thongbao_body">
			<p>Bạn vẫn nợ tiền phòng.</p>
			<p class="thongbao_text">Vui lòng thanh toán trước khi kết thúc hợp đồng!</p>
		</div>
		<div class="thongbao_footer">
			<button class="btnthongbao btnThanhtoan">Thanh toán</button>
			<button class="btnthongbao btnHuy">Huỷ</button>
		</div>
		</div>
	</div> -->
				<!-- <script type="text/javascript">
						var btnMo=document.querySelector('.btnHien');
						var modal=document.getElementsByClassName('hide');
						// console.log( modal );
						var btnThanhtoan=document.querySelector('.btnThanhtoan');
						var btnHuy=document.getElementsByClassName('btnHuy');
						var iconClose=document.querySelector('.thongbao_header i');
                        var header= document.getElementById('dong');
						console.log(btnHuy );
                        var Menu=document.getElementById('lopphuid');
		                var Hienthi=document.getElementById('hienthi');
                        var element = document.getElementById("dong");
                            console.log(element);
                            console.log(Menu);
                            console.log(Hienthi);
						btnMo.onclick = function mothongbao1(){
							modal.classList.toggle('hide');
						}
						btnHuy.onclick = function mothongbao22(){
							// modal.style.display='none';
                            Menu.style.display='none';
						}
                        btnHuy.onclick = function addClass() {
                            let element = document.getElementById('dong');
                            console.log(element);
                            /* thêm class bằng className */
                            element.className = 'title';
                        }
                       
						// btnMo.addEventListener('click',mothongbao());
						// iconClose.addEventListener('click',mothongbao());
						// btnHuy.addEventListener('click',mothongbao());
						// modal.addEventListener('click',mothongbao());
					</script> -->
</form>

