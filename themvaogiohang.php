<?php
	session_start();
	$host = 'localhost';
	$nameuser = 'root';
	$password = '';
	$namedb = 'quanlicuahanggau';
	$conn = new mysqli($host, $nameuser,$password,$namedb);
	if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
	mysqli_query($conn,"set names 'utf8'");
	$sql = "SELECT * FROM sanpham";
	function themsp1($MASP){
		global $result;
		global $sql;
		global $conn;
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = mysqli_fetch_array($result)){
				if($MASP == $row["masp"]){
					$_SESSION["SANPHAMGAUBONG"][$MASP]["HINH1"] = $row["hinh1"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["HINH2"] = $row["hinh2"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["HINH3"] = $row["hinh3"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["HINH4"] = $row["hinh4"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["HINH5"] = $row["hinh5"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["MASP"] =  $row["masp"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["TENSP"] =  $row["tensp"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["GIA"] =  $row["gia"];
					$_SESSION["SANPHAMGAUBONG"][$MASP]["SOLUONG"] =  1;
					break;
				}
			}
		}else {echo "Không có record nào";}
	}
	if(isset($_POST["masp"])){
		if($_POST["masp"] != "0"){
			$MASP = $_POST["masp"];
			if(!isset($_SESSION["SANPHAMGAUBONG"]) || $_SESSION["SANPHAMGAUBONG"] == null){
				themsp1($MASP);
			}else{
				if(array_key_exists($MASP,$_SESSION["SANPHAMGAUBONG"])){
					$_SESSION["SANPHAMGAUBONG"][$MASP]["SOLUONG"] += 1;
				}else{
					themsp1($MASP);
				}
			}
			$tong = 0;
			foreach($_SESSION["SANPHAMGAUBONG"] as $list){
				$tong += $list["SOLUONG"]; 
			}
			echo $tong;
			$conn->close();
		}else{
			if(!isset($_SESSION["SANPHAMGAUBONG"])){
				echo "0";
			}else{
				$tong = 0;
				foreach($_SESSION["SANPHAMGAUBONG"] as $list){
					$tong += $list["SOLUONG"]; 
				}
				echo $tong;
			}
		}
	}
	//echo "<pre>";
	//print_r($_SESSION["SANPHAMGAUBONG"]);
	//header("location:index.php");
	//unset($_SESSION["SANPHAMGAUBONG"]);
	//session_destroy();
?>