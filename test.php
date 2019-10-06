<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
</head>
<script>
	function xem(){
		alert("xem");
		$.get("xemgiohang.php",{},function(value){
			alert("vao");
			$("#paging").html(value);
		});
	 }
</script>
<body>
<div onclick="xem();">gio hang</div>
<div id="paging"></div>
</body>
</html>