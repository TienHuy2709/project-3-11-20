<?php 
	trait CategoryModel{
		public function fetchAll($from, $pageSize){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from tbl_category order by category_id desc limit $from, $pageSize");
			//lấy tất cả kết quả trả về
			return $query->fetchAll();

		}
		public function totalRecord(){
			$conn = Connection::getInstance();
			$query = $conn->query("select category_id from tbl_category");
			return $query->rowCount();
		} 
		public function fetch($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("select * from tbl_category where category_id=:id");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
			//trả về tổng số lượng bản ghi
			return $query->Fetch();
		}
		public function Update($id){
			
			$name=$_POST["name"];
			//update bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("Update tbl_category set name=:name where category_id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id,"name"=>$name));

			//nếu password không rỗng thì update password
		}
			public function Insert(){
			
			$name=$_POST["name"];
			//insert bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("insert into tbl_category set name=:name ");
			//thực hiện truy vấn
			$query->execute(array("name"=>$name));

		}
		public function deleteCategory($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_category where category_id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}
	}
 ?>