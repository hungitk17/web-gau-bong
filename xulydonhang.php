<?php 
	session_start();
	
	$user=$_SESSION['username'];
	
	$conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('{error:"bad_request"}');

	if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
	$thongtin = array(
				'MaNguoiDung' => '',
				'HoTen' => '',
				'TenDangNhap' =>'',
				'MatKhau' => '',
				'Sdt'=> '',
				'Email'=> ''
				);
	if ($user)
	{
		$sql='select * from khachhang where tendn = "'.  addslashes($user).'"';
		$result = $conn->query($sql);

		if ($result->num_rows>0){
			while($row = $result->fetch_assoc())
			{
				$thongtin = array(
				'makh' => $row['makh'],
				'HoTen' => $row['hoten'],
				'TenDangNhap' =>$row['tendn'],
				'MatKhau' => $row['mk'],
				'Sdt'=> $row['sdt'],
				'Email'=> $row['email']
				);
			}
		}
		else{
			die ('{error:"bad_request"}');
		}
	}
	$tongtien=0;
	foreach($_SESSION["SANPHAMGAUBONG"] as $list){$tongtien += $list["GIA"]*$list["SOLUONG"];}
	$day = date('d-m-Y');
	//xây dựng sql dat hang
	$sql1 = 'insert into hoadon(taikhoannguoidung,ngaydathang,tongtien,diachigiaohang,hinhthucvanchuyen,hinhthucthanhtoan,trangthai) values ("'.$thongtin['TenDangNhap'].'","'.$day.'","'.$tongtien.'","'.$_POST['diachi'].'","'.$_POST['giaohang'].'","'.$_POST['thanhtoan'].'","Chưa Giao")';
	$madh=0;
	 if ($conn->query($sql1) === TRUE) {
		    $mahd = $conn->insert_id;//lấy id tự động tăng 
		  
		} else {
		    echo $conn->error;
		}
	foreach($_SESSION['SANPHAMGAUBONG'] as $list)
	{
		$sql2 = 'insert into chitiethoadon(masp,soluongmua,gia,thanhtien,mahd) values("'.$list['MASP'].'","'.$list['SOLUONG'].'","'.$list['GIA'].'","'.$list['SOLUONG']*$list['GIA'].'","'.$mahd.'")';
		
		if ($conn->query($sql2) === TRUE) {
		   
		  
		} else {
		    echo "0";
		}
	}
	unset($_SESSION['SANPHAMGAUBONG']);
	echo "1";
 ?>