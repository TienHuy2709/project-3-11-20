<?php 
	include "Models/Frontend/ProductDetailModel.php";
	class ProductCmtController extends Controller{
		use ProductDetailModel;
		public function index(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->renderHTML("Views/Frontend/ProductCmtView.php");
		}
	}
 ?>