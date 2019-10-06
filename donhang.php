<?php 
	session_start();
	$user=$_SESSION['username'];
	
	$conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('{error:"bad_request"}');
	if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
	$thongtin = array(
				'MaNguoiDung' => '',
				'HoTen' => '',
				'TenDangNhap' =>'',
				'MatKhau' => '',
				'Sdt'=> '',
				'Email'=> ''
				);
	if ($user)
	{
		$sql='select * from khachhang where tendn = "'.  addslashes($user).'"';
		$result = $conn->query($sql);

		if ($result->num_rows>0){
			while($row = $result->fetch_assoc())
			{
				$thongtin = array(
				'makh' => $row['makh'],
				'HoTen' => $row['hoten'],
				'TenDangNhap' =>$row['tendn'],
				'MatKhau' => $row['mk'],
				'Sdt'=> $row['sdt'],
				'Email'=> $row['email']
				);
			}
		}
		else{
			die ('{error:"bad_request"}');
		}
	}

	$sql1 = 'select * from hoadon where taikhoannguoidung="'.$thongtin['TenDangNhap'].'" and trangthai like "%Chưa%Giao%"';
	$thongtindathang = array(
				'mahd' =>'',
				'taikhoannguoidung' =>'',
				'ngaydathang' =>'',
				'tongtien' =>'',
				'diachigiaohang'=>'',
				'hinhthucvanchuyen'=>'',
				'hinhthucthanhtoan' =>'',
				'trangthai' =>''
	);
	$result1 = $conn->query($sql1);
	if ($result1->num_rows>0){
			while($row = $result1->fetch_assoc())
			{
				$thongtindathang = array(
				'mahd' => $row['mahd'],
				'taikhoannguoidung' => $row['taikhoannguoidung'],
				'ngaydathang' =>$row['ngaydathang'],
				'tongtien' => $row['tongtien'],
				'diachigiaohang'=> $row['diachigiaohang'],
				'hinhthucvanchuyen'=> $row['hinhthucvanchuyen'],
				'hinhthucthanhtoan' => $row['hinhthucthanhtoan'],
				'trangthai' => $row['trangthai']
				);
			}
		}
		else{
			
		}
	$sql2 = 'select * from chitiethoadon join sanpham on chitiethoadon.masp = sanpham.masp where mahd="'.$thongtindathang['mahd'].'"';
	
	$result2 = $conn->query($sql2);
	$thongtinctdathang = array();
	if ($result2->num_rows>0){
			while($row = $result2->fetch_assoc())
			{
				$thongtinctdathang[] = array(
				'mahd' => $row['mahd'],
				'masp' => $row['masp'],
				'soluong' =>$row['soluongmua'],
				'gia' => $row['gia'],
				'thanhtien'=> $row['thanhtien'],
				'tensanpham' => $row['tensp'],
				'hinh' => $row['hinh1']
				
				);
			}
		}
		else{
			
		}

 ?>
 <html>
<head>
<meta charset="utf-8">
<title>Đơn Hàng</title>
	<link rel="shortcut icon" href="Image/favicon.png">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/showsanpham.css">
    <link rel="stylesheet" href="swipper/css/swiper.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> <!--thu vien hinnh anh icon-->
<style>
		.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
		.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
		
		
			.shipping-header {
			padding-top: 25px;
			padding-bottom: 15px;
			background: #f8f8f8;
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
			box-shadow: 0 1px 2px rgba(0,0,0,.2);
		}
		.h5, h5 {
			font-size: 14px;
		}
		.h3 {
			margin-top: 20px;
			margin-bottom: 10px;
		}
		.panel-body {
			padding: 15px;
		}
		.name {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 5px;
}
		.address .address-item {
    font-size: 13px;
    margin-bottom: 3px;
}
		.panel {
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
		.panel-default {
    border-color: #ddd;
}
	
	.tiki-shipping .wrap .address-item .is-default {
    border: 1px dashed #090;
}
		.tiki-shipping .wrap .address-item.is-default .default {
    position: absolute;
    top: 10px;
    right: 15px;
    display: block;
    font-size: 11px;
    color: #090;
}
	</style>
</head>
<body>
 <div class="container"> 
			<div class="container"><?php include("header1.php");?></div><hr class="hr"/>
			<div class="row">Đơn Hàng Của Bạn</div>
			<div class="row">
					<div class="col-md-6">
					<h4>Hình thức giao hàng</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default is-default">
								<div class="panel-body">
									<div><?php echo $thongtindathang['hinhthucvanchuyen']; ?></div>
								</div>
							</div>
						</div>
					</div>
					<h4>Hình thức thanh toán</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div><?php echo $thongtindathang['hinhthucthanhtoan']; ?></div>
								</div>
							</div>
						</div>
					</div>
					<br>
					
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<br>
					<div class="panel panel-default is-default">
						<div class="panel-body">
							<p class="name">Họ và tên : <?php echo $thongtin['HoTen']; ?></p>
						<p class="address">Điện thoại: <?php echo $thongtin['Sdt']; ?></p>
						<p class="address">Địa Chỉ Giao Hàng: <span id="diachi"><?php echo $thongtindathang['diachigiaohang']; ?></span></p>
						</div>
					</div>
				</div>
		
	    </div>
	    <?php 

			if( $thongtinctdathang!=null)
			{
				echo '
				<form method="post" action="capnhatsoluonggio.php">
				 <table class="table table-hover table-condensed table-responsive" style="width:100%"> 
				  <thead> 
				    <tr> 
					    <th style="width:40%" >Tên sản phẩm</th> 
					    <th style="width:13%" class="text-center">Giá</th> 
					    <th style="width:15%" class="text-center">Số lượng</th> 
					    <th style="width:20%" class="text-center">Thành tiền</th> 
					    <th style="width:12%" class="text-center"></th> 
				    </tr> 
				  </thead> ';
				foreach($thongtinctdathang as $list)
				{
					echo '<tr>
								<td>
						
									<div>'.$list["tensanpham"].'<div>
								</td>
								<td>
									<div>'.$list['gia'].'&nbsp;đ</div>
								</td>
								<td class="text-center">
									

									     
									     <p>'.$list['soluong'].'</p>
									


								</td>
								<td class="text-center">
									<div>'.$list['gia']*$list['soluong'].'&nbsp;đ</div>
								</td>
								<td>
									

								</td>
						</tr>
						';
				}
				

				echo '
					<tfoot> 
				    <tr> 
					    <td ><b>Tổng Tiền</b></td> 
					    <td class="text-center"></td> 
					    <td class="text-center"></td> 
					    <td class="text-center">'.
						$thongtindathang['tongtien']

						.'&nbsp;đ</td> 
					    <td  class="text-center"></td> 
				    </tr> 
				  </tfoot> 
					</table>'
						;
			}
			else
			{

				echo ' <div class="row" style="margin-top:10%">
							<div class="col-md-5"></div>
							<div class="col-md-4">
								<p style="font-size:13px;">Bạn không có đơn đặt hàng nào</p>
								<div><a href="index.php" class="btn btn-light"><i class="fas fa-fast-backward" style="color:orange">Tiếp tục mua hàng</i></a></div>
							<div class="col-md-3">
							<div class="col-md-4"></div>
						<div>
							';
			}
		?>
</div>
</body>
</html>