<?php 
	include "Models/Backend/ProductsModel.php";
	class ProductsController extends Controller{
		//khai báo để sử 	dụng class NewsModel
		use ProductsModel;
		//hàm tạo để xác thực đăng nhập
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//số bản ghi trên một trang
			$pageSize = 6;
			//tính tổng số bản ghi
			$totalRecord = $this->totalRecord();//hàm trong model
			//tính số trang
			//hàm cell sử dụng để lấy tram
			$numPage = ceil($totalRecord/$pageSize);
			//lấy biến p truyền trên url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lấy từ bản ghi nào
			$from = $p * $pageSize;
			//lấy các bản ghi
			$data = $this->fetchAll($from,$pageSize);
			//gọi view, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/ProductsView.php",array("data"=>$data,"numPage"=>$numPage));
		}

		public function edit(){
			$id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//gọi hàm trong model để lấy 1 bản ghi
			$record = $this->fetch($id);
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Backend&controller=Products&action=doEdit&id=$id";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/AddEditProductsView.php",array("record"=>$record,"formAction"=>$formAction))	;
		}
		//do edit News
		public function doEdit(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->Update($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Products&action=edit&id=$id");
		}
		public function add(){
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Backend&controller=Products&action=doAdd";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/AddEditProductsView.php",array("formAction"=>$formAction))	;
		}
		//do edit News
		public function doAdd(){
			//gọi hàm insert trong model để insert bản ghi
			$this->Insert();
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Products");
		}
		public function delete(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->deleteProducts($id);
			$this->deleteImgProducts($id);
			$this->deleteCmtProducts($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Products");
		}
		public function deleteimg(){
			$id_img=isset($_GET["id_img"])&&is_numeric($_GET["id_img"])? $_GET["id_img"]:0;
			$id_product=isset($_GET["id_product"])&&is_numeric($_GET["id_product"])? $_GET["id_product"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$conn = Connection::getInstance();
			//chuản bị truy vấn
			$query = $conn->prepare("delete from tbl_detailproduct where id_detailproduct=:id ");
			//thực hiện truy vấn
			$query->execute(array("id"=>$id_img));
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Products&action=edit&id=$id_product");
		}
	}
 ?>