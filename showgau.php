<?php
/*require 'DataProvider.php';

// Câu truy vấn
$sql = "SELECT * FROM sanpham";
if (isset($_GET['search']))
{
	$sql = $sql . " WHERE tensp like '%" . $_GET['search'] . "%'";
}

$result = executeQuery($sql);
if ($result->num_rows > 0) {
// Hien thi ket qua
   while ($row = mysqli_fetch_assoc($result))
   {
   	    echo '<div class="card" style="width:370px;padding-left:10px;padding-top:10px">
      <div class="card-body text-center">
	  <a href="index.php?maloai='.$row["maloai"].'&masp='.$row["masp"].'">
        <img class="card-img-top" src="'.$row["hinh1"].'" width="100%" height="250px">
    	<div class="card-body">
        <h4 class="card-title" style="font-size:18px;font-weight:bold;">'.$row["tensp"].'</h4>
        <p class="card-text"><span class="badge badge-danger">'.$row["gia"].'</span></p>
        <p class="card-text"><span class="btn btn-success">'.$row["size"].'</span></p>
		<div class="row"><div class="col-md-6" style="margin-top:5%;padding-left:12%"><a href="#" class="btn btn-primary" >Chi tiết</a></div>
								   <div class="col-md-6"  style="margin-top:5%;"><a href="#" class="btn btn-primary">Mua Ngay</a></div>
      </div></div></a></div></div>';
   }
}
else{
	echo '<h4 style="color:red">Có 0 sản phẩm được tìm thấy</h4>';
	}
	*/
	$search= isset($_GET["search"]) ? $_GET["search"] : "";
	$sql = "SELECT * FROM sanpham";
	if (isset($_GET['search']))
{
	$sql = $sql . " WHERE tensp like '%" . $_GET['search'] . "%'";
}
	
	
	//
								require_once 'database.php';
								
								$result = select($sql);
								 
								// Load thư viện phân trang
								include_once 'Pagination.php';
								
								 
								// Phân trang
								$config = array(
									'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
									'total_record'  => $result->num_rows, // tổng số thành viên
									'limit'         => 6,
									'link_full'     => 'index.php?search='.$search.'&page={page}',
									'link_first'    => 'index.php?search='.$search,
									'range'         => 6
								);
								 
								$paging = new Pagination();
								$paging->init($config);
								 
								// Lấy limit, start
								$limit = $paging->get_config('limit');
								$start = $paging->get_config('start');
								 
								// Lấy danh sách thành viên
					$member = get_all_member($limit, $start,$sql);
					 
				// Kiểm tra nếu là ajax request thì trả kết quả
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
					die (json_encode(array(
						'member' => $member,
						'paging' => $paging->html()
					)));
				}
		
/**/
	
	
					
					
					// Sử dụng vòng lặp while để lặp kết quả
					if ($result->num_rows > 0) {
					foreach ($member as $item) {
						$jk = "'".$item["maloai"]."'";
						echo '<div class="card col-8 col-sm-5 col-lg-3 clearfix"> 
						<a href="chitietsanpham.php?maloai='.$item["maloai"].'&masp='.$item["masp"].'">
						<img class="card-img-top" src="'.$item["hinh1"].'"/>
						<h5 class="card-title">'.$item["tensp"].'</h5>
						<p class="card-text">'.$item["gia"].'₫</p>
						<p><span class="size btn btn-success">'.$item["size"].'cm</span></p>
						<p>
							<span class="btn btn-outline-info">Chi tiết</span>
							<span class="btn btn-outline-info">Thêm vào giỏ</span>
						</p></a>
					</div>';
						
				}
					}
					else{echo '<h4 style="color:red">Có 0 sản phẩm được tìm thấy</h4>';}
				 echo $paging->html();
?>



				 <script language="javascript">
             $('#content').on('click','#paging a', function ()
             {
                 var url = $(this).attr('href');
                  
                 $.ajax({
                     url : url,
                     type : 'get',
                     dataType : 'json',
                     success : function (result)
                     {
                         //  kiểm tra kết quả đúng định dạng không
                         if (result.hasOwnProperty('member') && result.hasOwnProperty('paging'))
                         {
                             var html='';
                             // lặp qua danh sách thành viên và tạo html
                             $.each(result['member'], function (key, item){
								 html+='<div class="card col-8 col-sm-5 col-lg-3 clearfix"> <a href="chitietsanpham.php?maloai='.$item["maloai"].'&masp='.$item["masp"].'"><img class="card-img-top" src="'.$item["hinh1"].'"/><h5 class="card-title">'.$item["tensp"].'</h5><p class="card-text">'.$item["gia"].'₫</p><p><span class="size btn btn-success">'.$item["size"].'cm</span></p><p><span class="btn btn-outline-info">Chi tiết</span><span class="btn btn-outline-info"> Thêm vào giỏ</span></p></a></div>';
    //                             html +='<div class="card" style="width:365px;height:500px;padding-left:10px;padding-top:10px">\
    //   <div class="card-body text-center">\
	//   <a href="chitietsanpham.php?maloai='+item["maloai"]+'&masp='+item["masp"]+'">\
    //     <img class="card-img-top" src="'+item["hinh1"]+'" width="100%" height="250px">\
    // 	<div class="card-body">\
    //     <h4 class="card-title" style="font-size:16px;font-weight:bold;">'+item["tensp"]+'</h4>\
    //     <p class="card-text"><span class="badge badge-danger">'+item["gia"]+'</span></p>\
    //     <p class="card-text"><span class="btn btn-success">'+item["size"]+'</span></p>\
	// 	<div class="row"><div class="col-md-6" style="margin-top:5%;padding-left:12%"><a href="chitietsanpham.php?maloai='+item["maloai"]+'&masp='+item["masp"]+'" class="btn btn-primary" >Chi tiết</a></div>\
	// 							   <div class="col-md-6"  style="margin-top:5%;"><a href="#" class="btn btn-primary">Mua Ngay</a></div>\
    //   </div></div></a></div></div>';
						
                             });
                              
                            
                              
                             // Thay đổi nội dung danh sách thành viên
                             $('#list').html(html);
                              
                             // Thay đổi nội dung phân trang
                             $('#paging').html(result['paging']);
                              
                             // Thay đổi URL trên website
                             window.history.pushState({path:url},'',url);
                         }
                     }
                 });
                 return false;
             });
         </script>