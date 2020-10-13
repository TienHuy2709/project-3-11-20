<?php 
	trait CreateAccountModel{
		public function Check(){
			$email =$_POST["email"];
				$conn = Connection::getInstance();
				$query = $conn->prepare("select email from tbl_user where email=:mail");
				$query->execute(array("mail"=>$email));
				$result = $query->fetch();
			return $result;
		}
		public function Insert(){
			$name =$_POST["name"];
			$email =$_POST["email"];
			$password1=$_POST["password1"];
			$password2=$_POST["password2"];
			if ($password1 == $password2) {
				$password1 = md5($password1);
				$conn = Connection::getInstance();
				$query = $conn->prepare("insert into tbl_user set name=:name, email=:email,pass=:password1");
				$query->execute(array("name"=>$name,"email"=>$email,"password1"=>$password1));
			}
			else echo "Mật khẩu không khớp nhau. <a href ='index.php?area=Frontend&controller=CreateAccount'>Quay lại</a>";
		}
		public function modelFetch(){
			$email = $_POST["email"];
			//----
			// lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//truy vấn
			$query = $conn->prepare("select * from tbl_user where email=:mail");
			//thực hiện truy vẫn có truyền danh sách biến
			$query->execute(array("mail"=>$email));
			//lấy một bản ghi
			$result = $query->fetch();
			return $result;
		}
	}
 ?>