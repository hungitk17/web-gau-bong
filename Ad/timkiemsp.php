<?php
	function hienthisanpham($sq,$se){
		$sql = $sq;
		$search = $se;
		$string = '';
		require_once 'database.php';
		$result = select($sql);
		include_once 'Pagination.php';
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
		$limit = $paging->get_config('limit');
		$start = $paging->get_config('start');
		$member = get_all_member($limit, $start,$sql);
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			die (json_encode(array(
				'member' => $member,
				'paging' => $paging->html()
			)));
		}
		if ($result->num_rows > 0) {
			foreach ($member as $item) {
				$gh = "'".$item["masp"]."'";
				$xoa = "'xoa'";
				$sua = "'sua'";
				$sea = "'".$search."'";
				$string .= '<tr>
					<td>'.$item["maloai"].'</td>
					<td>'.$item["masp"].'</td>
					<td>'.$item["tensp"].'</td>
					<td>'.$item["gia"].'</td>
					<td>'.$item["size"].'</td>
					<td>'.$item["mausac"].'</td>
					<td><img src="../'.$item["hinh1"].'" width="50px" height="50px"></td>
					<td>
						<a href="#" onclick="xulysanpham('.$gh.','.$xoa.','.$sea.');">
							<i class="fas fa-trash-alt" style="float:left; font-size:22px; margin-left:15px"></i>
						</a>
						<a href="#"  onclick="xulysanpham('.$gh.','.$sua.','.$sea.');">
							<i class="fas fa-hammer" style="float:right; font-size:22px; margin-right:15px;"></i>
						</a>
					</td>
     		 </tr>';	
				}
		}else{$string .= '<h4 style="color:red">Có 0 sản phẩm được tìm thấy</h4>';}
		$gg = $paging->html().$string;
		return $gg;
	}
	if(isset($_GET["search"]) && !isset($_POST["suamaloai"]) && !isset($_POST["themmasp"]))
	{	
		$search = $_GET["search"];
		$c1 = "'a'";
		$c2 = "'them'";
		$c3 = "'c'";
		$sql = "SELECT * FROM sanpham WHERE trangthai=0 AND tensp like '%".$search."%'";
		$string = '';
        $string .= '<table class="table table-hover table-bordered">
		<thead>
      				<tr>
                    	<th>Mã Loại</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Kích Cỡ</th>
                        <th>Màu Sắc</th>
                        <th>Hình</th>
						<th><button onclick="xulysanpham('.$c1.','.$c2.','.$c3.');">Thêm SP+</button></th>
      				</tr>
    			</thead>
                <tbody>';
		 $string .= hienthisanpham($sql,$search);
         $string .=   '</tbody>
		 			</table>
					<div id="paging"></div>';
		echo $string;
    }
?>