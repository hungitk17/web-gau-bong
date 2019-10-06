<?php
	if(isset($_POST["masp"]) && isset($_POST["trangthai"]) && isset($_POST["seach"])){
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$trang = $_POST["trangthai"];
		$stringMaloai = '<select id="themloai" name="themloai">
							<option value="null">LOẠI SẢN PHẨM</option>';
		$stringSize = '<select id="themsize" name="themsize">
							<option value="null">KÍCH CỠ</option>';
		$stringSizesua = '<select id="suasize" name="suasizesp">
							<option value="null">KÍCH CỠ</option>';
		$sql = 'SELECT * FROM theloai';
		$op = $conn->query($sql);
		if ($op->num_rows > 0){
			while($row = mysqli_fetch_array($op)){
				$stringMaloai .= '<option value="'.$row["maloai"].'">'.$row["tenloai"].'</option>';
			}
		}
		$sql = 'select DISTINCT size from sanpham order by size';
		$op = $conn->query($sql);
		if ($op->num_rows > 0){
			while($row = mysqli_fetch_array($op)){
				$stringSize .= '<option value="'.$row["size"].'">'.$row["size"].'</option>';
			}
		}
		$stringMaloai .= '</select>';
		$stringSize .= '</select>';
		$icon = '<i class="fa fa-arrow-right" style="color:red;"></i>';
		if($trang == "xoa"){
			$se = $_POST["seach"];
			$sql = "UPDATE sanpham SET trangthai = 1 WHERE masp = '".$_POST["masp"]."'";
			if (!($conn->query($sql) === TRUE)) {echo "Update thất bại: ".$sql;}else{echo "Thành công!!"; }
			$conn->close();
		}else if($trang == "sua"){
			$gh = "SELECT * FROM sanpham";
			$op = $conn->query($gh);
			if ($op->num_rows > 0){
				while($row = mysqli_fetch_array($op)){
					if($row["masp"] == $_POST["masp"]){
						$ml = "'".$row["maloai"]."'";
						$tsp = "'".$row["tensp"]."'";
						$msp = "'".$row["masp"]."'";
						$g = "'".$row["gia"]."'";
						$kc = "'".$row["size"]."'";
						$ms = "'".$row["mausac"]."'";
						$hinhh = "'".$row["hinh1"]."'";
						$sql = 'select DISTINCT size from sanpham order by size';
						$jk = $conn->query($sql);
						if ($jk->num_rows > 0){
							while($a = mysqli_fetch_array($jk)){
								if($a["size"] === $row["size"]){
									$stringSizesua .= '<option selected="selected" value="'.$a["size"].'">'.$a["size"].'</option>';
								}else{
									$stringSizesua .= '<option value="'.$a["size"].'">'.$a["size"].'</option>';
								}
							}
						}
						$stringSizesua .= '</select>';
						$string2 = '<form method="post" action="" enctype="multipart/form-data" onsubmit="return kiemtrasuasp();">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 style="color:red;" align="center"><b>CHỈNH SỬA SẢN PHẨM</b> </h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-bordered">
					<tr>
						<th><p align="right" style="color:red;">Mã Loại '.$icon.'</p></th>
						<th style="color:red;">
							<input type="text" placeholder="'.$row["maloai"].'" size="5px;" disabled="disabled"/>
							<input type="text" id="ml" value="'.$row["maloai"].'" style="display:none" name="suamaloai"/>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Mã Sản Phẩm '.$icon.'</p></th>
						<th>
							<input type="text" placeholder="'.$row["masp"].'" size="5px;" disabled="disabled"/>	
							<input type="text" id="msp" value="'.$row["masp"].'" style="display:none" name="suamasp"/>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Tên Sản Phẩm '.$icon.'</p></th>
						<th>
							<input id="suatensp" type="text" value="'.$row["tensp"].'" size="22px;" name="suatensp"/>	
							<p style="display:none; color:red;" id="loisuatensp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Giá '.$icon.'</p></th>
						<th>
							<input id="suagia" type="text" value="'.$row["gia"].'" size="6px;" name="suagiasp"/>
							<p style="display:none; color:red;" id="loisuagia"></p>	
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Kích Cỡ '.$icon.'</p></th>
						<th>
							'.$stringSizesua.'
							<p style="display:none; color:red;" id="loisuasize"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Màu Sắc '.$icon.'</p></th>
						<th>
							<input id="suamau" type="text" value="'.$row["mausac"].'" size="12px;" name="suamausacsp"/>
							<p style="display:none; color:red;" id="loisuamau"></p>	
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Chất liệu '.$icon.'</p></th>
						<th>
							<input id="suachatlieu" type="text" value="'.$row["chatlieu"].'" size="30px;" name="suachatlieusp"/>
							<p style="display:none; color:red;" id="loisuachatlieu"></p>	
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Trạng thái '.$icon.'</p></th>
						<th>
							<input id="suatrangthai" type="text" value="'.$row["trangthai"].'" size="8px;" name="suatrangthaisp"/>
							<p style="display:none; color:red;" id="loisuatrangthai"></p>	
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Số lượng '.$icon.'</p></th>
						<th>
							<input id="suasoluong" type="text" value="'.$row["soluong"].'" size="8px;" name="suasoluongsp"/>
							<p style="display:none; color:red;" id="loisuasoluong"></p>	
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Mô tả '.$icon.'</p></th>
						<th>
							<textarea name="suamotasp" rows="10" cols="30" name="suamotasp" id="suamota">
								'.$row["mota"].'
							</textarea>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Hình '.$icon.'</p></th>
						<th>
							<p id="xuathinhanhsua">
								<img src="../'.$row["hinh1"].'" width="50px" height="50px">
							</p>
							<input style="display:none"  value="'.$row["hinh1"].'" id="luuhinhanhsua"/> 
							<input style="display:none"  value="'.$row["hinh1"].'" name="loixuathinhanhsua"/> 
							<p style="display:none; color:red;" id="loixuathinhanhsua" ></p>	
							<input type="text" id="hinhh" value="'.$row["hinh1"].'" style="display:none" name="luuhinhanhthat"/>
							<input type="file" name="chonhinhanh" value="file hình ảnh" id="chonhinhanh" onchange="chohinhanh();"/>
						</th>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" align="right">
				<button type="submit" class="btn btn-outline-primary" name="upload">LƯU LẠI</button></th>
			</div>
		</div>
	</div>
	</form>';
								echo $string2;
								break;
					}
				}
			}else {echo "Không có record nào";}
		}else{
			$themString = '<form method="post" action="" enctype="multipart/form-data" onsubmit="return kiemtrathemsp();">
			<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 style="color:red;" align="center"><b>THÊM SẢN PHẨM</b> </h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-bordered">
					<tr>
						<th><p align="right" style="color:red;">Mã Loại '.$icon.'</p></th>
						<th>
							'.$stringMaloai.'
							<p style="display:none; color:red;" id="loithemmaloai"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Mã Sản Phẩm '.$icon.'</p></th>
						<th>
							<input id="themmasp" name="themmasp" type="text" placeholder="Mã sản phẩm" size="5px;"/>	
							<p style="display:none; color:red;" id="loithemmasp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Tên Sản Phẩm '.$icon.'</p></th>
						<th>
							<input id="themtensp" name="themtensp" type="text" placeholder="Tên sản phẩm" size="22px;"/>	
							<p style="display:none; color:red;" id="loithemtensp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Giá '.$icon.'</p></th>
						<th>
							<input id="themgiasp" name="themgiasp" type="text" placeholder="Giá sản phẩm" size="6px;"/>	
							<p style="display:none; color:red;" id="loithemgiasp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Kích Cỡ '.$icon.'</p></th>
						<th>
							'.$stringSize.'
							<p style="display:none; color:red;" id="loithemsizesp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Màu Sắc '.$icon.'</p></th>
						<th>
							<input id="themmausp" name="themmausp" type="text" placeholder="Màu sản phẩm" size="12px;"/>	
							<p style="display:none; color:red;" id="loithemmausp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Chất liệu '.$icon.'</p></th>
						<th>	
							<input id="themchatlieusp" name="themchatlieusp"  type="text" placeholder="Chất liệu sản phẩm" size="30px;"/>	
							<p style="display:none; color:red;" id="loithemchatlieusp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Trạng thái '.$icon.'</p></th>
						<th>	
							<input id="themtrangthaisp" name="themtrangthaisp" type="text" placeholder="Trạng thái" size="8px;"/>	
							<p style="display:none; color:red;" id="loithemtrangthaisp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Số lượng '.$icon.'</p></th>
						<th>
							<input id="themsoluongsp" name="themsoluongsp" type="text" placeholder="Số lượng" size="8px;"/>	
							<p style="display:none; color:red;" id="loithemsoluongsp"></p>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Mô tả '.$icon.'</p></th>
						<th>
							<textarea rows="10" cols="30" id="themmotasp" value="ok" name="themmotasp">
								Mô tả
							</textarea>
						</th>
					</tr>
					<tr>
						<th><p align="right" style="color:red;">Hình '.$icon.'</p></th>
						<th>
							<p id="xuathinhanhthem">
								
							</p>
							<input type="file" id="themhinhanh" name="themhinhanh" onchange="xuathinhanhthem();"/>
							<p style="display:none; color:red;" id="loithemhinhanhsp"></p>
						</th>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" align="right">
				<button class="btn btn-outline-primary" name="uploadthem" id="uploadthem">LƯU LẠI</button></th>
			</div>
		</div>
	</div>
	</form>';
			echo $themString;
		}
	}
?>