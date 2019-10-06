function kthople(string){
	var g = string.toLowerCase();
	return (g.indexOf("delete") == -1) && (g.indexOf("drop") == -1);
}
function kttimkiemnangcao(){
	var tensp = document.getElementById("tensp");
	var gia_1 = document.getElementById("gia_1");
	var gia_2 = document.getElementById("gia_2");
	var theloai = document.getElementById("theloai");
	var kichthuoc = document.getElementById("kichthuoc");
	var mau = document.getElementById("mau");
	if(!kthople(tensp.value) || !kthople(gia_1.value) || !kthople(gia_2.value) || !kthople(mau.value)){
		alert("BẠN ĐANG CỐ HACK À??");
		return false;
	}else if(isNaN(gia_1.value) || isNaN(gia_2.value)){
		alert("GIÁ KHÔNG HỢP LỆ!!");
		return false;
	}/*else if(Number(gia_1.value) > Number(gia_2.value)){
		alert("GIÁ SAU PHẢI LỚN HƠN GIÁ TRƯỚC!!");
		return false;
	}*/
	return true;
}
function phantrangtknangcao(trang,tensp,gia1,gia2,theloai,mau,kichthuoc){
	//alert(trang+" "+tensp+" "+gia1+" "+gia2+" "+theloai+" "+mau+" "+kichthuoc);
	location.href = "?trang="+trang+"&tensp="+tensp+"&&gia_1="+gia1+"&gia_2="+gia2+"&theloai="+theloai+"&mau="+mau+"&kichthuoc="+kichthuoc+"";	/*$.get("timkiemspnangcao.php",{trang:trang,tensp:trensp,gia_1:gia1,gia_2:gia2,theloai:theloai,mau:mau,kichthuoc:kichthuoc},function(value){
		alert("vào");
		$("#xuat").html(value);
	});*/
}