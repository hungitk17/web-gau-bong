function xulysanpham(ma,trang,se){
	//alert(ma + " " + trang + " " +se);
	if(trang == "xoa"){
		var bool = confirm("ANH THỰC SỰ MUỐN XÓA SẢN PHẨM CHỨ??");
		if(bool){
			$.post("xulysanpham.php",{masp:ma,trangthai:trang,seach:se},function(value){
				alert("ĐÃ XÓA SẢN PHẨM!!");
				location.reload();
			});
		}
	}else if(trang == "sua" || trang == "them"){
		$.post("xulysanpham.php",{masp:ma,trangthai:trang,seach:se},function(value){
			$("#xuat").html(value);
			//alert(value);
		});
	}
}
function hienthimahoa(){
	var mk = document.getElementById("suamk");
	if(mk.value == "" || mk.value == null){
		document.getElementById("mahoa").innerHTML = '<input type="text" placeholder="" size="25px;" disabled="disabled"/>	';
	}else{
		$.post("mahoa.php",{matkhau:mk.value},function(value){
			var fg = '<input type="text" placeholder="'+value+'" size="25px;" disabled="disabled"/>';
			document.getElementById("mkk").value = value;
			$("#mahoa").html(fg);
		});
	}
}
function xulytaikhoan(ma,trang){
	if(trang == "xoa"){
		var bool = confirm("ANH THỰC SỰ MUỐN XÓA TÀI KHOẢN NÀY CHỨ??");
		if(bool){
			$.post("xulytaikhoan.php",{tendn:ma,trangthai:trang},function(value){
				alert("ĐÃ XÓA TÀI KHOẢN!!");
				location.reload();
			});
		}
	}else if(trang == "sua" || trang == "them"){
		$.post("xulytaikhoan.php",{tendn:ma,trangthai:trang},function(value){
			$("#xuat").html(value);
		});
	}
}
function chohinhanh(){
	var hinhanh1 = document.getElementById("chonhinhanh").value;
	var hinhanh2 = document.getElementById("luuhinhanhsua").value;
	if(hinhanh1 != ""){
		var a = hinhanh1.split("\\");
		var b = hinhanh2.split("/");
		var c = b[0] + "/" + b[1] + "/" + a[2];
		document.getElementById("xuathinhanhsua").innerHTML = '<img src="../'+c+'" width="50px" height="50px">';
		document.getElementById("luuhinhanhsua").value = c;
	}
}
function kiemtrakytudacbiet(key){
	var a = "`~!@#$%^&*()-_=+[{]};:'\",<.>/\|";
	for(var i=0;i<key.length;i++){
		if(a.indexOf(key.charAt(i)) != -1){
			return true;
		}
	}
	return false;
}
function huy(){
	location.reload();
}
function kiemtrasuasp(){
	var tensp = document.getElementById("suatensp");
	var gia = document.getElementById("suagia");
	var stringgia = gia.value+"";
	var size = document.getElementById("suasize");
	var stringsize = size.value+"";
	var mau = document.getElementById("suamau");
	var hinhanh = document.getElementById("chonhinhanh");
	var trangthai = document.getElementById("suatrangthai");
	var soluong = document.getElementById("suasoluong");
	var chatlieu = document.getElementById("suachatlieu");
	var mota = document.getElementById("suamota");
	if(kiemtrakytudacbiet(tensp.value)){
		document.getElementById("loisuatensp").style.display = "block";
		document.getElementById("loisuatensp").innerHTML = "KHÔNG ĐƯỢC CÓ KÝ TỰ ĐẶC BIỆT!";
		tensp.focus();
		return false;
	}else if(tensp.value.length > 50){
		document.getElementById("loisuatensp").style.display = "block";
		document.getElementById("loisuatensp").innerHTML = "KHÔNG ĐƯỢC CÓ QUÁ 50 KÝ TỰ!";
		tensp.focus();
		return false;
	}else if(!isNaN(tensp.value)){
		document.getElementById("loisuatensp").style.display = "block";
		document.getElementById("loisuatensp").innerHTML = "KHÔNG HỢP LỆ!";
		tensp.focus();
		return false;
	}
	document.getElementById("loisuatensp").style.display = "none";
	if(isNaN(gia.value)){
		document.getElementById("loisuagia").style.display = "block";
		document.getElementById("loisuagia").innerHTML = "XIN NHẬP SỐ!";
		gia.focus();
		return false;
	}else if(stringgia.length > 11){
		document.getElementById("loisuagia").style.display = "block";
		document.getElementById("loisuagia").innerHTML = "GIÁ TIỀN QUÁ LỚN!";
		gia.focus();
		return false;
	}
	document.getElementById("loisuagia").style.display = "none";
	if(isNaN(size.value)){
		document.getElementById("loisuasize").style.display = "block";
		document.getElementById("loisuasize").innerHTML = "XIN NHẬP SỐ!";
		size.focus();
		return false;
	}else if(stringsize.length > 11){
		document.getElementById("loisuasize").style.display = "block";
		document.getElementById("loisuasize").innerHTML = "KÍCH THƯỚC QUÁ LỚN!";
		size.focus();
		return false;
	}
	document.getElementById("loisuasize").style.display = "none";
	if(kiemtrakytudacbiet(mau.value)){
		document.getElementById("loisuamau").style.display = "block";
		document.getElementById("loisuamau").innerHTML = "KHÔNG ĐƯỢC CÓ KÝ TỰ ĐẶC BIỆT!";
		mau.focus();
		return false;
	}else if(mau.value.length > 10){
		document.getElementById("loisuamau").style.display = "block";
		document.getElementById("loisuamau").innerHTML = "KHÔNG ĐƯỢC CÓ QUÁ 10 KÝ TỰ!";
		mau.focus();
		return false;
	}else if(!isNaN(mau.value)){
		document.getElementById("loisuamau").style.display = "block";
		document.getElementById("loisuamau").innerHTML = "KHÔNG HỢP LỆ!";
		mau.focus();
		return false;
	}
	document.getElementById("loisuamau").style.display = "none";
	if(isNaN(trangthai.value)){
		document.getElementById("loisuatrangthai").style.display = "block";
		document.getElementById("loisuatrangthai").innerHTML = "XIN NHẬP SỐ!";
		trangthai.focus();
		return false;
	}
	document.getElementById("loisuatrangthai").style.display = "none";
	if(isNaN(soluong.value)){
		document.getElementById("loisuasoluong").style.display = "block";
		document.getElementById("loisuasoluong").innerHTML = "XIN NHẬP SỐ!";
		soluong.focus();
		return false;
	}
	document.getElementById("loisuasoluong").style.display = "block";
	document.getElementById("loixuathinhanhsua").style.display = "none";
	var mal = document.getElementById("ml").value;
	var msp  = document.getElementById("msp").value;
	var dan = '"'+document.getElementById("luuhinhanhsua").value+'"';
	var fgh = confirm("BẠN THỰC SỰ MUỐN LƯU THAY ĐỔI?");
	if(fgh){
		return true;			
	}else{
		return false;
	}
}
function kiemtrasuatk(){
	var hoten = document.getElementById("suahoten");
	var mk = document.getElementById("suamk");
	var sdt = document.getElementById("suasdt");
	var email = document.getElementById("suaemail");
	var quyen = document.getElementById("quyen");
	var tendn = document.getElementById("tendn");
	var tfsodienthoai = /^(03|05|07|08|09)\d{8}$/;
	var tfmail = /^\w+(_|.){0,2}(\w)+(@email.com|@gmail.com)$/;
	if(hoten.value == "" || hoten.value == null){
		document.getElementById("loisuahoten").style.display = "block";
		document.getElementById("loisuahoten").innerHTML = "XIN NHẬP HỌ TÊN!";
		hoten.focus();
		return false;
	}else if(kiemtrakytudacbiet(hoten.value)){
		document.getElementById("loisuahoten").style.display = "block";
		document.getElementById("loisuahoten").innerHTML = "KHÔNG CÓ KÝ TỰ ĐẶC BIỆT!";
		hoten.focus();
		return false;
	}else if(!isNaN(hoten.value)){
		document.getElementById("loisuahoten").style.display = "block";
		document.getElementById("loisuahoten").innerHTML = "KHÔNG HỢP LỆ!";
		hoten.focus();
		return false;
	}
	document.getElementById("loisuahoten").style.display = "none";
	if(kiemtrakytudacbiet(mk.value)){
		document.getElementById("loisuamk").style.display = "block";
		document.getElementById("loisuamk").innerHTML = "KHÔNG ĐƯỢC CÓ KÝ TỰ ĐẶC BIỆT!";
		mk.focus();
		return false;
	}else if(mk.value.length > 50){
		document.getElementById("loisuamk").style.display = "block";
		document.getElementById("loisuamk").innerHTML = "MẬT KHẨU QUÁ DÀI!";
		mk.focus();
		return false;
	}
	document.getElementById("loisuamk").style.display = "none";
	$.post("mahoa.php",{matkhau:mk.value},function(value){
		var fg = '<input type="text" placeholder="'+value+'" size="12px;" disabled="disabled"/>';
		document.getElementById("mkk").value = value;
		$("#mahoa").html(fg);
	});
	if(sdt.value == "" || sdt.value == null){
		document.getElementById("loisuasdt").style.display = "block";
		document.getElementById("loisuasdt").innerHTML = "XIN NHẬP SỐ ĐIỆN THOẠI!";
		sdt.focus();
		return false;
	}else if(tfsodienthoai.exec(sdt.value) == null){
		document.getElementById("loisuasdt").style.display = "block";
		document.getElementById("loisuasdt").innerHTML = "SỐ ĐIỆN THOẠI KHÔNG HỢP LỆ!";
		sdt.focus();
		return false;
	}
	document.getElementById("loisuasdt").style.display = "none";
	if(email.value == "" || email.value == null){
		document.getElementById("loisuaemail").style.display = "block";
		document.getElementById("loisuaemail").innerHTML = "XIN NHẬP MAIL!";
		email.focus();
		return false;
	}else if(tfmail.exec(email.value) == null){
		document.getElementById("loisuaemail").style.display = "block";
		document.getElementById("loisuaemail").innerHTML = "MAIL KHÔNG HỢP LỆ!";
		email.focus();
		return false;
	}else{
		document.getElementById("loisuaemail").style.display = "none";
		var mangbig = "'"+hoten.value+"-"+tendn.value+"-"+mk.value+"-"+sdt.value+"-"+email.value+"-"+quyen.value+"'";
		var mkk = document.getElementById("mkk").value;
		//alert("mkk="+mkk);
		var stringg = '<div class="container-fluid"><div class="row">\
			<div class="col-md-12">\
				<h1 style="color:red;" align="center"><b id="thongbao1">CHỈNH SỬA TÀI KHOẢN</b> </h1>\
				<h1 style="color:red;" align="center" id="thongbao2"><b>HOÀN THÀNH</b> </h1>\
			</div>\
		</div>\
		<div class="row">\
			<div class="col-md-12">\
				<table class="table table-hover table-bordered">\
					<tr>\
						<th>Tên KH</th>\
                        <th>Tài Khoản</th>\
                        <th>Mật Khẩu</th>\
                        <th>SĐT</th>\
                        <th>Email</th>\
						<th>quyền</th>\
					</tr>\
					<tr>\
						<th>'+hoten.value+'</th>\
						<th>'+tendn.value+'</th>\
						<th>'+mk.value+'</th>\
						<th>'+sdt.value+'</th>\
						<th>'+email.value+'</th>\
						<th>'+quyen.value+'</th>\
					</tr>\
				</table>\
			</div>\
		</div>\
		<div class="row">\
			<div class="col-md-8">\
			</div>\
			<div class="col-md-4">\
				<button id="ll" class="btn btn-outline-primary" onclick="luulai('+mangbig+');">LƯU LẠI</button>\
				<button id="h" class="btn btn-outline-primary" type="submit" onclick="huy();">HỦY</button>\
			</div>\
		</div>\
	</div>';
					document.getElementById("xuat").innerHTML = stringg;
	}
}
function luulai(mangbig){
	var mang = mangbig.split("-");
	alert(mang);
	$.post("xulytaikhoan.php",{hoten:mang[0],mk:mang[2],sdt:mang[3],email:mang[4],quyen:mang[5],tendn:mang[1]},function(value){
		alert(value);
		location.reload();
	});
}
function kiemtrathemsp(){
	var maloai = document.getElementById("themloai");
	var masp = document.getElementById("themmasp");
	var tensp = document.getElementById("themtensp");
	var gia = document.getElementById("themgiasp");
	var size = document.getElementById("themsize");
	var mau = document.getElementById("themmausp");
	var chatlieu = document.getElementById("themchatlieusp");
	var trangthai = document.getElementById("themtrangthaisp");
	var soluong = document.getElementById("themsoluongsp");
	var mota = document.getElementById("themmotasp");
	var hinhanh = document.getElementById("themhinhanh");
	var stringgia = gia.value+"";
	if(maloai.value == "null"){
		document.getElementById("loithemmaloai").style.display = "block";
		document.getElementById("loithemmaloai").innerHTML = "XIN CHỌN LOẠI";
		return false;	
	}
	document.getElementById("loithemmaloai").style.display = "none";
	if(masp.value == "" || masp.value == null){
		document.getElementById("loithemmasp").style.display = "block";
		document.getElementById("loithemmasp").innerHTML = "XIN CHỌN MÃ SẢN PHẨM";
		return false;
	}else if(masp.value.length > 10){
		document.getElementById("loithemmasp").style.display = "block";
		document.getElementById("loithemmasp").innerHTML = "MÃ QUÁ DÀI";
		return false;
	}else if(kiemtrakytudacbiet(masp.value)){
		document.getElementById("loithemmasp").style.display = "block";
		document.getElementById("loithemmasp").innerHTML = "KHÔNG KÝ TỰ ĐẶC BIỆT";
		return false;
	}else if(!isNaN(masp.value)){
		document.getElementById("loithemmasp").style.display = "block";
		document.getElementById("loithemmasp").innerHTML = "KHÔNG HỢP LỆ";
		return false;
	}
	if(ktmasp(masp.value) == false){
		return false;
	}
	document.getElementById("loithemmasp").style.display = "none";
	if(tensp.value == "" || tensp.value == null){
		document.getElementById("loithemtensp").style.display = "block";
		document.getElementById("loithemtensp").innerHTML = "XIN NHẬP TÊN SẢN PHẨM";
		return false;
	}else if(tensp.value.length > 50){
		document.getElementById("loithemtensp").style.display = "block";
		document.getElementById("loithemtensp").innerHTML = "TÊN QUÁ DÀI";
		return false;
	}else if(kiemtrakytudacbiet(tensp.value)){
		document.getElementById("loithemtensp").style.display = "block";
		document.getElementById("loithemtensp").innerHTML = "KHÔNG KÝ TỰ ĐẶC BIỆT";
		return false;
	}else if(!isNaN(tensp.value)){
		document.getElementById("loithemtensp").style.display = "block";
		document.getElementById("loithemtensp").innerHTML = "KHÔNG HỢP LỆ";
		return false;
	}
	document.getElementById("loithemtensp").style.display = "none";
	if(gia.value == "" || gia.value == null){
		document.getElementById("loithemgiasp").style.display = "block";
		document.getElementById("loithemgiasp").innerHTML = "XIN NHẬP GIÁ";
		return false;
	}else if(isNaN(gia.value)){
		document.getElementById("loithemgiasp").style.display = "block";
		document.getElementById("loithemgiasp").innerHTML = "XIN NHẬP SỐ";
		return false;
	}else if(stringgia.length > 11){
		document.getElementById("loithemgiasp").style.display = "block";
		document.getElementById("loithemgiasp").innerHTML = "GIÁ QUÁ LỚN";
		return false;
	}
	document.getElementById("loithemgiasp").style.display = "none";
	if(size.value == "null" || size.value == null){
		document.getElementById("loithemsizesp").style.display = "block";
		document.getElementById("loithemsizesp").innerHTML = "XIN CHỌN SIZE";
		return false;
	}
	document.getElementById("loithemsizesp").style.display = "none";
	if(mau.value == "" || mau.value == null){
		document.getElementById("loithemmausp").style.display = "block";
		document.getElementById("loithemmausp").innerHTML = "XIN NHẬP MÀU";
		return false;
	}else if(mau.value.length > 10){
		document.getElementById("loithemmausp").style.display = "block";
		document.getElementById("loithemmausp").innerHTML = "MÀU QUÁ DÀI";
		return false;
	}else if(kiemtrakytudacbiet(mau.value)){
		document.getElementById("loithemmausp").style.display = "block";
		document.getElementById("loithemmausp").innerHTML = "KHÔNG KÝ TỰ ĐẶC BIỆT";
		return false;
	}else if(!isNaN(mau.value)){
		document.getElementById("loithemmausp").style.display = "block";
		document.getElementById("loithemmausp").innerHTML = "KHÔNG HỢP LỆ";
		return false;
	}
	document.getElementById("loithemmausp").style.display = "none";
	if(chatlieu.value == "" || chatlieu.value == null){
		document.getElementById("loithemchatlieusp").style.display = "block";
		document.getElementById("loithemchatlieusp").innerHTML = "XIN NHẬP CHẤT LIỆU";
		return false;
	}else if(chatlieu.value.length > 10){
		document.getElementById("loithemchatlieusp").style.display = "block";
		document.getElementById("loithemchatlieusp").innerHTML = "CHẤT LIỆU QUÁ DÀI";
		return false;
	}else if(kiemtrakytudacbiet(chatlieu.value)){
		document.getElementById("loithemchatlieusp").style.display = "block";
		document.getElementById("loithemchatlieusp").innerHTML = "KHÔNG CÓ KÝ TỰ ĐẶC BIỆT";
		return false;
	}else if(!isNaN(chatlieu.value)){
		document.getElementById("loithemchatlieusp").style.display = "block";
		document.getElementById("loithemchatlieusp").innerHTML = "KHÔNG HỢP LỆ";
		return false;
	}
	document.getElementById("loithemchatlieusp").style.display = "none";
	if(trangthai.value == "" || trangthai.value == null){
		document.getElementById("loithemtrangthaisp").style.display = "block";
		document.getElementById("loithemtrangthaisp").innerHTML = "XIN NHẬP TRẠNG THÁI";
		return false;
	}else if(isNaN(trangthai.value)){
		document.getElementById("loithemtrangthaisp").style.display = "block";
		document.getElementById("loithemtrangthaisp").innerHTML = "XIN NHẬP SỐ";
		return false;
	}
	document.getElementById("loithemtrangthaisp").style.display = "none";
	if(soluong.value == "" || soluong.value == null){
		document.getElementById("loithemsoluongsp").style.display = "block";
		document.getElementById("loithemsoluongsp").innerHTML = "XIN NHẬP SỐ LƯỢNG";
		return false;
	}else if(isNaN(soluong.value)){
		document.getElementById("loithemsoluongsp").style.display = "block";
		document.getElementById("loithemsoluongsp").innerHTML = "XIN NHẬP SỐ";
		return false;
	}
	document.getElementById("loithemsoluongsp").style.display = "none";
	if(hinhanh.value == "" || hinhanh.value == null){
		document.getElementById("loithemhinhanhsp").style.display = "block";
		document.getElementById("loithemhinhanhsp").innerHTML = "XIN CHỌN HÌNH ẢNH";
		return false;
	}
	document.getElementById("loithemhinhanhsp").style.display = "none";
	return true;
}
function xuathinhanhthem(){
	if(document.getElementById("themhinhanh").value != ""){
		document.getElementById("xuathinhanhthem").innerHTML = '<img src="a" />';
		document.getElementById("loithemhinhanhsp").style.display = "none";
	}else{
		document.getElementById("xuathinhanhthem").innerHTML = ' ';
		document.getElementById("loithemhinhanhsp").style.display = "block";
		document.getElementById("loithemhinhanhsp").innerHTML = "XIN CHỌN HÌNH ẢNH";
	}
}
function ktmasp(masp){
	$.post("kiemtramasp.php",{masp:masp},function(value){
		if(value == "false"){
			document.getElementById("loithemmasp").style.display = "block";
			document.getElementById("loithemmasp").innerHTML = "MÃ SẢN PHẨM ĐÃ TỒN TẠI!!";
			return false;
		}else{
			return true;
		}
	});
}
function xemchitiet(so){
	var gan = "valuemahd"+so;
	var mahd = document.getElementById(gan).value;
	$.post("xulydonhang.php",{chitiet:mahd},function(value){
		document.getElementById("xuat").innerHTML = value;
	});
}
function trangthaidonhang(mahd,trangthaidem){
	var trangthai = document.getElementById(trangthaidem).value;
	trangthai += "";
	var id = document.getElementById(mahd).value;
	$.post("xulydonhang.php",{trangthai:trangthai,mahd:id},function(value){});
	alert("ĐÃ CẬP NHẬT THÀNH CÔNG!");
}
function xoasuadonhang(xoasua,mahd){
	if(xoasua == "xoa"){
		var bool = confirm("BẠN THỰC SỰ MUỐN XÓA ĐƠN HÀNG NÀY?");
		if(bool == true){
			$.post("xulydonhang.php",{giatri:xoasua,mahd:mahd},function(value){
				location.reload();
			});
		}
	}
}
window.onload = function(){
	if(localStorage.getItem("khoa") == "false"){
		location.assign("index.php");
	}
}