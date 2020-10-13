<?php 
	trait BlogModel{
		public function fetchAll($from, $pageSize){
			$news = isset($_GET["news"])&&is_numeric($_GET["news"])?$_GET["news"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select * from tbl_news where new_category=$news order by id_new desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
		public function totalRecord(){
			$news = isset($_GET["news"])&&is_numeric($_GET["news"])?$_GET["news"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select id_new from tbl_news where new_category=$news");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
	}
 ?>