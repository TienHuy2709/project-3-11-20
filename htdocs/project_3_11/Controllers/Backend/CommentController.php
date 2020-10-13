<?php 
	include "Models/Backend/CommentModel.php";
	class CommentController extends Controller{
		//khai báo để sử 	dụng class NewsModel
		use CommentModel;
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
			$this->renderHTML("Views/Backend/CommentView.php",array("data"=>$data,"numPage"=>$numPage));
		}

		
		public function delete(){
			$id=isset($_GET["id"])&&is_numeric($_GET["id"])? $_GET["id"]:0;
			//gọi hàm insert trong model để insert bản ghi
			$this->deleteComment($id);
			//quay trờ lại đường dẫn
			header("location:index.php?area=Backend&controller=Comment");
		}
	}
 ?>