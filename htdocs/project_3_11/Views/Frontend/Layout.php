<!DOCTYPE html>
<html>

<head>
    <title>N-T-H</title>
    <meta charset="utf-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
    <link rel="stylesheet" type="text/css" href="Assets/frontend/css/bootstrap-4.4.1/css/bootstrap.min.css">
    <link href="Assets/frontend/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bellota|Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Assets/frontend/css/hover/hover.css">
    <link rel="stylesheet" type="text/css" href="Assets/frontend/css/set2.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.rateit/1.1.3/rateit.css">
    <link rel="stylesheet" type="text/css" href="Assets/frontend/css/styles.css">
    <link href="Assets/frontend/css/animate.css" rel="stylesheet">
    
</head>

<body>
     <!-- Navigation -->
    <div class="container-fluid header">
        
        <!-- Header -->
        <?php include "Views/Frontend/HeaderView.php"; ?>
        <!-- end_Header -->
         <!--Nav_Menu--->
        <?php include "Views/Frontend/MenuView.php"; ?>
        <!--End_Nav_Menu-->
    <!-- End_Navigation -->
    <div class="back-to-top hvr-bob"><i class="fas fa-arrow-up"></i></div>
        <!--Content-->
               <?php echo $this->view; ?>
        <!--End_Content-->
            <div class="container-fluid bank">
                <div class="row bank-item">
                    <img class="col-lg-2 col-md-2" src="Assets/frontend/img/vcbank.jpg" alt="">
                    <img class="col-lg-2 col-md-2" src="Assets/frontend/img/agbank.jpg" alt="">
                    <img class="col-lg-2 col-md-2" src="Assets/frontend/img/vtbank.png" alt="">
                    <img class="col-lg-2 col-md-2" src="Assets/frontend/img/lvBank.jpg" alt="">
                    <img class="col-lg-2 col-md-2" src="Assets/frontend/img/tcbank.png" alt="">
                    <img class="col-lg-2 col-md-2" src="Assets/frontend/img/mbbank.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- End_content -->
        <div class="clearfix"></div>
    </div>
    <!--End_Main-->
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3 text-center">

                    <!-- Content -->
                    <img src="Assets/frontend/img/avatar.jpg" height="100" style="margin-bottom: 5px;">
                    <h5 class="text-uppercase">NGUYỄN TIẾN HUY</h5>
                    <p>Sinh viên ĐHCN-HN. CS1 - K12 - CNTT- KTPM3.
                        <br> Bài tập luận án tốt nghiệp.
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase" style="color:rgb(0, 0, 0,1); font-size: 25px;">Đại Học Công Nghiệp Hà Nội</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Cơ Sở 1: Bắc Từ Liêm</a>
                        </li>
                        <li>
                            <a href="#!">Chăm sóc khách hàng</a>
                        </li>
                        <li>
                            <a href="#!">Thắc mắc vấn đề</a>
                        </li>
                        <li>
                            <a href="#!">Liên hệ đặt hàng</a>
                        </li>
                        <li>
                            <form class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Your email" aria-label="Your email" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-outline-white my-0" type="button" style="color:rgb(0, 0, 0,1);">Sign up</button>
                                </div>
                            </form>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase" style="color:rgb(0, 0, 0,1); font-size: 25px;">NTH-2017605568</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100011359460359">FB: Tiến Huy</a>
                        </li>
                        <li>
                            <a href="#!">Zalo : 0981519920</a>
                        </li>
                        <li>
                            <a href="#!">IG: fbkhongco</a>
                        </li>
                        <li>
                            <a href="#!">Sđt : 0981519920</a>
                        </li>
                        <li>
                            <form class="form-inline">
                                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- End_Grid column -->
            </div>
            <!-- End_Grid row -->
        </div>
        <!-- End_Footer Links -->
        <div class="container">
            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-fb mx-1 hvr-float">
                        <i class="fab fa-facebook-f pr-1"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-tw mx-1 hvr-float">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-gplus mx-1 hvr-float">
                        <i class="fab fa-google-plus-g"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-li mx-1 hvr-float">
                        <i class="fab fa-linkedin-in"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-dribbble mx-1 hvr-float">
                        <i class="fab fa-dribbble"> </i>
                    </a>
                </li>
            </ul>
            <!-- Social buttons -->

        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://www.facebook.com/profile.php?id=100011359460359">Nguyễn Tiến Huy</a>
        </div>
        <!-- End_Copyright -->

    </footer>
    <!-- End_Footer -->
    <script src="Assets/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="Assets/frontend/css/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="Assets/frontend/js/easyzoom.js"></script>
    <script>
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.data("active", false);
                $('.on-off').addClass('tat');
                api2.teardown();
            } else {
                $this.data("active", true);
                $('.on-off').removeClass('tat');
                api2._init();
            }
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#rateit_star').rateit({
                min: 0,
                max: 5,
                step: 0.5
            });
            $('#rateit_star').bind('rated', function(e) {
                var ri = $(this);
                var value = ri.rateit('value');
                var riting = "";
                if (value == 0) {
                    riting = "rất xấu"
                } else if (value > 0 && value <= 1.5) {
                    riting = "xấu"
                } else if (value > 1.5 && value <= 3) {
                    riting = "bình thường"
                } else if (value > 3 && value <= 4.5) {
                    riting = "đẹp"
                } else {
                    riting = "rất đẹp"
                }
                var productID = ri.data('productid');
                document.getElementById("number_rate").innerHTML = +value + "/5-" + riting;
                document.getElementById("rating").value = +value; 
                //không cho phép đánh giá,sau khi đã đánh giá xong
                //ri.rateit('readonly', true);
            });
        });
    </script>
            <script>
        $(document).ready(function() {
         
        $('#example').dataTable({}); // dòng này để nhúng bảng biểu thành dạng bảng được phân trang
             
        } ); 
        </script>  
    <script src="Assets/frontend/js/script.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="Assets/frontend/js/img.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.rateit/1.1.3/jquery.rateit.js" type="text/javascript" charset="utf-8" async defer></script>
</body>

</html>