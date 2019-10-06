<?php 
 session_start(); 
	if(isset($_SESSION['islogin']) == false)
	{
		$_SESSION['islogin']=0;
		header("Location:index.php");
	}
	if($_SESSION['islogin']==0)
	{
			header("Location:index.php");
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
<link rel="shortcut icon" href="Image/favicon.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/xuly.js" type="text/javascript"></script>
<title>Trang admin</title>
<script>
	function comebackhome(){
		alert("back");
	}
</script>
<style>
#search-box{
	width:200px;
	height:30px;
	float:left;
	position:relative;
	
	}
#textsearch{
	height:33px;
	width:160px;
	border:0;

	}
#search-button{
	height:31px;
	width:36px;
	position:absolute;
	z-index:99;
	top:6px;
	right:0;
	border:0;
	background:url(Image/TimKiemDen3.PNG) no-repeat ;
	cursor:pointer;
	}
</style>
</head>

<body>
<script type="text/javascript">
// Delay the keyup event for jquery ajax
$(document).ready(function()
{
    // Khai báo đối tượng timeout để dùng cho hàm
    // clearTimeout
    var timeout = null;
 
    // Sự kiện keyup
    $('#taikhoandk').keyup(function()
    {
        // Xóa đi những gì ta đã thiết lập ở sự kiện 
        // keyup của ký tự trước (nếu có)
        
        clearTimeout(timeout);
 
        // Sau khi xóa thì thiết lập lại timeout
        timeout = setTimeout(function ()
        {
            // Lấy nội dung search
            $('#trungtaikhoan').html("");
           var username = $("#taikhoandk").val();
 
            // Gửi ajax search
            $.ajax({
                type : 'post',
                dataType : 'json',
                data : {user : username},
                url : '../do_validate.php',
                success : function (result){
				
                  if (!result.hasOwnProperty('error') || result['error'] != 'success')
            {
                alert('Có vẻ như bạn đang hack website của tôi');
                return false;
            }
            var html = '';
 	
            // Lấy thông tin lỗi username
            if ($.trim(result.username) != ''){
                html += result.username + '<br/>';
            }
 
            
 
            // Cuối cùng kiểm tra xem có lỗi không
            // Nếu có thì xuất hiện lỗi
            if (html != ''){
                $('#trungtaikhoan').append('<span style="color:red;font-weight:bold">Tài khoản đã tồn tại <i class="fas fa-times-circle" ></i></span>');
            }
            else {
                // Thành công
                $('#trungtaikhoan').append('<span style="color:green;font-weight:bold">Tài khoản có thể đăng kí <i class="fas fa-check-circle" ></span></i>');
            }}
            });
        }, 500);
    });
});

</script>
<script type="text/javascript">
 function dangky()
	{
				var name=document.getElementById("ten");
				var tk = document.getElementById("taikhoandk");
				var pawd=document.getElementById("pwd");
				var nlmk=document.getElementById("nlmk");
				var sdt=document.getElementById("sdt");
				var email=document.getElementById("email");
				var trungtaikhoan = document.getElementById("trungtaikhoan");
				var checkbox=document.getElementsByName("select");
				var c = checkbox[0].value;
				alert("Tạo tài khoản thành công!");
				return true;
		<?php
				
				if(!($conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306)))
				{
				die ('Không thể kết nối tới database');
				}
				if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
          
    //Lấy dữ liệu từ file dangky.php
			if(isset($_POST['taikhoandk']) && $_POST['taikhoandk']!=false)
			{


			
    $username   = addslashes($_POST['taikhoandk']);
    $password   = addslashes($_POST['pwd']);
    $email      = addslashes($_POST['email']);
    $hoten      = addslashes($_POST['ten']);
    $sdt        = addslashes($_POST['sdt']);
	$quyen      = addslashes($_POST['select']);;
    $password = md5($password);
	//Lưu thông tin thành viên vào bảng
    // Tiến hành lưu vào CSDL nếu không có lỗi
	$sql="insert into khachhang(tendn,mk,sdt,email,quyen,hoten) value ('$username','$password','$sdt','$email','$quyen','$hoten')";
	if(isset($_POST['taikhoandk'])){
    $conn->query($sql);
	// Ngắt kết nối
	$conn->close();
	}
	$_POST['taikhoandk'] = false;
}
				
	?>
				
	}
 </script>
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Đăng Kí Tài Khoản</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          	<form onsubmit="return dangky();"  method="post" >
              <div class="form-group">
                <label for="ten">Họ và tên</label>
                <input type="text" class="form-control" id="ten" name="ten">
              </div>
              <div class="form-group">
              	<label for="taikhoandk">Tên Đăng Nhập</label>
                <input type="text" class="form-control" id="taikhoandk" name="taikhoandk"/>
                <span style="padding-top:10px" id="trungtaikhoan"></span>
              </div>
              <div class="form-group">
                <label for="pwd">Mật Khẩu</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
                <div id="mkdk"></div>
              </div>
               <div class="form-group">
               	<label for="nlmk">Nhập Lại Mật Khẩu</label>
                <input type="password" class="form-control" id="nlmk" name="nlmk"/>               
              </div>
               <div class="form-group">
               	<label for="sdt">Số Điện Thoại</label>
                <input type="text" class="form-control" id="sdt" name="sdt"/>
                
              </div>
              
              <div class="form-group">
                <label class="email">Email</label>
                  <input class="form-control" type="text" id="email" name="email"/>
               
              </div>
              
              <div class="form-group">
               	<label for="sdt">Gán Quyền</label>
                <select name="select">
                	<option value="2">Quyền Khách Hàng</option>
                    <option value="3">Quyền Nhân Viên</option>
                </select>
                <!--<input type="text" class="form-control" id="sdt" name="sdt"/>-->
                
              </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          	<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
              <input type="submit" class="btn btn-success" value="Đăng Kí">
    		</form>
        </div>
        
      </div>
    </div>
  </div>
