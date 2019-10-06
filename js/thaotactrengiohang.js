function thaydoi(name,id){
	document.getElementById(""+id+"").innerHTML = '<img src="'+name+'" style="height:300px; width:250px; margin-top:10px;"/>';
}
function xemgiohang(){
	if(localStorage.getItem("taikhoan") ==  "login" && !(localStorage.getItem("taikhoan") ==  null)){
		var a = 1;
		var b = "true";
		$.get("xemgiohang.php",{giohang:b,trang:a},function(value){
			$("#xuat").html(value);
		});
		document.getElementById("hienthi").innerHTML = "<h3 class='d-flex justify-content-center'>THÔNG TIN GIỎ HÀNG</h3>";
		location.href = "?giohang=true&&trang=1";
	}else{
		alert("VUI LÒNG ĐĂNG NHẬP!!!");
		return false;
	}
}
function xulygiohang(ma,va,so){
	if(localStorage.getItem("taikhoan") ==  "login" && !(localStorage.getItem("taikhoan") ==  null)){
		if(va == "x" || va == "X"){
			var f = confirm("BAN CÓ THỰC SỰ MUỐN XÓA SẢN PHẨM?")
			va = (f == 1) ? va : "";
		}
		$.post("xulysanphamgiohang.php",{masp:ma,value:va,trang:so},function(value){
			$("#xuat").html(value);
			var fg = "0";
			$.post("themvaogiohang.php",{masp:fg},function(value){
				document.getElementById("soluongsp").innerHTML = value;
			});
		});
	}else{
		alert("VUI LÒNG ĐĂNG NHẬP!!!");
		return false;
	}
}
function themvaogiohang(MASP){
	//alert(localStorage.getItem("taikhoan"));
	if(localStorage.getItem("taikhoan") ==  "login" && !(localStorage.getItem("taikhoan") ==  null)){
		$.post("themvaogiohang.php",{masp:MASP},function(value){
			document.getElementById("soluongsp").innerHTML = value;
			alert("SẢN PHẨM ĐÃ ĐƯỢC THÊM VÀO GIỎ HÀNG!!");
		});
	}else{
		alert("VUI LÒNG ĐĂNG NHẬP!!!");
		return false;
	}
}
function thanhtoan(){
	$.post("thanhtoangiohang.php",{},function(value){
		$("#xuat").html(value);
		alert("BẠN ĐÃ THANH TOÁN THÀNH CÔNG!!");
	});
}
function phantrang(so){
	var a = Number(so);
	var b = "true";
	//alert("vào trang "+a);
	$.get("xemgiohang.php",{giohang:b,trang:a},function(value){
		$("#xuat").html(value);
	});
	location.href = "?giohang=true&&trang="+a+"";
}
window.onload = function(){
	if(localStorage.getItem("taikhoan") ==  "login" && !(localStorage.getItem("taikhoan") ==  null)){
		var fg = "0";
		$.post("themvaogiohang.php",{masp:fg},function(value){
			document.getElementById("soluongsp").innerHTML = value;
		});
	}
}