<?php 
	trait AccountModel{
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
			$ngaysinh=$_POST["ngaysinh"];
			$sdt=$_POST["sdt"];
			$diachi=$_POST["diachi"];
			$password1=$_POST["password1"];
			$password2=$_POST["password2"];
			//update bản ghi
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("Update tbl_user set name=:name,ngaysinh=:ngaysinh,sdt=:sdt,diachi=:diachi where id_user=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id,"name"=>$name,"ngaysinh"=>$ngaysinh,"sdt"=>$sdt,"diachi"=>$diachi));	
			//nếu password không rỗng thì update password
			if($password1 != "" && $password1==$password2){
				//mã hóa password bằng hàm md5
				$password1 = md5($password1);
				//update trong password
				//chuẩn bị truy vấn
				$query = $conn->prepare("update tbl_user set pass=:pass where id_user=:id");
				//thực hiện truy vấn
				$query->execute(array("id"=>$id,"pass"=>$password1));
				//echo "Mật khẩu đã được thay đổi. ";
			}
			//else echo "Mật khẩu được giữ nguyên. ";
		}
		public function modelFetch($id){
			//----
			// lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//truy vấn
			$query = $conn->prepare("select * from tbl_user where id_user=:id");
			//thực hiện truy vẫn có truyền danh sách biến
			$query->execute(array("id"=>$id));
			//lấy một bản ghi
			$result = $query->fetch();
			return $result;
		}

	}
 ?>