<?php $page = app('\App\Page'); ?>

<section class="about__slider">
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-8 col-xs-12">
            <div class="about__slider--data">
                <div class="owl-carousel owl-carousel-2 owl-theme">
                    <div class="item">
                        <div class="about__slider--data--item">
                            <div class="slider--data_logo">
                                <img src="img/logo_about.png" alt="">
                            </div>
                            <div class="slider--data--tit">
                                <h2>أوقاف الفاضل</h2>
                            </div>
                            <div class="slider--data--paragraph">
                                <p>
                                    <?php echo $page->where('slug', 'Slider1')->first()->content; ?>

                                    
                                    </p>
                            </div>
                            <div class="show__more">
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about__slider--data--item">
                            <div class="slider--data_logo">
                                <img src="img/logo_about.png" alt="">
                            </div>
                            <div class="slider--data--tit">
                                <h2>أوقاف الفاضل</h2>
                            </div>
                            <div class="slider--data--paragraph">
                                <p>
                                    
                                    <?php echo $page->where('slug', 'Slider2')->first()->content; ?>

                                     </p>
                            </div>
                            <div class="show__more">
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about__slider--data--item">
                            <div class="slider--data_logo">
                                <img src="img/logo_about.png" alt="">
                            </div>
                            <div class="slider--data--tit">
                                <h2>أوقاف الفاضل</h2>
                            </div>
                            <div class="slider--data--paragraph">
                                <p>
                                    
                                    <?php echo $page->where('slug', 'Slider3')->first()->content; ?>

                                    
                                     </p>
                            </div>
                            <div class="show__more">
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about__slider--data--item">
                            <div class="slider--data_logo">
                                <img src="img/logo_about.png" alt="">
                            </div>
                            <div class="slider--data--tit">
                                <h2>أوقاف الفاضل</h2>
                            </div>
                            <div class="slider--data--paragraph">
                                <p>
                                    <?php echo $page->where('slug', 'Slider4')->first()->content; ?>


            
                                </p>
                            </div>
                            <div class="show__more">
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-4 col-xs-12">
        </div>
    </div>
</div>
</section><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/partials/_slider.blade.php ENDPATH**/ ?>