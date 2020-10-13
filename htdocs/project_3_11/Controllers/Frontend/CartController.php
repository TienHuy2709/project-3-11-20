<?php 
	include "Models/Frontend/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		//Ham tao de khoi tao gio hang neu gio hang chua ton tai
		public function __construct(){
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();

		}
		public function index(){
			$_SESSION["giohang"]="ok";
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
			if (isset($_SESSION["home"])) {
				unset($_SESSION["home"]);
			}
			if (isset($_SESSION["checkOut"])) {
				unset($_SESSION["checkOut"]);
			}
			unset($_SESSION["contact"]);
			unset($_SESSION["blog"]);
			unset($_SESSION["KM"]);
			$this->renderHTML("Views/Frontend/CartView.php");
		}
		//them san pham vao gio hang -> them phan tu vao session 
		public function add(){
			$id= isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//goij hafm cart_add trong model de them phan tu vao gio hang
			$this->cartAdd($id);
			header("location:index.php?controller=Cart");
		}
		//xóa từng phần tử trong giỏ hàng
		public function delete(){
			$id= isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//gọi hàm xóa phần từ trong giỏ hàng
			$this->cartDelete($id);
			header("location:index.php?controller=Cart");
		}
		public function destroy(){
			$this->cartDestroy();
			header("location:index.php?controller=Cart");
		}
		public function update(){
			//duyet cac phan tu trong session array
			foreach($_SESSION["cart"] as $product){
				$qty = "product_".$product["id"];
				$number = $_POST[$qty];
				$co = "size".$product["id"];
				$size = $_POST[$co];
				//goi ham update de update lai phan tu
				$this->cartUpdate($product["id"],$number,$size);
			}
			header("location:index.php?controller=Cart");
		}
		//khi ấn nút submit thanh toán 
		public function checkOut(){
			$_SESSION["checkOut"]="ok";
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
			if (isset($_SESSION["home"])) {
				unset($_SESSION["home"]);
			}
			if (isset($_SESSION["giohang"])) {
				unset($_SESSION["giohang"]);
			}
			$this->renderHTML("Views/Frontend/CheckOutView.php");
		}
		public function doCheckOut(){
			//gọi hàm cartCheckOut() để lưu giá trị vào csdl
			$this->cartCheckOut();
			//xóa giỏ hàng
			$this->cartDestroy();
			header("location:index.php?controller=Cart");
		}
		/*public function Save(){
			$this->cartSave();
			header("location:index.php?controller=Cart");
		}*/
	}
 ?>