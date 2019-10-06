<?php	
	$id = isset($_GET["maloai"]) ? $_GET["maloai"] : "";
	
	$sql = 'select * from sanpham where maloai="'.$id.'"';
	
	
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
									'link_full'     => 'index.php?maloai='.$id.'&page={page}',
									'link_first'    => 'index.php?maloai='.$id,
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
					//  col-8 col-sm-5 col-lg-3 
					foreach ($member as $item) {
						$jj = "'".$item["masp"]."'";
						echo '<div class="card clearfix"> 
						<a href="chitietsanpham.php?masp='.$item["masp"].'"><img class="card-img-top" src="'.$item["hinh1"].'"/></a>
						<h5 class="card-title">'.$item["tensp"].'</h5>
						<p class="card-text">'.$item["gia"].'₫</p>
						<p><span class="size btn btn-success">'.$item["size"].'cm</span></p>
						<p>
							<a href="chitietsanpham.php?masp='.$item["masp"].'"><span class="btn btn-outline-info">Chi tiết</span></a>
							<span class="btn btn-outline-info" onclick="themvaogiohang('.$jj.');"> Thêm vào giỏ</span>
						</p>
					</div>';
						
				}
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
								 
                                html +='<div class="card clearfix"> <a href="chitietsanpham.php?maloai='.$item["maloai"].'&masp='.$item["masp"].'"><img class="card-img-top" src="'.$item["hinh1"].'"/><h5 class="card-title">'.$item["tensp"].'</h5><p class="card-text">'.$item["gia"].'₫</p><p><span class="size btn btn-success">'.$item["size"].'cm</span></p><p><span class="btn btn-outline-info">Chi tiết</span><span class="btn btn-outline-info"> Thêm vào giỏ</span></p></a></div>';
						
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