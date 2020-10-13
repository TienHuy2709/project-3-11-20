<?php 
	trait ProductTypeModel{
		public function fetchAll($from, $pageSize){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from tbl_product_type order by id desc limit $from, $pageSize");
			//lấy tất cả kết quả trả về
			return $query->fetchAll();

		}
		public function totalRecord(){
			$conn = Connection::getInstance();
			$query = $conn->query("select id from tbl_product_type ");
			return $query->rowCount();
		} 
		public function fetch($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("select * from tbl_product_type where id=:id");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
			//trả về tổng số lượng bản ghi
			return $query->Fetch();
		}
		public function Update($id){
			
			$name=$_POST["name"];
			$category_id=$_POST["category_id"];
			$type_id = $_POST["type_id"];
			//update bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("Update tbl_product_type set name_type=:name,category_id=:category_id where id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id,"name"=>$name,"category_id"=>$category_id));

			//nếu password không rỗng thì update password
		}
			public function Insert(){
			
			$name=$_POST["name"];
			$category_id=$_POST["category_id"];
			//insert bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("insert into tbl_product_type set name_type=:name, category_id=:category_id ");
			//thực hiện truy vấn
			$query->execute(array("name"=>$name,"category_id"=>$category_id));

		}
		public function deleteProductType($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_product_type where id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}
		public function getCategory($category_id){
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from tbl_category where id=$category_id");
			//tra ve 1 ban ghi
			return $query->fetch();
		}
	}
 ?>