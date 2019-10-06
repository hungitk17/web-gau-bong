<?php
	if(isset($_GET["tensp"]) && isset($_GET["gia_1"]) && isset($_GET["gia_2"]) && isset($_GET["theloai"]) && isset($_GET["mau"]) && isset($_GET["trang"])){
		//session_start();
		$tensp = $_GET["tensp"];
		$gia_1 = ($_GET["gia_1"] == "" || $_GET["gia_1"] == null) ? 0 : $_GET["gia_1"];
		$gia_2 = ($_GET["gia_2"] == "" || $_GET["gia_2"] == null) ? 999999999 : $_GET["gia_2"];
		$theloai = $_GET["theloai"];
		$mau = $_GET["mau"];
		$truyvansize = (isset($_GET["kichthuoc"]) && $_GET["kichthuoc"] != null) ? ' AND size='.$_GET["kichthuoc"].' ' : '';
		$kt = isset($_GET["kichthuoc"]) ? $_GET["kichthuoc"] : '';
		$trang = $_GET["trang"];
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$s1 = 'SELECT * ';
		$s2 = 'FROM sanpham,theloai ';
		$s3 = 'WHERE sanpham.maloai = theloai.maloai 
					 AND theloai.maloai LIKE "%'.$theloai.'%"
					 AND gia BETWEEN '.$gia_1.' AND '.$gia_2.'
					 AND tensp LIKE "%'.$tensp.'%"
					 AND mausac LIKE "%'.$mau.'%"
					 '.$truyvansize;
		$sql = $s1.$s2.$s3;
		//print_r($sql);
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			unset($_SESSION["TIMKIEMNANGCAO"]);
			while($row = mysqli_fetch_array($result)){
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["TENSP"] = $row["tensp"];
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["GIA"] = $row["gia"];
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["SIZE"] = $row["size"];
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["MAU"] = $row["mausac"];
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["TENLOAI"] = $row["tenloai"];
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["HINHANH"] = $row["hinh1"];
				$_SESSION["TIMKIEMNANGCAO"][$row["masp"]]["MASP"] = $row["masp"];
			}
			function laysophantrang($sptrentrang){
				$soa;
				$sob;
				for($i=2;$i<$sptrentrang;$i++){
					if($sptrentrang % $i == 0){
						$soa = $i;
						$sob = $sptrentrang / $i ;
						return ($soa >= $sob) ? $soa : $sob;
					}
				}
				return $sptrentrang;
			}
			function layso12($somax){
				return 12 / $somax;
			}
			function tongsotrang($sptrentrang,$demsp){
				$a = $demsp / $sptrentrang;
				$b = (int) $a;
				return ($b == $a) ? $b : $b + 1;
			}
			function phantrang($trang,$sptrentrang,$tongsotrang){
				global $tensp;
				global $gia_1;
				global $gia_2;
				global $theloai;
				global $mau;
				global $kt;
				$ten = "'".$tensp."'";
				$mauu = "'".$mau."'";
				$thel = "'".$theloai."'";
				$giaa = "'".$gia_1."'";
				$giab = "'".$gia_2."'";
				$kich = "'".$kt."'";
				$DAU = "'1'";
				$TRLUI = "'".($trang - 1)."'";
				$TRTIEN =  "'".($trang + 1)."'";
				$CUOI = "'".$tongsotrang."'";
				$string = '<div class="container">
								<div class="row">
									<div class="col-md-12" align="right">
										<div>';
				$dishead = $trang == 1 ? 'style="display:none"' : "";
				$disend = $trang == $tongsotrang ? 'style="display:none"' : "";
				if($tongsotrang == 1){
					$dishead = 'style="display:none"';
					$disend = 'style="display:none"';
				}
				$string .= '<span>
						<input type="button" value="ĐẦU TRANG" class="btn btn-outline-primary" '.$dishead.'" onclick="phantrangtknangcao('.$DAU.','.$ten.','.$giaa.','.$giab.','.$thel.','.$mauu.','.$kich.');"/>
					</span>
					<span>
						<input type="button" value="<" class="btn btn-outline-primary" '.$dishead.'" onclick="phantrangtknangcao('.$TRLUI.','.$ten.','.$giaa.','.$giab.','.$thel.','.$mauu.','.$kich.');"/>
					</span>';
				for($i=1;$i<=$tongsotrang;$i++){
					$gg = $trang == $i ? 'class="btn btn-primary"' : 'class="btn btn-outline-primary"';
					$mm = "'".$i."'";
					$string .= '<span>
									<input type="button" value="'.$i.'" '.$gg.' onclick="phantrangtknangcao('.$mm.','.$ten.','.$giaa.','.$giab.','.$thel.','.$mauu.','.$kich.');"/>
								</span>';
				}
				$string .= '<span>
						<input type="button" value=">" class="btn btn-outline-primary" '.$disend.' onclick="phantrangtknangcao('.$TRTIEN.','.$ten.','.$giaa.','.$giab.','.$thel.','.$mauu.','.$kich.');"/>
					</span>
					<span>
						<input type="button" value="CUỐI TRANG" class="btn btn-outline-primary" '.$disend.' '.$CUOI.'/ onclick="phantrangtknangcao('.$tongsotrang.','.$ten.','.$giaa.','.$giab.','.$thel.','.$mauu.','.$kich.');">
					</span>';
				$string .= '        </div>
								</div>
							 </div>
						<div>';
				return $string;
			}
			$demsp = 0;
			foreach($_SESSION["TIMKIEMNANGCAO"] as $list){$demsp++;}
			$sptrentrang = 6;
			$sobatdau = ($trang-1)*$sptrentrang;
			$somax = laysophantrang($sptrentrang);
			$somin = $sptrentrang / $somax;
			$so12 = layso12($somax);
			$string = '<div class="container">
							<div class="row">
								<div class="col-md-12" align="center">
									<h1 style="color:red;">KẾT QUẢ TÌM KIẾM</h1>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" align="center">
									<h4 style="color:red;">(CÓ '.$demsp.' KẾT QUẢ ĐƯỢC TÌM THẤY)</h4>
								</div>
							</div>
					   <div class="container">
							<div class="row">';
			$smin = 0;
			$smax = 0;
			$bien;
			$demthutusp = -1;
			$demsptrentrang = 0;
			//echo "tongsp :".$demsp;
			$tongsotrang = tongsotrang($sptrentrang,$demsp); 
			foreach($_SESSION["TIMKIEMNANGCAO"] as $list){
				$demthutusp++;
				if($demthutusp >= $sobatdau){
					$demsptrentrang++;
					if($demsptrentrang <= $sptrentrang){
						$smin++;
						if($smin <= $somin){
							$smax++;
							$bien = ($smax == 1) ? $smin - 1 : $bien;
							$jj = "'".$list["MASP"]."'";
							$string .= '<div class="col-md-'.$so12.'">
											<div class="container">
												<div class="card clearfix"> 
													<p class="card-text">'.$list["TENLOAI"].'</p>
													<a href="chitietsanpham.php?masp='.$list["MASP"].'">
														<img class="card-img-top" src="'.$list["HINHANH"].'" style="height:180px;"/>
													</a>
													<h5 class="card-title">'.$list["TENSP"].'</h5>
													<p class="card-text">'.number_format($list["GIA"]).'₫</p>
													<p>
														<span class="size btn btn-success">'.$list["SIZE"].'cm</span>
														<span class="size btn btn-success">'.$list["MAU"].'</span>
													</p>
													<p>
														<a href="chitietsanpham.php?masp='.$list["MASP"].'">
															<span class="btn btn-outline-info">Chi tiết</span>
														</a>
														<span class="btn btn-outline-info" onclick="themvaogiohang('.$jj.');"> Thêm vào giỏ
														</span>
													</p>
												</div>
											</div>
										</div>';
							if($smax < $somax){
								$smin = $bien;
							}else{
								$smax = 0;
								$string .= ($smin < $somin)  ? '</div><br/><div class="row">' : '</div><br/>';
							}
							//echo "min =".$smin."; max = ".$smax;
						}else{
							break;
						}
					}else{
						break;
					}
				}
			}
			$string .= phantrang($trang,$sptrentrang,$tongsotrang);
			$string .= '</div>';
			echo $string;
		}else {
			echo '<div class="container">
					<div class="container">
							<div class="row">
								<div class="col-md-12" align="center">
									<h1 style="color:red;">KẾT QUẢ TÌM KIẾM</h1>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" align="center">
									<h4 style="color:red;">(CÓ 0 KẾT QUẢ ĐƯỢC TÌM THẤY)</h4>
								</div>
							</div>
				</div>';
		}
		$conn->close();	
	}
?>