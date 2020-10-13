
<div class="tab-pane fade nd-cmt" id="cmt" role="tabpanel" aria-labelledby="tab-cmt">
                            <div class="container form-cmt">
                                <figure>
                                    <figcaption>Bình luận:</figcaption>
                                    <form class="form-inline" method="post" enctype="multipart/form-data" action="index.php?controller=ProductDetail&action=doCmt&id=<?php echo $id; ?>&p=1">
                                        <input class="form-control" type="text" required=""
                                         <?php if(isset($_SESSION["name"]) && $_SESSION["name"]!=""): ?>
                                            value="<?php echo $_SESSION['name']; ?>"
                                        <?php elseif(isset($_SESSION["email"])&& $_SESSION["email"]!=""): ?>
                                            value="<?php echo $_SESSION['email']; ?>"
                                        <?php else: ?>
                                         placeholder="Email hoặc tên"
                                        <?php endif; ?>
                                          name="ten" style="width: 50%; margin-bottom: 1rem;" >
                                        <input type="text" class="form-control" placeholder="Bình luận ..." name="noidung">
                                        <div class="form-inline" style="margin-top: 1rem; width: 100%">
                                            
                                            Ảnh 1:&nbsp;<input class="form-control-file" style="width: 20%;" type="file" name="img1" >
                                           
                                            Ảnh 2:&nbsp;<input class="form-control-file" style="width: 20%;" type="file" name="img2" >
                                            Ảnh 3:&nbsp;<input class="form-control-file"  style="width: 20%;" type="file" name="img3">
                                        </div>
                                    <input type="text" id="rating" name="rating" style="display:none">
                                    <div class="form-rate">
                                        <figcaption>Đánh giá:</figcaption>
                                        <?php $id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0; ?>
                                        <div class="rateit" id="rateit_star" data-rateit-value="" data-productid="<?php echo $id; ?>" style="font-size: 20px"></div>
                                        <span id="number_rate" class="number_rate"></span>
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#rateit_star').bind('rated', function(e) {
                                                var productID = ri.data('productid');
                                                document.getElementById("rating").value = +value; 
                                                //không cho phép đánh giá,sau khi đã đánh giá xong
                                                //ri.rateit('readonly', true);
                                            });
                                        });
                                    </script>
                                    </div>
                                    <button class="btn btn-lg btn-primary" type="submit">Gửi <i class="fas fa-paper-plane" style="font-size: 20px"></i></button>
                                    </form>
                                </figure>
                            </div>
                            <hr>
                            <div class="top-cmt">
                                <figure>
                                    <?php 
                                    $id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
                                    $conn = Connection::getInstance();
                                    $query = $conn->query("select count(cmt_id) as tongcmt from tbl_cmt where product_id=$id");
                                    //trả về tất cả các phần tử
                                    $tong = $query->fetch();
                                     ?>
                                    <figcaption>Những bình luận khác (<?php echo $tong->tongcmt; ?>)</figcaption>
                                    <?php if($tong->tongcmt==0): ?>
                                        <?php echo "<p style='text-align:center;'>Không có bình luận nào</p>"; ?>
                                    <?php else: ?>
                                    <?php 
                                        $pageSize = 5;
                                        //tinh tong so ban ghi
                                        $p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
                                        //lay tu ban ghi nao
                                        $from = $p * $pageSize;
                                        //lay cac ban ghi
                                        $data = $this->fetchAll($from,$pageSize); ?>
                                    <?php foreach($data as $rows): ?>
                                    <div class="content-cmt">
                                        <div class="img-avatar"><i class="fas fa-user-alt"></i></div>
                                        <div class="nd-cmt">
                                            <div class="name-cmt"><?php echo $rows->email; ?></div>
                                            <div class="rateit rateit-mdi" data-rateit-value="<?php echo $rows->rating; ?>" data-rateit-ispreset="true" data-rateit-readonly="true" style="font-size: 20px"><span class="number_rate"><?php echo $rows->rating; ?>/5</span>
                                            </div>
                                            <p><?php echo $rows->time; ?></p>
                                            <p>
                                                <?php echo $rows->nd_cmt; ?>
                                            </p>
                                            
                                            <p> Ảnh thực tế của khách: <?php if($rows->img1=="" && $rows->img2=="" && $rows->img3=="") echo "Không có"; ?>
                                                    <ul class="imgthuc">
                                                        <style type="text/css">
                                                            ul.imgthuc li{ display: inline; list-style: none; }
                                                            ul.imgthuc li img{
                                                                width: 5%; height: 50px;
                                                                cursor: pointer;
                                                            }
                                                            ul.imgthuc li.active img{
                                                                width: 20%;
                                                                height: 150px;
                                                                transition: all 0.5s;
                                                            }
                                                        </style>
                                                        <?php if(isset($rows->img1)&&$rows->img1!=""&&file_exists("Assets/frontend/img/product/".$rows->img1)): ?>
                                                        <li class="" ><img src="Assets/frontend/img/product/<?php echo $rows->img1; ?>" ></li><?php endif; ?>
                                                         <?php if(isset($rows->img2)&&$rows->img2!=""&&file_exists("Assets/frontend/img/product/".$rows->img2)): ?>
                                                        <li><img src="Assets/frontend/img/product/<?php echo $rows->img2; ?>"  ></li><?php endif; ?>
                                                        <?php if(isset($rows->img3)&&$rows->img3!=""&&file_exists("Assets/frontend/img/product/".$rows->img3)): ?>
                                                        <li><img src="Assets/frontend/img/product/<?php echo $rows->img3; ?>"  ></li><?php endif; ?>
                                                    </ul>
                                                </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <hr>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <?php 
                                        $pageSize = 5;
                                        $totalRecord = $this->totalRecord();//ham trong model
                                        //tinh so trang
                                        //ham ceil su dung de lay tran. VD: ceil(2.1)=3
                                        $numPage = ceil($totalRecord/$pageSize);
                                        //lay bien p truyen tren url?>
                                    <li class="page-item">
                                        <?php $frist = isset($_GET["p"])&&is_numeric($_GET["p"])?$_GET["p"] : 1;
                                         ?>
                                        <?php if(!isset($_GET["p"]))$_GET["p"]=0; ?>
                                        <a class="page-link" href="index.php?controller=ProductDetail&id=<?php echo $id; ?>&p=<?php echo $frist-1; ?>" aria-label="Previous" <?php if($_GET["p"]<=1): ?> style="display: none;" <?php else: ?> style="display: block;" <?php endif; ?> >
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item <?php if($_GET["p"]==$i) echo('active'); ?>"><a class="page-link danh-gia" href="index.php?controller=ProductDetail&id=<?php echo $id; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                                    <?php if(isset($_GET["p"])): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?controller=ProductDetail&id=<?php echo $id; ?>&p=<?php echo $frist+1; ?>" aria-label="Next" <?php if($_GET["p"]>=$numPage): ?> style="display: none;" <?php else: ?> style="display: block;"<?php endif; ?>>
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                </ul>
                            </nav>
                        </div>