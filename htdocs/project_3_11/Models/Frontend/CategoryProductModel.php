<?php 
	trait CategoryProductModel{
		public function fetchAllProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product order by product_id asc ");
			return $query->fetchAll();
		}
		public function fetchOne($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select *,(gia-(gia*km/100)) as price from tbl_product where product_id=:id");
			$query->execute(array("id"=>$id));
			//trả về 1 bản ghi
			return $query->fetch();
		}
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function fetchAll($from, $pageSize){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where category_id=$id order by product_id desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
		public function totalRecord(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select product_id from tbl_product where category_id=$id");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function totalRecordHot(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select product_id from tbl_product where hot=1");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchAllProductHot($from, $pageSize){
			$conn = Connection::getInstance();
			$query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where hot=1 order by product_id desc limit $from, $pageSize ");
			return $query->fetchAll();
		}
				public function totalRecordNew(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select product_id from tbl_product where new=1");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchAllProductNew($from, $pageSize){
			$conn = Connection::getInstance();
			$query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where new=1 order by product_id desc limit $from, $pageSize ");
			return $query->fetchAll();
		}
		public function totalRecordBuy(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select product_id from tbl_product where mua>=150 order by mua desc ");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchAllProductBuy($from, $pageSize){
			$conn = Connection::getInstance();
			$query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where mua>=150 order by mua desc limit $from, $pageSize ");
			return $query->fetchAll();
		}
		public function totalRecordSearch(){
			//if ($_SERVER['REQUEST_METHOD'] == "POST")
			if(isset($_GET["to"])){
				$_POST["to"]=$_GET["to"];
				$_POST["for"]=$_GET["for"];
			}
			$for = $_POST["for"];
			$to = $_POST["to"];
			$conn = Connection::getInstance();
			 $query = $conn->query("select product_id,(gia-(gia*km/100)) as price from tbl_product where (gia-(gia*km/100)) BETWEEN $to AND $for ");
			//thuc thi truy van
			 if($for=="" || $to =="") $query = $conn->query("select product_id,(gia-(gia*km/100)) as price from tbl_product order by price asc ");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchAllProductSearch($from, $pageSize){
			if(isset($_GET["to"])){
				$_POST["to"]=$_GET["to"];
				$_POST["for"]=$_GET["for"];
			}
			$for = $_POST["for"];
			$to = $_POST["to"];
			$conn = Connection::getInstance();
			 $query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product where (gia-(gia*km/100)) BETWEEN $to AND $for ORDER by price ASC limit $from, $pageSize ");
			 if($for=="" || $to =="") $query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product order by price asc limit $from, $pageSize");
			return $query->fetchAll();
		}
		public function totalRecordSearchSort(){
			if(!isset($_POST["to"])){
				$_POST["to"]="";
				$_POST["for"]="";
			}
			
			//if ($_SERVER['REQUEST_METHOD'] == "POST")
			if(isset($_GET["price"])){
				$_POST["price"]=$_GET["price"];
			}
			$price= $_POST["price"];
			$conn = Connection::getInstance();
			if($price="1") $query = $conn->query("select product_id,(gia-(gia*km/100)) as price from tbl_product order by price asc ");
			else $query = $conn->query("select product_id,(gia-(gia*km/100)) as price from tbl_product order by price desc ");
			//thuc thi truy van
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchAllProductSearchSort($from, $pageSize){
			$_POST["to"]="";
			$_POST["for"]="";
			if(isset($_GET["price"])){
				$_POST["price"]=$_GET["price"];
			}
			$price= $_POST["price"];
			$conn = Connection::getInstance();
			if($price="1") $query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product ORDER by price ASC limit $from, $pageSize ");
			else $query = $conn->query("select *,(gia-(gia*km/100)) as price from tbl_product ORDER by price desc limit $from, $pageSize ");
			return $query->fetchAll();
		}
		public function fetchOneCategory($id){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_category where category_id=:id");
			$query->execute(array("id"=>$id));
			//trả về 1 bản ghi
			return $query->fetch();
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