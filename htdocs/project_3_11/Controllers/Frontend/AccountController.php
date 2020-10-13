<?php 
	include "Models/Frontend/AccountModel.php";
	class AccountController extends Controller{
		use AccountModel;
		public function index(){
			$id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$this->renderHTML("Views/Frontend/AccountView.php");
			if (isset($_SESSION["namecategory"]) && isset($_SESSION["categoryid"])) {
				unset($_SESSION["categoryid"]);
				unset($_SESSION["namecategory"]);
			}
			if(isset($_SESSION["productdetail"]) && isset($_SESSION["productid"])){
			unset($_SESSION["productdetail"]);
			unset($_SESSION["productid"]);
			}
			$_SESSION["account"] = "yes";
			$_SESSION["accountid"] = $id;
		}
		public function edit(){
			$id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//gọi hàm trong model để lấy 1 bản ghi
			$record = $this->fetch($id);
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Frontend&controller=Account&action=doEdit&id=$id";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Frontend/AccountView.php",array("record"=>$record,"formAction"=>$formAction))	;
		}
		public function doEdit(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->Update($id);
			$record = $this->modelFetch($id);
				if(isset($record->email)){
					$_SESSION["id_user"] = $record->id_user;
					$_SESSION["email"] = $record->email;
					$_SESSION["name"] = $record->name;
					$_SESSION["ngaysinh"] = $record->ngaysinh;
					$_SESSION["diachi"] = $record->diachi;
					$_SESSION["sdt"] = $record->sdt;
					$_SESSION["chucdanh"]=$record->chucdanh;
					//echo "Thay đổi thành công. <a href='index.php?area=Frontend&controller=Account&action=edit&id=$id'>Quay lại</a>";
					if($_POST["password1"]!=$_POST["password2"]){
						echo "Thay đổi không thành công. <a href='index.php?area=Frontend&controller=Account&action=edit&id=$id'>Quay lại</a>";
					}
					else echo "Thay đổi thành công. <a href='index.php?area=Frontend&controller=Account&action=edit&id=$id'>Quay lại</a>";
				}
			
		}


	}
 ?>