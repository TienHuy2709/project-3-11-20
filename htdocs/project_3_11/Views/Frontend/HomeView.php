<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
    <!--Slide-->
    <?php include "Views/Frontend/SlideView.php"; ?>
    <!--End_Slide-->
    <div class="clear"></div>
    
    <!--Main-->
    <div class="main-content container-fluid">
        <!-- Video -->
        <div class="video container ">
            <div class="cap_video row ">
                <caption class="col-lg-12">
                    <h1>VIDEO THƠI TRANG</h1>
                </caption>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/a0lYh4tSrwI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/vwrk5xxmU4U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- End_Video-->
        <div class="clearfix"></div>
        <!-- Content-product -->
        <div class="container-fluid content ">
            <div class="row">
                    <!-- Content-left -->
                <div class="col-lg-9 content-left">
                    <!-- product_U_Like -->
                     <!-- product_hot -->
                    <p class="product_cap"><i class="fas fa-tshirt"></i>SẢN PHẨM NỔI BẬT___ <span class="hvr-icon-forward"><a type="submit" href="index.php?controller=CategoryProductHot" title="">Xem thêm <i class="fas fa-chevron-right hvr-icon" style="font-size: 10px"></i></a></span></p>
                    <div id="hotProduct" class="product carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <div class="row product_content">
                                    <?php
                                    $iduser = isset($_SESSION["id_user"])&&is_numeric($_SESSION["id_user"])?$_SESSION["id_user"]:0;
                                     $data = $this->productHot(); ?>
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
                                                <?php endif; ?>  class="btn btn-light hvr-float " title="thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
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
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row product_content">
                                    <?php $data = $this->productHot(); ?>
                                    <?php foreach($data as $rows): ?>
                                    <div class="product-item col-lg-3 col-sm-3 col-md-3 col-sm-3">
                                        <div class="card hvr-float-shadow" style="width: 100%;">
                                            <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1 ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2 ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1 ?>';" style="transition: all 1s" alt="Card image cap">
                                            <div class="img-btn bounceIn">
                                                <a  <?php if($rows->sl_con <= 0): ?> 
                                                    onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                                <?php else: ?>
                                                href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                                <?php endif; ?>  class="btn btn-light hvr-float " title="thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
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
                                                onclick="return window.alert('Bạn chưa đăng nhập');"title="yêu thích" 
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
                                </div>
                            </div>
                            <a class="carousel-control-prev control" href="#hotProduct" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next control" href="#hotProduct" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                        </div>
                        <hr></hr>
                    </div>
                    <div class="clearfix"></div>
                    <!-- end product_hot -->
                    <!-- product_new -->
                    <p class="product_cap"><i class="fas fa-tshirt"></i>SẢN PHẨM MỚI___ <span class="hvr-icon-forward"><a href="index.php?controller=CategoryProductNew" title="">Xem thêm <i class="fas fa-chevron-right hvr-icon" style="font-size: 10px"></i></a></span></p>
                    <div id="newProduct" class="product carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <div class="row product_content">
                                    <?php $data = $this->productNew(); ?>
                                    <?php foreach($data as $rows): ?>
                                    <div class="product-item col-lg-3 col-sm-3 col-md-3 col-sm-3">
                                        <div class="card hvr-float-shadow" style="width: 100%;">
                                            <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1 ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2 ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1 ?>';" style="transition: all 1s" alt="Card image cap">
                                            <div class="img-btn bounceIn">
                                                <a  <?php if($rows->sl_con <= 0): ?> 
                                                    onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                                <?php else: ?>
                                                href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                                <?php endif; ?>  class="btn btn-light hvr-float " title="Thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
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
                                                onclick="return window.alert('Bạn chưa đăng nhập');"title="yêu thích"
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
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row product_content">
                                    <?php $data = $this->productNew(); ?>
                                    <?php foreach($data as $rows): ?>
                                    <div class="product-item col-lg-3 col-sm-3 col-md-3 col-sm-3">
                                        <div class="card hvr-float-shadow" style="width: 100%;">
                                            <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1 ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2 ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1 ?>';" style="transition: all 1s" alt="Card image cap">
                                            <div class="img-btn bounceIn">
                                                <a  <?php if($rows->sl_con <= 0): ?> 
                                                    onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                                <?php else: ?>
                                                href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                                <?php endif; ?>  class="btn btn-light hvr-float " title="thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
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
                                                onclick="return window.alert('Bạn chưa đăng nhập');"title="yêu thích"
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
                                </div>
                            </div>
                            <a class="carousel-control-prev control" href="#newProduct" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next control" href="#newProduct" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                        </div>
                        <hr></hr>
                    </div>
                    <div class="clearfix"></div>
                    <!-- end product_new -->
                    <p class="product_cap"><i class="fas fa-tshirt"></i>CÓ THÊ BẠN SẼ THÍCH___</p>
                    <div id="likeProduct" class="product carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <div class="row product_content">
                                    <?php $data = $this->productSame(); ?>
                                    <?php foreach($data as $rows): ?>
                                    <div class="product-item col-lg-3 col-sm-3 col-md-3 col-sm-3">
                                        <div class="card hvr-float-shadow" style="width: 100%;">
                                            <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1 ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2 ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1 ?>';" style="transition: all 1s" alt="Card image cap">
                                            <div class="img-btn bounceIn">
                                                <a  <?php if($rows->sl_con <= 0): ?> 
                                                    onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                                <?php else: ?>
                                                href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                                <?php endif; ?>  class="btn btn-light hvr-float " title="thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
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
                                                onclick="return window.alert('Bạn chưa đăng nhập');"title="yêu thích"
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
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row product_content">
                                    <?php $data = $this->productSame(); ?>
                                    <?php foreach($data as $rows): ?>
                                    <div class="product-item col-lg-3 col-sm-3 col-md-3 col-sm-3">
                                        <div class="card hvr-float-shadow" style="width: 100%;">
                                            <img class="card-img-top" id="img" src="Assets/frontend/img/product/<?php if($rows->img1=="")$rows->img1=$rows->img2; ?><?php echo $rows->img1 ?>" onmouseover="this.src='Assets/frontend/img/product/<?php if($rows->img2=="")$rows->img2=$rows->img1; ?><?php echo $rows->img2 ?>';" onmouseout="this.src='Assets/frontend/img/product/<?php echo $rows->img1 ?>';" style="transition: all 1s" alt="Card image cap">
                                            <div class="img-btn bounceIn">
                                                <a  <?php if($rows->sl_con <= 0): ?> 
                                                    onclick="return window.alert('Sản phẩm đã hết hàng');" 
                                                <?php else: ?>
                                                href="index.php?controller=Cart&action=add&id=<?php echo $rows->product_id; ?>" 
                                                <?php endif; ?>  class="btn btn-light hvr-float " title="thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i></a>
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
                                                onclick="return window.alert('Bạn chưa đăng nhập');"title="yêu thích"
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
                                </div>
                            </div>
                            <a class="carousel-control-prev control" href="#likeProduct" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next control" href="#likeProduct" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                        </div>
                        <hr></hr>
                    </div>
                    <div class="clearfix"></div>

                    <!-- end product_U_Like -->
                   
                    <div class="add-full">
                        <?php include "Views/Frontend/Ad.php"; ?>
                    </div>
                </div>
                <!-- End_Content-left -->
                <!-- Content-right -->
                <div class="col-lg-3 content-right">
                    <div class="tabs">
                        <ul class="nav nav-tabs" role="tablist" id="tab-list">
                            <li class="nav-item hvr-underline-from-right">
                                <a class="nav-link active " id="menu-hot" data-toggle="tab" href="#hot" role="tab" aria-controls="hot" aria-selected="true">Sản phẩm được mua nhiều nhất</a>
                            </li>
                            <li class="nav-item hvr-underline-from-left">
                                <a class="nav-link" id="menu-see" data-toggle="tab" href="#see" role="tab" aria-controls="see" aria-selected="false">Sản phẩm được xem nhiều nhất</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tabcontent">
                            <!--Menu-buy-->
                            <div class="tab-pane fade show active" id="hot" role="tabpanel" aria-labelledby="menu-hot">
                                <?php $data = $this->productBuy(); ?>
                                <?php foreach ($data as $rows): ?>
                                <div class="col-lg-auto col-sm-4 right-item">
                                    <a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php echo $rows->name; ?>"><img class="hvr-grow" src="Assets/frontend/img/product/<?php echo $rows->img1 ?>" alt=""></a>
                                    <div class="detail">
                                        <div class="name"><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php echo $rows->name; ?>"><?php echo $rows->name; ?></a>
                                            <span><?php echo $rows->mota; ?></span>
                                        </div>
                                        <div class="price"><?php echo $rows->price; ?>-VNĐ <span><?php if($rows->km!=0): ?><?php echo $rows->gia ?>-VNĐ <?php endif; ?></span></div>
                                        <i class="fas fa-shopping-cart"> <?php echo $rows->mua; ?></i> <i class="fas fa-thumbs-up"> <?php echo $rows->thich; ?></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <!--End-Menu-buy-->
                            <!--Menu-see-->
                            <div class="tab-pane fade" id="see" role="tabpanel" aria-labelledby="menu-see">
                                <?php $data = $this->productSee(); ?>
                                <?php foreach ($data as $rows): ?>
                                <div class="col-lg-auto col-sm-4 right-item">
                                    <a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php echo $rows->name; ?>"><img class="hvr-grow" src="Assets/frontend/img/product/<?php echo $rows->img1 ?>" alt=""></a>
                                    <div class="detail">
                                        <div class="name"><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php echo $rows->name; ?>"><?php echo $rows->name; ?></a>
                                            <span><?php echo $rows->mota; ?></span>
                                        </div>
                                        <div class="price"><?php echo $rows->price; ?>-VNĐ <span><?php if($rows->km!=0): ?><?php echo $rows->gia ?>-VNĐ <?php endif; ?></span></div>
                                        <i class="fas fa-shopping-cart"> <?php echo $rows->mua; ?></i> <i class="fas fa-thumbs-up"> <?php echo $rows->thich; ?></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <!--End-menu-see-->
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- End_Content-right -->
                <!--End_Content-product-->
                </div>
                <!--Blog-->
                <div class="container-fluid blog">
                <?php include "Views/Frontend/BlogCategory.php"; ?>
            </div>
                <!--End-Blog-->