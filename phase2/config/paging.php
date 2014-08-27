<?php
/* $tPage : Tổng số trang
	$numpage: Số lượng trang hiển thị
	Ví dụ: 5 => Kết quả 1 2 3 4 5, 2 3 4 5 6
	$link => Link hiện tại của trang
	$cPage => Page hiện tại
 */

function pgTracker($tPage, $numPage, $link, $cPage){
		if ($tPage > 1) {
			$numPage = ($numPage <= $tPage) ? $numPage : $tPage;
			$rPage = ($cPage - 1 > 0) ? $cPage-1: 1;
			$nPage = ($cPage +1 > $tPage) ? $tPage : $cPage +1;
			$link = str_replace("?page=".$cPage, "", $link);
			$cPageStr = "<div class=\"page_next\"><a href=\"$link?page=$rPage\"><</a></div>";
			$string = "";
			$pStart = 1;
			
			$pStart = ($cPage - $numPage) > 0 ? $cPage - $numPage5 : 1;
			
			$endPage = ($pStart + ($numPage-1)) >= $tPage ? $tPage : ($pStart + ($numPage-1));
			for($i=$pStart; $i<=$endPage; $i++) {
				if($i == $cPage) $cPageStr .= "<div class=\"pgTracker_active\"><a>&nbsp;".$i."&nbsp;</a>&nbsp;</div>";
				else $cPageStr .= "<div class=\"pgTracker_deactive\"><a href=\"$link?page=$i\">&nbsp;".$i."&nbsp;</a>&nbsp;</div>";
			}	
			
			//$string = $string."&nbsp;".$cPageStr;
			$string = $cPageStr;
			$string .= "<div class=\"page_prev\"><a href=\"$link?page=$nPage\">></a></div>";
			return $string;
		} else {
			return "";
		}
	}