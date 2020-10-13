<?php 
	include "Models/Backend/UserModel.php";
	class UserController extends Controller{
		//khai báo để sử dụng class UserModel
		use UserModel;
		//hàm tạo để xác thực đăng nhập
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//số bản ghi trên một trang
			$pageSize = 10;
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
			$this->renderHTML("Views/Backend/UserView.php",array("data"=>$data,"numPage"=>$numPage));
		}

		public function edit(){
			$id = isset($_GET["id"])&& is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//gọi hàm trong model để lấy 1 bản ghi
			$record = $this->fetch($id);
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Backend&controller=User&action=doEdit&id=$id";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/AddEditUserView.php",array("record"=>$record,"formAction"=>$formAction))	;
		}
		//do edit user
		public function doEdit(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->Update($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=User&action=edit&id=$id");
		}
		public function add(){
			//tạo biến $formAction để điều phối action của form
			$formAction = "index.php?area=Backend&controller=User&action=doAdd";
			//gọi View, truyền dữ liệu ra view
			$this->renderHTML("Views/Backend/AddEditUserView.php",array("formAction"=>$formAction))	;
		}
		//do edit user
		public function doAdd(){
			//gọi hàm insert trong model để insert bản ghi
			$this->Insert();
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=User");
		}
		public function delete(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->DeleteUser($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=User");
		}
	}
 ?>