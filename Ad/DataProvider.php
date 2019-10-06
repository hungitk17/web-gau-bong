<?php
function executeQuery($sql)
	{
		include ('db.inc');
		//include_once('error.inc');
		// 1. Tao ket noi CSDL
		if(!($conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306)))
			die ('Không thể kết nối tới database');
		//2. Thiet lap font Unicode
		if(!(mysqli_query($conn,"set names 'utf8'")))
		{
		die ('lỗi font');	
		}
		// Thuc thi cau truy van
		if (!($result = mysqli_query($conn, $sql)))
			showError();
		// Dong ket noi CSDL
		if (!(mysqli_close($conn)))
			showError();
		return $result;
	}
?>