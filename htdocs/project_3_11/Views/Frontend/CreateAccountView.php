<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout_Log.php";
 ?>
<div class="header-w3l">
                <h1>ĐĂNG KÝ TÀI KHOẢN SHOP <a href="index.php" title="mua hàng ngay">N-T-H</a></h1>
            </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 form-log">  
            <div >
                <h2>Creat account</h2>
            </div>
            <form method="post" action="index.php?area=Frontend&controller=CreateAccount&action=doCreateAccount">
                <div class="pom-agile">
                    <input placeholder="Tên gọi" name="name" class="user" type="text" required="">
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input placeholder="E-mail" name="email" class="user" type="email" required="">
                    <span class="icon1"><i class="fas fa-at" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Password" name="password1" class="pass" type="password" required="">
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input  placeholder="Nhập lại Password" name="password2" class="pass" type="password" required="">
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="sub-w3l">
                    <h6><a href="index.php?controller=LogIn">Đăng nhập</a></h6>
                    <h6><a href="#">Forgot Password?</a></h6>
                    <div class="right-w3l">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>