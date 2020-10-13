<?php 
	include "Models/Backend/CategoryModel.php";
	class CategoryController extends Controller{
		use CategoryModel;
		public function __construct(){
			$this->authentication();
		}
		
	
	public function index(){

		$pageSize = 10;
		$totalRecord = $this->totalRecord();

		$numPage = ceil($totalRecord/$pageSize);
		$p=isset($_GET["p"]) && is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) :0;
		$from = $p*$pageSize;
		$data = $this->fetchAll($from,$pageSize);
		$this->renderHTML("Views/Backend/CategoryView.php",array("data"=>$data,"numPage"=>$numPage));

	}
	public function edit(){
			$id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//gọi hàm trong model để lấy 1 bản ghi
			$record = $this->fetch($id);
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Backend&controller=Category&action=doEdit&id=$id";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/AddEditCategoryView.php",array("record"=>$record,"formAction"=>$formAction))	;
		}
		//do edit user
		public function doEdit(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->Update($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Category");
		}
		public function add(){
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Backend&controller=Category&action=doAdd";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/AddEditCategoryView.php",array("formAction"=>$formAction))	;
		}
		//do edit user
		public function doAdd(){
			//gọi hàm insert trong model để insert bản ghi
			$this->Insert();
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Category");
		}
		public function delete(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->DeleteCategory($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Category");
		}
}
 ?>
