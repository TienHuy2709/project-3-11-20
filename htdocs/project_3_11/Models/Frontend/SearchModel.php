<?php 
	trait SearchModel{
		public function totalRecordSearchProduct(){
			if(isset($_GET["search"])){
				$_POST["search"]=$_GET["search"];
			}
			$search = $_POST["search"];
			$conn = Connection::getInstance();
		 	$query = $conn->query("select product_id,(gia-(gia*km/100)) as price from tbl_product where tbl_product.name LIKE '%$search%' order by price asc ");
			return $query->rowCount();
		}
		public function SearchProduct($from, $pageSize){
			if(isset($_GET["search"])){
				$_POST["search"]=$_GET["search"];
			}
			$search = $_POST["search"];
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where tbl_product.name LIKE '%$search%' order by price asc limit $from, $pageSize");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		public function fetchOneheart($iduser,$idproduct){
 				$iduser = isset($_SESSION["id"])&&is_numeric($_SESSION["id"])?$_SESSION["id"]:0;
                            //lay bien ket noi csdl
                $conn = Connection::getInstance();
                            //thuc thi truy van
                $query = $conn->query("select productheart_id from tbl_productheart where id_user=$iduser and product_id =$idproduct ");
                return $query->fetch();
		}

	}
?>