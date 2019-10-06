<?php
	function hienthitaikhoan($sq,$se){
		$sql = $sq;
		$searchtk = $se;
		$string = '';
		require_once 'database.php';
		$result = select($sql);
		include_once 'Pagination.php';
		$config = array(
			'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
			'total_record'  => $result->num_rows, // tổng số thành viên
			'limit'         => 6,
			'link_full'     => 'index.php?searchtk='.$searchtk.'&page={page}',
			'link_first'    => 'index.php?searchtk='.$searchtk,
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
				$gh = "'".$item["tendn"]."'";
				$xoa = "'xoa'";
				$sua = "'sua'";
				$string .= '<tr>
					<td>'.$item["hoten"].'</td>
					<td>'.$item["tendn"].'</td>
					<td>'.$item["mk"].'</td>
					<td>'.$item["sdt"].'</td>
					<td>'.$item["email"].'</td>
					<th>'.$item["quyen"].'</th>
					<td>
						<a href="#" onclick="xulytaikhoan('.$gh.','.$xoa.');">
							<i class="fas fa-user-minus" style="float:left; font-size:22px; margin-left:10px"></i>
						</a>
						<a href="#"  onclick="xulytaikhoan('.$gh.','.$sua.');">
							<i class="fas fa-user-cog" style="float:right; font-size:22px; margin-right:10px;"></i>
						</a>
					</td>
     		 </tr>';	
				}
		}else{$string .= '<h4 style="color:red">Có 0 tài khoản được tìm thấy</h4>';}
		$gg = $paging->html().$string;
		return $gg;
	}
	if(isset($_GET["searchtk"]))
	{	
		$searchtk = $_GET["searchtk"];
		$sql = "SELECT * FROM khachhang  WHERE tendn like '%".$_GET['searchtk']."%'";
		$string = '';
        $string .= '<table class="table table-hover table-bordered">
    			<thead>
      				<tr>
                        <th>Tên KH</th>
                        <th>Tài Khoản</th>
                        <th>Mật Khẩu</th>
                        <th>SĐT</th>
                        <th>Email</th>
						<th>quyền</th>
						<th><button data-toggle="modal" data-target="#myModal">Thêm TK+</button></th>
      				</tr>
    			</thead>
                <tbody>';
		 $string .= hienthitaikhoan($sql,$searchtk);
         $string .=   '</tbody>
		 			</table>
					<div id="paging"></div>';
		echo $string;
    }
?>