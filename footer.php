<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Footer</title>
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="css/social.css">
	<script src="js/jquery.min.js"></script>
    
</head>

<body>
<div class="container">
	<footer class="page-footer font-small stylish-color-dark pt-4">
	<!-- Footer Links -->
		<div class="text-center text-md-left">

			<!-- Grid row -->
			<div class="row">

				<!-- Grid column -->
				<div class="col-md-4 mx-auto">

					<!-- Content -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Giới thiệu trang web</h5>
                    Được tạo ra từ 4 cộng tác viên web gồm:<br>
					1)Nguyễn Hùng Vương<br>
                    2)Nguyễn Thị Hải Hòa<br>
                    3)Huỳnh Minh Trí<br>
                    4)Trần Văn Hùng<br>
				</div>
				<!-- Grid column -->

				<hr class="clearfix w-100 d-md-none">

				<!-- Grid column -->
				<div class="col-md-2 mx-auto">

					<!-- Links -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Về BookStore</h5>
					<ul class="list-unstyled">
						<li> <a href="#!">Giới thiệu công ty</a> </li>
						<li> <a href="#!">Tuyển dụng</a> </li>
						<li> <a href="#!">Điều khoản sử dụng</a> </li>
						<li> <a href="#!">Chính sách bảo mật</a> </li>	
					</ul>
				</div>
				<!-- Grid column -->

				<hr class="clearfix w-100 d-md-none">

				<!-- Grid column -->
				<div class="col-md-2 mx-auto">

					<!-- Links -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Hỗ trợ</h5>
					<ul class="list-unstyled">
						<li> <a href="#!">Hướng dẫn đặt hàng</a> </li>
						<li> <a href="#!">Phương thức vận chuyển</a> </li>
						<li> <a href="#!">Chính sách đổi trả</a> </li>
						<li> <a href="#!">Hotline: 0123456789</a> </li>
					</ul>
				</div>
				<!-- Grid column -->

				<hr class="clearfix w-100 d-md-none">

				<!-- Grid column -->
				<div class="col-md-3 mx-auto lienhe">

					<!-- Links -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Liên hệ</h5>
					<ul class="list-unstyled">
						<li class="fas fa-map-marker-alt"><a href="map.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhà tui</a> </li><br>
						<li class="fas fa-phone"> <a href="tel:0123456789" class="lienhe">&nbsp;&nbsp;&nbsp;0123456789</a> </li><br>
						<li class="fas fa-globe"> <a href="#!">&nbsp;&nbsp;&nbsp;Bookstore.com</a> </li><br>
						<li class="fas fa-envelope"> <a href="mailto:Bookstore@hotro.com">&nbsp;&nbsp;&nbsp;Bookstore@hotro.com</a> </li>
					</ul>
				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row -->

		</div>
		<!-- Footer Links -->
		<br>
        <br>
        <br>


		<!-- Social buttons -->
		<ul class="social">
			<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fab fa-facebook-f"></span>
				</a>
			</li>
			<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fab fa-twitter"></span>
				</a>
			</li>
			<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fab fa-google-plus-g"></span>
				</a>
			</li>
			<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fab fa-linkedin-in"></span>
				</a>
			</li>
			<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fab fa-instagram"></span>
				</a>
			</li>
		</ul>
		<!-- Social buttons -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">&copy; 2019 Copyright: VuongNguyen</div>
		<!-- Copyright -->

	</footer>
    </div>
	<!--scroll top top-->
	<script type='text/javascript'>
		$( function () {
			$( window ).scroll( function () {
				if ( $( this ).scrollTop() != 0 ) {
					$( "#noop-top" ).
					fadeIn()
				} else {
					$( "#noop-top" ).fadeOut()
				}
			} );
			$( "#noop-top" ).
			click( function () {
				$( "body,html" ).animate( {
					scrollTop: 0
				}, 800 );
				return false
			} )
		} );
	</script> 
	<a id = 'noop-top' style = 'display: none; position: fixed; bottom: 20px; right:5%; cursor:pointer;font:12px arial;' title="Back to top"> <img src="Image/top1.png"/>
	</a>
	<!--scroll top top-->
</body>
</html>