<?php 
    $conn = Connection::getInstance();
            //thuc thi truy van
            $query = $conn->query("select * from tbl_advertisements where loai = 2 or loai = 3 ORDER by RAND() limit 2");
            //lay tat ca ket qua tra ve
            $data1 = $query->fetchAll();
 ?>
 				<div class="row item">
 					<?php foreach($data1 as $rows1): ?>
                    <a href="<?php echo $rows1->link; ?>" title="" class="hvr-shadow-radial"><img src="Assets/frontend/img/slide/<?php echo $rows1->img; ?>" style="width: 100%; height: 150px" alt=""></a>
                <?php endforeach; ?>
                </div>