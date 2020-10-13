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
                    <br><br>
                    <div class="col-lg-9 content-blog">
                        <div class="container">
                            <h1><?php echo $data->name; ?></h1>
                            <p class="date"><?php echo $data->date; ?></p>
                            <p><b><?php echo $data->mota; ?></b></p>
                            <div class="detail-blog">
                                <?php echo $data->noidung; ?>
                            </div>
                        </div>
                    </div>
                    <!--End_content-blog-->
                    <!--blog-hot-->
                    <?php include "Views/Frontend/Blog_Same.php"; ?>
                    <!--End_blog-hot-->
                </div>
            </div>
            <!--End_Main_blog-->
            <!--End-Blog-->