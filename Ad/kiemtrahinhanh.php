<?php
	if(isset($_POST["maloai"]) && isset($_POST["hinh"])){
		session_start();
		$host = 'localhost';
		$nameuser = 'root';
		$password = '';
		$namedb = 'quanlicuahanggau';
		$conn = new mysqli($host, $nameuser,$password,$namedb);
		if($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }
		mysqli_query($conn,"set names 'utf8'");
		$sql = "SELECT * FROM sanpham WHERE maloai='".$_POST["maloai"]."'";
		$result = $conn->query($sql);
		//echo $sql;
		if ($result->num_rows > 0){
			while($row = mysqli_fetch_array($result)){
				for($i=1;$i<=5;$i++){
					$hinh = "hinh".$i; 
					//echo $row[$hinh]."  ";
					if($row[$hinh] == $_POST["hinh"]){
						echo "true";
						return;
						break;	
					}
				}
			}
			echo "false";
		}else{
			echo "LỖI";
		}
	}
?>