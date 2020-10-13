<?php 
	trait BlogDetailModel{
		public function fetch($id){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select * from tbl_news where id_new = $id");
			//lay tat ca ket qua tra ve
			return $query->fetch();
		}
	}
 ?>