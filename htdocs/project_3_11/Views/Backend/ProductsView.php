<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
 <div class="container">
        <h1>List Products</h1>
    </div> 
                    <div class="col-md-12" style="  overflow-x: auto;">
                        <div style="margin-bottom:5px;">
                            <a href="index.php?area=Backend&controller=Products&action=add"  class="btn btn-primary">Add Products</a>
                        </div>
                          <ul class="pagination" style="margin-bottom:5px;">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item  <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?> ">
                                        <a href="index.php?area=Backend&controller=Products&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                          </ul>
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
<table class="table table-bordered" width="100%">
                <thead >
                  <tr style="text-align: center">
                   <th>Ảnh 1</th>
                   <th>Ảnh 2</th>
                   <th style="width: 100px">Tên</th>
                   <th>Loại sản phẩm</th>
                   <th>Giá</th>
                   <!-- <th style="width: 200px;">Type</th> -->
                   <th>Hot</th>
                   <th>New</th>
                   <th>Khuyễn mãi</th>
                   <th>Thích</th>
                   <th>Số lượng còn</th>
                   <th>Số lượng đã bán</th>
                   <th style="width:100px;"></th>
                  </tr>
                </thead>
                <?php foreach ($data as $rows): ?>
                                    <tr>
                                        <td><?php if($rows->img1 != "" && file_exists("Assets/frontend/img/product/".$rows->img1)): ?><img src="Assets/frontend/img/product/<?php echo $rows->img1; ?>" style="width: 100px;"><?php endif; ?></td>
                                        <td><?php if($rows->img2 != "" && file_exists("Assets/frontend/img/product/".$rows->img2)): ?><img src="Assets/frontend/img/product/<?php echo $rows->img2; ?>" style="width: 100px;"><?php endif; ?></td>
                                        <td><a href="index.php?controller=ProductDetail&id=<?php echo $rows->product_id; ?>" title="" target="_blank"><?php echo $rows->name; ?></a></td>
                                        <td>
                                            <?php 
                                            //tu day co the goi thang ham trong model
                                            $category = $this->getCategory($rows->category_id);
                                            echo isset($category->name)? $category->name:"";
                                             ?>
                                        </td>
                                        <td style="text-align: center;">
                                          <?php echo number_format($rows->gia); ?>
                                          </td>
                                       <!--  <td>
                                            <?php 
                                            //tu day co the goi thang ham trong model
                                            $type_id //= $this->getProductType1($rows->type_id);
                                            //echo isset($type_id->name)? $type_id->name:"";
                                             ?>
                                        </td> -->
                                        <td style="text-align: center;">
                                            <?php if($rows->hot==1): ?>
                                            <span class="glyphicon glyphicon-check"><?php echo "x"; ?></span>
                                        <?php endif; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if($rows->new==1): ?>
                                            <span class="glyphicon glyphicon-check"><?php echo "x"; ?></span>
                                        <?php endif; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if($rows->km!=0): ?>
                                            <span class="glyphicon glyphicon-check"><?php echo $rows->km; ?>%</span>
                                        <?php endif; ?>
                                        </td>
                                        <td style="text-align: center;"><?php echo $rows->thich; ?></td>
                                        <td style="text-align: center;"><?php echo $rows->sl_con; ?></td>
                                        <td style="text-align: center;"><?php echo $rows->mua; ?></td>
                                        <td style="text-align:center;">
                                            
                                            <a href="index.php?area=Backend&controller=Products&action=edit&id=<?php echo $rows->product_id; ?>">Edit</a>&nbsp;
                                            <a href="index.php?area=Backend&controller=Products&action=delete&id=<?php echo $rows->product_id; ?>"  onclick="return window.confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                <tfoot>
                 <tr style="text-align: center">
                   <th >Ảnh 1</th>
                   <th>Ảnh 2</th>
                   <th>Tên</th>
                   <th>Loại sản phẩm</th>
                   <th>Giá</th>
                   <!-- <th style="width: 200px;">Type</th> -->
                   <th>Hot</th>
                   <th>New</th>
                   <th>Khuyễn mãi</th>
                   <th>Thích</th>
                   <th>Số lượng còn</th>
                   <th>Số lượng đã bán</th>
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
                                        <a href="index.php?area=Backend&controller=Products&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>