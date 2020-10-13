<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
<!--Main-->
    <div class="main-content container-fluid">
        <!-- Content -->
        <div class="container-fluid content">
            <div class="container-fluid add-full">
                <?php include "Views/Frontend/Ad.php"; ?>
                <hr style="width: 30%">
            </div>
            <div class="container content-category">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <!-- Product-category -->
                    <style type="text/css" media="screen">
                        .product-heart .product_content .product-item .card i.fa-heart:hover{
                            color: white;
                        }
                    </style>
                    <div class="col-lg-10 product-category product-heart">
                        <div class="container-fluid name-category">
                            <h3 style="text-align: center">Danh sách yêu thích</h3>
                        </div>
                        <div class="row product_content">
                            <?php foreach($data as $rows): ?>
                            <div class="product-item col-lg-3 col-sm-3 col-md-3 col-sm-3">
                                <div class="card hvr-float-shadow" style="width: 100%;">
                                    <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1 ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2 ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1 ?>';" style="transition: all 1s" alt="Card image cap">
                                    <div class="img-btn bounceIn">
                                        <a  
                                        <?php if($rows->sl_con <= 0): ?> 
                                            onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                        <?php else: ?>
                                        href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                        <?php endif; ?>  class="btn btn-light hvr-float" title=""><i class="fas fa-shopping-cart"></i></a>
                                        <a href="index.php?controller=ProductHeart&action=Deleteproductheart&id=<?php echo $rows->productheart_id; ?>" class="btn btn-light hvr-float" title="bỏ thích"><i class="fas fa-heart"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php echo $rows->name; ?>" id="name"><?php echo $rows->name; ?></a></h5>
                                        <p class="card-text"><?php echo $rows->price; ?>-VNĐ <span style="text-decoration: line-through; font-size: 15px;"><?php if($rows->km!=0): ?><?php echo $rows->gia ?>-VNĐ <?php endif; ?></span>
                                                </p>
                                        <a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" class="btn btn-outline-primary hvr-sweep-to-right" id="btn-view">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                           <nav aria-label="...">
                             <ul class="pagination justify-content-center">
                                <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <?php $p = isset($_GET["p"])&&is_numeric($_GET["p"]) ?$_GET["p"] : 0; ?>
                               <li class="page-item <?php if($_GET["p"]==$i) echo('active'); ?>">
                                 <a class="page-link" href="index.php?controller=ProductHeart&iduser=<?php echo $_SESSION['id'] ?>&p=<?php echo $i; ?>" tabindex="-1"><?php echo $i; ?></a>
                               </li>
                               <?php endfor; ?>
                             </ul>
                           </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="clearfix"></div>
            <!--End-Product-category -->