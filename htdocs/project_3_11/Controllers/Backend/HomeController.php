<?php 
//controller mặc định khi controller không truyền trên url
	class HomeController extends Controller{

		//hàm tạo
		public function __construct(){
			//xác thực đăng nhập
			$this->authentication();	

		}
		//action mặc định khi action không truyền trên url
		public function index(){
			$this->renderHTML("Views/Backend/HomeView.php");
		}
		
	}
 ?>