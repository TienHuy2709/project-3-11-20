<?php 
    //dat duong dan cho bien $fileLayout de load template vao day
    $this->fileLayout = "Views/Frontend/Layout.php";
 ?>
<!--Main-->
    <div class="main-content container-fluid">
        <!-- Content -->
        <div class="container-fluid content ">
            <div class="row contact">
                <!--Thong tin tk-->
                <div class="col-lg-7 hom-thu">
                    <h3>Quản lý tài khoản</h3>
                    <div class="container form-hom-thu">
                        <div class="row">
                            <form method="post" action="<?php echo $formAction; ?>" class="container-fluid">
                            <div class="form-inline" >
                                <input type="text" name="name" id="" class="form-control" placeholder="Tên" value="<?php echo isset($record->name)?$record->name:''; ?>" 
                                    aria-describedby="helpId" style="width: 49%; margin-bottom: 1rem; margin-right: 2%">
                                <input type="date" name="ngaysinh" id="" value="<?php echo isset($record->ngaysinh)?$record->ngaysinh:''; ?>" class="form-control" placeholder="Ngày sinh"
                                    aria-describedby="helpId" style="width: 49%; margin-bottom: 1rem;">
                                <input type="email" name="email" id="" class="form-control" placeholder="Email" <?php if(isset($record->email)): ?> disabled <?php endif; ?> value="<?php echo isset($record->email)?$record->email:''; ?>"
                                    aria-describedby="helpId" style="width: 49%; margin-bottom: 1rem;margin-right: 2%">
                                <input type="text" name="sdt" id="" class="form-control" placeholder="Số điện thoại" value="<?php echo isset($record->sdt)?$record->sdt:''; ?>" 
                                    aria-describedby="helpId" style="width: 49%; margin-bottom: 1rem;">
                                <input type="text" name="diachi" id="" class="form-control" placeholder="Địa chỉ" value="<?php echo isset($record->diachi)?$record->diachi:''; ?>" 
                                    aria-describedby="helpId" style="width: 100%; margin-bottom: 1rem">
                                 <input type="password" name="password1" id="" class="form-control" placeholder="Mật khẩu - Không thay đổi mật khẩu thì không nhập vào ô này"
                                    aria-describedby="helpId" style="width: 100%; margin-bottom: 1rem;">
                                <input type="password" name="password2" id="" class="form-control" placeholder="Nhập lại mật khẩu - Không thay đổi mật khẩu thì không nhập vào ô này"
                                    aria-describedby="helpId" style="width: 100%; margin-bottom: 1rem">
                            </div>
                            <button type="submit" class="btn btn-submit hvr-icon-wobble-vertical" onclick="return window.confirm('Bạn có chắc chắn muốn thay đổi');" style="">Lưu&nbsp;&nbsp;&nbsp;<i class="fas fa-save hvr-icon"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End_Hòm thư-->
                <!--Liên hệ-->
                <div class="col-lg-5 lien-he">
                    <h3>THÔNG TIN LIÊN HỆ</h3>
                    <div class="contact-group">
                        <h5>Địa chỉ</h5>
                        <p>
                            <span>Cở sở 1:</span>
                            <a href="#">Bắc Từ Liêm - Hà Nội</a>
                        </p>
                        <p>
                            <span>Cở sở 2:</span>
                            <a href="#">Đại học Công Nghiệp Hà Nội</a>
                        </p>
                    </div>
                    <div class="contact-group">
                        <h5>SỐ ĐIỆN THOẠI</h5>
                        <p>
                            <a href="#">0981519920</a>
                        </p>
                        <p>
                            <a href="#">123456789</a>
                        </p>
                    </div>
                     <div class="contact-group">
                        <h5 class="mb-3">MẠNG XÃ HỘI</h5>
                        <div class="social mb-3">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?" target="_blank"class="hvr-float">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33"
                                            viewBox="0 0 32 33" fill="none">
                                            <path
                                                d="M31.5 2.50781V30.4922C31.5 30.9609 31.3359 31.3594 31.0078 31.6875C30.6797 32.0625 30.2578 32.25 29.7422 32.25H21.7266V20.0156H25.8047L26.4375 15.3047H21.7266V12.2812C21.7266 11.4844 21.8672 10.9219 22.1484 10.5938C22.5234 10.1719 23.1562 9.96094 24.0469 9.96094H26.5781V5.67188C25.5938 5.57813 24.375 5.53125 22.9219 5.53125C21.0938 5.53125 19.6172 6.07031 18.4922 7.14844C17.3672 8.22656 16.8047 9.77344 16.8047 11.7891V15.3047H12.7266V20.0156H16.8047V32.25H1.75781C1.24219 32.25 0.820312 32.0625 0.492188 31.6875C0.164063 31.3594 0 30.9609 0 30.4922V2.50781C0 1.99219 0.164063 1.57031 0.492188 1.24219C0.820312 0.914062 1.24219 0.75 1.75781 0.75H29.7422C30.2109 0.75 30.6094 0.914062 30.9375 1.24219C31.3125 1.57031 31.5 1.99219 31.5 2.50781Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/?hl=vi" target="_blank" class="hvr-float">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33"
                                            viewBox="0 0 32 33" fill="none">
                                            <path
                                                d="M15.75 8.41406C14.2969 8.41406 12.9375 8.78906 11.6719 9.53906C10.4531 10.2422 9.46875 11.2266 8.71875 12.4922C8.01562 13.7109 7.66406 15.0469 7.66406 16.5C7.66406 17.9531 8.01562 19.3125 8.71875 20.5781C9.46875 21.7969 10.4531 22.7812 11.6719 23.5312C12.9375 24.2344 14.2969 24.5859 15.75 24.5859C17.2031 24.5859 18.5391 24.2344 19.7578 23.5312C21.0234 22.7812 22.0078 21.7969 22.7109 20.5781C23.4609 19.3125 23.8359 17.9531 23.8359 16.5C23.8359 15.0469 23.4609 13.7109 22.7109 12.4922C22.0078 11.2266 21.0234 10.2422 19.7578 9.53906C18.5391 8.78906 17.2031 8.41406 15.75 8.41406ZM15.75 21.7734C14.2969 21.7734 13.0547 21.2578 12.0234 20.2266C10.9922 19.1953 10.4766 17.9531 10.4766 16.5C10.4766 15.0469 10.9922 13.8047 12.0234 12.7734C13.0547 11.7422 14.2969 11.2266 15.75 11.2266C17.2031 11.2266 18.4453 11.7422 19.4766 12.7734C20.5078 13.8047 21.0234 15.0469 21.0234 16.5C21.0234 17.9531 20.5078 19.1953 19.4766 20.2266C18.4453 21.2578 17.2031 21.7734 15.75 21.7734ZM26.0859 8.0625C26.0391 8.57812 25.8281 9.02344 25.4531 9.39844C25.125 9.77344 24.7031 9.96094 24.1875 9.96094C23.6719 9.96094 23.2266 9.77344 22.8516 9.39844C22.4766 9.02344 22.2891 8.57812 22.2891 8.0625C22.2891 7.54688 22.4766 7.10156 22.8516 6.72656C23.2266 6.35156 23.6719 6.16406 24.1875 6.16406C24.7031 6.16406 25.1484 6.35156 25.5234 6.72656C25.8984 7.10156 26.0859 7.54688 26.0859 8.0625ZM31.4297 9.96094C31.3359 8.60156 31.125 7.42969 30.7969 6.44531C30.375 5.27344 29.7188 4.26562 28.8281 3.42188C27.9844 2.53125 26.9766 1.875 25.8047 1.45312C24.8203 1.125 23.6484 0.9375 22.2891 0.890625C20.9766 0.796875 18.7969 0.75 15.75 0.75C12.7031 0.75 10.5 0.796875 9.14062 0.890625C7.82812 0.9375 6.67969 1.125 5.69531 1.45312C4.52344 1.875 3.49219 2.53125 2.60156 3.42188C1.75781 4.26562 1.125 5.27344 0.703125 6.44531C0.375 7.42969 0.164062 8.60156 0.0703125 9.96094C0.0234375 11.2734 0 13.4531 0 16.5C0 19.5469 0.0234375 21.75 0.0703125 23.1094C0.164062 24.4219 0.375 25.5703 0.703125 26.5547C1.125 27.7266 1.75781 28.7578 2.60156 29.6484C3.49219 30.4922 4.52344 31.1016 5.69531 31.4766C6.67969 31.8516 7.82812 32.0625 9.14062 32.1094C10.5 32.2031 12.7031 32.25 15.75 32.25C18.7969 32.25 20.9766 32.2031 22.2891 32.1094C23.6484 32.0625 24.8203 31.875 25.8047 31.5469C26.9766 31.125 27.9844 30.4922 28.8281 29.6484C29.7188 28.7578 30.375 27.7266 30.7969 26.5547C31.125 25.5703 31.3125 24.4219 31.3594 23.1094C31.4531 21.75 31.5 19.5469 31.5 16.5C31.5 13.4531 31.4766 11.2734 31.4297 9.96094ZM28.0547 25.7812C27.4922 27.1875 26.4844 28.1953 25.0312 28.8047C24.2812 29.0859 23.0156 29.2734 21.2344 29.3672C20.25 29.4141 18.7969 29.4375 16.875 29.4375H14.625C12.75 29.4375 11.2969 29.4141 10.2656 29.3672C8.53125 29.2734 7.26562 29.0859 6.46875 28.8047C5.0625 28.2422 4.05469 27.2344 3.44531 25.7812C3.16406 24.9844 2.97656 23.7188 2.88281 21.9844C2.83594 20.9531 2.8125 19.5 2.8125 17.625V15.375C2.8125 13.5 2.83594 12.0469 2.88281 11.0156C2.97656 9.23438 3.16406 7.96875 3.44531 7.21875C4.00781 5.76562 5.01562 4.75781 6.46875 4.19531C7.26562 3.91406 8.53125 3.72656 10.2656 3.63281C11.2969 3.58594 12.75 3.5625 14.625 3.5625H16.875C18.75 3.5625 20.2031 3.58594 21.2344 3.63281C23.0156 3.72656 24.2812 3.91406 25.0312 4.19531C26.4844 4.75781 27.4922 5.76562 28.0547 7.21875C28.3359 7.96875 28.5234 9.23438 28.6172 11.0156C28.6641 12 28.6875 13.4531 28.6875 15.375V17.625C28.6875 19.5 28.6641 20.9531 28.6172 21.9844C28.5234 23.7188 28.3359 24.9844 28.0547 25.7812Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.472214803564!2d105.73227131447659!3d21.0537938859848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455af9072ccf9%3A0xadb5f7555c46683d!2zxJDhuqFpIEjhu41jIEPDtG5nIE5naGnhu4dwIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1583254336322!5m2!1svi!2s" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <!--End_Liên hệ-->
            </div>