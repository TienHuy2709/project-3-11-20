<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
 <!--Main-->
    <div class="main-content container-fluid">
        <!-- Content -->

        <div class="container-fluid content ">
            <div class="cart">
                <div class="row">
                    <div class="col-lg-8 gio-hang">
                        <h1>Giỏ hàng</h1>
                         <form class="" action="index.php?controller=Cart&action=update" method="post" style="width: 100%">
                            <div class="block-table-cart">
                                <table id="example" class="table table-striped table-inverse table-responsive" >
                                    <thead class="thead-inverse">
                                        <tr class="cap-product">
                                            <td id="sm"></td>
                                            <td id="big">Sản phẩm</td>
                                            <td id="big">NAME</td>
                                            <td id="sm">SIZE</td>
                                            <td id="big">ĐƠN GIÁ</td>
                                            <td id="sm">SỐ LƯỢNG</td>
                                            <td id="big">THÀNH TIỀN</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($_SESSION['cart'] as $product): ?>
                                        <tr class="product">
                                            <td><a href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>" data-id="2479395"><i class="fa fa-trash"style="color: #990033"></i></a></td>
                                            <td>
                                                <div class="cart-product-item">
                                                    <div class="thumb"><img src="Assets/frontend/img/product/<?php echo $product['img']; ?>" class="img-responsive" alt=""></div>
                                                    
                                                </div>
                                            </td>
                                            <td>
                                              <div class="cart-product-info">
                                                        <h6 class="name header-font"><a href="index.php?controller=ProductDetail&id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h6>
                                                    </div>
                                            </td>
                                            <td>
                                              <input type="txt" class="form-control" name="size<?php echo $product['id']; ?>" style="width: 100px" value="<?php echo $product['size']; ?>">
                                            </td>
                                            <td>
                                                <strong class="header-color"><?php echo number_format($product['price']); ?>-VNĐ</strong>
                                            </td>
                                            <td class="text-center">
                                                <div class="quantity">
                                                    <input type="number" class="form-control" style="width: 100px" min="1" step="1" value="<?php echo $product ['number']; ?>" required="Không thể để trống" name="product_<?php echo $product['id']; ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <strong class="header-color"><?php echo number_format($product['price']*$product['number']); ?>-VNĐ</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                  <?php endforeach; ?>    
                                    </tbody>
                                </table>
                        <?php if($this->cartNumber() == 0): ?>
                            <div class=" alert alert-info" style="margin-left: 1rem; width: 100%"><b>Không có hàng trong giỏ hàng</b></div>
                        <?php endif; ?>
                            <?php if($this->cartNumber() > 0): ?>
                                <p style="font-size: 15px;margin-left: 1rem"><span style="font-weight: bold; color: red;">Note: </span>Nệu chọn nhiều size. Thì nhập vào ô size bên trên <span style="color: blue">VD:2M-3L</span></p>
                               <div style="margin-left: 1rem;">
                                <div class="btn btn-danger"><a style="color: white;" href="index.php?controller=Cart&action=destroy">Xóa toàn bộ</a></div>
                                <input type="submit" class="button pull-left btn btn-info" value="Cập nhật">
                                <!--<div  class="btn btn-dark" style="float: right"><a style="color: white;" <?php if(isset($_SESSION["email"])): ?> href="index.php?controller=Cart&action=Save" onclick="return window.alert('Lưu thành công');" 
                                    <?php else: ?> onclick="return window.alert('Bạn chưa đăng nhập');" 
                                    <?php endif; ?> title="">Lưu giỏ hàng</a></div>-->
                                </div>
                        <?php endif; ?>
                            </div>
                    </form>
                    </div>
                    <div class="col-lg-4 gia">
                        <?php if($this->cartNumber() > 0): ?>
                        <p>Tổng tiền hàng: <span><?php echo number_format($this->cartTotal()); ?>-VNĐ<br></span></p>
                        <p>Phí vận chuyển: <span>15.000-VNĐ</span></p>
                        <hr>
                        <p>Tổng tạm tính: <span class="price"><?php echo number_format($this->cartTotal() + 15000); ?>-VNĐ<br></span></p>
                        <a href="index.php?controller=Cart&action=checkOut" title=""><div class="btn btn-light" style="background-color: #990033">Thanh toán ngay</div></a>
                        <?php endif; ?>
                        <a href="index.php" title=""><div class="btn btn-light" style="background-color: rgb(0,0,0,0.5)">Tiếp tục mua sắm</div></a>

                    </div>
                </div>
            </div>