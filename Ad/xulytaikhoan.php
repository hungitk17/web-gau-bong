<?php
	$host = 'localhost';
	$nameuser = 'root';
	$password = '';
	$namedb = 'quanlicuahanggau';
	$conn = new mysqli($host, $nameuser,$password,$namedb);
	if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
	mysqli_query($conn,"set names 'utf8'");
	if(isset($_POST["tendn"]) && isset($_POST["trangthai"])){
		$trang = $_POST["trangthai"];
		if($trang == "xoa"){
			$sql = "DELETE FROM khachhang WHERE tendn = '".$_POST["tendn"]."'";
			if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}else{echo "Thành công!!"; }
			$conn->close();
		}else if($trang == "sua"){
			$gh = "SELECT * FROM khachhang";
			$icon = '<h4 align="center"><i class="fa fa-arrow-down" style="color:red;"></i></h4>';
			$op = $conn->query($gh);
			if ($op->num_rows > 0){
				while($row = mysqli_fetch_array($op)){
					if($row["tendn"] == $_POST["tendn"]){
						$string2 = '
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 style="color:red;" align="center"><b>CHỈNH SỬA TÀI KHOẢN</b> </h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-bordered">
					<tr>
						<th>Tên KH</th>
                        <th>Tài Khoản</th>
                        <th>Mật Khẩu</th>
                        <th>SĐT</th>
                        <th>Email</th>
						<th>Quyền</th>
					</tr>
					<tr>
						<th style="color:red;">'.$row["hoten"].'
							<input type="text" id="hoten" value="'.$row["hoten"].'" style="display:none"/>
						</th>
						<th>'.$row["tendn"].'
							<input type="text" id="tendn" value="'.$row["tendn"].'" style="display:none"/>
						</th>
						<th>'.$row["mk"].'
							<input type="text" id="mkk" value="" style="display:none"/>	
						</th>
						<th>'.$row["sdt"].'</th>
						<th>'.$row["email"].'</th>
						<th>'.$row["quyen"].'</th>
					</tr>
					<tr>
						<th>'.$icon.'</th>
						<th>'.$icon.'</th>
						<th>'.$icon.'</th>
						<th>'.$icon.'</th>
						<th>'.$icon.'</th>
						<th>'.$icon.'</th>
					</tr>
					<tr>
						<th>
							<input type="text" id="suahoten" value="'.$row["hoten"].'" size="10px;" />
							<p style="display:none; color:red;" id="loisuahoten"></p>
						</th>
						<th>
							<input type="text" id="tendn" placeholder="'.$row["tendn"].'" size="10px;" disabled="disabled"/>		
							<input type="text" id="tendn" value="'.$row["tendn"].'" size="10px;" style="display:none"/>					
						</th>
						<th id="mahoa">
							<input type="text" id="suamk" value="'.$row["mk"].'" size="25px;" disabled="disabled"/>			
						</th>
						<th>
							<input id="suasdt" type="text" value="'.$row["sdt"].'" size="10px;"/>
							<p style="display:none; color:red;" id="loisuasdt"></p>	
						</th>
						<th>
							<input id="suaemail" type="text" value="'.$row["email"].'" size="25px;"/>
							<p style="display:none; color:red;" id="loisuaemail"></p>	
						</th>
						<th>
							<select id="quyen">
								<option value="2">2</option>
								<option value="3">3</option>
							</select>	
						</th>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-7" align="right">
				<table class="table table-hover table-bordered">
					<tr>
						<th style="color:red;">XIN NHẬP MẬT KHẨU</th>
						<th>
							<input  type="text" placeholder="xin nhập mật khẩu" size="12px;" onkeydown="hienthimahoa();" onkeyup="hienthimahoa();" onkeypress="hienthimahoa();"/>
							<p style="display:none; color:red;" id="loisuamk"></p>	
						</th>
					</tr>
					<tr>
						<th style="color:red;">SỬA</th>
						<th><button class="btn btn-outline-primary" onclick="kiemtrasuatk();">SỬA</button></th>
					</tr>
				</table>
			</div>
		</div>
	</div>';
								echo $string2;
								break;
					}
				}
			}else {echo "Không có record nào";}
		}
	}
	if(isset($_POST["hoten"]) && isset($_POST["mk"]) && isset($_POST["sdt"]) && isset($_POST["email"]) && isset($_POST["quyen"]) && isset($_POST["tendn"])){
		$sql = 'UPDATE `khachhang` SET `mk`="'.$_POST["mk"].'",`sdt`="'.$_POST["sdt"].'",`email`="'.$_POST["email"].'",`quyen`="'.$_POST["quyen"].'",`hoten`="'.$_POST["hoten"].'" WHERE `tendn`="'.$_POST["tendn"].'"';
		if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}else{echo "Thành công!!".$sql; }
		$conn->close();	
	}
?>