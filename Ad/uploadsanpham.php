<?php 
	if(isset($_POST["loixuathinhanhsua"])){
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$icon = '<i class="fa fa-check" style="color:green;"></i>';
		if(isset($_POST["loixuathinhanhsua"]) ){
			if (isset($_POST['upload'])){
				if (isset($_FILES['chonhinhanh'])){
					$gan;
					if ($_FILES['chonhinhanh']['error'] > 0){
						$gan = $_POST["loixuathinhanhsua"];
					}
					else{
						$ham = $_POST["luuhinhanhthat"];
						$phanchia = explode("/",$ham);
						$doituong = "Image/".$phanchia[1]."/".$_FILES['chonhinhanh']['name'];
						move_uploaded_file($_FILES['chonhinhanh']['tmp_name'],"../Image/".$phanchia[1]."/".$_FILES['chonhinhanh']['name']);
						$sql = 'UPDATE `sanpham` SET `tensp`="'.$_POST["suatensp"].'",`gia`='.$_POST["suagiasp"].',`size`='.$_POST["suasizesp"].',`mausac`="'.$_POST["suamausacsp"].'",`chatlieu`="'.$_POST["suachatlieusp"].'",`trangthai`="'.$_POST["suatrangthaisp"].'",`soluong`="'.$_POST["suasoluongsp"].'",`mota`="'.$_POST["suamotasp"].'",`hinh1`="'.$doituong.'" WHERE masp="'.$_POST["suamasp"].'"';
						if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}
						$gan = $doituong;
						$conn->close();
					}
						$string = '<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h1 style="color:red;" align="center"><b id="thongbao1">CHỈNH SỬA SẢN PHẨM</b> </h1>
						<h1 style="color:red;" align="center" id="thongbao2"><b>THÀNH CÔNG</b> </h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-hover table-bordered">
							<tr>
								<th><p align="right">Mã Loại</p></th>
								<th style="color:red;">'.$_POST["suamaloai"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Mã Sản Phẩm</p></th>
								<th style="color:red;">'.$_POST["suamasp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Tên Sản Phẩm</p></th>
								<th style="color:red;">'.$_POST["suatensp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Giá</p></th>
								<th style="color:red;">'.$_POST["suagiasp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Kích Cỡ</p></th>
								<th style="color:red;">'.$_POST["suasizesp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Màu Sắc</p></th>
								<th style="color:red;">'.$_POST["suamausacsp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Chất liệu</p></th>
								<th style="color:red;">'.$_POST["suachatlieusp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Trạng thái</p></th>
								<th style="color:red;">'.$_POST["suatrangthaisp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Số lượng</p></th>
								<th style="color:red;">'.$_POST["suasoluongsp"].''.$icon.'</th>
							</tr>
							<tr>
								<th><p align="right">Mô tả</p></th>
								<th>
									<textarea rows="10" cols="30"  style="color:red;" readonly="readonly">
											'.$_POST["suamotasp"].'
									</textarea>
									'.$icon.'
								</th>
								
							</tr>
							<tr>
								<th><p align="right">Hình</p></th>
								<th  style="color:red;"><img src="../'.$gan.'" width="50px" height="50px">'.$icon.'</th>
							</tr>
						</table>
					</div>
				</div>
			</div>';
						echo $string;
					}else{
						echo 'Bạn chưa chọn file upload';
					}
				}
			}
		}
?>