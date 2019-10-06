<?php
	if(isset($_GET["giohang"]) && isset($_GET["trang"])){
		//session_start();
		if(isset($_SESSION["SANPHAMGAUBONG"]) && $_SESSION["SANPHAMGAUBONG"] != null){
			function tongsotrang($tongsp,$sptrentrang){
				$kk = ($tongsp/$sptrentrang);
				$kl = (int) $kk;
				return $kl == $kk ? $kl : $kl + 1 ;
			}
			$string = '';
			$cong = "'+'";
			$tru = "'-'";
			$delete = "'x'";
			$dem = 0;
			$tongtien = 0;
			$sptrentrang = 2;
			$trang = isset($_GET["trang"]) ? $_GET["trang"] : 1 ;
			$tongsp = 0;
			foreach($_SESSION["SANPHAMGAUBONG"] as $list){$tongsp++;}
			$tongsotrang = tongsotrang($tongsp,$sptrentrang);
			$trang = $trang > $tongsotrang ? $tongsotrang : $trang;
			$trang = $trang < 1 ? 1 : $trang;
			$trang_so = "'".$trang."'";
			$sobd = ($trang - 1)*$sptrentrang;
			$sttsp = -1;
			function phantrang(){
				global $trang;
				global $sptrentrang;
				global $tongsotrang;
				//$tongsp = 0;
				//foreach($_SESSION["SANPHAMGAUBONG"] as $list){$tongsp++;}
				//$tongsotrang = tongsotrang($tongsp,$sptrentrang);
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
						<input type="button" value="ĐẦU TRANG" class="btn btn-outline-primary" '.$dishead.'" onclick="phantrang('.$DAU.');"/>
					</span>
					<span>
						<input type="button" value="<" class="btn btn-outline-primary" '.$dishead.'" onclick="phantrang('.$TRLUI.');"/>
					</span>';
				for($i=1;$i<=$tongsotrang;$i++){
					$gg = $trang == $i ? 'class="btn btn-primary"' : 'class="btn btn-outline-primary"';
					$mm = "'".$i."'";
					$string .= '<span>
									<input type="button" value="'.$i.'" '.$gg.' onclick="phantrang('.$mm.');"/>
								</span>';
				}
				$string .= '<span>
						<input type="button" value=">" class="btn btn-outline-primary" '.$disend.' onclick="phantrang('.$TRTIEN.');"/>
					</span>
					<span>
						<input type="button" value="CUỐI TRANG" class="btn btn-outline-primary" '.$disend.' '.$CUOI.'/ onclick="phantrang('.$tongsotrang.');">
					</span>';
				$string .= '        </div>
								</div>
							 </div>
						<div>';
				return $string;
			}
			if(isset($_SESSION["SANPHAMGAUBONG"]) && $_SESSION["SANPHAMGAUBONG"] != null){
				foreach($_SESSION["SANPHAMGAUBONG"] as $list){$tongtien += $list["GIA"]*$list["SOLUONG"];}
				$string .= '<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div align="center">
											<b style="color:red;"><h1>THÔNG TIN GIỎ HÀNG</h1></b>
										</div>
									</div>
								</div>
							</div>';
				foreach($_SESSION["SANPHAMGAUBONG"] as $list){
					$sttsp++;
					if($sttsp >= $sobd){
						$dem++;
						if($dem <= $sptrentrang){
							$idanh = "'anh".$dem."'";
							$kl = "'".$list["MASP"]."'";
							$a1 = "'".$list["HINH1"]."'";
							$a2 = "'".$list["HINH2"]."'";
							$a3 = "'".$list["HINH3"]."'";
							$a4 = "'".$list["HINH4"]."'";
							$hinh1 = ($list["HINH1"] != null && $list["HINH1"] != "") ? '<img src="'.$list["HINH1"].'" style="height:150px; width:120px;" onmousemove="thaydoi('.$a1.','.$idanh.');"/>' : "";
							$hinh2 = ($list["HINH2"] != null && $list["HINH2"] != "") ? '<img src="'.$list["HINH2"].'" style="height:150px; width:120px;" onmousemove="thaydoi('.$a2.','.$idanh.');"/>' : "";
							$hinh3 = ($list["HINH3"] != null && $list["HINH3"] != "") ? '<img src="'.$list["HINH3"].'" style="height:150px; width:120px;" onmousemove="thaydoi('.$a3.','.$idanh.');"/>' : "";
							$hinh4 = ($list["HINH4"] != null && $list["HINH4"] != "") ? '<img src="'.$list["HINH4"].'" style="height:150px; width:120px;" onmousemove="thaydoi('.$a4.','.$idanh.');"/>' : "";
							$string .= '<div class="container">
							<div class="row">
								<div class="col-md-4 border" id='.$idanh.'>
									<img src="'.$list["HINH1"].'" style="height:300px; width:250px; margin-top:10px;"/>
								</div>
								<div class="col-md-8 border">
									<div class="container">
										<div class="row">
											<div class="col-md-12" align="center">
													<b>'.$list["TENSP"].'</b>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 ">
												<div class="border border-secondary border-5 rounded " align="center">
													<b>ĐƠN GIÁ</b>
												</div>
											</div>
											<div class="col-md-8 ">
												<p><b>'.number_format($list["GIA"]).' VNĐ</b></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 ">
												<div class="border border-primary border-5 rounded " align="center">
													<b>SỐ LƯỢNG</b>
												</div>
											</div>
											<div class="col-md-8 ">
												<div>
													<p><b>
														<input type="button" value="-"  onclick="xulygiohang('.$kl.','.$tru.','.$trang_so.')" />
														'.$list["SOLUONG"].'
														<input type="button" value="+"  onclick="xulygiohang('.$kl.','.$cong.','.$trang_so.')" />
													</b></p>                    
												</div>    
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 ">
												<div class="border border-dark border-5 rounded " align="center">
													<b>THÀNH TIỀN</b>
												</div>
											</div>
											<div class="col-md-8 ">
												<p style="color:red"><b>'.number_format($list["SOLUONG"]*$list["GIA"]).' VNĐ</b></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 ">
												<div class="border border-dark border-5 rounded " align="center">
													<b>XÓA</b>
												</div>
											</div>
											<div class="col-md-8 ">
												<div style="color:red"><input type="button" value="X"  onclick="xulygiohang('.$kl.','.$delete.','.$trang_so.')" /></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3" style="margin-top:10px;">
												'.$hinh1.'
											</div>
											<div class="col-md-3" style="margin-top:10px;">
												'.$hinh2.'
											</div>
											<div class="col-md-3" style="margin-top:10px;">
												'.$hinh3.'
											</div>
											<div class="col-md-3" style="margin-top:10px;">
												'.$hinh4.'
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-12" style="color:white;">
									   cách ra
								</div>
							</div>
						</div>
						';
						}else{break;}
					}
				}
				$string .= '<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="border border-secondary border-5 rounded " align="center">
											<b>TỔNG TIỀN</b>
										</div>
									</div>
									<div class="col-md-8">
											<p style="color:red;"><b>'.number_format($tongtien).' VNĐ</b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="border border-secondary border-5 rounded " align="center">
											<b>THANH TOÁN</b>
										</div>
									</div>
									<div class="col-md-8">
											<a href="ThongTinGiaoHang.php"><span class="fas fa-cart-plus"></span></a>
									</div>
								</div>
							</div>';
				$string .= phantrang();
			}else{
				$string .= '<h1 style="color:red;">CHƯA CÓ SẢN PHẨM NÀO!!</h1>';
			}
			echo $string;
		}else{
			echo '<h1 style="color:red;">CHƯA CÓ SẢN PHẨM NÀO!!</h1>';
		}
	}
?>