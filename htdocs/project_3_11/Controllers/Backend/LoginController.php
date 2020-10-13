<?php 
//include file Model
	include "Models/Backend/LoginModel.php";
	class LoginController extends Controller{
					//sử dụng class LoginModel
		use LoginModel;
		public function index(){
			$this->renderHTML("Views/Backend/LoginView.php");
	}
	//khi ấn nút submit
		public function doLogin(){
			//gọi hàm lấy 1 bản ghi từ class model
			$record = $this->modelFetch();
				$_SESSION["id_user"] = $record->id_user;
				$_SESSION["email"] = $record->email;
				$_SESSION["name"] = $record->name;
				$_SESSION["ngaysinh"] = $record->ngaysinh;
				$_SESSION["diachi"] = $record->diachi;
				$_SESSION["sdt"] = $record->sdt;
				$_SESSION["chucdanh"]=$record->chucdanh;
			$std=isset($_GET["sdt"])&&is_numeric($_GET["sdt"])? $_GET["sdt"]:0;
			if($record->chucdanh=="1"){
					if(isset($record->email)){
					//gán session email
						$_SESSION["email"] = $record->email;
					}
					//quay trờ lại trnag index.php?controller=Backend
				header("location:index.php?area=Backend");
			}
			else header("location:index.php?area=Backend&controller=LogIn");
			
		}
	}
 ?>