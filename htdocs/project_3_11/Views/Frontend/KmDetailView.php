<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
 <!--Main-->
    <div class="main-content container-fluid">
        <!-- Content -->
        <div class="container-fluid content ">
            <div class="container khuyen-mai">
                <div class="detail-km">
                    <h1><?php echo $data->name; ?> <span class="date" style="opacity: 0.8; font-size: 20px;">(<?php echo $data->time ?>)</span></h1>
                        <p style="font-size: 20px;"><b><?php echo $data->mota; ?></b></p>
                       ⏰ Thời gian hoạt động chương trình: <p><h3> Từ <b><?php echo $data->start; ?></b> đến <b><?php echo $data->end; ?></b></h3></p><br>
                      <div style="text-align: center"><img src="Assets/frontend/img/KM/<?php echo $data->img; ?>" style="width: 100%"></div>
                    <?php echo $data->content; ?>
                     
                </div>
            </div>