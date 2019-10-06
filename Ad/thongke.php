<form method="post" action="admin.php?id=thongke">
<div>
	Thống kê đơn hàng theo tháng
    <select name="chon">
    	<option value=""></option>
    	<option value="01">Tháng 1</option>
        <option value="02">Tháng 2</option>
        <option value="03">Tháng 3</option>
        <option value="04">Tháng 4</option>
        <option value="05">Tháng 5</option>
        <option value="06">Tháng 6</option>
        <option value="07">Tháng 7</option>
        <option value="08">Tháng 8</option>
        <option value="09">Tháng 9</option>
        <option value="10">Tháng 10</option>
        <option value="11">Tháng 11</option>
        <option value="12">Tháng 12</option>
    </select>
    <input type="submit" value="Thực hiện">
</div>
<br>
<div>
	Thống kê đơn hàng theo giá từ
    <input type="text" id="giadtu" name="giatu"> đến <input type="text" id="giaden" name="giaden">
    <input type="submit" value="Thực hiện">
</div>
<br>
<div>
	Thống kê đơn hàng theo trạng thái 
    <select name="trangthai">
    	<option></option>
    	<option value="Chưa Giao">Chưa giao</option>
        <option value="Đang Giao">Đang giao</option>
        <option value="Đã Giao">Đã giao</option>
    </select>
    <input type="submit" value="Thực hiện">
</div>
</form>
<?php
	if(isset($_POST['chon'])&&$_POST['chon']!='')
	{
	if(isset($_POST['chon'])&&$_POST['chon']!='')
	{
	$conn = new mysqli('localhost', 'root','','quanlicuahanggau',3306);//ten may chu , tai khoan,mat khau,ten database,port
 				if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
			// Nếu kết nối thất bại
			if ($conn->connect_error) {
				die("Kết nối thất bại: " . $conn->connect_error);
			} 
			
    $sql = 'select * from hoadon where ngaydathang like "%-'.$_POST['chon'].'-%"';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
			echo '<br><table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Mã hóa đơn</th>
        <th>Tài khoản người dùng</th>
        <th>Ngày Đặt Hàng</th>
		<th>Trạng Thái</th>
		<th>Tổng Tiền</th>
      </tr>
    </thead>
    <tbody>';
			while($row = $result->fetch_assoc()) {
					echo '<tr>
        <td>'.$row['mahd'].'</td>
        <td>'.$row['taikhoannguoidung'].'</td>
        <td>'.$row['ngaydathang'].'</td>
		<td>'.$row['trangthai'].'</td>
		<td>'.$row['tongtien'].'</td>
      </tr>';
				}
				echo '</tbody>
  </table>';
	}
	else {
			echo '<h3><center style="color:red">Không có kết quả nha.</center><h3>';
	}
}
	}
?>
<?php
if(isset($_POST['giatu'])&&isset($_POST['giaden'])&&($_POST['giatu']!=''||$_POST['giaden']!='')){
	if(isset($_POST['giatu'])||isset($_POST['giaden']))
	{
	$conn1 = new mysqli('localhost', 'root','','quanlicuahanggau',3306);//ten may chu , tai khoan,mat khau,ten database,port
 				if(!(mysqli_query($conn1,"set names 'utf8'")))
				{
					die('lỗi font');
				}
			// Nếu kết nối thất bại
			if ($conn1->connect_error) {
				die("Kết nối thất bại: " . $conn1->connect_error);
			} 
	if($_POST['giatu']=='')
	{
		$_POST['giatu']=0;
	}
	if($_POST['giaden']=='')
	{
		$_POST['giaden']=99999999999;
	}
	if($_POST['giatu']==''&&$_POST['giaden']=='')
	{
		$_POST['giatu']=0;
		$_POST['giaden']=0;
	}
    $sql1 = 'select * from hoadon where tongtien between '.$_POST['giatu'].' and '.$_POST['giaden'];
    $result1 = $conn1->query($sql1);
    if ($result1->num_rows > 0) {
			echo '<br><table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Mã hóa đơn</th>
        <th>Tài khoản người dùng</th>
        <th>Ngày Đặt Hàng</th>
		<th>Trạng Thái</th>
		<th>Tổng Tiền</th>
      </tr>
    </thead>
    <tbody>';
			while($row1 = $result1->fetch_assoc()) {
					echo '<tr>
        <td>'.$row1['mahd'].'</td>
        <td>'.$row1['taikhoannguoidung'].'</td>
        <td>'.$row1['ngaydathang'].'</td>
		<td>'.$row1['trangthai'].'</td>
		<td>'.$row1['tongtien'].'</td>
      </tr>';
				}
				echo '</tbody>
  </table>';
	}
	else {
			if($result1->num_rows <= 0)
			{
			echo '<h3><center style="color:red">Không có kết quả rồi</center><h3>';
			}
	}
}
}
?>
<?php
if(isset($_POST['trangthai'])&&$_POST['trangthai']!='')
{
	if(isset($_POST['trangthai'])&&$_POST['trangthai']!="")
	{
	$conn = new mysqli('localhost', 'root','','quanlicuahanggau',3306);//ten may chu , tai khoan,mat khau,ten database,port
 				if(!(mysqli_query($conn,"set names 'utf8'")))
				{
					die('lỗi font');
				}
			// Nếu kết nối thất bại
			if ($conn->connect_error) {
				die("Kết nối thất bại: " . $conn->connect_error);
			} 
			
    $sql2 = 'select * from hoadon where trangthai = "'.$_POST['trangthai'].'"';
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
			echo '<br><table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Mã hóa đơn</th>
        <th>Tài khoản người dùng</th>
        <th>Ngày Đặt Hàng</th>
		<th>Trạng Thái</th>
		<th>Tổng Tiền</th>
      </tr>
    </thead>
    <tbody>';
			while($row2 = $result2->fetch_assoc()) {
					echo '<tr>
        <td>'.$row2['mahd'].'</td>
        <td>'.$row2['taikhoannguoidung'].'</td>
        <td>'.$row2['ngaydathang'].'</td>
		<td>'.$row2['trangthai'].'</td>
		<td>'.$row2['tongtien'].'</td>
      </tr>';
				}
				echo '</tbody>
  </table>';
	}
	else {
			if($result2->num_rows <= 0){
			echo '<h3><center style="color:red">Không có kết quả đâu</center><h3>';
			}
	}
}
}
?>