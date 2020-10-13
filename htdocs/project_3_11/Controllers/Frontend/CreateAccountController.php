<?php 
	include "Models/Frontend/CreateAccountModel.php";
	class CreateAccountController extends Controller{
		use CreateAccountModel;
		public function index(){
			$this->renderHTML("Views/Frontend/CreateAccountView.php");
		}
		public function doCreateAccount(){
			$check = $this->Check();
			if(!isset($check->email)){
				$this->Insert();
				$record = $this->modelFetch();
				if(isset($record->email)){
					$_SESSION["id_user"] = $record->id_user;
					$_SESSION["email"] = $record->email;
					$_SESSION["name"] = $record->name;
					$_SESSION["ngaysinh"] = $record->ngaysinh;
					$_SESSION["diachi"] = $record->diachi;
					$_SESSION["sdt"] = $record->sdt;
					$_SESSION["chucdanh"]=$record->chucdanh;
					if(isset($_SESSION["productdetail"]) && isset($_SESSION["productid"])){
					$id = $_SESSION["productid"];
					header("location:index.php?controller=ProductDetail&id=$id");
					}
					elseif(isset($_SESSION["namecategory"])){
					if($_SESSION["namecategory"]=="buy"){
						header("location:index.php?controller=CategoryProductBuy");
					}
					elseif($_SESSION["namecategory"]=="new"){
						header("location:index.php?controller=CategoryProductNew");
					}
					elseif($_SESSION["namecategory"]=="hot"){
						header("location:index.php?controller=CategoryProductHot");
					}
					else{
						$id = isset($_SESSION["categoryid"])? $_SESSION["categoryid"] : 0;
						header("location:index.php?controller=CategoryProduct&id=$id");
					}
					}
					else header("location:index.php?area=Frontend");
					}
			}
			else echo "Email hoặc tài khoản đã tồn tại. <a href ='index.php?area=Frontend&controller=CreateAccount'>Quay lại</a>";
			
		}
	}
 ?>