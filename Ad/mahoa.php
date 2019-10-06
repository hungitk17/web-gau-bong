<?php
	if(isset($_POST["matkhau"])){
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$sql = 'INSERT INTO `khachhang`(`tendn`, `mk`, `sdt`, `email`, `quyen`, `hoten`) VALUES ("MYTEST",MD5("'.$_POST["matkhau"].'"),"","","","")';
		if(($conn->query($sql) === TRUE)) {
			$sql = 'SELECT * FROM khachhang WHERE tendn="MYTEST"';
			$op = $conn->query($sql);
			$matkhau = "c20ad4d76fe97759aa27a0c99bff6710";
			if($op->num_rows > 0){
				while($row = mysqli_fetch_array($op)){
					$matkhau = $row["mk"];
					break;
				}
			}
			$sql = 'DELETE FROM khachhang WHERE tendn="MYTEST"';
			if (($conn->query($sql) === TRUE)) {
				echo $matkhau;
			}
		}
		$conn->close();
		echo "";
	}
?>