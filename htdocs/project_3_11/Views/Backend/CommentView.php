<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
 <div class="container">
        <h1>List Products Comment</h1>
    </div> 
                    <div class="col-md-12" style="  overflow-x: auto;">
                          <ul class="pagination" style="margin-bottom:5px;">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item  <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?> ">
                                        <a href="index.php?area=Backend&controller=Comment&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                          </ul>
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
<table class="table table-bordered" width="100%">
                <thead >
                  <tr style="text-align: center">
                   <th style="width: 100px">Ảnh Sản Phẩm</th>
                   <th >Tên Sản Phẩm</th>
                   <th>Số lượng Comment</th>
                   <th>Rating</th>
                   <!-- <th style="width: 200px;">Type</th> -->
                   <th style="width:100px;"></th>
                  </tr>
                </thead>
                <?php foreach ($data as $rows): ?>
                                    <tr>
                                        <td ><?php if($rows->img != "" && file_exists("Assets/frontend/img/product/".$rows->img)): ?><img src="Assets/frontend/img/product/<?php echo $rows->img; ?>" style="width: 100px;"><?php endif; ?></td>
                                        <td><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="" target="_blank"><?php echo $rows->name; ?></a></td>
                                        <td style="text-align: center;"><?php echo $rows->socmt; ?></td>
                                        <td style="text-align: center;"><?php echo $rows->rating; ?></td>
                                        <td style="text-align: center;"><a href="index.php?area=Backend&controller=Comment&action=delete&id=<?php echo $rows->product_id; ?>" onclick="return window.confirm('Bạn có chắc chán muốn xóa')"  title="">Delete</a></td>
                                       <!--  <td>
                                            <?php 
                                            //tu day co the goi thang ham trong model
                                            $type_id //= $this->getProductType1($rows->type_id);
                                            //echo isset($type_id->name)? $type_id->name:"";
                                             ?>
                                        </td> -->
                                        
                                    </tr>
                                <?php endforeach; ?>
                <tfoot>
                 <tr style="text-align: center">
                     <th style="width: 100px">Ảnh Sản Phẩm</th>
                   <th>Tên Sản Phẩm</th>
                   <th>Số lượng Comment</th>
                   <th>Rating</th>
                   <th style="width:100px;"></th>
                  </tr>
                </tbody>
              </table>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item  <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?> ">
                                        <a href="index.php?area=Backend&controller=Comment&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>