<?php 
	include "Models/Frontend/SearchModel.php";
	class SearchController extends Controller{
		use SearchModel;
		public function index(){
			$this->renderHTML("Views/Frontend/HeaderView.php");
		}
		public function SearchNameProduct(){
			if(isset($_GET["search"])){
				$_POST["search"]=$_GET["search"];
			}
			$search = $_POST["search"];
			$pageSize = 8;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecordSearchProduct();//ham trong model
			//tinh so trang
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao
			$from = $p * $pageSize;
			//lay cac ban ghi
			$data = $this->SearchProduct($from,$pageSize);
			//--
			if (isset($search)) {
				unset($_SESSION["namecategory"]);
			}
			$_SESSION["namecategory"]="searchname";
			//goi view, truyen du lieu ra view
			$this->renderHTML("Views/Frontend/CategoryProductView.php",array("data"=>$data,"numPage"=>$numPage,"totalRecord"=>$totalRecord));
		}
	}
 ?>