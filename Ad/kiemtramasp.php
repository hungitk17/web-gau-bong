<?php
	if(isset($_POST["masp"])){
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$masp = $_POST["masp"];
		$sql = 'SELECT * FROM sanpham';
		$op = $conn->query($sql);
		if ($op->num_rows > 0){
			$g = 0;
			while($row = mysqli_fetch_array($op)){
				if($row["masp"] == $masp){
					$g++;
					break;
				}
			}
			if($g == 0){
				echo "true";
			}else{
				echo "false";
			}
		}
	}
?>