<div  class="container">
 	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    <a class="navbar-brand active" href="admin.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Trang admin</a>
    </div>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Giới Thiệu</a></li>
        <li><a href="#">Tin Tức</a></li> 
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="setkey.php"><span class="glyphicon glyphicon-log-out" ></span>Đăng Xuất</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class="row">
    <div class="col-md-2">
    <?php
	if($_SESSION['quyen']==3)
	{
     echo  '<div class="dropdown">
  				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#000;border:solid black 2px; font-size:18px;padding-left:12px"><span class="glyphicon glyphicon-list"></span>&nbsp;Sản Phẩm&nbsp;<span class="caret"></span></button>
  			<ul class="dropdown-menu">
    			<form id="search-form">
      				<input type="text" placeholder=" Bạn cần tìm ..." id="textsearch" name="search"/>
      				<button type="submit" id="search-button"></button>
      			</form>
  			</ul>
	 </div>
	 
	 <div class="dropdown" style="padding-top:80px">
  				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#000;border:solid black 2px; font-size:18px;padding-left:12px"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Đơn Hàng&nbsp; <span class="caret"></span></button>
  			<ul class="dropdown-menu">
    			<form id="search-form">
      				<input type="text" placeholder=" Bạn cần tìm ..." id="textsearch" name="searchdh"/>
      				<button type="submit" id="search-button"></button>
      			</form>
  			</ul>
	 </div>';
	}
	 ?>
		<?php
		if($_SESSION['quyen']==1)
		{
       echo '<div class="dropdown" style="padding-top:80px">
  				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#000;border:solid black 2px; font-size:18px;padding-left:12px"><span class="glyphicon glyphicon-user"></span>&nbsp;Tài Khoản&nbsp; <span class="caret"></span></button>
  			<ul class="dropdown-menu">
    			<form id="search-form">
      				<input type="text" placeholder=" Bạn cần tìm ..." id="textsearch" name="searchtk"/>
      				<button type="submit" id="search-button"></button>
      			</form>
  			</ul>
	 </div>


	<div style="padding-top:80px">
  				<a  href="?id=thongke" class="btn btn-primary dropdown-toggle" type="button" style="background-color:#000;border:solid black 2px; font-size:18px;padding-left:12px"><span class="glyphicon glyphicon-stats"></span>&nbsp;Thống Kê&nbsp;&nbsp; <span class="caret"></span></a>
	 </div>';
		}
		?>
        </div>
	<div class="col-md-10" id="xuat">
        <?php
			if(isset($_GET['id'])){
				include 'thongke.php';
			}
			include "timkiemsp.php"; 
			include "timkiemtk.php";
			include "uploadsanpham.php";
			include "uploadsanphamthem.php";
			include "xulydonhang.php";
		?>
    </div>
 </div>

</div>
</body>
</html>