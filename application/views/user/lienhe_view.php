<section style="margin-top: -80px; margin-bottom: -80px;" id="contact-info">
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d862.8697661170502!2d105.76853907162088!3d10.031118389514154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDAxJzUyLjAiTiAxMDXCsDQ2JzA4LjgiRQ!5e1!3m2!1svi!2s!4v1454391146321"></iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <h1><?php echo lang('how_to_contact_us') ?></h1>
                        <p class="lead"><?php echo lang('can_contact_us_anytime_and_anywhere_with_the_information_below') ?></p>
                        <?= $gioithieu["TT_LIENHE"]; ?>
                        <!-- <ul class="row">
                            <li class="col-sm-6">
                                <address>

                                    <?php 
                                        if(lang('lang') == "vi")
                                        {
                                            $dh = "Trường Đại học Cần Thơ";
                                            $khoa = "Khoa Công nghệ Thông tin & Truyền thông";
                                            $duong = "Đường 3/2";
                                            $phuong = "Xuân Khánh";
                                            $huyen = "Ninh Kiều";
                                            $tinh = "Cần Thơ";
                                        }
                                        else
                                        {
                                            $dh = "Can Tho University";
                                            $khoa = "College of Information & Communication Technology";
                                            $duong = "3/2 Street";
                                            $phuong = "Xuan Khanh";
                                            $huyen = "Ninh Kieu";
                                            $tinh = "Can Tho";
                                        }
                                    ?>

                                    <h2><?php echo $dh; ?></h2>
                                    <p>
                                        <b style="font-style: italic;"><?php echo $khoa; ?></b> <br/>

                                        <b><?php echo lang('address') ?>:</b> <?php echo $duong; ?> <br/>
                                        <b><?php echo lang('town') ?>:</b> <?php echo $phuong; ?> <br/>
                                        <b><?php echo lang('district') ?>:</b> <?php echo $huyen; ?> <br/> 
                                        <b><?php echo lang('provincial') ?>:</b> <?php echo $tinh; ?> <br/> 
                                        <b><?php echo lang('phone') ?>:</b> 84 710 3831301 <br/> 
                                        <b>Fax:</b> 84 710 3830841 <br/> 
                                        <b>Email:</b> smartmekong@gmail.com
                                    </p>
                                </address>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->