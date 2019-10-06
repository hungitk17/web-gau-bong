<?php
     
// Lấy thông tin username và password
$username = isset($_POST['username']) ? $_POST['username'] : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;


// Nếu cả hai thông tin username và email đều không có thì dừng, thông báo lỗi
if (!$username && !$password){
    die ('{error:"bad_request"}');
}
 
// Kết nối database
$conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('{error:"bad_request"}');
 
if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
// Khai báo biến lưu lỗi
$error = array(
    'error' => 'success',
    'username' => '',
    'password' => ''
);
 
// Kiểm tra tên đăng nhập
if ($username)
{
    $query = mysqli_query($conn, 'select count(*) as count from khachhang where tendn = "'.  addslashes($username).'"');
 
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] == 0){
            $error['username'] = 'Tên đăng nhập không đúng';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
 
// Kiểm tra password
$password = md5($password);
if ($password)
{
    $query = mysqli_query($conn, 'select count(*) as count from khachhang where mk = "'.  addslashes($password).'" AND tendn ="'.   addslashes($username).'"');
 
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] == 0){
            $error['password'] = 'Mật Khẩu không đúng';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}

 $query1 = mysqli_query($conn, 'select quyen,hoten from khachhang where tendn = "'.  addslashes($username).'"');
 
    if ($query1){
        $row = mysqli_fetch_array($query1, MYSQLI_ASSOC);
            $quyen = (int)$row['quyen'];
			$hoten=$row['hoten'];
        
    }
    else{
        die ('{error:"bad_request"}');
    }

    
 session_start();
 if($error['password']==''&&$error['username']=='')
 {
 $_SESSION['islogin'] = 1;
 $_SESSION['username'] = $username;
 $_SESSION['hoten'] = $hoten;
 $_SESSION['quyen'] = $quyen;
 }
  
// Trả kết quả về cho client
die (json_encode($error));
?>