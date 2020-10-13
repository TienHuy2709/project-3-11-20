<?php 
	trait UserModel{
		//lấy danh sách các bản ghi: từ bẩn ghi nào đến bản ghi nào
		public function fetchAll($from,$pageSize){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from tbl_user order by id_user desc limit $from, $pageSize");
			//lấy tất cả kết quả trả về
			return $query->fetchAll();

		}
		//tính tổng số lượng bản ghi
		public function totalRecord(){
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select id_user from tbl_user");
			//lấy tất cả kết quả trả về
			return $query->rowCount();
		}
		//lấy một bản ghi
		public function fetch($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("select * from tbl_user where id_user=:id");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
			//trả về tổng số lượng bản ghi
			return $query->Fetch();
		}
		public function Update($id){
			
			$name=$_POST["name"];
			$sdt=$_POST["sdt"];
			$password=$_POST["password"];
			$chucdanh=$_POST["chucdanh"];
			$ngaysinh=$_POST["ngaysinh"];
			$diachi=$_POST["diachi"];
			//update bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("Update tbl_user set name=:name,sdt=:sdt,chucdanh=:chucdanh,ngaysinh=:ngaysinh,diachi=:diachi where id_user=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id,"name"=>$name,"sdt"=>$sdt,"chucdanh"=>$chucdanh,"ngaysinh"=>$ngaysinh,"diachi"=>$diachi));

			//nếu password không rỗng thì update password
			if($password != ""){
				//mã hóa password bằng hàm md5
				$password = md5($password);
				//update trong password
				//chuẩn bị truy vấn
				$query = $conn->prepare("update tbl_user set pass=:pass where id_user=:id");
				//thực hiện truy vấn
				$query->execute(array("id"=>$id,"pass"=>$password));
			}
		}
			public function Insert(){
			
			$name=$_POST["name"];
			$password=$_POST["password"];
			$password = md5($password);
			$email=$_POST["email"];
			$sdt=$_POST["sdt"];
			$chucdanh=$_POST["chucdanh"];
			$ngaysinh=$_POST["ngaysinh"];
			$diachi=$_POST["diachi"];
			//insert bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("insert into tbl_user set name=:name, email=:email,sdt=:sdt, pass=:password,chucdanh=:chucdanh,ngaysinh=:ngaysinh,diachi=:diachi ");
			//thực hiện truy vấn
			$query->execute(array("name"=>$name,"email"=>$email,"sdt"=>$sdt,"password"=>$password,"chucdanh"=>$chucdanh,"ngaysinh"=>$ngaysinh,"diachi"=>$diachi));

		}
		
		public function deleteUser($id){
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_user where id_user=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id));
		}
		public function getPhoneUser($id){
			  $conn = Connection::getInstance();
              $id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
              $query = $conn->prepare("select * from tbl_user where and id=:id");
              $query->execute(array("id"=>$id));
               //lay 1  kết quả trả về
              $query->fetch();
		}
	}
 ?>