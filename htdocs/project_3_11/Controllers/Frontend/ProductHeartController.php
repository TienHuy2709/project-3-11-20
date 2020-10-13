<?php 
	include "Models/Frontend/ProductHeartModel.php";
	class ProductHeartController extends Controller{
		use ProductHeartModel;
		public function index(){
			$idproduct = isset($_GET["idproduct"])&&is_numeric($_GET["idproduct"])?$_GET["idproduct"]:0;
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			//so ban ghi tren mot trang
			/*if(isset($_SESSION["productdetail"]) && isset($_SESSION["productid"])){
			unset($_SESSION["productdetail"]);
			unset($_SESSION["productid"]);
			}
			if (isset($_SESSION["account"]) && isset($_SESSION["acountid"])) {
				unset($_SESSION["account"]);
				unset($_SESSION["acountid"]);
			}
			if (isset($_SESSION["namecategory"]) && isset($_SESSION["categoryid"])) {
				unset($_SESSION["categoryid"]);
				unset($_SESSION["namecategory"]);
			}*/
			$_SESSION["producheart"] = "yes";
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
			$this->renderHTML("Views/Frontend/ProductHeartView.php",array("data"=>$data,"numPage"=>$numPage,"iduser"=>$iduser));
		}
		public function Addproductheart(){
			$idproduct = isset($_GET["idproduct"])&&is_numeric($_GET["idproduct"])?$_GET["idproduct"]:0;
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			$kiemtra = $this->fetchOneheart();
			if($kiemtra==0){
				$this->Insert();
			}
			if(isset($_SESSION["productdetail"])){
				$id = $_SESSION["productid"];
				header("location:index.php?controller=ProductDetail&id=$id");
			}
			if(isset($_SESSION["namecategory"])){
				$id = isset($_SESSION["categoryid"])? $_SESSION["categoryid"] : 0;
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
						header("location:index.php?controller=CategoryProduct&id=$id");
					}
			}
			if(isset($_SESSION["home"])){
				header("location:index.php");
			}
			if(isset($_SESSION["producheart"])){
				$iduser = isset($_SESSION["id"])&&is_numeric($_SESSION["id"])?$_SESSION["id"]:0;
				header("location:index.php?controller=ProductHeart&iduser=$iduser");
			}
		}
		public function Deleteproductheart(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$idproduct = isset($_GET["idproduct"])&&is_numeric($_GET["idproduct"])?$_GET["idproduct"]:0;
			$iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
			$this->Delete($id);
			if(isset($_SESSION["productdetail"])){
				$id = $_SESSION["productid"];
				header("location:index.php?controller=ProductDetail&id=$id");
			}
			if(isset($_SESSION["namecategory"])){
				$id = isset($_SESSION["categoryid"])? $_SESSION["categoryid"] : 0;
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
						header("location:index.php?controller=CategoryProduct&id=$id");
					}
			}
			if(isset($_SESSION["home"])){
				header("location:index.php");
			}
			if(isset($_SESSION["producheart"])){
				$iduser = isset($_SESSION["id"])&&is_numeric($_SESSION["id"])?$_SESSION["id"]:0;
				header("location:index.php?controller=ProductHeart&iduser=$iduser");
			}
		}
	}
 ?>