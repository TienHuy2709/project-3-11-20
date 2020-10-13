<?php 
	trait ProductHeartModel{
		public function fetchAll($from, $pageSize){
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select *,(gia-(gia*km/100)) as price FROM tbl_product,tbl_productheart WHERE tbl_productheart.product_id = tbl_product.product_id AND tbl_productheart.id_user=$iduser order by productheart_id DESC limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
		public function totalRecord(){
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select productheart_id from tbl_productheart where id_user=$iduser");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchOneheart(){
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			$idproduct = isset($_GET["idproduct"])&&is_numeric($_GET["idproduct"])?$_GET["idproduct"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select productheart_id from tbl_productheart where id_user=$iduser and product_id =$idproduct ");
			return $query->rowCount();
		}
		public function Insert(){
			$idproduct = isset($_GET["idproduct"])&&is_numeric($_GET["idproduct"])?$_GET["idproduct"]:0;
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->prepare("insert into tbl_productheart set product_id =:product, id_user=:user");
			$query->execute(array("product"=>$idproduct,"user"=>$iduser));
			//lay tat ca ket qua tra ve
		}
			public function Delete($id){
			$idproduct = isset($_GET["idproduct"])&&is_numeric($_GET["idproduct"])?$_GET["idproduct"]:0;
			$iduser = isset($_SESSION["id"])&&is_numeric($_SESSION["id"])?$_SESSION["id"]:0;
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->prepare("delete from tbl_productheart where productheart_id =:id");
			//lay tat ca ket qua tra ve
			$query->execute(array("id"=>$id));
		}
	}
 ?>