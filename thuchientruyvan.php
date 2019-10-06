<?php
require 'DataProvider.php';

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['author']) && isset($_POST['year'])){
	$sql = "INSERT INTO T_BOOK(BOOK_TITLE, BOOK_DESC, BOOK_AUTHOR, BOOK_YEAR) VALUES(" .
			"'" . $_POST['title'] . "'," . 
			"'" . $_POST['description'] . "'," . 
			"'" . $_POST['author'] . "'," . 
			"" . $_POST['year'] . ")";
	DataProvider::executeQuery($sql);
}
?>

<form action='addbook.php' method='post'>
	<table align='center'>
		<tr><td>Tựa sách</td><td><input type='text' name='title'></td></tr>
		<tr><td>Mô tả</td><td><input type='text' name='description'></td></tr>
		<tr><td>Tác giả</td><td><input type='text' name='author'></td></tr>
		<tr><td>NXB</td><td><input type='text' name='year'></td></tr>
		<tr><td><input type='submit' value='Thêm sách mới'></td><td><input type='reset' value='Làm lại'></td></tr>
	</table>
</form>

<?php
$sql = "SELECT * FROM T_BOOK";
$result = DataProvider::executeQuery($sql);

// Hien thi ket qua
echo '<table width="600" align="center" border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">';
   echo "<tr>";
   echo "<th>STT</th>";
   echo "<th>Tựa sách</th>";   	   
   echo "<th>Mô tả</th>";
   echo "<th>Tác giả</th>";
   echo "<th>NXB</th>";
   echo "<th>Đơn giá</th>";   
   echo "<th>Ảnh bìa</th>";
   echo "</tr>";
   $i = 1;
   while ($row = mysql_fetch_array($result))
   {
   	    echo "<tr>";
   	   	echo "<td>" . $i . "</td>";
   	   	echo "<td>" . $row['BOOK_TITLE'] . "</td>";
   	   	echo "<td>" . $row['BOOK_DESC'] . "</td>";
   	   	echo "<td>" . $row['BOOK_AUTHOR'] . "</td>";
   	   	echo "<td>" . $row['BOOK_YEAR'] . "</td>";
   	   	echo "<td>" . $row['BOOK_PRICE'] . "</td>";
		echo "<td><img src='images/" . $row["BOOK_PIC"] . "'></td>";
      	echo "</tr>";
      	
      	$i++;
   }
   echo "</table>";

?>