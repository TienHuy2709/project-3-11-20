<?php 
	trait CartModel{
		 public function cartAdd($id){
		 	$number = isset($_POST["number"])&&is_numeric($_POST["number"])?$_POST["number"]:1;
		    $size = isset($_POST["size"])?$_POST["size"]:'S';
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        if($_SESSION['cart'][$id]['size'] == $size&&$number>1){ 
		        	$_SESSION['cart'][$id]['number'] = $_SESSION['cart'][$id]['number']+$number;
		        }
		        else {$_SESSION['cart'][$id]['number']++;}
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$product = db::get_one("select * from tbl_product where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select *,(gia-(gia*km/100)) as price from tbl_product where product_id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---


		        $_SESSION['cart'][$id]= array(
		            'id' => $product->product_id,
		            'name' => $product->name,
		            'img' => $product->img1,
		            'number' => $number,
		            'size'=>$size,
		            'price' => $product->price,
		        );
		    }

		}
		    /**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number,$size){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['number'] = $number;
		    }
		    $_SESSION['cart'][$id]['size'] = $size;
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
		    unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += $product['price'] * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		/**public function cartListSave(){
				$id_user = $_SESSION['id_user'];
				$conn = Connection::getInstance();
		        $query = $conn->prepare("select * from tbl_cart where id_user=$id_user");
		        return $query->fetchAll();
		        
		}*/
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
			$fullname = $_POST["name"];
			$address = $_POST["diachi"];
			$email = $_POST["email"];
			$phone = $_POST["sdt"];
			//---
			$conn = Connection::getInstance();
			//---
			//insert ban ghi vao tbl_customer, lay customer_id vua moi insert
			$query = $conn->prepare("insert into tbl_customer set fullname=:fullname, email=:email, address=:address,phone=:phone");
			$query->execute(array("fullname"=>$fullname,"email"=>$email,"address"=>$address,"phone"=>$phone));
			//lay id vua moi insert
			$customer_id = $conn->lastInsertId();
			//---
			//---
			//insert ban ghi vao tbl_order, lay order_id vua moi insert
			$query = $conn->prepare("insert into tbl_order set customer_id=:customer_id, create_at=now()");
			$query->execute(array("customer_id"=>$customer_id));
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao tbl_order_detail
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into tbl_order_detail set order_id=:order_id, product_id=:product_id,size=:size, price=:price, number=:number");
				$query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"size"=>$product["size"],"price"=>$product["price"],"number"=>$product["number"]));
			}
			// Tru di so hang da ban
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("update tbl_product set sl_con=(sl_con-:number), mua=(mua+:number) where product_id=:product_id");
				$query->execute(array("number"=>$product["number"],"product_id"=>$product["id"]));
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
		}
		//luu gio hang
		/*public function cartSave(){
			$id_user = $_SESSION["id_user"];
			$conn = Connection::getInstance();	
			foreach ($_SESSION['cart'] as $product) {
				$query = $conn->prepare("insert into tbl_cart set product_id=:product_id, id_user=:id_user, name=:name, img=:img,  number=:number, size=:size, price=:price");
				$query->execute(array("product_id"=>$product["id"],"id_user"=>$id_user,"name"=>$product["name"],"img"=>$product["img"], "number"=>$product["number"],"size"=>$product["size"],"price"=>$product["price"]));
			}
		}*/
	}
 ?>