<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
  <div class="container">
        <h1>Add Edit ProductType</h1>
                    </div>  
                    <div class="col-md-12">  
                        <div class="panel panel-primary">
                            <div class="container panel-heading">
                                <h1></h1>
                            </div>  
                            <div class="panel-body">
                            <form method="post" action="<?php echo $formAction; ?>">
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Name</div>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Parent</div>
                                    <div class="col-md-10">
                                        <select name="category_id" class="form-control" style="width: 300px;">
                                              <option value="0"></option>
                                            <?php 
                                            $conn = Connection::getInstance();
                                            $query = $conn->query("select * from tbl_category order by id desc");
                                            //lay tất cả kết quả trả về
                                            $category = $query->FetchAll();
                                            foreach($category as $rows): ?>
                                            <option <?php  if(isset($record->category_id)&&$record->category_id==$rows->id): ?> select <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <input type="submit" value="Process" class="btn btn-primary">
                                    </div>
                                </div>
                                <!-- end rows -->
                            </form>
                            </div>
                        </div>
                    </div>