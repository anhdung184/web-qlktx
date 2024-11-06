<?php
	$user=  $_SESSION['User'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/QLKT_API_MVC/Public/CSS/Button.css">
	<title></title>
    <style type="text/css">
      .file{
			position: relative;
			width: 70%;
		    display: inline-block;
		    line-height: 36px;
		    color: #495057;
		    background-color: #fff;
		    border: 1px solid #ced4da;
		    border-radius: 0.25rem;
		    line-height: 36px;
		    padding-left: 12px;
		    overflow: hidden;
		}
		.file::after{
			    content: "";
		    position: absolute;
		    right: 0px;
		    top: -2px;
		    bottom: 0px;
		    width: 83px;
		    background: #ced4da;
		    cursor: pointer;
		}
		.Browse{
			    top: 0px;
		    right: 0px;
		    bottom: 0;
		    position: absolute;
		    padding: 0px 15px;
		    background-color: var(--white-color);
		    /* color: var(--primary-color); */
		    font-size: 1rem;
		    line-height: 36px;
		    z-index: 1;
		}
		.content__duoi-inputthem {
            justify-content: center;
			    display: flex;
			}
            .content__duoi {
               
                min-height: 1vh;
               
            }
            .xem__DS{
                display:flex;
                justify-content: center;
                padding-bottom:20px; ;
            }
            .btn-5{
                background: linear-gradient(0deg, rgb(87 225 217) 0%, rgb(187 199 155) 100%);
            }
            .btn-3{
                background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgb(80 96 114) 100%);
            }
    </style>
    
</head>
<form method="post" enctype="multipart/form-data" action="http://localhost/QLKT_API_MVC/DSNhanvienFile/nhanvien_ins_file" >
<div class="content__bando">
					<span class="content__bando-tieude">Updete danh sách nhân viên kí túc xá</span>
				</div>
				<div class="content__duoi">
					<div class="content__duoi-menu">
						<h3 class="content__duoi-link">Updete danh sách nhân viên</h3>
							
						</div>
						<div class="content__duoi-inputthem">
							
							<input type="file" name="file" id="inputGroupFile04" hidden="">
							<label  class="file" for="inputGroupFile04">Select file <span class="Browse">Browse</span></label>
							
							<button class="custom-btn btn-5 width"  type="submit" name="btnInexcle" > 
										<span  > 
										  Updete</span>
										</button>
                                             
						</div>
                        <div class="xem__DS" >
						<a href="http://localhost/QLKT_API_MVC/DSNhanvien" >  
                         <span  > Xem danh sách</span> </a>
                        </div>
                           
					</div>

				</div>

			</div>
		
	</form>