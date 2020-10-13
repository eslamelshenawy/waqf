<?php $image = app('\App\Image'); ?>
<?php $EstateOrder = app('\App\EstateOrder'); ?>
<?php
    $EstateOrd=$EstateOrder->where('estate_id',$estate->id)->first();
?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session()->has('success')): ?>

        <div class="container">
            <div class="alert alert-success">
                <ul>
                    <li><?php echo \Session::get('success'); ?></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <div id="estateOrder">
            <div class="reserve_request text-center modal fade" id="reserve_request">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="reserve_request__header">

                            <?php switch($estate->estate_type):
                                case ('building'): ?>
                                <h4 class="modal-title">طلب حجز مبنى</h4>
                                <?php break; ?>
                                <?php case ('apartment'): ?>
                                <h4 class="modal-title">طلب حجز شقة</h4>
                                <?php break; ?>
                                <?php case ('shop'): ?>
                                <h4 class="modal-title">طلب حجز محل</h4>
                                <?php break; ?>
                                <?php case ('land'): ?>
                                <h4 class="modal-title">طلب حجز ارض</h4>
                                <?php break; ?>
                            <?php endswitch; ?>
                            
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Client::estate.store.order')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="estate_type" id="estate_type" value="<?php echo e($estate->estate_type); ?>">
                                <input type="hidden" name="tenant_id" id="tenant_id" value="<?php echo e(auth()->user()->id); ?>">
                                <input type="hidden" name="estateable_id" id="estateable_id" value="<?php echo e($estate->id); ?>">
                                <input type="hidden" name="price" id="price" value="<?php echo e($estate->price); ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            الاسم
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo e(auth()->user()->name); ?>"
                                               readonly/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            رقم الجوال
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo e(auth()->user()->mobile); ?>"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            البريد الالكترونى
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>"
                                               readonly/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            تاريخ الحجز
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="date" class="form-control" name="booking_at"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            تاريخ الانتهاء للحجز
                                            <span class="lable__end">*</span>
                                        </label>
                                        <input type="date" class="form-control" name="ended_at"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fix">
                                            الوصف
                                            <span class="lable__start">*</span>
                                        </label>
                                        <textarea class="form-control" id="fix" name="description" required></textarea>
                                    </div>
                                </div>











































                                <button type="submit"  class="btn btn-lg"
                                        style="width: 50%;">
                                    حجز العقار
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php $city = app('\App\City'); ?>
    <?php
        $city=$city->find($estate->city_id)
    ?>
    <section class="addetails">
        <div class="container">
            <div class="row">
                <!-- <div class="ads-header"> -->
                <div class="col-sm-6">
                    <p class="addetails-title">
                        <?php switch($estate->estate_type):
                            case ('building'): ?>
                            مبنى
                            <?php break; ?>
                            <?php case ('apartment'): ?>
                            شقة
                            <?php break; ?>
                            <?php case ('shop'): ?>
                            محل
                            <?php break; ?>
                            <?php case ('land'): ?>
                            ارض
                            <?php break; ?>
                        <?php endswitch; ?>
                        ب<?php echo e($city->name_ar); ?>

                    </p>
                </div>
                <div class="col-sm-6">
                    <div class="addetails-social">
                        <a href="#" class="addetails-social-btn" target="_blank" rel="noopener noreferrer">
                            اعجاب
                        </a>
                        <a href="#" class="addetails-social-item">
                            <img class="addetails-social-img" src="<?php echo e(asset('img')); ?>/facebook.png" alt=""/>
                        </a>
                        <a href="#" class="addetails-social-item">
                            <img class="addetails-social-img" src="<?php echo e(asset('img')); ?>/twitter.png" alt=""/>
                        </a>
                        <a href="#" class="addetails-social-item">
                            <img class="addetails-social-img" src="<?php echo e(asset('img')); ?>/soc.png" alt=""/>
                        </a>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="addetails-carousel">
                <div class="owl-carousel owl-carousel-addetails owl-theme">
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random()); ?>"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random()); ?>"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random()); ?>"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random()); ?>"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                    <div class="item">
                        <span class="search-results__action_type rent">إيجار</span>
                        <img src="<?php echo e(url('/images')); ?>/<?php echo e($image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random()); ?>"
                             width="200" height="600" alt="photo by Barn Images"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ad_info">
        <div class="container">
            <div class="row">
                <!-- //////////// -->
                <div class="col-md-8">
                    <div class="ad_info__location">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <span><?php echo e($estate->address); ?></span>
                        <span><?php echo e($estate->price); ?></span>
                        <span>ريال سعودى/شهريا</span>
                    </div>
                    <div class="ad_info__desc">
                        <h4>وصف الاعلان</h4>
                        <p>
                            <?php echo e($estate->extra_details); ?>

                        </p>
                    </div>
                    <div class="ad_info__basic-info">
                        <h4>المعلومات الاساسية</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <?php switch($estate->estate_type):
                                    case ('building'): ?>
                                    <dl >
                                        <dt class="col-sm-4">المساحه</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->space)); ?><sup>2</sup></dd>
                                        <dt class="col-sm-4">شقه</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_apartments)); ?></dd>
                                        <dt class="col-sm-4">طابق</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_floors)); ?></dd>
                                        <dt class="col-sm-4">محل</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_shops)); ?></dd>
                                        <dt class="col-sm-4">نوع الايجار</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->rent_type) == "monthly" ? "شهرى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "quarterly" ? "ربع سنوى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "midterm" ? "نصف سنوى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "yearly" ? "سنوى" : ""); ?></dd>

                                    </dl>









                                    <?php break; ?>
                                    <?php case ('apartment'): ?>
                                    <dl >
                                        <dt class="col-sm-4">حجره</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_rooms)); ?></dd>
                                        <dt class="col-sm-4">حمام</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_kitchens)); ?></dd>
                                        <dt class="col-sm-4">مطبخ</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_floors)); ?></dd>
                                        <dt class="col-sm-4">تكيف</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->number_of_air_conditioner)); ?></dd>
                                        <dt class="col-sm-4">نوع الايجار</dt>
                                        <dd class="col-sm-4"> <?php echo e(en2ar($estate->rent_type) == "monthly" ? "شهرى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "quarterly" ? "ربع سنوى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "midterm" ? "نصف سنوى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "yearly" ? "سنوى" : ""); ?></dd>
                                    </dl>



                                    <?php break; ?>
                                    <?php case ('shop'): ?>
                                    <dt class="col-sm-4">المساحه</dt>
                                    <dd class="col-sm-4"> <?php echo e(en2ar($estate->space)); ?><sup>2</sup></dd>
                                    <dt class="col-sm-4">نوع الايجار</dt>
                                    <dd class="col-sm-4"> <?php echo e(en2ar($estate->rent_type) == "monthly" ? "شهرى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "quarterly" ? "ربع سنوى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "midterm" ? "نصف سنوى" : ""); ?><?php echo e(en2ar($estate->rent_type) == "yearly" ? "سنوى" : ""); ?></dd>



                                    <?php break; ?>
                                    <?php case ('land'): ?>
                                    <ul>
                                        <li>                                    <dt class="col-sm-4">المساحه</dt>
                                            <dd class="col-sm-4"> <?php echo e(en2ar($estate->space)); ?><sup>2</sup></dd>

                                        </li>
                                    </ul>

                                    <?php break; ?>
                                <?php endswitch; ?>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="ad_info__basic-accessories">
                        <h4>الموقع على الخريطة</h4>
                        <div class="map">
                            <img src="<?php echo e(asset('img')); ?>/map.png" alt="map"/>
                        </div>
                    </div>
                </div>

                <!-- ///////////// -->
                <div class="col-md-4">
                    <div class="ad_info__reserve">





                            <?php if(\Auth::check()): ?>
                            <?php if($EstateOrd == null): ?>
                                <button class="btn btn-lg btn-block "  data-toggle="modal" data-target="#reserve_request"> حجز العقار</button>
                            <?php else: ?>
                                <button class="btn btn-lg btn-block "  id="checkstatus">
                                    حجز العقار
                                </button>
                            <?php endif; ?>
                                <?php else: ?>
                                <button class="btn btn-lg btn-block "  id="checkAuth">
                                    حجز العقار
                                </button>
                                <?php endif; ?>


                    </div>
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="ad_info__inquiry" style="padding: 20px;">
                            <h3>طلب استفسار</h3>

                                <div class="form-group">
                                    <label for="name">
                                        الاسم
                                        <span class="lable__start">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        رقم الجوال
                                        <span class="lable__start">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="phone" required/>
                                </div>
                                <div class="form-group">
                                    <label for="inquiry">
                                        استفسارك
                                        <span class="lable__start">*</span>
                                    </label>
                                    <textarea class="form-control" id="inquiry" required>
                                </textarea>
                                </div>
                                <!-- modal trigger -->
                                <button type="submit" class="btn btn-block btn-lg ad_info__inquiry inquiry_add">
                                    ارسل
                                </button>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripting...'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/estates/show.blade.php ENDPATH**/ ?>