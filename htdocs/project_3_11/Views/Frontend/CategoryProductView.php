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
            <div class="container-fluid content-category">
                <div class="row">
                    <!-- Bộ_lọc-->
                    <div class="col-lg-3 filter">
                        <div class="cap-filter">
                            <h3>Bộ lọc</h3></div>
                        <div class="container-fluid content-filter">
                            <div class="row">
                                <div class="col-lg-auto col-sm-3 filter-item">
                                    <h4>Sắp xếp theo :</h4>
                                    <ul>
                                        <li><a href="index.php?controller=CategoryProductNew">Sản phẩm mới nhất</a></li>
                                        <li><a href="index.php?controller=CategoryProductHot">Sản phẩm Hot</a></li>
                                        <li><a href="index.php?controller=CategoryProductBuy">Sản phẩm bán chạy</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-auto col-sm-3 filter-item">
                                    <h4>Nhà cung cấp :</h4>
                                    <ul>
                                        <li><a href="#">Superme</a></li>
                                        <li><a href="#">Adidas</a></li>
                                        <li><a href="#">Nike</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-auto col-sm-3 filter-item">
                                    <h4>Giá sản phẩm :</h4>
                                    <div class="filter-price">
                                        <form class="form-inline" method="post"
                                         action="index.php?area=Frontend&controller=CategoryProduct&action=SearchProduct"  accept-charset="utf-8">
                                            <!--<div>
                                                Giá
                                                <select class="form-control form-control-sm" name="price" style="max-width: 100%">
                                                    <option value="1">Từ thấp đến cao</option>
                                                    <option value="2">Từ cao đến thấp</option>
                                                </select>
                                            </div>-->

                                            <div style="margin-top: 1rem;">
                                                Từ:
                                                <input type="text" name="to" value="" class="form-control" style="max-width: 30%" name=""> Đến:
                                                <input type="text" name="for" value="" class="form-control" style="max-width: 30%" name="">
                                            </div>
                                            <button type="submit" class="btn btn-outline-danger" style="">Tìm kiếm</button>
                                        </form>
                                        
                                        </li>
                                    </div>
                                </div>
                                <div class="col-lg-auto col-sm-3 filter-item">
                                    <h4>TAG :</h4>
                                     <?php 
                                        $conn = Connection::getInstance();
                                        $query = $conn->query("select * from tbl_category order by rand() limit 4");
                                        //trả về tất cả các phần tử
                                        $category = $query->fetchAll(); ?>
                                        <?php foreach($category as $rows): ?>
                                    <div class="list-tag"><a href="index.php?controller=CategoryProduct&id=<?php echo $rows->category_id; ?>" title="<?php echo $rows->name; ?>"><?php echo $rows->name; ?></a></div>
                                        <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <!-- end_Bộ_lọc -->
                    <!-- Product-category -->
                    <div class="col-lg-9 product-category">
                        <div class="container-fluid name-category">
                            <h3><?php if(isset($id)): ?>
                                    <?php echo $_SESSION["namecategory"]; ?>
                                <?php elseif($_SESSION["namecategory"]=="hot"): ?>
                                    <?php echo "Sản phẩm nổi bật"; ?>
                                <?php elseif($_SESSION["namecategory"]=="new"): ?>
                                    <?php echo "Sản phẩm mới nhất"; ?>
                                <?php elseif($_SESSION["namecategory"]=="buy"): ?>
                                    <?php echo "Sản phẩm được mua nhiều"; ?>
                                    <?php elseif($_SESSION["namecategory"]=="searchname"): ?>
                                    <?php echo ("Từ khóa tìm kiếm : ".$_POST["search"]." <span style=font-size:20px;>( ".$totalRecord." sản phẩm được tìm thấy)</span>"); ?>
                                <?php elseif($_SESSION["namecategory"]=="search"): ?>
                                    <?php echo "Tìm Kiếm: "; ?>
                                    <?php   if($_POST["to"] !="" && $_POST["for"]!="") {
                                                echo "Giá Từ "; echo $_POST["to"]; echo " đến ";echo $_POST["for"];
                                            }
                                            else echo "Từ thấp đến cao"
                                     ?>
                                <?php endif; ?>
                            </h3>
                        </div>

                        <div class="row product_content">
                            <?php foreach($data as $rows): ?>
                            <div class="product-item col-lg-3 col-md-3">
                                <div class="card hvr-float-shadow" style="width: 100%;">
                                    <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1; ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2; ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1; ?>';" style="transition: all 1s" alt="Card image cap">
                                    <div class="img-btn bounceIn">
                                        <a 
                                        <?php if($rows->sl_con <= 0): ?> 
                                            onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                        <?php else: ?>
                                        href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                        <?php endif; ?> 
                                        class="btn btn-light hvr-float" title="Thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
                                         <a <?php if(isset($_SESSION["email"])): ?>
                                            <?php
                                            $iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
                                            $kiemtra = $this->fetchOneheart($iduser,$rows->product_id); ?>
                                            <?php if(isset($kiemtra->productheart_id)): ?> title="bỏ thích"  
                                            href="index.php?controller=ProductHeart&action=Deleteproductheart&id=<?php echo $kiemtra->productheart_id; ?>"
                                            <?php else: ?>
                                                 href="index.php?controller=ProductHeart&action=Addproductheart&iduser=<?php echo $_SESSION['id_user']; ?>&idproduct=<?php echo $rows->product_id; ?>"
                                                    title="yêu thích" style="color: rgb(153,209,211);"
                                            <?php endif; ?>  
                                             <?php else: ?>
                                                onclick="return window.alert('Bạn chưa đăng nhập');" title="yêu thích"
                                             <?php endif; ?>                            
                                              class="btn btn-light hvr-float"
                                               ><i class="fas fa-heart"></i></a>
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
                                <li class="page-item" disabled><a class="page-link">Trang</a></li>
                                <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <?php $p = isset($_GET["p"])&&is_numeric($_GET["p"]) ?$_GET["p"] : 0; ?>
                                <li class="page-item <?php if($_GET["p"]==$i) echo('active'); ?>">
                                    <?php if(isset($id)): ?>
                                 <a class="page-link" href="index.php?controller=CategoryProduct&id=<?php echo $rows->category_id; ?>&p=<?php echo $i;?>" tabindex="-1"><?php echo $i ?></a>
                                 <?php elseif($_SESSION["namecategory"]=="hot"): ?>
                                    <a class="page-link" href="index.php?controller=CategoryProductHot&p=<?php echo $i;?>" tabindex="-1"><?php echo $i ?></a>
                                    <?php elseif($_SESSION["namecategory"]=="new"): ?>
                                        <a class="page-link" href="index.php?controller=CategoryProductNew&p=<?php echo $i;?>" tabindex="-1"><?php echo $i ?></a>
                                    <?php elseif($_SESSION["namecategory"]=="buy"): ?>
                                        <a class="page-link" href="index.php?controller=CategoryProductBuy&p=<?php echo $i;?>" tabindex="-1"><?php echo $i ?></a>
                                    <?php elseif($_SESSION["namecategory"]=="search"): ?>
                                        <a class="page-link" 
                                    href="index.php?controller=Frontend&controller=CategoryProduct&action=SearchProduct&to=<?php echo $_POST['to']; ?>&for=<?php echo $_POST['for']; ?>&p=<?php echo $i;?>" tabindex="-1"><?php echo $i ?></a>
                                    <?php elseif($_SESSION["namecategory"]=="searchname"): ?>
                                        <a class="page-link" 
                                    href="index.php?controller=Frontend&controller=Search&action=SearchNameProduct&search=<?php echo $_POST['search']; ?>&p=<?php echo $i;?>" tabindex="-1"><?php echo $i ?></a>
                                <?php endif; ?>
                               </li>
                                <?php endfor; ?>
                             </ul>
                           </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>