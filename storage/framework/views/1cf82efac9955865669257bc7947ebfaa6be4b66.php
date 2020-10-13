<section class="vedio__datails">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="vedio__box">
                    <div class="vedio__box--style">
                        <div class="vedio__box--style--btn-span">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="vedio__box--style--after">
                            <span class="after--box"></span>
                        </div>
                    </div>
                    <div class="vedio">
                        <video id="player1" width="100%" height="100%" style="max-width: 100%" controls
                               poster="img/Image-vedio.png" playsinline webkit-playsinline>
                            <source
                                    src="https://commondatastorage.googleapis.com/gtv-videos-bucket/CastVideos/mp4/BigBuckBunny.mp4"
                                    type="video/mp4">
                            <track src="js/framworks/mediaelement.vtt" srclang="en" label="English"
                                   kind="subtitles" type="text/vtt">
                        </video>
                        <i class=" active far fa-play-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="datails-info">
                    <p class="datails--paragraph">
                        <?php echo e(($page->where('slug', 'about')->select('content')->first()->content)); ?>

                    </p>
                    <div class="show__more">
                        <a href="<?php echo e(route('pages.about')); ?>"> المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/mmekkawy/Projects/waqf-master/Modules/Client/Resources/views/partials/_video.blade.php ENDPATH**/ ?>