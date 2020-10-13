<?php 
	include "Models/Frontend/ProductDetailModel.php";
	class ProductDetailController extends Controller{
		use ProductDetailModel;
		public function index(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->renderHTML("Views/Frontend/ProductDetailView.php");
			if (isset($_SESSION["namecategory"]) && isset($_SESSION["categoryid"])) {
				unset($_SESSION["categoryid"]);
				unset($_SESSION["namecategory"]);
			}
			if (isset($_SESSION["account"]) && isset($_SESSION["acountid"])) {
				unset($_SESSION["account"]);
				unset($_SESSION["acountid"]);
			}
			if (isset($_SESSION["producheart"])) {
				unset($_SESSION["producheart"]);
			}
			if (isset($_SESSION["home"])) {
				unset($_SESSION["home"]);
			}
			if (isset($_SESSION["giohang"])) {
				unset($_SESSION["giohang"]);
			}
			if (isset($_SESSION["checkOut"])) {
				unset($_SESSION["checkOut"]);
			}
			unset($_SESSION["contact"]);
			unset($_SESSION["blog"]);
			unset($_SESSION["KM"]);
			$_SESSION["productdetail"]="yes";
			$_SESSION["productid"]=$id;
		}
		public function doCmt(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			$this->Insert();
			$this->renderHTML("Views/Frontend/ProductDetailView.php");
		}
		public function doLike(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			$this->Like($id);
			$this->renderHTML("Views/Frontend/ProductDetailView.php");
		}
	}
 ?>