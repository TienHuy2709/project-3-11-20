<?php 
	include "Models/Frontend/BlogDetailModel.php";
	class BlogDetailController extends Controller{
		use BlogDetailModel;
		public function index(){
			$_SESSION["blogdetail"]="ok";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$_SESSION["id_news"]=$id;
			$news = isset($_GET["news"])&&is_numeric($_GET["news"])?$_GET["news"]:0;
			$_SESSION["news"]=$news;
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
			unset($_SESSION["contact"]);
			unset($_SESSION["KM"]);
			unset($_SESSION["blog"]);
			$data = $this->fetch($id);
			$this->renderHTML("Views/Frontend/BlogDetailView.php",array("data"=>$data));
		}
	}
 ?>