<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
 <!--Main-->
    <div class="main-content container-fluid">
        <!-- Content -->
        <div class="container-fluid content ">
            <div class="container khuyen-mai">
                <?php foreach ($data as $rows): ?>
                <div class="khuyen-mai-item">
                     <div class="row">
                        <div class="col-lg-5 img-km"><a href="index.php?controller=KMDetail&id=<?php echo $rows->id_pro; ?>" title=""><img src="Assets/frontend/img/KM/<?php echo $rows->img; ?>"></a></div>
                        <div class="col-lg-7 nd-km">
                            <h3><a href="index.php?controller=KMDetail&id=<?php echo $rows->id_pro; ?>" title=""><?php echo $rows->name; ?></a></h3>
                            <p class="date"><?php echo $rows->time; ?></p>
                            <p class="content noidung"><?php echo $rows->mota; ?></p>
                        </div>
                    </div>
                    <hr style="margin:0.5rem">
                </div>
                <?php endforeach; ?>
                   <nav aria-label="...">
                             <ul class="pagination justify-content-center">
                                <?php for($i=1;$i<=$numPage;$i++): ?>
                               <li class="page-item <?php if($_GET["p"]==$i) echo('active'); ?>">
                                 <a class="page-link" href="index.php?controller=KM&p=<?php echo $i; ?>" tabindex="-1"><?php echo $i; ?></a>
                               </li>
                           <?php endfor; ?>
                             </ul>
                        </nav>
                </div>
            </div>