        <div class="navbar-expand-lg">
            <div class="nav-menu collapse navbar-collapse " id="Nav_menu">
                <ul class="nav navbar-nav navbar-center text-center menu">
                    <li class="nav-item"><a class="nav-link <?php if(!isset($_GET['controller'])) echo 'active'; ?>" href="index.php" title="">Trang chủ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php if($_GET['controller']=='CategoryProduct'||$_GET['controller']=='ProductDetail'||$_GET['controller']=='Search') echo 'active'; ?>" href="index.php?controller=CategoryProduct&id=1"  title="">Sản phẩm </a>
                        <ul class="dropdown-menu">
                            <?php 
                            $conn = Connection::getInstance();
                            $query = $conn->query("select * from tbl_category order by category_id asc");
                            //trả về tất cả các phần tử
                            $category = $query->fetchAll(); ?>
                            <?php foreach ($category as $rows): ?>
                                <li><a href="index.php?controller=CategoryProduct&id=<?php echo $rows->category_id; ?>" title=""><?php echo $rows->name; ?> </a></li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if($_GET['controller']=='KM'||$_GET['controller']=='KMDetail') echo 'active'; ?>" href="index.php?controller=KM&p=1" title="">Khuyễn mãi</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($_GET['controller']=='Blog'||$_GET['controller']=='BlogDetail') echo 'active'; ?>" href="index.php?controller=Blog&news=0&p=1" title="">Blog</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($_GET['controller']=='Contact') echo 'active'; ?>" href="index.php?controller=Contact" title="">Liên hệ</a></li>
                </ul>
                <form class="form-inline nav navbar-nav navbar-right nav-form " method="post" action="index.php?controller=Search&action=SearchNameProduct">
                    <input type="search" class="form-control" placeholder="tìm kiếm" aria-label="Search" name="search">
                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    