
 <?php
session_start();
				
				if(!($conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306)))
				die ('Không thể kết nối tới database');
				
				if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
          
   
			if(isset($_POST['sub']) && $_POST['sub'] == true)
			{


			
				    $username   = addslashes($_SESSION['username']);
				    $password   = addslashes($_POST['matkhau']);
				    $email      = addslashes($_POST['email']);
				    $hoten      = addslashes($_POST['hovaten']);
				    $sdt        = addslashes($_POST['sodienthoai']);
					//Lưu thông tin thành viên vào bảng
				    // Tiến hành lưu vào CSDL nếu không có lỗi
					$sql='update khachhang set hoten="'.$hoten.'",sdt="'.$sdt.'",email="'.$email.'"';
					if($password != "")
					{
						$password = md5($password);
						$sql.=',mk="'.$password.'" where tendn="'.$username.'"';
			
					}
					else
					{
						$sql.='where tendn="'.$username.'"';
						
					}
					
					    $conn->query($sql);
						// Ngắt kết nối
						$conn->close();
					
						
						header("location:thongtintaikhoan.php");
			}
				
	?>