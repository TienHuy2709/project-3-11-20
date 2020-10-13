<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
 <div class="container">
        <h1>List Product_type</h1>
                    </div>    
                <div class="col-md-12">
                        <div style="margin-bottom:5px;">
                            <a href="index.php?area=Backend&controller=ProductType&action=add" class="btn btn-primary">Add Product_type</a>
                        </div>
                        <div class="panel panel-primary">
                           
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th style="width:100px;">
                                            
                                        </th>
                                    </tr>
                                    <?php foreach($data as $rows): ?>
                                    <tr>
                                        <td>
                                            
                                                <?php echo $rows->name; ?>
                                        </td>
                                               
                                        <td>
                                            
                                            <?php 
                                            //tu day co the goi thang ham trong model
                                            $category = $this->getCategory($rows->category_id);
                                            echo isset($category->name)? $category->name:"";
                                             ?>

                                        </td>
                                        <td style="text-align:center;">
                                            <a href="index.php?area=Backend&controller=ProductType&action=edit&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                                            <a href="index.php?area=Backend&controller=ProductType&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                                <style type="text/css">
                                    .pagination{padding:0px; margin:0px;}
                                </style>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item">
                                        <a href="index.php?area=Backend&controller=ProductType&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end content -->
                </div>