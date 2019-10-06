<?php 
 session_start(); 
	if(isset($_SESSION['islogin']) == false)
	{
		$_SESSION['islogin']=0;
	}
	if(isset($_SESSION['quyen']))
	{
		if($_SESSION['quyen'] == 1)
		{
			//header("location:Ad/index.php");
		}
	}
 ?>
 <?php
	$id = isset($_GET["maloai"]) ? $_GET["maloai"] : "";
	
	$sql = 'select * from sanpham where maloai="'.$id.'"';
	
	
	//
								require_once 'database.php';
								
								$result = select($sql);
								 
								// Load thư viện phân trang
								include_once 'Pagination.php';
								
								 
								// Phân trang
								$config = array(
									'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
									'total_record'  => $result->num_rows, // tổng số thành viên
									'limit'         => 6,
									'link_full'     => 'index.php?maloai='.$id.'&page={page}',
									'link_first'    => 'index.php?maloai='.$id,
									'range'         => 6
								);
								 
								$paging = new Pagination();
								$paging->init($config);
								 
								// Lấy limit, start
								$limit = $paging->get_config('limit');
								$start = $paging->get_config('start');
								 
								// Lấy danh sách thành viên
					$member = get_all_member($limit, $start,$sql);
					 
				// Kiểm tra nếu là ajax request thì trả kết quả
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
					die (json_encode(array(
						'member' => $member,
						'paging' => $paging->html()
					)));
				}
		
 ?>
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
<title>Gấu Bông</title>
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
				var pattk = /^[A-Za-z0-9]{5,}/;
				if(!pattk.test(tk.value)){
					alert("tên đăng nhập không hợp lệ.tên đăng nhập phải từ 5 kí tự trở lên");
					tk.focus();
					return false;
				}
				if(document.getElementById("trungtaikhoan").innerHTML=='<span style="color:red;font-weight:bold">Tài khoản đã tồn tại <i class="fas fa-times-circle"></i></span>')	
				{
					alert("Tài khoản đã tồn tại");
					tk.focus();
					return false;
				}
				
				if(pwd.value==""){
					alert("Vui long nhap mat khau");
					pwd.focus();
					return false;
				}
				var pattpwd= /^[A-Za-z0-9_-]{8,}$/;
				if(!pattpwd.test(pwd.value)){
					alert("Mat khau khong hop le.Mat khau phai tu 8 kí tự trở lên");
					pwd.focus();
					return false;
				}
				if(nlmk.value==""){
					alert("Vui long nhap mat khau vua tao");
					nlmk.focus();
					return false;
				}
				if(pwd.value!=nlmk.value){
				   alert("Nhập lại mật khẩu không trùng khớp.Mời bạn nhập lại.");
				   nlmk.focus();
					return false;
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
				
				
				alert("Tạo tài khoản thành công mời bạn đăng nhập");
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
			if(isset($_POST['taikhoandk']))
			{


			
    $username   = addslashes($_POST['taikhoandk']);
    $password   = addslashes($_POST['pwd']);
    $email      = addslashes($_POST['email']);
    $hoten      = addslashes($_POST['ten']);
    $sdt        = addslashes($_POST['sdt']);
    $password = md5($password);
	//Lưu thông tin thành viên vào bảng
    // Tiến hành lưu vào CSDL nếu không có lỗi
	$sql="insert into khachhang(tendn,mk,sdt,email,quyen,hoten) value ('$username','$password','$sdt','$email',2,'$hoten')";
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
                url : 'do_validate.php',
                success : function (result){
					var username1=document.getElementById("taikhoandk").value;
					var pattk = /^[A-Za-z0-9]{5,20}$/;
				if(!pattk.test(username1)){
					$('#trungtaikhoan').append('<span style="color:red;font-weight:bold">Tài khoản không hợp lệ <i class="fas fa-times-circle" ></i></span>');
					return false;
				}
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
function dangxuattaikhoan(){
	localStorage.setItem("taikhoan","logout");
	//alert("dang xuat");
}
$(document).ready(function()
{
$('#formdn').submit(function (e)
{
    // Xóa trắng thẻ div show lỗi
     $('#loidn').html('');

    e.preventDefault();
    var sub = this;
    var username = $('#taikhoandn').val();
    var password = $('#matkhaudn').val();
 
    // Kiểm tra dữ liệu có null hay không
    if ($.trim(username) == ''){
        alert('Bạn chưa nhập tên đăng nhập');
		document.getElementById("taikhoandn").focus();
        return false;
    }
 
    if ($.trim(password) == ''){
        alert('Bạn chưa nhập mật khẩu');
		document.getElementById("matkhaudn").focus();
        return false;
    }
    var dangnhap = true;
    
    
 
    // Nếu bạn thích có thể viết thêm hàm kiểm tra định dang email
    // ở đây tôi làm chú yêu chỉ cách dùng ajax nên sẽ ko đề cập tới,
    // vì sợ bài dài sẽ rối
 
    $.ajax({
        url : 'kiemtradangnhap1.php',
        type : 'post',
        dataType : 'json',
        data : {
            username : username,
            password : password
        },
        success : function (result)
        {
            // Kiểm tra xem thông tin gửi lên có bị lỗi hay không
            // Đây là kết quả trả về từ file do_validate.php
            if (!result.hasOwnProperty('error') || result['error'] != 'success')
            {
                alert('Có vẻ như bạn đang hack website của tôi');
                dangnhap = false;
                return false;
            }
 
            var html = '';
			var html1='';
			
 
            // Lấy thông tin lỗi username
            if ($.trim(result.username) != ''){
                html += result.username;
            }
            // Lấy thông tin lỗi email
            if ($.trim(result.password) != ''){
                html1 += result.password;
            }
 
            // Cuối cùng kiểm tra xem có lỗi không
            // Nếu có thì xuất hiện lỗi
            if (html != '' || html1 != ''){
                $('#loidn').append('<span style="color:red;font-weight:bold">Tài khoản hoặc mật khẩu không đúng <i class="fas fa-times-circle" ></i></span>');
                dangnhap = false;
   
                return false;
            }
            
			if(html == '' && html1 == '')
			{
				alert("Đăng nhập thành công");
				localStorage.setItem("taikhoan","login");
				sub.submit();
				var k = document.getElementById("quyen").value;
				//alert("quyen = "+k);
				if(k == 1 || k == "1"){
					document.getElementById("duongdan").style.display = "block";
					document.getElementById("duongdan").innerHTML = "QUA TRANG ADMIN";
				}
				return true;
			}
           
        },
        error : function(error){
        	alert("error");
        },
    });
   

});          
});
</script>
</head>

<body>

<div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Đăng Nhập Tài Khoản</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          	<form method="post" id="formdn">
              <div class="form-group">
                <label for="taikhoandn">Tài Khoản</label>
                <input type="text" class="form-control" id="taikhoandn" name="taikhoandn">
              </div>
              <div class="form-group">
                <label for="passdn">Mật Khẩu</label>
                <input type="password" class="form-control" id="matkhaudn" name="matkhaudn">
              </div>
                              <div id="loidn"></div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                <label class="custom-control-label" for="customCheck">Nhớ Mật Khẩu</label>
              </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          	<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">Đăng Nhập</button>
    		</form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>



<!-----------het------------->
 <!-- The Modal -->

	

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
  <div class="container"><?php include("header.php");?></div><hr class="hr"/>
<div class="container">
  <div class="row">  
        <!-- The slideshow -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="Image/anhbia02.png" alt="..."></div>
            <div class="swiper-slide"><img src="Image/anhbia02.png" alt="..."></div>
            <div class="swiper-slide"><img src="Image/anhbia02.png" alt="..."></div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <script src="swipper/js/swiper.min.js"></script>
        <script src="js/slideshow.js"></script>
  </div>
      <div class="row">
      	<div class="col-md-3"></div>
	  	<div class="col-md-9 float-right" id="hienthi">
			<?php if(isset($_GET['maloai'])){include 'xuattenloai.php';} ?> 
        </div>
      </div>

      <div class="row" id="content">  
            <div class="col-md-3 d-flex flex-wrap justify-content-center">
           		<?php include "menuleft.php"?>
            </div>
        <div class="col-md-9 d-flex flex-wrap justify-content-around" id="xuat">
            <?php if(isset($_GET["maloai"]))
			{
				foreach ($member as $item) {
						$jj = "'".$item["masp"]."'";
						echo '<div class="card clearfix"> 
						<a href="chitietsanpham.php?masp='.$item["masp"].'"><img class="card-img-top" src="'.$item["hinh1"].'"/></a>
						<h5 class="card-title">'.$item["tensp"].'</h5>
						<p class="card-text">'.$item["gia"].'₫</p>
						<p><span class="size btn btn-success">'.$item["size"].'cm</span></p>
						<p>
							<a href="chitietsanpham.php?masp='.$item["masp"].'"><span class="btn btn-outline-info">Chi tiết</span></a>
							<span class="btn btn-outline-info" onclick="themvaogiohang('.$jj.');"> Thêm vào giỏ</span>
						</p>
					</div>';
						
				}
			}
			?>
            <?php include "xemgiohang.php" ?>
            <?php include "timkiemspnangcao.php" ?>
      
        
        </div>

        
        <div style="display:none"><input type="button" value="1" id="quyen"/></div>
        <div class="col-lg-8">
			<?php if(isset($_GET["search"])) include "showgau.php" ?>
        </div>
      	<div class=" col-md-9" id="paging"><?php echo $paging->html(); ?></div>
    </div>
  </div>
</div>
<script language="javascript">
             $('#content').on('click','#paging a', function ()
             {
                 var url = $(this).attr('href');
                  
                 $.ajax({
                     url : url,
                     type : 'get',
                     dataType : 'json',
                     success : function (result)
                     {
                         //  kiểm tra kết quả đúng định dạng không
                         if (result.hasOwnProperty('member') && result.hasOwnProperty('paging'))
                         {
                             var html='';
							 var ij='';
                             // lặp qua danh sách thành viên và tạo html
                             $.each(result['member'], function (key, item){
								jj = "'"+item["masp"]+"'";
                                html +='<div class="card clearfix"><a href="chitietsanpham.php?masp='+item["masp"]+'"><img class="card-img-top" src="'+item["hinh1"]+'"/></a><h5 class="card-title">'+item["tensp"]+'</h5><p class="card-text">'+item["gia"]+'₫</p><p><span class="size btn btn-success">'+item["size"]+'cm</span></p><p><a href="chitietsanpham.php?masp='+item["masp"]+'"><span class="btn btn-outline-info">Chi tiết</span></a><span class="btn btn-outline-info" onclick="themvaogiohang('+jj+');"> Thêm vào giỏ</span></p></div>';
						
                             });
                              
                            
                              
                             // Thay đổi nội dung danh sách thành viên
                             $('#xuat').html(html);
                              
                             // Thay đổi nội dung phân trang
                             $('#paging').html(result['paging']);
                              
                             // Thay đổi URL trên website
                             window.history.pushState({path:url},'',url);
                         }
                     }
                 });
                 return false;
             });
         </script>
         </div>
   <div class="container"><hr class="hr" /><?php include 'footer.php'?></div>


</body>
</html>