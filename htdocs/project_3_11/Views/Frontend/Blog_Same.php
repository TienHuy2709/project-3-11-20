<?php 
            $news = isset($_GET["news"])&&is_numeric($_GET["news"])?$_GET["news"]:0;
            $conn = Connection::getInstance();
            //thuc thi truy van
            $query = $conn->query("select * from tbl_news where new_category=$news ORDER BY RAND() limit 4");
            //lay tat ca ket qua tra ve
            $data = $query->fetchAll();
 ?>
<div class="col-lg-3 blog-hot">
                        <div class="blog-hot-cap"><h3>Tin liên quan</h3></div>
                        <?php foreach($data as $rows): ?>
                        <div class="blog-hot-item">
                            <div class="row">
                                <div class="col-lg-6 col-sm-4 blog-hot-img"><a href="index.php?controller=BlogDetail&news=<?php echo $rows->new_category; ?>&id=<?php echo $rows->id_new ?>" title=""><img src="Assets/frontend/img/news/<?php echo $rows->img; ?>"></a></div>
                                <div class="col-lg-6 col-sm-8 blog-hot-name">
                                    <h5><a href="index.php?controller=BlogDetail&news=<?php echo $rows->new_category; ?>&id=<?php echo $rows->id_new ?>" title=""><?php echo $rows->name; ?></a></h5>
                                </div>
                            </div>
                        </div>
                       <?php endforeach; ?>
                    </div>