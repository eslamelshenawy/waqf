<div class="search-results_details">
    <?php $image = app('\App\Image'); ?>
    <?php
        if(\App\Tenant::with('estateOrders')->find(Auth::guard('web')->user()->id) != null ){
        $estate_id=\App\Tenant::with('estateOrders')->find(Auth::guard('web')->user()->id)['estateOrders'][0]->estate_id;
        }else{
    $estate_id=0;
        }
        $image=   $image->where(['imageable_id' => $agency->id, 'more' => "image-agency"])->pluck('name')->first();
    ?>
    <div class="row">
        <div class="col-md-3">
            <div class="profile_pic">
                <?php if($image != null): ?>
                    <img src="<?php echo e(url('/images')); ?>/<?php echo e($image); ?>" alt="">
                <?php else: ?>
                                <img src="<?php echo e(asset('img')); ?>/<?php echo e($agency->image_url ?? 'saudi-man.png'); ?>" alt="">
                <?php endif; ?>

            </div>
        </div>
        <div class="col-md-9">
            <div class="search_info">
                <div class="row">
                    <div class="col-md-6">
                        <h3><?php echo e($agency->name ?? __('shared::commons.companies.name')); ?> </h3>
                    </div>
                    <div class="col-md-6">
                        <div class="search-results__action">

                            <!-- Button trigger modal -->
                            <?php if(auth()->guard('web')->check()): ?>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="maintence_order" data_id="<?php echo e($agency->id); ?>" estate_id="<?php echo e($estate_id); ?>">
                                    <?php echo e(__('shared::commons.maintenance_order')); ?>

                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-primary maintence_order_notauth" >
                                    <?php echo e(__('shared::commons.maintenance_order')); ?>

                                </button>

                            <?php endif; ?>


                            





                            <span class="search-results__action_type <?php echo e($agency->type == 'agency' ? 'company' : 'technical'); ?>">
                                <?php echo e(($agency->type == 'agency' ? __('shared::commons.companies.company') :
                                    __('shared::commons.companies.technical')) ?? ''); ?>

                            </span>
                        </div>
                    </div>
                </div>
                <div class="search_info__details">
                    <ul>
                        <li><?php echo e(__('shared::commons.cities.city')); ?>: <?php echo e($agency->city->name_ar ?? ''); ?></li>
                        <li><?php echo e(__('shared::commons.mobile_number')); ?>: <?php echo e($agency->mobile ?? ''); ?></li>
                    </ul>
                    <ul>
                        <li><?php echo e(__('shared::commons.address')); ?>: <?php echo e($agency->address ?? ''); ?></li>
                        <li><?php echo e(__('shared::commons.maintenance_type')); ?>:
                            <?php $__currentLoopData = explode(',', $agency->services); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(__("shared::commons.services.$service")); ?>&nbsp; <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/components/_agency.blade.php ENDPATH**/ ?>