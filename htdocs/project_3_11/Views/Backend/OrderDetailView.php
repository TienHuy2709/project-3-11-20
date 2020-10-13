<?php 
    //ket thua layout1.php de load vao day
    $this->fileLayout = "Views/Backend/layout1.php";
 ?>                  
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?area=Backend&controller=Cart&action=sent&id=<?php echo $id; ?>" class="btn btn-primary">Xác nhận đã giao hàng</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Chi tiết đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr style="text-align: center">
                    <th style="width: 100px">Ảnh</th>
                    <th style="width: 80%">Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="text-align: center"><img src="Assets/frontend/img/product/<?php if($rows->img1=="") $rows->img1=$rows->img2; echo $rows->img1; ?>" style="width:100px;"></td>
                    <td><?php echo $rows->name; ?></td>
                    <td style="text-align: center"><?php echo $rows->size; ?></td>
                    <th><?php echo number_format($rows->price); ?></th>
                    <th><?php echo $rows->number; ?></th>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>