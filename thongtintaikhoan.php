<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="js/thaotactrengiohang.js" type="text/javascript"></script>
    <script src="js/kttimkiemnangcao.js" type="text/javascript"></script>
<title>Thông Tin Cá Nhân</title>
<style>
  .pagination{
	  margin-left:27%;
	  }
  .carousel-inner img {
      width: 100%;
      height: 100%;
      opacity:1;

  }
  a:link{color:#000;}
  a:visited{color:#000;}
  a:hover{color:#000; text-decoration: none}
  </style>
<?php
		include 'laythongtintk.php';
	?>
</head>

<body>
<div class="container"><div class="head">
    <div class="row">
        <strong class="logo col-md-3">
                    <a href="index.php">
                        <img src="Image/logo.png" alt="" width="75px">
                        <span>ÔM LÀ YÊU</span>
                    </a>
        </strong>
        <div class="col-md-9 ">
        	<marquee style="color:red">Xin Chào <?php echo $error['HoTen']; ?> , Chào Mừng Bạn Đến Với Cửa Hàng Của Chúng tôi <i class="fas fa-heart"></i></marquee>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-md position-sticky fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"><i class="fas fa-align-justify"></i></span>
                        </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> TRANG CHỦ</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="index.php?id=gt"><i class="fas fa-newspaper"></i> GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="index.php?id=tt"><i class="fas fa-rss-square"></i> TIN TỨC</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="index.php?id=hd"><i class="fas fa-question-circle"></i> HỎI ĐÁP</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="index.php?id=lh"><i class="far fa-credit-card"></i> LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div></div><hr class="hr"/>
<div class="container" >          	         
              <!--het menu-->     
	
        <!-----het class hinh--->
        <div class="text-center" style="color:black;"><h3>Thông Tin Tài Khoản</h3></div>
        <div class="row" id="bang">
		        <div class="col-md-3"></div>
				<div class="col-md-8 ">
					<form method="post" onsubmit="return kiemtrathongtin();" action="capnhatthongtintk.php">
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"><h6>Họ và tên</h6></div>
						<div class="col-sm-6"><input type="text" class=" form-control-sm" name="hovaten" id="hovaten" value="<?php echo $error['HoTen']; ?>"><span class="help-block"></span></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"><h6>Tên đăng nhập</h6></div>
						<div class="col-sm-6"><input type="text" class="form-control-sm" name="tendangnhap" id="tendangnhap" disabled="disable" value="<?php echo $error['TenDangNhap']; ?>"><span class="help-block"></span></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"><h6>Mật khẩu</h6></div>
						<div class="col-sm-6"><input type="password" class="form-control-sm" id="matkhau" disabled="disable" value="<?php echo $error['MatKhau']; ?>"><span class="help-block"></span></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"><h6>Số điện thoại</h6></div>
						<div class="col-sm-6"><input type="text" class="form-control-sm" name="sodienthoai" id="sdt" value="<?php echo $error['Sdt']; ?>"><span class="help-block"></span></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"><h6>Email</h6></div>
						<div class="col-sm-6"><input type="text" class="form-control-sm" name="email" id="email" value="<?php echo $error['Email']; ?>"><span class="help-block"></span></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"></div>
						<div class="col-sm-1"><input type="checkbox"  id="changepass" value="checked" onClick="mycheck()"></div>
						<div class="col-sm-5"><span>Thay đổi mật khẩu</span></div>
						<div class="col-sm-3"></div>
					</div>
					<div id="change" style="display: none">
						<div class="row" style="padding-top:15px">
							<div class="col-sm-3"><h6>Mật khẩu cũ</h6></div>
							<div class="col-sm-6"><input type="password" class="form-control-sm" id="passcu"  placeholder="Nhập mật khẩu cũ">
								<div class="help-block" id="trungmatkhau"></div>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="row" style="padding-top:15px">
							<div class="col-sm-3"><h6>Mật khẩu mới</h6></div>
							<div class="col-sm-6"><input type="password" name="matkhau" class="form-control-sm" id="passmoi"  placeholder="Mật khẩu từ 8 đến 32 kí tự"><span class="help-block"></span></div>
							<div class="col-sm-3"></div>
						</div>
						<div class="row" style="padding-top:15px">
							<div class="col-sm-3"><h6>Nhập lại</h6></div>
							<div class="col-sm-6"><input type="password" class="form-control-sm" id="repassmoi"  placeholder="Nhập lại mật khẩu mới"><span class="help-block"></span></div>
							<div class="col-sm-3"></div>
						</div>
					</div>
					<div class="row" style="padding-top:15px">
						<div class="col-sm-3"></div>
						<div class="col-sm-4"><input type="submit" name="sub" value="Cập nhật thông tin"class="btn btn-info btn-block"></div>
						<div class="col-sm-6"></div>
					</div>
					</form>
				</div>
				<div class="col-md-1"></div>
    </div>
        
   
       
  
        
        
       
        
        <!--dong phan than-->
        <hr class="hr" />
       
       

</div> <!--ket thuc container-->
	
	<script>
		function mycheck(){
			var checkbox=document.getElementById("changepass");
			var text=document.getElementById("change");
			if(checkbox.checked== true){
				text.style.display="block";
			} else {
				 text.style.display = "none";
			  }
		}
	</script>
	<script>
	$(document).ready(function()
{
    // Khai báo đối tượng timeout để dùng cho hàm
    // clearTimeout
    var timeout = null;
 
    // Sự kiện keyup
    $('#passcu').keyup(function()
    {
        // Xóa đi những gì ta đã thiết lập ở sự kiện 
        // keyup của ký tự trước (nếu có)
        
        clearTimeout(timeout);
 
        // Sau khi xóa thì thiết lập lại timeout
        timeout = setTimeout(function ()
        {
            // Lấy nội dung search
            $('#trungmatkhau').html("");
           var nlmkcu = $("#passcu").val();
           var mkcu = $("#matkhau").val();
 
            // Gửi ajax search
            $.ajax({
                type : 'post',
                dataType : 'json',
                data : {password : nlmkcu},
                url : 'mahoapassword.php',
                success : function (result){
                  if (!result.hasOwnProperty('matkhau') || result['matkhau'] != 'success')
            {
                alert('Có vẻ như bạn đang hack website của tôi');
                return false;
            }
            var html="";
			//alert(result.password);
            if(result.password != "")
            {
            	nlmkcu=result.password;
            }
           if(nlmkcu != mkcu)
           {
           		html="lỗi";
           }
 	
            
 
            
 
            // Cuối cùng kiểm tra xem có lỗi không
            // Nếu có thì xuất hiện lỗi
            if (html != ''){
                $('#trungmatkhau').append('<span style="color:red;font-weight:bold">Mật khẩu không trùng khớp<i class="fas fa-times-circle" ></i></span>');
            }
            
                },
                error : function (error){
                	alert("không trả về được");
                }
            });
        }, 1000);
    });
});
	function kiemtrathongtin()
	{

				var name=document.getElementById("hovaten");
				
				var sdt=document.getElementById("sdt");
				
				var tk = document.getElementById("tendangnhap");
				
				var passcu=document.getElementById("matkhau")

				var repasscu=document.getElementById("passcu");

				var passmoi=document.getElementById("passmoi");
			
				var repassmoi=document.getElementById("repassmoi");
				
				var sdt=document.getElementById("sdt");
				var email=document.getElementById("email");
				var suamk=document.getElementById("change");

				if(name.value==""){
					alert("Vui long nhap ho ten");
					name.focus();
					return false;
				}
				var pattten= /[A-Za-z\D_ÀÁÂĂÈÉỀÍ̉ÓÔƠÙÚAĐIUOàáâăèéếị́óôơùúadiuoUA??????????????????ua???????????????????????????????????????????????????????????????Ư?????????-]{3,16}$/gi;
				
				if(!pattten.test(name.value)){
					alert("Ho ten khong hop le");
					//name.value="";
					name.focus();
					return false;
					
					
				}
				if(tk.value=="")
				{
					alert("Vui lòng nhập tên đăng nhập");
					tk.focus();
					return false;
				}
				var pattk = /^[A-Za-z0-9]{5,20}/;
				if(!pattk.test(tk.value)){
					alert("tên đăng nhập không hợp lệ");
					tk.focus();
					return false;
				}
				valrepasscu = repasscu.value;
				if(suamk.style.display != "none")
				{
							
							   

							 
							if(repasscu.value==""){
								alert("Vui lòng nhập mật khẩu cũ");
								repasscu.focus();
								return false;
							}
					
							if(document.getElementById("trungmatkhau").innerHTML == '<span style="color:red;font-weight:bold">Mật khẩu không trùng khớp<i class="fas fa-times-circle"></i></span>')
							{
								alert("Mật khẩu cũ không đúng");
								repasscu.focus();
								return false;
							}
							if(passmoi.value==""){
							alert("Vui lòng nhập mật khẩu mới");
							passmoi.focus();
							return false;
							}
							var pattpwd= /^[A-Za-z0-9_-]{8,}$/;
							if(!pattpwd.test(passmoi.value)){
								alert("Mật khẩu mới không hợp lệ");
								passmoi.focus();
								return false;
							}
							if(repassmoi.value==""){
								alert("Vui lòng nhập mật khẩu vừa tạo");
								repassmoi.focus();
								return false;
							}
							if(passmoi.value!=repassmoi.value){
							   alert("Mật khẩu không trùng khớp");
							   repassmoi.focus();
								return false;
						   }

				}
				
				if(sdt.value==""){
					alert("Vui long nhap so dien thoai");
					sdt.focus();
					return false;
				}
				var pattsdt= /^0[0-9]{9}/gi;
				if(!pattsdt.test(sdt.value)){
					alert("SĐT khong hop le");
					sdt.focus();
					return false;
				}
				if(email.value==""){
					alert("Vui long nhap dia chi email");
					email.focus();
					return false;
				}
				var pattmail= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;
				if(!pattmail.test(email.value)){
					alert("Email khong hop le");
					//email.value="";
					email.focus();
					return false;
				}
				
				
				alert("Cập nhật tài khoản thành công");
				return true;
				
	}
				


 </script>
 <?php include "footer.php"?>

</body>
</html>