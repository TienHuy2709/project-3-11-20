<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?> 
<div class="container">
        <h1>Add Edit User</h1>
    </div>  
                    <div class="col-md-12">  
                        <div class="panel panel-primary">
  
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
                                    <div class="col-md-2">Email</div>
                                    <div class="col-md-10">
                                        <input type="email" <?php if(isset($record->email)): ?> disabled <?php endif; ?> value="<?php echo isset($record->email)?$record->email:''; ?>" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Số điện thoại</div>
                                    <div class="col-md-10">
                                        <input type="text" <?php if(isset($record->sdt)): ?>  <?php endif; ?> value="<?php echo isset($record->sdt)?$record->sdt:''; ?>" name="sdt" class="form-control" >
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Ngày sinh</div>
                                    <div class="col-md-10">
                                        <input type="date" <?php if(isset($record->ngaysinh)): ?> value="<?php echo $record->ngaysinh; ?>"<?php endif; ?> name="ngaysinh" class="form-control">
                                    </div>
                                </div>
                                <!-- end rows -->
                                                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Địa chỉ</div>
                                    <div class="col-md-10">
                                        <input type="text" <?php if(isset($record->diachi)): ?> value="<?php echo $record->diachi; ?>"<?php endif; ?> name="diachi" class="form-control">
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Chức vụ</div>
                                    <div class="col-md-10">
                                        <select name="chucdanh" class="form-control" style="width: 300px;">
                                             <?php  if(isset($record->chucdanh)&&$record->chucdanh==1): ?>
                                            <option selected value="<?php echo $record->chucdanh; ?>"><?php echo "Người quản trị"; ?></option>
                                            <option  value=""><?php echo "Người dùng"; ?></option>
                                             <?php else: ?>
                                            <option selected  value="<?php echo $record->chucdanh; ?>"><?php echo "Người dùng" ?></option>
                                            <option value="1"><?php echo "Người quản trị" ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end rows -->
                                <!-- rows -->
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-md-2">Password</div>
                                    <div class="col-md-10">
                                        <input type="password" <?php if(isset($record->email)): ?> placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required <?php endif; ?> name="password" class="form-control">
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