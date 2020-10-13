<?php 
	include "Models/Frontend/CategoryProductModel.php";
	class CategoryProductController extends Controller{
		use CategoryProductModel;
		public function index(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//so ban ghi tren mot trang
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
			$_SESSION["categoryid"]=$id;
			$pageSize = 8;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecord();//ham trong model
			//tinh so trang
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao
			$from = $p * $pageSize;
			//lay cac ban ghi
			$data = $this->fetchAll($from,$pageSize);
			//--
			$namecategory = $this->fetchOneCategory($id);
			if (isset($namecategory->name)) {
				$_SESSION["namecategory"]=$namecategory->name;
			}
			//goi view, truyen du lieu ra view
			$this->renderHTML("Views/Frontend/CategoryProductView.php",array("data"=>$data,"numPage"=>$numPage,"id"=>$id));
		}
		public function SearchProduct(){
			$pageSize = 8;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecordSearch();//ham trong model
			//tinh so trang
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao
			$from = $p * $pageSize;
			//lay cac ban ghi
			$data = $this->fetchAllProductSearch($from,$pageSize);
			//--
			if (isset($namecategory->name)) {
				unset($_SESSION["namecategory"]);
			}
			$_SESSION["namecategory"]="search";
			//goi view, truyen du lieu ra view
			$this->renderHTML("Views/Frontend/CategoryProductView.php",array("data"=>$data,"numPage"=>$numPage));
		}
	}
 ?>