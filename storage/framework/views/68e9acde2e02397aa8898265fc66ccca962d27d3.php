<?php $__env->startSection('content'); ?>
    <section class="heading">
        <div class="container">
            <div class="heading__body old-requests">
                <h1>الطلبات السابقة</h1>
                <span class="line"></span>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم
                    لأنها
                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا</p>
            </div>
        </div>
    </section>

    <section class="about__-__us__galary-taps">
        <?php if(session()->has('success')): ?>

            <div class="container">
                <div class="alert alert-success">
                    <ul>
                        <li><?php echo \Session::get('success'); ?></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">طلبات الصيانة</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active myTabContent__-__new" id="home" role="tabpanel"
                     aria-labelledby="home-tab">
                    <?php if($orders->count()): ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $Estate = app('\App\Building'); ?>
                            <?php $image = app('\App\Image'); ?>
                            <?php
                                $Estate=$Estate->where('id',$order->estate_id)->first();
                                 $image=   $image->where(['imageable_id' => $Estate->id, 'more' => null])->pluck('name')->random();
                            ?>
                            <input type="hidden" order_num="<?php echo e($order->order_number); ?>">

                            <div class="search-results_details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_pic">
                                    <img src="<?php echo e(url('/images')); ?>/<?php echo e($image); ?>" alt="">

                                    
                                </div>
                            </div>
                            <div class="col-md-9">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-1">
                                        <h2>اسم العقار <span> <?php echo e(@$Estate->name); ?></span></h2>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-1">
                                        <?php if(auth()->guard('web')->check() || auth()->guard('beneficiary')->check()): ?>
                                            <?php if(@$order->is_accepted == '1'): ?>
                                                <div class="search-results__action"  >
                                                    <p class="btn agree">
                                                        تم الموافقه
                                                    </p>
                                                </div>
                                            <?php elseif($order->is_accepted == '2'): ?>
                                                <div class="search-results__action" >
                                                    <p class="btn delete">
                                                        تم الرفض
                                                    </p>
                                                </div>
                                            <?php else: ?>
                                                <div class="search-results__action" >
                                                    <p class="btn btn-warning">
                                                        حالة الطلب معلقه
                                                    </p>
                                                </div>

                                            <?php endif; ?>
                                        <?php else: ?>

                                        <?php if(@$order->is_accepted == '1'): ?>
                                            <?php if(@$order->ended_at != null): ?>
                                                <div class="search-results__action"  >
                                                    <p class="btn agree">
                                                        تم الموافقه
                                                    </p>
                                                </div>
                                                <?php else: ?>
                                                <div class="search-results__action enter_date<?php echo e(@$order->order_number); ?>" >
                                                    <div class="alert alert-warning">
                                                        <strong>Warning!</strong> ادخل تاريخ القدوم ليتم ابلاغ صاحب الطلب.
                                                    </div>
                                                    <input type="date" name="Date_end" class="end" dat_num="<?php echo e(@$order->order_number); ?>" id="Date_end" style="background-color: #ffc107;" >
                                                </div>
                                            <?php endif; ?>
                                            <?php elseif($order->is_accepted == '2'): ?>
                                            <div class="search-results__action" >
                                            <p class="btn delete">
                                                تم الرفض
                                            </p>
                                            </div>
                                        <?php else: ?>
                                            <div class="search-results__action check_status<?php echo e(@$order->order_number); ?>" style="display:none;">
                                                <div class="alert alert-warning">
                                                    <strong>Warning!</strong> ادخل تاريخ القدوم ليتم ابلاغ صاحب الطلب.
                                                </div>
                                                <input type="date" name="Date_end"  class="end"  id="Date_end" dat_num="<?php echo e(@$order->order_number); ?>"  class="form-control"   style="background-color: #ffc107;" >
                                            </div>


                                            <div class="search-results__action" id="status<?php echo e(@$order->order_number); ?>">
                                                <button class="btn agree" value="1" order_number="<?php echo e(@$order->order_number); ?>" ><?php echo e(__('shared::actions.accept')); ?></button>
                                                <button class="btn delete" value="2" order_number="<?php echo e(@$order->order_number); ?>"><?php echo e(__('shared::actions.reject')); ?></button>
                                            </div>

                                            <div class="search-results__action" id="refused_order<?php echo e(@$order->order_number); ?>" style="display:none;" >
                                                <p class="btn delete">
                                                    تم الرفض
                                                </p>
                                            </div>

                                            <div class="search-results__action" id="agree_order<?php echo e(@$order->order_number); ?>"  style="display:none;" >
                                                <p class="btn agree">
                                                    تم الموافقه
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                            <?php endif; ?>
                                    </div>
                                    <?php $city = app('\App\City'); ?>
                                <?php
                                    $city_name= $city->where('id',$order->city_id)->first();
                                    $user_name= $order->with('madeBy')->first()->madeBy;
                                        $theDate    = new \DateTime($order->available_at);
                                        $ended_at    = new \DateTime($order->ended_at);
                                         $stringDate = $theDate->format('Y/m/d h:i A');
                                         $endedDate = $ended_at->format('Y/m/d h:i A');
                                ?>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">
                                                <ul>
                                                    <li>المدينة: <?php echo e(@$city_name->name_ar); ?> - السعودية</li>
                                                    <li>
                                                       اسم صاحب العقار : <?php echo e(@$user_name->name); ?>

                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">
                                                <ul>
                                                    <li>رقم التليفون : <?php echo e(@$user_name->mobile); ?></li>
















                                                    <?php if(@$Estate->street != null): ?>
                                                    <li>الشارع: <?php echo e(@$Estate->street); ?></li>
                                                    <?php else: ?>
                                                    <li>الشارع: <?php echo e(@$Estate->district); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="search_info">
                                            <div class="search_info__details">

                                                <ul>

                                                    <li>تاريخ الطلب:  <span><?php echo e(@$stringDate); ?></span></li>
                                                    <?php if(@$order->is_accepted == '1' && $order->ended_at != null ): ?>
                                                    <li>تاريخ القدوم:  <span><?php echo e(@$endedDate); ?></span></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <?php echo e(__('shared::messages.info.no_maintenance_orders')); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/users/agencies/orders/index.blade.php ENDPATH**/ ?>