<?php 
	trait CommentModel{
		//lấy danh sách các bản ghi: từ bẩn ghi nào đến bản ghi nào
		public function fetchAll($from, $pageSize){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select tbl_product.product_id as product_id ,tbl_product.img1 as img,tbl_product.name as name,COUNT(tbl_cmt.cmt_id) as 'socmt', AVG(tbl_cmt.rating) as rating from tbl_cmt,tbl_product WHERE tbl_product.product_id = tbl_cmt.product_id GROUP by tbl_cmt.product_id ORDER by tbl_product.product_id DESC LIMIT $from, $pageSize");
			//lấy tất cả kết quả trả về
			return $query->fetchAll();

		}
		//tính tổng số lượng bản ghi
		public function totalRecord(){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select product_id from tbl_cmt GROUP by product_id");
			//lấy tất cả kết quả trả về
			return $query->rowCount();
		}
		//lấy một bản ghi
		public function fetch($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("select * from tbl_cmt where product_id=:id");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
			//trả về tổng số lượng bản ghi
			return $query->FetchAll();
		}
		public function deleteComment($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_cmt where product_id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}

	}
 ?>