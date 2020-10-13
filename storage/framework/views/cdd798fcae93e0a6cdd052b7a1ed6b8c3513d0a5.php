

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $image = app('\App\Image'); ?>
    <?php $page = app('\App\Page'); ?>

    <section class="blog-heading about__-__us">
        <div class="container">
            <div class="blog-heading__body ">
                <h1> مكتبة الصور</h1>
                <span class="line"></span>
                <p>
                    <?php echo $page->where('slug', 'الصور')->first()->content; ?>

                    
                    ا</p>
            </div>
        </div>
    </section>

    <section class="about__-__us__galary-taps">
        <div class="container">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">كل الصور</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">مبانى</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">شقق</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false">محلات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">أراضى</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><div class="row">
                        <?php $__currentLoopData = $image->whereIn('imageable_type',['App\Building','App\Apartment','App\Shop','App\Land'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        
                                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($imag->name); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <div class="row">
                        <?php $__currentLoopData = $image->where('imageable_type','App\Building')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($apart->name); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div></div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><div class="row">
                        <?php $__currentLoopData = $image->where('imageable_type','App\Apartment')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($apart->name); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div></div>
                <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab"><div class="row">
                        <?php $__currentLoopData = $image->where('imageable_type','App\Shop')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($apa->name); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div></div>
                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab"><div class="row">
                        <?php $__currentLoopData = $image->where('imageable_type','App\Land')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $land): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="about__-__us__galary-item">
                                    <div class="about__-__us__galary-item-photo">
                                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($land->name); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div></div>
            </div>
<!--            <ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"-->
<!--                       aria-controls="home" aria-selected="true">كل الصور</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#bilding" role="tab"-->
<!--                       aria-controls="profile" aria-selected="false">مبانى</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"-->
<!--                       aria-controls="profile" aria-selected="false">شقق</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"-->
<!--                       aria-controls="contact" aria-selected="false">محلات</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab"-->
<!--                       aria-controls="contact2" aria-selected="false">أراضى</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <div class="tab-content" id="myTabContent">-->
<!--                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">-->
<!--                    <div class="row">-->
<!--                        <?php $__currentLoopData = $image->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!---->
<!--                                    <img src="<?php echo e(url('/images')); ?>/<?php echo e($imag->name); ?>" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="bilding" role="tabpanel" aria-labelledby="profile-tab">-->
<!--                    <div class="row">-->
<!--                        <?php $__currentLoopData = $image->where('imageable_type','App\Building')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                            <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                                <div class="about__-__us__galary-item">-->
<!--                                    <div class="about__-__us__galary-item-photo">-->
<!--                                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($apart->name); ?>" alt="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">-->
<!--                    <div class="row">-->
<!--                        <?php $__currentLoopData = $image->where('imageable_type','App\Apartment')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--                                    <img src="<?php echo e(url('/images')); ?>/<?php echo e($apart->name); ?>" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">-->
<!--                    <div class="row">-->
<!--                        <?php $__currentLoopData = $image->where('imageable_type','App\Shop')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--                                    <img src="<?php echo e(url('/images')); ?>/<?php echo e($apa->name); ?>" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">-->
<!--                    <div class="row">-->
<!--                        <?php $__currentLoopData = $image->where('imageable_type','App\Land')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $land): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                        <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                            <div class="about__-__us__galary-item">-->
<!--                                <div class="about__-__us__galary-item-photo">-->
<!--                                    <img src="<?php echo e(url('/images')); ?>/<?php echo e($land->name); ?>" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/gallery/index.blade.php ENDPATH**/ ?>