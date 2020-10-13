<?php 
	include "Models/Frontend/ContactModel.php";
	class ContactController extends Controller{
		use ContactModel;
		public function index(){
			$this->renderHTML("Views/Frontend/ContactView.php");
			$_SESSION["contact"]="ok";
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
			if (isset($_SESSION["home"])) {
				unset($_SESSION["home"]);
			}
			unset($_SESSION["KM"]);
		}
		public function addContact(){
			$this->Insert();
			header("location:index.php?controller=Contact");
		}

	}
 ?>