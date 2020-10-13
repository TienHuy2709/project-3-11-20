<?php 
	include "Models/Frontend/LogInModel.php";
	class LogInController extends Controller{
		use LogInModel;
		public function index(){
			$this->renderHTML("Views/Frontend/LogInView.php");
		}
	//khi ấn nút submit 
		public function doLogIn(){
			//gọi hàm lấy 1 bản ghi từ class model
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
				elseif(isset($_SESSION["giohang"])){
					header("location:index.php?controller=Cart");
				}
				elseif(isset($_SESSION["checkOut"])){
					header("location:index.php?controller=Cart&action=checkOut");
				}
				elseif(isset($_SESSION["contact"])){
					header("location:index.php?controller=Contact");
				}
				elseif(isset($_SESSION["blog"])&&isset($_SESSION["news"])){
					$news = isset($_SESSION["news"])? $_SESSION["news"] : 0;
					header("location:index.php?controller=Blog&news=$news&p=1");
				}
				elseif(isset($_SESSION["blogdetail"])&&isset($_SESSION["news"])&&isset($_SESSION["id_news"])){
					$news = isset($_SESSION["news"])? $_SESSION["news"] : 0;
					$id = isset($_SESSION["id_news"])? $_SESSION["id_news"] : 0;
					header("location:index.php?controller=BlogDetail&news=$news&id=$id");
				}
				elseif(isset($_SESSION["KM"])){
					header("location:index.php?controller=KM");
				}
				elseif(isset($_SESSION["KMdetail"])&&isset($_SESSION["id_km"])){
					$id = isset($_SESSION["id_km"])? $_SESSION["id_km"] : 0;
					header("location:index.php?controller=KMDetail&id=$id");

				}
				else header("location:index.php?area=Frontend");
			}
			else{
				header("location:index.php?controller=LogIn&kt=false");
				 
				 
			}
		}
	}
 ?>