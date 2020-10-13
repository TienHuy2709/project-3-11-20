<?php 
	include "Models/Frontend/CategoryProductModel.php";
	class CategoryProductHotController extends Controller{
		use CategoryProductModel;
		public function index(){
			//so ban ghi tren mot trang
			if(isset($_GET["id"])&&is_numeric($_GET["id"])) $id=""; 
			$pageSize = 8;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecordHot();//ham trong model
			//tinh so trang
			if (isset($_SESSION["namecategory"])) {
				unset($_SESSION["namecategory"]);
			}
			$_SESSION["namecategory"]="hot";
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao
			$from = $p * $pageSize;
			//lay cac ban ghi
			$data = $this->fetchAllProductHot($from,$pageSize);
			$this->renderHTML("Views/Frontend/CategoryProductView.php",array("data"=>$data,"numPage"=>$numPage));
		}

		
	}
 ?>