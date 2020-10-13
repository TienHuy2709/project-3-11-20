<?php 
	trait ProductsModel{
		//lấy danh sách các bản ghi: từ bẩn ghi nào đến bản ghi nào
		public function fetchAll($from, $pageSize){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from tbl_product order by product_id desc limit $from, $pageSize");
			//lấy tất cả kết quả trả về
			return $query->fetchAll();

		}
		//tính tổng số lượng bản ghi
		public function totalRecord(){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select product_id from tbl_product");
			//lấy tất cả kết quả trả về
			return $query->rowCount();
		}
		//lấy một bản ghi
		public function fetch($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("select * from tbl_product where product_id=:id");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
			//trả về tổng số lượng bản ghi
			return $query->Fetch();
		}
		public function Update($id){
			$id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$gia = $_POST["gia"];
			$hot = isset($_POST["hot"]) ? 1:0;
			$new = isset($_POST["new"]) ? 1:0;
			$km = isset($_POST["promotion"]) ? $_POST["promotion"]:0;
			$thich = isset($_POST["thich"]) ? $_POST["thich"]:0;
			$mua = isset($_POST["mua"]) ? $_POST["mua"]:0;
			$con = isset($_POST["sl_con"]) ? $_POST["sl_con"]:0;
			//lay doi tuong ket noi
			$conn = Connection::getInstance();
			//update ban ghi
			$query = $conn->prepare("update tbl_product set name=:name,category_id=:category_id,gia=:gia,mota=:mota,chitiet=:chitiet,hot=:hot,new=:new,km=:promotion,thich=:thich,sl_con=:sl_con,mua=:mua where product_id=:id");
			//thực hiện truy vấn
			$query->execute(array("name"=>$name,"category_id"=>$category_id,"gia"=>$gia,"mota"=>$description,"chitiet"=>$content,"hot"=>$hot,"new"=>$new,"promotion"=>$km,"thich"=>$thich,"mua"=>$mua,"sl_con"=>$con,"id"=>$id));
			
		//neu user upload anh
			if($_FILES["img1"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$query = $conn->prepare("select img1 from tbl_product where product_id=:id");
				$query->execute(array("id"=>$id));
				//lay mot ban ghi
				$old_img = $query->fetch();
				if(isset($old_img->img1)&&$old_img->img1!=""&&file_exists("Assets/frontend/img/product/".$old_img->img1))
					unlink("Assets/frontend/img/product/".$old_img->img1);
				//---
				$img1 = time().$_FILES["img1"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img1"]["tmp_name"], "Assets/frontend/img/product/$img1");
				//update field img
				$query = $conn->prepare("update tbl_product set img1=:img where product_id=:id");
				$query->execute(array("img"=>$img1,"id"=>$id));
			}
			if($_FILES["img2"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$query = $conn->prepare("select img2 from tbl_product where product_id=:id");
				$query->execute(array("id"=>$id));
				//lay mot ban ghi
				$old_img = $query->fetch();
				if(isset($old_img->img2)&&$old_img->img2!=""&&file_exists("Assets/frontend/img/product/".$old_img->img2))
					unlink("Assets/frontend/img/product/".$old_img->img2);
				//---
				$img2 = time().$_FILES["img2"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img2"]["tmp_name"], "Assets/frontend/img/product/$img2");
				//update field img
				$query = $conn->prepare("update tbl_product set img2=:img where product_id=:id");
				$query->execute(array("img"=>$img2,"id"=>$id));
			}
							//lay anh cu de xoa
			$query = $conn->prepare("select img from tbl_detailproduct where product_id=:id ");
			$query->execute(array("id"=>$id));
			$dem = $query->rowCount();
				//lay mot ban ghi
			$old_img = $query->fetch();
			$i=3;
			$img3 = "";
			$img4 = "";
			$img5 = "";
			if($_FILES["img3"]["name"] != ""){
				$id_img3 = $_POST["id_img3"];
				if($id_img3==""){
					$img3 = time().$_FILES["img3"]["name"];
					//upload anh
					move_uploaded_file($_FILES["img3"]["tmp_name"], "Assets/frontend/img/product/$img3");
					//update ban ghi
					$query = $conn->prepare("Insert into tbl_detailproduct set product_id=:id,img=:img3");
					//thực hiện truy vấn
					$query->execute(array("id"=>$id,"img3"=>$img3));
				}
				else{
					//lay anh cu de xoa
				$query = $conn->prepare("select * from tbl_detailproduct where id_detailproduct=:id");
				$query->execute(array("id"=>$id_img3));
				//lay mot ban ghi
				$old_img = $query->fetch();
				if(isset($old_img->img3)&&$old_img->img3!=""&&file_exists("Assets/frontend/img/product/".$old_img->img3))
					unlink("Assets/frontend/img/product/".$old_img->img3);
				//---
				$img3 = time().$_FILES["img3"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img3"]["tmp_name"], "Assets/frontend/img/product/$img3");
				//update field img
				$query = $conn->prepare("update tbl_detailproduct set img=:img where id_detailproduct=:id");
				$query->execute(array("img"=>$img3,"id"=>$id_img3));
				}
				//---
				
			}
			if($_FILES["img4"]["name"] != ""){
				$id_img4 = $_POST["id_img4"];
				if($id_img4==""){
				$img4 = time().$_FILES["img4"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img4"]["tmp_name"], "Assets/frontend/img/product/$img4");			
				//update ban ghi
				$query = $conn->prepare("Insert into tbl_detailproduct set product_id=:id,img=:img4");
				//thực hiện truy vấn
				$query->execute(array("id"=>$id,"img4"=>$img4));
				}
				else{
				//lay anh cu de xoa
				$query = $conn->prepare("select * from tbl_detailproduct where id_detailproduct=:id");
				$query->execute(array("id"=>$id_img4));
				//lay mot ban ghi
				$old_img = $query->fetch();
				if(isset($old_img->img4)&&$old_img->img4!=""&&file_exists("Assets/frontend/img/product/".$old_img->img4))
					unlink("Assets/frontend/img/product/".$old_img->img4);
				//---
				$img4 = time().$_FILES["img4"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img4"]["tmp_name"], "Assets/frontend/img/product/$img4");
				//update field img
				$query = $conn->prepare("update tbl_detailproduct set img=:img where id_detailproduct=:id");
				$query->execute(array("img"=>$img4,"id"=>$id_img4));
				}
				//---
				
			}
			if($_FILES["img5"]["name"] != ""){
				$id_img5 = $_POST["id_img5"];
				if($id_img5==""){
					$img5 = time().$_FILES["img5"]["name"];
						//upload anh
						move_uploaded_file($_FILES["img5"]["tmp_name"], "Assets/frontend/img/product/$img5");
					//update ban ghi
					$query = $conn->prepare("Insert into tbl_detailproduct set product_id=:id,img=:img5");
					//thực hiện truy vấn
					$query->execute(array("id"=>$id,"img5"=>$img5));
				}
				else{
				//---
				//lay anh cu de xoa
				$query = $conn->prepare("select * from tbl_detailproduct where id_detailproduct=:id");
				$query->execute(array("id"=>$id_img5));
				//lay mot ban ghi
				$old_img = $query->fetch();
				if(isset($old_img->img5)&&$old_img->img5!=""&&file_exists("Assets/frontend/img/product/".$old_img->img5))
					unlink("Assets/frontend/img/product/".$old_img->img5);
				//---
				$img5 = time().$_FILES["img5"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img5"]["tmp_name"], "Assets/frontend/img/product/$img5");
				//update field img
				$query = $conn->prepare("update tbl_detailproduct set img=:img where id_detailproduct=:id");
				$query->execute(array("img"=>$img5,"id"=>$id_img5));
				}
				
			}
							
		}
			public function Insert(){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$gia = $_POST["gia"];
			$hot = isset($_POST["hot"]) ? 1:0;
			$new = isset($_POST["new"]) ? 1:0;
			$km = isset($_POST["promotion"]) ? $_POST["promotion"]:0;
			$thich = isset($_POST["thich"]) ? $_POST["thich"]:0;
			$mua = isset($_POST["mua"]) ? $_POST["mua"]:0;
			$con = isset($_POST["sl_con"]) ? $_POST["sl_con"]:0;
			$img1 = "";
			$img2 = "";
			//neu user upload anh
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
			//lay doi tuong ket noi
			$conn = Connection::getInstance();
			//update ban ghi
			$query = $conn->prepare("Insert into tbl_product set name=:name,category_id=:category_id,gia=:gia,mota=:mota,chitiet=:chitiet,hot=:hot,new=:new,km=:km,thich=:thich,sl_con=:sl_con,mua=:mua,img1=:img1,img2=:img2");
			//thực hiện truy vấn
			$query->execute(array("name"=>$name,"category_id"=>$category_id,"gia"=>$gia,"mota"=>$description,"chitiet"=>$content,"hot"=>$hot,"new"=>$new,"km"=>$km,"img1"=>$img1,"img2"=>$img2,"thich"=>$thich,"mua"=>$mua,"sl_con"=>$con));
			$add_id = $conn->lastInsertId();
			$img3 = "";
			$img4 = "";
			$img5 = "";
			if($_FILES["img3"]["name"] != ""){
			$img3 = time().$_FILES["img3"]["name"];
				//upload anh
			move_uploaded_file($_FILES["img3"]["tmp_name"], "Assets/frontend/img/product/$img3");
			//update ban ghi
			$query = $conn->prepare("Insert into tbl_detailproduct set product_id=:id,img=:img3");
			//thực hiện truy vấn
			$query->execute(array("id"=>$add_id,"img3"=>$img3));				
			}
			if($_FILES["img4"]["name"] != ""){
				$img4 = time().$_FILES["img4"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img4"]["tmp_name"], "Assets/frontend/img/product/$img4");			
			//update ban ghi
			$query = $conn->prepare("Insert into tbl_detailproduct set product_id=:id,img=:img4");
			//thực hiện truy vấn
			$query->execute(array("id"=>$add_id,"img4"=>$img4));
			}
			if($_FILES["img5"]["name"] != ""){
				$img5 = time().$_FILES["img5"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img5"]["tmp_name"], "Assets/frontend/img/product/$img5");
			//update ban ghi
			$query = $conn->prepare("Insert into tbl_detailproduct set product_id=:id,img=:img5");
			//thực hiện truy vấn
			$query->execute(array("id"=>$add_id,"img5"=>$img5));			
			}
		}
		public function deleteProducts($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_product where product_id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}
		public function deleteImgProducts($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_detailproduct where product_id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}
		public function deleteCmtProducts($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_cmt where product_id=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}
		public function getCategory($category_id){
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from tbl_category where category_id=$category_id");
			//tra ve 1 ban ghi
			return $query->fetch();
		}
		public function fetchImgAll($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_detailproduct where product_id=:id");
			$query->execute(array("id"=>$id));
			//trả về 1 bản ghi
			return $query->fetchAll();
		}

	}
 ?>