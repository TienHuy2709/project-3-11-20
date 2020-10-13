
<?php 
    $conn = Connection::getInstance();
            //thuc thi truy van
            $query = $conn->query("select * from tbl_advertisements where loai= 1 or loai = 3 order by id_ad asc limit 4");
            //lay tat ca ket qua tra ve
            $data = $query->fetchAll();
 ?>
 <div class="row container-fluid slide-add" style="width: 100%">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10" id="slides">
            <div id="carouselExampleIndicators" class="carousel slide slides" data-ride="carousel" style="width: 100%">
                <ol class="carousel-indicators">
                    <?php $i=0; ?>
                    <?php foreach ( $data as $rows): ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php if($i==0): ?>class="active"<?php endif; ?>></li>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php $i=0; ?>
                    <?php foreach ($data as $rows): ?>
                    <div 
                    <?php if($i==0): ?>
                    class="carousel-item active"
                    <?php else: ?>
                     class="carousel-item"
                    <?php endif; ?>
                    <?php $i++; ?>
                    style="width: 100%">
                            <a href="<?php echo $rows->link; ?>" title="">
                                <img class="d-block w-100" src="Assets/frontend/img/slide/<?php echo $rows->img ?>" alt="<?php echo $rows->name ?>">
                            </a>
                        <div class="carousel-caption d-none d-md-block">
                            <h1 style=""><?php echo $rows->name ?></h1>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <?php 
    $conn = Connection::getInstance();
            //thuc thi truy van
            $query = $conn->query("select * from tbl_advertisements where loai = 2 or loai = 3 order by id_ad desc limit 2");
            //lay tat ca ket qua tra ve
            $data1 = $query->fetchAll();
 ?>
        <div class="co-lg-2 col-md-2 col-sm-2 col-xl-2" id="add">
            <div id="carouselExampleIndicators" class="carousel1 slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i=0; ?>
                    <?php foreach ($data1 as $rows1): ?>
                    <div class="carousel-item <?php if($i==0): ?>active <?php endif; ?>">
                        <div class="grid">
                            <figure class="effect-apollo">
                                <img src="Assets/frontend/img/slide/<?php echo $rows1->img; ?>" alt="img18" />
                                <figcaption>
                                    <a href="<?php echo $rows1->link; ?>"></a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>