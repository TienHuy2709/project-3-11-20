<?php 
	include "Models/Frontend/BlogModel.php";
	class BlogController extends Controller{
		use BlogModel;
		public function index(){
			$_SESSION["blog"]="ok";
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
			$pageSize = 4;
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
			$this->renderHTML("Views/Frontend/BlogView.php",array("data"=>$data,"numPage"=>$numPage));
		}
	}
 ?>