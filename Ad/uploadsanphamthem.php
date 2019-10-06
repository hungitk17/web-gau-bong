<?php
	if(isset($_POST["themmasp"])){
		if(isset($_POST['uploadthem'])){
			if (isset($_FILES['themhinhanh']))
			{
				if ($_FILES['themhinhanh']['error'] > 0){
					echo "Lỗi";
				}else{
					$sql = "SELECT * FROM theloai";
					$op = $conn->query($sql);
					if ($op->num_rows > 0){
						while($row = mysqli_fetch_array($op)){
							if($_POST["themloai"] == $row["maloai"]){
								$tenloai = $row["tenloai"];
								switch($tenloai){
									case "Chó Bông":{
										$tenloai = "ChoBong";
										break;
									}
									case "Gấu Bông DoReMon":{
										$tenloai = "doremon";
										break;
									}
									case "Gối Bông":{
										$tenloai = "GoiBong";
										break;
									}
									case "Gấu Bông Hot":{
										$tenloai = "GauBongHot";
										break;
									}
									case "Mèo Bông":{
										$tenloai = "MeoBong";
										break;
									}
									case "Gấu Bông PiKaChu":{
										$tenloai = "PiKaChu";
										break;
									}
									case "Shin Cấu Bé Bút Chì":{
										$tenloai = "shin";
										break;
									}
									case "Gấu Bông Teddy":{
										$tenloai = "GauBongTeddy";
										break;
									}
								}
								break;
							}
						}
					}
					$icon = '<i class="fa fa-check" style="color:green;"></i>';
					$doituong = "Image/".$tenloai."/".$_FILES['themhinhanh']['name'];
					move_uploaded_file($_FILES['themhinhanh']['tmp_name'],"../Image/".$tenloai."/".$_FILES['themhinhanh']['name']);
					$sql = 'INSERT INTO `sanpham`(`masp`, `tensp`, `gia`, `size`, `mausac`, `chatlieu`, `trangthai`, `soluong`, `hinh1`, `hinh2`, `hinh3`, `hinh4`, `hinh5`, `mota`, `maloai`) VALUES ("'.$_POST["themmasp"].'","'.$_POST["themtensp"].'",'.$_POST["themgiasp"].','.$_POST["themsize"].',"'.$_POST["themmausp"].'","'.$_POST["themchatlieusp"].'",'.$_POST["themtrangthaisp"].','.$_POST["themsoluongsp"].',"'.$doituong.'","","","","","'.$_POST["themmotasp"].'","'.$_POST["themloai"].'")';
					if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}
					$conn->close();
			}
					$string = '<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 style="color:red;" align="center"><b id="thongbao1">THÊM SẢN PHẨM</b> </h1>
					<h1 style="color:red;" align="center" id="thongbao2"><b>THÀNH CÔNG</b> </h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-bordered">
						<tr>
							<th><p align="right">Mã Loại</p></th>
							<th style="color:red;">'.$_POST["themloai"].$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Mã Sản Phẩm</p></th>
							<th style="color:red;">'.$_POST["themmasp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Tên Sản Phẩm</p></th>
							<th style="color:red;">'.$_POST["themtensp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Giá</p></th>
							<th style="color:red;">'.$_POST["themgiasp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Kích Cỡ</p></th>
							<th style="color:red;">'.$_POST["themsize"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Màu Sắc</p></th>
							<th style="color:red;">'.$_POST["themmausp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Chất liệu</p></th>
							<th style="color:red;">'.$_POST["themchatlieusp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Trạng thái</p></th>
							<th style="color:red;">'.$_POST["themtrangthaisp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Số lượng</p></th>
							<th style="color:red;">'.$_POST["themsoluongsp"].''.$icon.'</th>
						</tr>
						<tr>
							<th><p align="right">Mô tả</p></th>
							<th>
								<textarea rows="10" cols="30"  style="color:red;" readonly="readonly">
										'.$_POST["themmotasp"].'
								</textarea>
								'.$icon.'
							</th>
							
						</tr>
						<tr>
							<th><p align="right">Hình</p></th>
							<th  style="color:red;"><img src="../'.$doituong.'" width="50px" height="50px">'.$icon.'</th>
						</tr>
					</table>
				</div>
			</div>
		</div>';
					echo $string;
			}else{
				echo 'Bạn chưa chọn file upload';
			}
	}else{echo "loi";}
	}
?>