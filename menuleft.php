<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$conn = mysqli_connect('localhost','root','','quanlicuahanggau',3306) or die ('Không thể kết nối tới database');
 
// Câu truy vấn
$sql = 'SELECT * FROM theloai';
$sqlsanpham='select DISTINCT size from sanpham order by size';
if(!(mysqli_query($conn,"set names 'utf8'")))
{
	die ('lỗi font');	
}
// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
$result = mysqli_query($conn, $sql);
$timtheloai = mysqli_query($conn, $sql);
$size=mysqli_query($conn,$sqlsanpham);

// Nếu thực thi không được thì thông báo truy vấn bị sai
if (!$result){
    die ('Câu truy vấn bị sai');
}
?>

	<div class="text-center"><button class="btn btn-info" data-toggle="collapse" data-target="#timkiem">Tìm kiếm Nâng Cao</button></div>
	<div id="timkiem" class="collapse">
		<nav class="navbar">
			<form name="timkiem" method="get" action="index.php" onsubmit="return kttimkiemnangcao();">
				<div class="form-inline">
                	<input name="trang" value="1" style="display:none"/>
					<input class="form-control mr-3" name="tensp" type="text" value="" placeholder="Nhập tên sản phẩm" size="19" id="tensp">
					<button class="btn btn-success" type="submit">Tìm</button>
				</div>
				<!--Tìm theo giá-->
				<div class="form-inline">
					<div class="mr-2">
						<label>Giá từ:</label>
						<input class="text-center" type="text" value="" placeholder="" size="11" id="gia_1" name="gia_1">
					</div>
					<div class="">
						<label>Đến:</label>
						<input class="text-center" type="text" value="" placeholder="" size="11" id="gia_2" name="gia_2">
					</div>
				</div> <br>
				<!--Tìm theo thể loại-->
				<div>
					<select class="form-control" id="theloai" name="theloai">
						<option value="">Thể loại</option>
						<?php
						while ($row = mysqli_fetch_assoc($timtheloai)){
							echo '<option value="'.$row["maloai"].'">'.$row["tenloai"].'</option>';
						}
						?>
					</select>
				</div>
				<!--Tìm theo kích thước-->
				<div>
					<label for="kichthuoc">Kích thước:</label>
					<select multiple class="form-control" id="kichthuoc" name="kichthuoc">
					<?php
						while($row=mysqli_fetch_assoc($size)){
							echo '<option value="'.$row["size"].'">'.$row["size"].'</option>';
						}
					?>
					</select>
				</div><br>
				<!--Tìm theo màu-->
				<lable>Màu:</lable>
				<input type="text" value="" id="mau" name="mau">
			</form>
		</nav>
	</div><br>
	<div class="menuleft" style="border:0;height:500px">
		<ul>
		<?php
		while ($row = mysqli_fetch_assoc($result)){
			echo '<li><a class="nav-link" href="index.php?maloai='.$row["maloai"].'">'.$row["tenloai"].'</a></li>';}
		?>
		</ul>
	</div>


<?php
// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);
 
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($conn);
?>
<link rel="stylesheet" href="css/menuleft.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>