<div class="head">
    <div class="row">
        <strong class="logo col-md-3">
                    <a href="index.php">
                        <img src="Image/logo.png" alt="" width="75px">
                        <span>ÔM LÀ YÊU</span>
                    </a>
        </strong>
        <div class="col-md-9 ">
            <div class="row justify-content-lg-end  justify-content-sm-center">
				<?php $conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('{error:"bad_request"}');
 
if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
				if(isset($_SESSION['username'])){
				$sql='select hoten from khachhang where tendn="'.$_SESSION['username'].'"';
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
				}
				if($_SESSION['islogin'] == 1)
                echo '<div class="col-md-4 ">
									<li class="nav-item dropdown">
								   <a class="nav-link" style="padding:0px" href="#" id="navbarDropdown"> Chào '.$row['hoten'].'&nbsp;<i class="dropdown-toggle"></i></a>
								   <div class="dropdown-content" >
								   <a class="dropdown-item" href="thongtintaikhoan.php"><i class="fas fa-user-cog"></i>Thông Tin Tài Khoản</a>
								   <a style="display:none" id="duongdan"></a>
								   </div>
								</li></div><a href="donhang.php">Xem lại đơn hàng</a>';
                else
                    echo '<div class="col-md-3 " data-toggle="modal" data-target="#myModal1"><i class="fas fa-sign-in-alt"></i> Đăng nhập</div>';
                ?>
                <?php if($_SESSION['islogin'] == 1)
                echo '<div class="col-md-2 " onclick="dangxuattaikhoan();"><a href="dangxuat.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></div>';
                else
                echo '<div class="col-md-3 " data-toggle="modal" data-target="#myModal"><i class="fas fa-user-plus"></i> Đăng ký</div>';
                ?>                
				<div class="col-md-2" onclick="xemgiohang();"><a href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng<sup><span class="badge badge-info" id="soluongsp">0</span></sup></a></div>
            </div>
        </div>
        <!--<div class="col-md-9 ">
            <div class="row justify-content-lg-end  justify-content-sm-center">
                <div class="col-md-3 "><i class="fas fa-sign-in-alt"></i> Đăng nhập</div>
                <div class="col-md-3 "><i class="fas fa-user-plus"></i> Đăng ký</div>
                <div class="col-md-3" onclick="xemgiohang();"><i class="fas fa-shopping-cart"></i> Giỏ hàng</div>
            </div>
        </div>-->
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
</div>