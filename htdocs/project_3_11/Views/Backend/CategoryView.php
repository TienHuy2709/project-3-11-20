<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
  <div class="container">
        <h1>List cateogry</h1>
    </div> 

                <div class="col-md-12">
                        <div style="margin-bottom:5px;">
                            <a href="index.php?area=Backend&controller=Category&action=add" class="btn btn-primary">Add category</a>
                        </div>
                        <ul class="pagination" style="margin-bottom:5px;">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?>">
                                        <a href="index.php?area=Backend&controller=Category&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th style="width:100px;">
                                            
                                        </th>
                                    </tr>
                                    <?php foreach($data as $rows): ?>
                                    <tr>
                                        <td>
                                            
                                                <?php echo $rows->name; ?>
                                        </td>

                                        <td style="text-align:center;">
                                            <a href="index.php?area=Backend&controller=Category&action=edit&id=<?php echo $rows->category_id; ?>">Edit</a>&nbsp;
                                            <a href="index.php?area=Backend&controller=Category&action=delete&id=<?php echo $rows->category_id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?>">
                                        <a href="index.php?area=Backend&controller=Category&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end content -->
                </div>