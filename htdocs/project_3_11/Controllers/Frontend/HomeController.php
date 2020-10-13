<?php 
	include "Models/Frontend/HomeModel.php";
	class HomeController extends Controller{
		use HomeModel;
		public function index(){
			if(isset($_SESSION["cart"]) == false){
				$_SESSION["cart"] = array();
			}
			$this->renderHTML("Views/Frontend/HomeView.php");
			if (isset($_SESSION["namecategory"]) && isset($_SESSION["categoryid"])) {
				unset($_SESSION["categoryid"]);
				unset($_SESSION["namecategory"]);
			}
			if(isset($_SESSION["productdetail"]) && isset($_SESSION["productid"])){
			unset($_SESSION["productdetail"]);
			unset($_SESSION["productid"]);
			}
			if (isset($_SESSION["account"]) && isset($_SESSION["acountid"])) {
				unset($_SESSION["account"]);
				unset($_SESSION["acountid"]);
			}
			if (isset($_SESSION["producheart"])) {
				unset($_SESSION["producheart"]);
			}
			if (isset($_SESSION["giohang"])) {
				unset($_SESSION["giohang"]);
			}
			if (isset($_SESSION["checkOut"])) {
				unset($_SESSION["checkOut"]);
			}
			unset($_SESSION["blog"]);
			unset($_SESSION["contact"]);
			unset($_SESSION["KM"]);
			$_SESSION["home"] ="yes";
		}
	}
 ?>