<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
<!--Main-->
    <div class="main-content container-fluid">
        <!-- Content -->
        <div class="container-fluid content ">
            <!--Blog-->
            <div class="container-fluid blog">
                <?php include "Views/Frontend/BlogCategory.php"; ?>
            </div>
            <hr>
            <div class="clearfix"></div>
            <!--Main_blog-->
            <div class="container main-blog">
                <div class="row">
                    <!--content-blog-->
                    <div class="col-lg-12 cap-category-blog"><h2>Tin tức thơi trang <?php if($_GET["news"]==0) echo "TRONG NƯỚC"; elseif($_GET["news"]==1) echo "trên THẾ GIỚI"; else echo "của các HÃNG NỔI TIẾNG" ?></h2></div>
                    <div class="col-lg-9 content-blog">
                        <?php foreach($data as $rows): ?>
                        <div class="blog-item hvr-glow">
                            <div class="row">
                                <div class="col-lg-5 img-blog"><a href="index.php?controller=BlogDetail&news=<?php echo $rows->new_category; ?>&id=<?php echo $rows->id_new ?>" title=""><img src="Assets/frontend/img/news/<?php echo $rows->img; ?>"></a></div>
                                <div class="col-lg-7 nd-blog">
                                    <h4><a href="index.php?controller=BlogDetail&news=<?php echo $rows->new_category; ?>&id=<?php echo $rows->id_new ?>" title=""><?php echo $rows->name; ?></a></h4>
                                    <p class="date"><?php echo $rows->date; ?></p>
                                    <p class="content"><?php echo $rows->mota; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                        <hr style="margin:0.5rem">
                        <nav aria-label="...">
                             <ul class="pagination justify-content-center">
                                <?php for($i=1;$i<=$numPage;$i++): ?>
                               <li class="page-item <?php if($_GET["p"]==$i) echo('active'); ?>">
                                 <a class="page-link" href="index.php?controller=Blog&news=1&p=<?php echo $i; ?>" tabindex="-1"><?php echo $i; ?></a>
                               </li>
                           <?php endfor; ?>
                             </ul>
                        </nav>
                    </div>
                    <!--End_content-blog-->
                    <!--blog-hot-->
                   <?php include "Views/Frontend/Blog_Same.php"; ?>
                    <!--End_blog-hot-->
                </div>
            </div>
            <!--End_Main_blog-->
            <!--End-Blog-->