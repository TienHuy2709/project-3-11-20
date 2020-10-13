<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
 <div class="container">
        <h1>Add Edit Products</h1>
                    </div>    
                    <div class="col-md-12">  
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                 <!-- thêm thuôc tính enctype="multipart/form-data" dể upload file -->
                            <form method="post" enctype="multipart/form-data" action="<?php echo $formAction; ?>">
                                <!-- rows -->
                               
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Tên sản phẩm</div>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php echo isset($record->name)? $record->name :''; ?>" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Loại sản phẩm</div>
                                    <div class="col-md-10">
                                        <select name="category_id" class="form-control" style="width: 300px;">
                                            <option value="0"></option>
                                            <?php 
                                            $conn = Connection::getInstance();
                                            $query = $conn->query("select * from tbl_category order by category_id desc");
                                            //lay tất cả kết quả trả về
                                            $category = $query->FetchAll();
                                            foreach($category as $rows): ?>
                                            <option <?php  if(isset($record->category_id)&&$record->category_id==$rows->category_id): ?> selected <?php endif; ?> value="<?php echo $rows->category_id; ?>"><?php echo $rows->name; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end rows -->
                                 <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Giá</div>
                                <div class="col-md-10">
                               <input class="btn-sm input-group-sm" type="text" <?php if(isset($record->gia)&&$record->gia!=""): ?> value=" <?php echo $record->gia; ?> "<?php endif; ?> name="gia" id="gia"> VNĐ
                                </div>
                            </div>
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Mô tả</div>
                                    <div class="col-md-10">
                                        <textarea name="description" id="description">
                                            <?php echo isset($record->mota)? $record->mota :""; ?>
                                        </textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace("description");
                                        </script>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Chi tiết</div>
                                    <div class="col-md-10">
                                        <textarea name="content" id="content">
                                            <?php echo isset($record->chitiet)? $record->chitiet :""; ?>
                                        </textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace("content");
                                        </script>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <input type="checkbox" <?php if(isset($record->hot)&&$record->hot==1): ?> checked <?php endif; ?> name="hot" id="hot"><label for="hot">Hot products</label>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2"></div>
                                <div class="col-md-10">
                                        <input type="checkbox" <?php if(isset($record->new)&&$record->new==1): ?> checked <?php endif; ?> name="new" id="new"><label for="new">New products</label>
                                    </div>
                                </div>
                                    <!-- end rows -->
                                     <!-- end rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2"></div>
                                <div class="col-md-10">
                                <label for="promotion">Khuyễn mãi&nbsp;</label><input class="btn-sm input-group-sm" type="text" <?php if(isset($record->km)&&$record->km!=""): ?> value=" <?php echo $record->km; ?>"<?php endif; ?> name="promotion" id="KM">
                                </div>
                            </div>
                                <!-- end rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Lượt thích</div>
                                <div class="col-md-10">
                               <input class="btn-sm input-group-sm" type="text" <?php if(isset($record->thich)&&$record->thich!=""): ?> value=" <?php echo $record->thich; ?> "<?php endif; ?> name="thich" id="thich">
                                </div>
                            </div>
                            <!-- end rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Số lượng sản phẩm đã bán </div>
                                <div class="col-md-10">
                                <input class="btn-sm input-group-sm" type="text" <?php if(isset($record->mua)&&$record->mua!=""): ?> value=" <?php echo $record->mua; ?> "<?php endif; ?> name="mua" id="mua">
                                </div>
                            </div>
                                <!-- end rows -->
                                <!-- end rows -->
                            <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Số lượng sản phẩm còn </div>
                                <div class="col-md-10">
                                <input class="btn-sm input-group-sm" type="text" <?php if(isset($record->sl_con)&&$record->sl_con!=""): ?> value=" <?php echo $record->sl_con; ?> "<?php endif; ?> name="sl_con" id="sl_con">
                                </div>
                            </div>
                                <!-- end rows -->
                                <!-- rows -->
                                  <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Upload image <br><span style="font-size: 10px; color: red">(tối đa: 5 ảnh)</span></div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="btn btn-sm input-group" type="file" name="img1">
                                                    <?php if(isset($record->img1)&&$record->img1!=""&&file_exists("Assets/frontend/img/product/".$record->img1)): ?>
                                                         Ảnh 1: <img src="Assets/frontend/img/product/<?php echo $record->img1; ?>" style="width: 100px;">
                                                        <?php endif; ?>
                                            </div>
                                            <div class="col-md-2"><input class="btn btn-sm input-group" type="file" name="img2" class="btn btn-sm">
                                                <?php if(isset($record->img2)&&$record->img2!=""&&file_exists("Assets/frontend/img/product/".$record->img2)): ?>
                                                Ảnh 2: <img src="Assets/frontend/img/product/<?php echo $record->img2; ?>" style="width: 100px;">
                                                <?php endif; ?>
                                            </div>

                                             <?php 
                                                $id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
                                                $data=$this->fetchImgAll($id);
                                                $conn = Connection::getInstance();
                                                    //thực hiện truy vấn
                                                $query = $conn->query("select id_detailproduct from tbl_detailproduct where product_id=$id ");
                                                    //lấy tất cả kết quả trả về
                                                $dem = $query->rowCount();
                                                $i=3; ?>
                                                <?php if($dem==3): ?>
                                                <?php foreach($data as $rows ): ?>
                                                <div class="col-md-2"><input class="btn btn-sm input-group" type="file" name="img<?php echo $i; ?>" class="btn btn-sm">
                                                <?php if(isset($rows->img)&&$rows->img!=""&&file_exists("Assets/frontend/img/product/".$rows->img)): ?>
                                                Ảnh <?php echo $i; ?>:<a id="close" href="index.php?area=backend&controller=Products&action=deleteimg&id_img=<?php echo $rows->id_detailproduct; ?>&id_product=<?php echo $rows->product_id; ?>" title="Xóa ảnh"><i class="fas fa-times"></i></a> <img src="Assets/frontend/img/product/<?php echo $rows->img; ?>" style="width: 100px;">
                                                <input type="text" name="id_img<?php echo $i; ?>" value="<?php echo $rows->id_detailproduct; ?>" style = "display: none;" >
                                                <?php $i++; ?>
                                                <?php endif; ?>
                                                </div>
                                                <?php endforeach; ?>
                                                <?php elseif($dem<3): ?>
                                                <?php foreach($data as $rows ): ?>
                                                <div class="col-md-2"><input class="btn btn-sm input-group" type="file" name="img<?php echo $i; ?>" class="btn btn-sm">
                                                <?php if(isset($rows->img)&&$rows->img!=""&&file_exists("Assets/frontend/img/product/".$rows->img)): ?>
                                                Ảnh <?php echo $i; ?>: <a id="close" href="index.php?area=backend&controller=Products&action=deleteimg&id_img=<?php echo $rows->id_detailproduct; ?>&id_product=<?php echo $rows->product_id; ?>" title="Xóa ảnh"><i class="fas fa-times"></i></a> <img src="Assets/frontend/img/product/<?php echo $rows->img; ?>" style="width: 100px;" >
                                                <input type="text" name="id_img<?php echo $i; ?>" value="<?php echo $rows->id_detailproduct; ?>" style = "display: none;" >
                                                <?php $i++; ?>
                                                <?php endif; ?>
                                                </div>
                                                <?php endforeach; ?>
                                                <div class="col-md-2"><input class="btn btn-sm input-group" type="file" name="img<?php echo $i; ?>" class="btn btn-sm">
                                                <input type="text" name="id_img<?php echo $i; ?>" value="" style = "display: none;" >
                                                </div>
                                            <?php endif; ?>
                                        </div>
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