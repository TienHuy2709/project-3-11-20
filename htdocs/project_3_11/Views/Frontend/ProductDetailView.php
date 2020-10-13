<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
<!--Main-->
<?php $p = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"] : ""; ?>
<?php if($p!=0): ?> 
    <script type="text/javascript">
            time = 1;
            interval = setInterval(function() {
                time--;
                if (time == 0) {
                    // stop timer
                    clearInterval(interval);
                    // click
                    document.getElementById('danh-gia').click();            
                }
            }, 1000)
    </script>
    <span onload="autoClick();"></span> 
<?php endif; ?>
    <div class="main-content container-fluid">
        <!-- Content -->
        <div class="container-fluid content">
            <div class="container-fluid add-full">
                <?php include "Views/Frontend/Ad.php"; ?>
                <hr style="width: 30%">
            </div>
            <!-- Detail-product -->
            <div class="container detail-product">
                <div class="row">
                    <div class="col-lg-12 name-category">
                        <?php 
                        $id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
                        $data=$this->fetchDetailOne($id); ?>
                        <h6><a href="index.php?controller=CategoryProduct&id=<?php echo $data->category_id; ?>" title="">
                            <?php 
                            $conn = Connection::getInstance();
                            $query = $conn->query("select tbl_category.name from tbl_category,tbl_product where tbl_category.category_id=tbl_product.category_id and product_id=$id");
                            //trả về tất cả các phần tử
                            $categoryname = $query->fetch();
                                echo $categoryname->name;
                             ?>

                        </a> > <a href="index.php?controller=ProductDetail&id=<?php echo $data->product_id; ?>" title="<?php echo $data->name; ?>"><?php echo $data->name; ?></a> </h6></div>
                    <!-- Img-product -->
                    <div class="col-lg-5 col-xs-12 img-detail">
                        <div class="col-lg-auto big-img">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails easyzoom--with-toggle">
                                <a href="Assets/frontend/img/product/<?php echo $data->img1; ?>"> <img class="big" src="Assets/frontend/img/product/<?php echo $data->img1; ?>" alt="" /></a>
                                <button class="toggle" data-active="true"><i class="fas fa-search-plus on-off"></i></button>
                            </div>

                            <ul class="thumbnails">
                                <li>
                                    <a href="Assets/frontend/img/product/<?php echo $data->img1; ?>" data-standard="Assets/frontend/img/product/<?php echo $data->img1; ?>">
                                        <img class="img-item active" src="Assets/frontend/img/product/<?php echo $data->img1; ?>" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="Assets/frontend/img/product/<?php echo $data->img2; ?>" data-standard="Assets/frontend/img/product/<?php echo $data->img2; ?>">
                                        <img class="img-item" src="Assets/frontend/img/product/<?php echo $data->img2; ?>" alt="" />
                                    </a>
                                </li>
                                <?php 
                                $id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
                                $data=$this->fetchImgAll($id); 
                                foreach($data as $rows ): ?>
                                <li>
                                    <a href="Assets/frontend/img/product/<?php echo $rows->img; ?>" data-standard="Assets/frontend/img/product/<?php echo $rows->img; ?>">
                                        <img class="img-item" src="Assets/frontend/img/product/<?php echo $rows->img; ?>" alt="" />
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- content-detail -->
                    <?php $data=$this->fetchDetailOne($id); ?>
                    <div class="col-lg-7 col-xs-12 content-detail">
                        <h1><?php echo $data->name; ?></h1>
                        <?php 
                        $conn = Connection::getInstance();
                        //thực hiện truy vấn
                        $id = $data->product_id;
                        $query = $conn->query("select COUNT(tbl_cmt.cmt_id) as 'socmt', AVG(tbl_cmt.rating) as rating from tbl_cmt,tbl_product WHERE tbl_product.product_id = tbl_cmt.product_id and tbl_cmt.product_id=$id");
                        //lấy tất cả kết quả trả về
                        $rating = $query->fetch();  ?>
                        <div class="rateit rateit-mdi" id="rate_product" data-rateit-mode="font" data-rateit-value="<?php echo round($rating->rating,1); ?>" data-rateit-ispreset="true" data-rateit-readonly="true" style="font-size: 30px"><span class="number_rate"><?php echo round($rating->rating,1); ?>/5</span></div>
                        <div class="detail-price">
                            <?php if($data->km != 0): ?>
                            <i>Giá gốc : <span style="text-decoration: line-through"><?php echo $data->gia; ?> - VNĐ</span></i> <i style="font-size: 15px; color:red;">KM:<?php echo $data->km; ?>%</i>
                            <br>
                        <?php endif; ?>
                            <i>Giá hiện tại: <span style="font-size: 25px; color: #990033;"><?php echo $data->price; ?> - VNĐ</span></i>
                        </div>
                        <div class="detail-smal-nd">
                            <p>Chi tiết: <span class="smal-nd"><?php echo $data->mota; ?></span>...<span class="go-detail" title="Chi tiết" style="cursor: pointer; font-weight: bold">Xem thêm</span></p>
                        </div>
                        <div class="chi-so">
                            <i>Số hàng đã bán: <span><?php echo $data->mua; ?></span></i><i>Đánh giá: <span class="danh-gia" id="danh-gia" style="text-decoration: underline; cursor: pointer;">
                            <?php 
                                echo $rating->socmt;
                             ?>
                             </span></i><a href="index.php?controller=ProductDetail&action=doLike&id=<?php  echo $id; ?>" title="Thích"><i class="fas fa-thumbs-up"></i></a>: <span><?php echo $data->thich; ?></span>
                        </div>
                        <form method="post" action="index.php?controller=Cart&action=add&id=<?php echo $data->product_id; ?>">
                        <div class="size">
                            Chọn size:
                            <ul class="menu-size">
                                <li class="active">S</li>
                                <li>M</li>
                                <li>L</li>
                                <li>XL</li>
                                <li>XXL</li>
                            </ul>
                            <input type="text" value="S" name="size" id="size" style="display: none;">
                            <!--<form method="post">
                                <input type="text" id="size" name="size" style="display: ">
                            </form>-->
                        </div>
                        <div class="detail-number">
                            <div class="form-inline">
                                Số lượng:
                                <input type="number" class="form-control" name="number" value="1" min="1" style="max-width: 100px; margin-right: 10px" name=""> số lượng còn: <?php echo $data->sl_con; ?>
                            </div>
                        </div>
                        <div class="selection">
                            <button class="btn btn-lg hvr-shutter-out-horizontal cart" <?php if($data->sl_con <= 0): ?> disabled <?php endif; ?> type="submit">Thêm vào giỏ hàng</button>
                            <button class="btn btn-lg hvr-shutter-out-horizontal buy" <?php if($data->sl_con <= 0): ?> disabled <?php endif; ?>  type="submit">Mua ngay</button>
                        </form>
                            <style type="text/css">
                                .bo:hover{
                                    color: white;
                                }
                                .bo i:hover{
                                     color: black;
                                }
                            </style>
                                    
                                    <a <?php if(isset($_SESSION["email"])): ?>
                                     <?php $kiemtra = $this->fetchOneheart(); ?>
                                    <?php if(isset($kiemtra->productheart_id)): ?> title="bỏ thích" style="color: #990033;" 
                                    href="index.php?controller=ProductHeart&action=Deleteproductheart&id=<?php echo $kiemtra->productheart_id; ?>"
                                    <?php else: ?>
                                         href="index.php?controller=ProductHeart&action=Addproductheart&iduser=<?php echo $_SESSION['id_user']; ?>&idproduct=<?php echo $rows->product_id; ?>"
                                            title="yêu thích"
                                            <?php endif; ?>  
                                 <?php else: ?>
                                    onclick="return window.alert('Bạn chưa đăng nhập');" title="yêu thích"
                                 <?php endif; ?>                            
                                  class="btn btn-light hvr-float"
                                   ><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <!--end-content-detail -->
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- End-Detail-product -->
            <!-- detail-cmt -->
            <div class="container cmt-detail">
                <div class="col-lg-auto tabs">
                    <ul class="nav nav-tabs" role="tablist" id="tab-cmt_detail">
                        <li class="nav-item hvr-underline-from-right">
                            <a class="nav-link active tab-detail" id="tab-detail" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true"><h4>Chi tiết sản phẩm</h4></a>
                        </li>
                        <li class="nav-item hvr-underline-from-left">
                            <a class="nav-link tab-cmt" id="tab-cmt" data-toggle="tab" href="#cmt" role="tab" aria-controls="cmt" aria-selected="true"><h4>Đánh giá/CMT</h4></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabdetail">
                        <!--Detail-->
                        <div class="tab-pane fade show nd-detail active" id="detail" role="tabpanel" aria-labelledby="tab-detail">
                            <table>
                                <tr>
                                    <td class="item">Danh mục</td>
                                    <td><a href="index.html" title="Trang chủ">NTH</a>/<a href="danh-muc.html" title="index.php?controller=CategoryProduct&id=<?php echo $data->category_id; ?>"><?php echo $categoryname->name; ?></a></td>
                                </tr>
                                <tr>
                                    <td class="item">Thương hiệu</td>
                                    <td>Nike</td>
                                </tr>
                                <tr>
                                    <td class="item">Chất liệu</td>
                                    <td>Vải trơn</td>
                                </tr>
                                <tr>
                                    <td class="item">Dáng áo</td>
                                    <td>Dáng vừa</td>
                                </tr>
                                <tr>
                                    <td class="item">Cổ áo</td>
                                    <td>Cổ tàu</td>
                                </tr>
                                <tr>
                                    <td class="item">Túi áo</td>
                                    <td>không</td>
                                </tr>
                                <td class="item">Nơi gửi</td>
                                <td>MK-HĐ-HN</td>
                                </tr>
                            </table>
                            <div class="mieu-ta">
                                <h4>Miêu tả sản phẩm</h4>
                                <?php echo $data->chitiet; ?>

                            </div>
                        </div>
                        <!--End-Detail-->
                        <!--CMT-->
                        <?php include "Views/Frontend/ProductCmtView.php"; ?>
                        <!--End-CMT-->
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- End-detail-cmt -->
            <!--SP-Tương-tự-->
            <div class="container tuong-tu">
                <p class="product_cap">Sản phẩm liên quan khác :</p>
                <div id="tuong_tu_product" class="product carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="product_content row" style="height: 300px">
                                <?php  $data = $this->productSame(); ?>
                                    <?php  foreach($data as $rows): ?>
                                <div class="col-lg-2 col-sm-3 product-item">
                                    <div class="card hvr-float-shadow" style="width: 100%; height: 100%">
                                        <a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php  echo $rows->name; ?>"><img class="card-img-top" src="Assets/frontend/img/product/<?php  echo $rows->img1; ?>" alt="<?php  echo $rows->img1; ?>" style="width: 100%; height: 200px"></a>
                                        <div class="card-body" style="width: 100%;height: 100px">
                                            <h6 class="card-title"><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php  echo $rows->name; ?>" id="name"><?php  echo $rows->name; ?></a></h6>
                                            <p class="card-text" style="font-size: 14px"><?php  echo $rows->price; ?>-VNĐ <?php  if($rows->km!=""): ?><span style="text-decoration: line-through; font-size: 12px;"><?php  echo $rows->gia; ?>-VNĐ</span><?php  endif; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php  endforeach; ?>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="product_content row" style="height: 300px">
                                  <?php  $data = $this->productSame(); ?>
                                    <?php  foreach($data as $rows): ?>
                                <div class="col-lg-2 col-sm-3 product-item">
                                    <div class="card hvr-float-shadow" style="width: 100%; height: 100%">
                                        <a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php  echo $rows->name; ?>"><img class="card-img-top" src="Assets/frontend/img/product/<?php  echo $rows->img1; ?>" alt="<?php  echo $rows->img1; ?>" style="width: 100%; height: 200px"></a>
                                        <div class="card-body" style="width: 100%;height: 100px">
                                            <h6 class="card-title"><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="<?php  echo $rows->name; ?>" id="name"><?php  echo $rows->name; ?></a></h6>
                                            <p class="card-text" style="font-size: 14px"><?php  echo $rows->price; ?>-VNĐ <?php  if($rows->km!="0"): ?><span style="text-decoration: line-through; font-size: 12px;"><?php  echo $rows->gia; ?>-VNĐ</span><?php  endif; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php  endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev control" href="#tuong_tu_product" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control" href="#tuong_tu_product" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                </div>
            </div>