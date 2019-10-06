<!doctype html>
<html>
<?php 
	session_start();
	$user=$_SESSION['username'];
	
	$conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('{error:"bad_request"}');
	if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
	$thongtin = array(
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
 ?>
<head>
<meta charset="utf-8">
<title>Thông tin giao hàng</title>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <!--thu vien hinnh anh icon-->
	<style>
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
    font-weight: 700;
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
	<form method="post" action="ThongTinThanhToan.php">
	<div class="container"><?php include("header1.php");?></div><hr class="hr"/>
	<h3>Địa chỉ giao hàng</h3>
	<h5>Chọn địa chỉ giao hàng có sẵn bên dưới:</h5>
	<div class="col-lg-6 item">
		<div class="panel panel-default is-default">
			<div class="panel-body">
				<p class="name">Họ và tên : <?php echo $thongtin['HoTen']; ?></p>
				<p class="address">Điện thoại: <?php echo $thongtin['Sdt']; ?></p>
				<p class="address"><input type="text" class="form-control form-control-sm" name="diachi" placeholder="Nhập địa chỉ giao hàng" value="<?php if(isset($_GET['suadiachi'])) echo $_GET['suadiachi'] ?>"></p>
				<div class="row">
					<p class="list-group-item-action">
					<div class="col-sm-6"><input type="submit" value="Gửi đến địa chỉ này" class="btn btn-info btn-block"></div>
					<div class="col-sm-3"></div>
					<div class="col-sm-3"></div>
					</p>
				</div>
			</div>
		</div>
	</div>
</form>
<hr class="hr"/>
</div>
</body>
</html>