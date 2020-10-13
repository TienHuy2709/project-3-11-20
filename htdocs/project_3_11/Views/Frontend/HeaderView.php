<nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-branch" href="index.php">
                    <img src="Assets/frontend/img/avatar.jpg" height="100">
                </a>
                <div class="navbar navbar-nav w-50 justify-content-end ">                        
                    <form class=" form-inline" method="post" action="index.php?controller=Search&action=SearchNameProduct">
                        <input type="search" class="form-control mr-sm-2" placeholder="tìm kiếm" style="width: 300px" aria-label="Search" name="search">
                        <button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <i class="fas fa-user" style="color: #990033;"></i>
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav_menu">
                    <i class="fas fa-bars" style="color: #990033;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                        <?php 
                            //lấy số lượng sản phẩm
                        $cartNumber = 0;
                        if (isset($_SESSION["cart"]) == true) {
                            foreach($_SESSION["cart"] as $product){
                            $cartNumber = $cartNumber + $product["number"];
                            }
                        }
                         ?>
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Giỏ hàng<i class="fas fa-shopping-cart"></i> <sup style="width: 30px"><?php echo $cartNumber; ?></sup></a>
                            <ul class="dropdown-menu">
                                <?php if(isset($_SESSION["cart"])): ?>
                                <?php foreach($_SESSION["cart"] as $product): ?>
                                <li class="row">
                                    <div class="navbar-left col-4">
                                        <a href="index.php?controller=ProductDetail&id=<?php echo $product['id']; ?>" class="" title=""><img src="Assets/frontend/img/product/<?php echo $product['img']; ?>" alt="" style="height: 100px"></a>
                                    </div>
                                    <div class="navbar-right col-8">
                                        <p id="name"><a href="index.php?controller=ProductDetail&id=<?php echo $product['id'] ?>" title=""><?php echo $product['name']; ?></a></p>
                                        <i><?php echo number_format($product['price']); ?>-VND</i>
                                        <input type="number" class="form-control" value="<?php echo $product['number']; ?>" min="0" disabled name="" style="max-width: 60px">
                                    </div>
                                    <a id="close" href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>" title=""><i class="fas fa-times"></i></a>
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                                <div>
                                    <?php 
                                    $total = 0;
                                        foreach($_SESSION['cart'] as $product){
                                            $total += $product['price'] * $product['number'];
                                        }
                                     ?>
                                    <?php if($cartNumber > 0): ?>
                                    <p class="check">Tổng : <?php echo number_format($total); ?>-VNĐ <a class="nav-link" href="index.php?controller=Cart" title="">Check</a></p>
                                    <?php else: ?> <p style="text-align: center">Không có sản phầm nào</p>
                                <?php endif; ?>
                                </div>
                            </ul>
                        </li>
                        <?php if(!isset($_SESSION["email"])): ?>
                            <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=CreateAccount">Đăng ký <i class="fas fa-pencil-alt"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=LogIn">Đăng nhập <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown" style="margin-right: 2rem">
                            <a class="nav-link dropdown-toggle user" data-toggle="dropdown" href="">
                                <?php if(($_SESSION["name"])!="") echo $_SESSION["name"];
                                      else echo $_SESSION["email"];
                                 ?> 
                                <i class="fas fa-user"></i></a>
                                <ul class="dropdown-menu user">
                                    <li class="user"><a href="index.php?controller=ProductHeart&iduser=<?php echo $_SESSION["id_user"]; ?>" title="">Danh sách ưa thích</a><i class="fas fa-heart"></i></li>
                                    <li class="user"><a href="index.php?area=Frontend&controller=Account&action=edit&id=<?php echo $_SESSION['id_user']; ?>" title="">Thông tin tài khoản</a><i class="fas fa-user-cog"></i></li>
                                <?php if(($_SESSION["chucdanh"])==1): ?>
                                    <li class="user"><a href="index.php?area=Backend&controller=Home" target="_blank  " title="">Quản lý shop</a><i class="fas fa-store"></i></i></li>
                                <?php endif; ?>
                                    <li class="user"><a href="index.php?area=Frontend&controller=LogOut" onclick="return window.confirm('Bạn có chắc chắn muốn đăng xuất');" title="">Đăng xuất</a><i class="fas fa-sign-out-alt"></i></li>
                                </ul>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </nav>