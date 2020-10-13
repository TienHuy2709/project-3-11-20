<?php 
	trait ProductDetailModel{
		public function fetchDetailOne($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select *,(gia-(gia*km/100)) as price from tbl_product where product_id=:id");
				$query->execute(array("id"=>$id));
			//trả về 1 bản ghi
			return $query->fetch();
		}
		public function fetchImgAll($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_detailproduct where product_id=:id");
			$query->execute(array("id"=>$id));
			//trả về 1 bản ghi
			return $query->fetchAll();
		}

		public function totalRecord(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select cmt_id from tbl_cmt where product_id=$id");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
		public function fetchAll($from, $pageSize){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select * from tbl_cmt where product_id=$id order by cmt_id desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
		//tinh tong so luong ban ghi
		public function Insert(){
			$name=$_POST["ten"];
			$nd=$_POST["noidung"];
			$img1="";
			$img2="";
			$img3="";
			$rating=$_POST["rating"];
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			if($_FILES["img1"]["name"] != ""){
				$img1 = time().$_FILES["img1"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img1"]["tmp_name"], "Assets/frontend/img/product/$img1");				
			}
			if($_FILES["img2"]["name"] != ""){
				$img2 = time().$_FILES["img2"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img2"]["tmp_name"], "Assets/frontend/img/product/$img2");				
			}
			if($_FILES["img3"]["name"] != ""){
				$img3 = time().$_FILES["img3"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img3"]["tmp_name"], "Assets/frontend/img/product/$img3");				
			}
			//update bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("Insert into tbl_cmt set email=:name,product_id=:id,time=CURRENT_TIMESTAMP(),nd_cmt=:nd,rating=:rating,img1=:img1,img2=:img2,img3=:img3");
			//thực hiện truy vấn
			$query->execute(array("name"=>$name,"id"=>$id,"nd"=>$nd,"rating"=>$rating,"img1"=>$img1,"img2"=>$img2,"img3"=>$img3));	
			//nếu password không rỗng thì update password
			//else echo "Mật khẩu được giữ nguyên. ";
		}
		public function Like($id){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//update bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare(" update tbl_product SET thich = thich+1 WHERE product_id=$id");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));	
			//nếu password không rỗng thì update password
			//else echo "Mật khẩu được giữ nguyên. ";
		}
		public function productSame(){
			$conn = Connection::getInstance();
			$query=$conn->query("select *,(gia-(gia*km/100)) as price from tbl_product order by rand() limit 6");
			//lấy trả về tất cả các phần tử
			return $query->fetchAll();
		}
		public function fetchOneheart(){
 				$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
                $idproduct = $idproduct = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
                            //lay bien ket noi csdl
                $conn = Connection::getInstance();
                            //thuc thi truy van
                $query = $conn->query("select productheart_id from tbl_productheart where id_user=$iduser and product_id =$idproduct ");
                return $query->fetch();
		}
	}
 ?>