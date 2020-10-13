<?php $image = app('\App\Image'); ?>
<div class="col-md-6 col-sm-6 col-xs-12">


    <div class="estate__ads--item">
        <div class="estate__ads--item--top">
            <span class="type">ايجار</span>
            <div class="estate__ads--item--top-img">
                <img src="<?php echo e(url('/images')); ?>/<?php echo e($image->where(['imageable_id' => $estate->id, 'more' => null])->pluck('name')->random()); ?>" alt="">
            </div>
        </div>
        <div class="estate__ads--item--bottom">
            <div class="estate__ads--item--bottom-header-top">
                <div class="bottom-header-top-data">
                    <?php switch($estate->estate_type):
                        case ('building'): ?>
                            <h2><?php echo e($estate->name); ?></h2>
                            <?php break; ?>
                        <?php case ('apartment'): ?>
                            <h2><?php echo e(__('shared::estates.apartment')); ?></h2>
                            <?php break; ?>
                        <?php case ('shop'): ?>
                            <?php echo e(__('shared::estates.shop')); ?>

                            <?php break; ?>
                        <?php case ('land'): ?>
                            <?php echo e(__('shared::estates.land')); ?>

                            <?php break; ?>
                    <?php endswitch; ?>
                    <div class="data-items">
                        <div class="data-item">
                            <span class="data-item-info">
                                <?php echo e(en2ar($estate->space)); ?><sup>2</sup>
                            </span>
                            <span class="data-item-icon">
                                <img src="<?php echo e(asset('img')); ?>/plans.png" alt="">
                            </span>
                        </div>
                        <div class="data-item">
                            <span class="data-item-info">
                                <?php echo e(en2ar('3')); ?>

                            </span>
                            <span class="data-item-icon">
                                <img src="<?php echo e(asset('img')); ?>/Path105.png" alt="">
                            </span>
                        </div>
                        <div class="data-item">
                            <span class="data-item-info">
                                <?php echo e(en2ar('9')); ?>

                            </span>
                            <span class="data-item-icon">
                                <img src="<?php echo e(asset('img')); ?>/bed.png" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="estate__ads--item--bottom-info">
                <div class="location">
                    <div class="location-item">
                        <span class="location-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="location-data">
                            <?php echo e($estate->address); ?>

                        </span>
                    </div>
                </div>
                <div class="details">
                    <a href="<?php echo e(route('estate.show', $estate->slug)); ?>">التفاصيل</a>
                </div>
            </div>
            <div class="estate__ads--item--bottom-paragraph">
                <p>
                    <?php echo e($estate->extra_details); ?>

                </p>
            </div>
        </div>
    </div>

</div>

<?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/estates/partials/_estate.blade.php ENDPATH**/ ?>