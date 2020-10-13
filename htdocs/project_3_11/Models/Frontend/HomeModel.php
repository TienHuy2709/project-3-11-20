<?php 
	trait HomeModel{
		public function productHot(){
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where hot=1 order by rand() limit 4");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		//sản phẩm mới
		public function productNew(){
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where new=1 order by rand() limit 4");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		//sản phẩm khuyến mãi
		public function productSame(){
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product order by rand() limit 4");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		public function productSee(){
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product order by thich desc limit 12");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		public function productBuy(){
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product order by mua desc limit 12");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		public function fetchOneheart($iduser,$idproduct){
 				$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
                            //lay bien ket noi csdl
                $conn = Connection::getInstance();
                            //thuc thi truy van
                $query = $conn->query("select productheart_id from tbl_productheart where id_user=$iduser and product_id =$idproduct ");
                return $query->fetch();
		}
	}
 ?>