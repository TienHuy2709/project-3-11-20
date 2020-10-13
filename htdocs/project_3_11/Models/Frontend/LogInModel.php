<?php 
	trait LogInModel{
		public function modelFetch(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hóa password
			$password = md5($password);
			//----
			// lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//truy vấn
			$query = $conn->prepare("select * from tbl_user where email=:mail and pass=:pass");
			//thực hiện truy vẫn có truyền danh sách biến
			$query->execute(array("mail"=>$email,"pass"=>$password));
			//lấy một bản ghi
			$result = $query->fetch();
			return $result;
		}
	}
 ?>