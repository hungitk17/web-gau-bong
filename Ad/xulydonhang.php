<?php
	$host = 'localhost';
	$nameuser = 'root';
	$password = '';
	$namedb = 'quanlicuahanggau';
	$conn = new mysqli($host, $nameuser,$password,$namedb);
	if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
	mysqli_query($conn,"set names 'utf8'");
	if(isset($_GET["searchdh"])){
		$sql = 'SELECT * FROM hoadon';
			$string = '<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<h1 style="color:red;" align="center"><b>THÔNG TIN ĐƠN HÀNG</b> </h1>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
										<table class="table table-hover table-bordered">
											<tr style="color:red;">
												<th>MÃ HÓA ĐƠN</th>
												<th>TÀI KHOẢN</th>
												<th>NGÀY ĐẶT HÀNG</th>
												<th>TỔNG TIỀN</th>
												<th>TRẠNG THÁI</th>
												<th>ĐỊA CHỈ GIAO</th>
												<th>CHI TIẾT</th>
												<th>HỦY</th>
											</tr>';
			$op = $conn->query($sql);
			$dem = 0;
			if ($op->num_rows > 0){
				while($row = mysqli_fetch_array($op)){
					$dem++;
					$rr = 'valuemahd'.$dem;
					$jo = "'".$rr."'";
					$bn = 'trangthai'.$dem;
					$trangthaidem = "'".$bn."'";
					$mang = array("Chưa Giao","Đang Giao","Đã Giao");
					$se = '<select id="trangthai'.$dem.'" name="trangthai" onchange="trangthaidonhang('.$jo.','.$trangthaidem.');">';
					$kl;
					for($i=0;$i<3;$i++){
						if($row["trangthai"] == $mang[$i]){
							$se .= '<option value="'.$mang[$i].'" selected="selected">'.$mang[$i].'</option>';
						}else{
							$se .= '<option value="'.$mang[$i].'">'.$mang[$i].'</option>';
						}
					}
					$se .= '</select>';
					$ghj = "'".$dem."'";
					$sua = "'sua'";
					$xoa = "'xoa'";
					$mahd = "'".$row["mahd"]."'";
					$string .= '<tr>
									<th>
										'.$row["mahd"].'
										<input type="text" value="'.$row["mahd"].'"  id="valuemahd'.$dem.'" style="display:none"/>
									</th>
									<th>'.$row["taikhoannguoidung"].'</th>
									<th>'.$row["ngaydathang"].'</th>
									<th>'.number_format($row["tongtien"]).'</th>
									<th>'.$se.'</th>
									<th>'.$row["diachigiaohang"].'</th>
									<th><button onclick="xemchitiet('.$ghj.');">XEM</button></th>
									<th>
										<a href="#" onclick="xoasuadonhang('.$xoa.','.$mahd.');">
										<i class="fas fa-trash-alt" style="float:left; font-size:22px; margin-left:15px"></i>
										</a>
									</th>
								</tr>';
				}
			}
			$string .= '				</table>
								</div>
							</div>
						</div>';
						echo $string;
						$conn->close();
	}
	if(isset($_POST["giatri"]) && isset($_POST["mahd"])){
			if($_POST["giatri"] == "xoa"){
				$sql = 'DELETE FROM hoadon WHERE mahd='.$_POST["mahd"];
				if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}else{echo "Thành công!!"; }
				$conn->close();
			}else{
			
			}
			
	}
	if(isset($_POST["chitiet"])){
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$sql = 'SELECT * FROM chitiethoadon WHERE mahd="'.$_POST["chitiet"].'"';
		$string = '<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<h1 style="color:red;" align="center"><b>CHI TIẾT ĐƠN HÀNG</b> </h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
									<table class="table table-hover table-bordered">
										<tr style="color:red;">
											<th>MÃ HÓA ĐƠN</th>
											<th>MÃ SẢN PHẨM</th>
											<th>SỐ LƯỢNG</th>
											<th>GIÁ</th>
											<th>THÀNH TIỀN</th>
										</tr>';
		$op = $conn->query($sql);
		$dem=0;
		if ($op->num_rows > 0){
			while($row = mysqli_fetch_array($op)){
				$dem++;
				$string .= '<tr>
								<th>'.$row["mahd"].'</th>
								<th>'.$row["masp"].'</th>
								<th>'.$row["soluongmua"].'</th>
								<th>'.$row["gia"].'</th>
								<th>'.number_format($row["thanhtien"]).'</th>
							</tr>';
			}
			$string .= '				</table>
							</div>
						</div>
				    </div>';
		}
		if($dem != 0){
			echo $string;
		}else{
			echo '<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<h1 style="color:red;" align="center"><b>KHÔNG CÓ CHI TIẾT NÀO</b> </h1>
							</div>
						</div>
				</div>';
		}
	}
	if(isset($_POST["trangthai"]) && isset($_POST["mahd"])){
		$sql = 'UPDATE hoadon SET trangthai="'.$_POST["trangthai"].'" WHERE mahd='.$_POST["mahd"];
		if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}else{echo "Thành công!!"; }
		$conn->close();
	}
?>
