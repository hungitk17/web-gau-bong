<?php

$conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('Không thể kết nối tới database');
 
$id=isset($_GET['maloai']) ? $_GET['maloai'] : "";
// Câu truy vấn
$sql = 'SELECT tenloai FROM theloai where maloai="'.$id.'"';
if(!(mysqli_query($conn,"set names 'utf8'")))
{
	die('lỗi font');
}
// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
$result = mysqli_query($conn, $sql);
 
// Nếu thực thi không được thì thông báo truy vấn bị sai
if (!$result){
    die ('Câu truy vấn bị sai');
}

// Lặp qua kết quả và in ra ngoài màn hình
// Vì các field trong database là id, name, phone, address nên
// khi vardum mang sẽ có cấu trúc tương tự
while ($row = mysqli_fetch_assoc($result)){
    echo '<h1><center style="margin:10px;font-weight:bold;">'.$row["tenloai"].'</center></h1>';
}

 
// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);
 
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($conn);
?>