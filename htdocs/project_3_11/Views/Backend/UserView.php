<?php 
    //kế thừa layout1.php để load vào đây
    $this->fileLayout="Views/Backend/layout1.php";
 ?>  
<div class="container">
    <h1>List Users</h1>
  </div>                
                    <div class="col-md-12">
                        <div style="margin-bottom:5px;">
                            <a href="index.php?area=Backend&controller=User&action=add" class="btn btn-primary">Add user</a>
                        </div>
                                <ul class="pagination" style="margin-bottom:5px;">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?>">
                                        <a href="index.php?area=Backend&controller=User&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>
                        <div class="panel panel-primary">
                            
                            <div class="panel-body">
<table class="table table-bordered" width="100%">
                <thead>
                  <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Chức Danh<h6 style="font-size: 10px;color: red">(1:admin/0:user)</h6></th>
                                        <th style="width:100px;"></th>
                  </tr>
                </thead>
                <?php foreach($data as $rows): ?>
                                    <tr>
                                        <td><?php echo $rows->name; ?></td>
                                        <td><?php echo $rows->email; ?></td>
                                        <td><?php echo ($rows->pass); ?></td>
                                        <td><?php echo $rows->sdt; ?></td>
                                        <td><?php echo $rows->ngaysinh; ?></td>
                                        <td><?php echo $rows->diachi; ?></td>
                                        <td><?php echo $rows->chucdanh; ?></td>
                                        <td style="text-align:center;">
                                            <a href="index.php?area=Backend&controller=User&action=edit&id=<?php echo$rows->id_user; ?>">Edit</a>&nbsp;
                                            <a href="index.php?area=Backend&controller=User&action=delete&id=<?php echo$rows->id_user; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                                        </td>
                                    <?php endforeach; ?>
                                    </tr>
                <tfoot>
                  <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Chức danh</th>
                                        <th style="width:100px;"></th>
                  </tr>
                  </tr>
                </tbody>
              </table>
                                <ul class="pagination" >
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link">Trang</a>
                                    </li>
                                    <?php for($i=1;$i<=$numPage;$i++): ?>
                                    <li class="page-item <?php if(isset($_GET['p'])&&$_GET['p']==$i) echo 'active' ?>">
                                        <a href="index.php?area=Backend&controller=User&p=<?php echo $i;?>" class="page-link"> <?php echo $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                </ul>