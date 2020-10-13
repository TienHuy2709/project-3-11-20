<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout_Log.php";
 ?>
 <?php if(isset($_GET["kt"])!=""): ?>
    <script type="text/javascript">
        alert("Đăng nhập không thành công");
    </script>
    <?php endif; ?>
<div class="header-w3l">
                <h1>LOG IN SHOP <a href="index.php" title="mua hàng ngay">N-T-H</a></h1>
            </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 form-log">  
            <div class="">
                <h2>Login Quick</h2>
            </div>
            <form method="post" action="index.php?area=Frontend&controller=LogIn&action=doLogIn">
                <div class="pom-agile">
                    <input placeholder="E-mail" name="email" class="user" type="email" required="">
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>

                </div>
                <div class="pom-agile">
                    <input  placeholder="Password" name="password" class="pass" type="password" required="">
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>

                </div>
                <div class="sub-w3l">
                    <h6><a href="index.php?controller=CreateAccount">Đăng ký</a></h6>
                    <h6><a href="#">Forgot Password?</a></h6>
                    <div class="right-w3l">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
