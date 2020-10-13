<section class="latest__estate__ads">
    <div class="tit">
        <h2>احدث إعلانات العقارات</h2>
    </div>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $estate->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="estate__ads--item">
                    <div class="estate__ads--item--top">
                        <span class="type">ايجار</span>
                        <div class="estate__ads--item--top-img">
                            <img src="<?php echo e(url('/images')); ?>/<?php echo e(@$image->where(['imageable_id' => $est->id, 'more' => null])->pluck('name')->random()); ?>" alt="">
                        </div>
                    </div>
                    <div class="estate__ads--item--bottom">
                        <div class="estate__ads--item--bottom-header-top">
                            <div class="bottom-header-top-data">
                                <h2><?php echo e(__('shared::estates.' . $est->estate_type, ['something' => '']) . ' ب' . $est->city->name_ar); ?></h2>
                                <div class="data-items">
                                    <div class="data-item">
                                        <span class="data-item-info">
                                            <?php echo e(en2ar($est->space)); ?>م<sup><?php echo e(en2ar('2')); ?></sup>
                                        </span>
                                        <span class="data-item-icon">
                                            <img src="img/plans.png" alt="">
                                        </span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-item-info">
                                            <?php echo e(en2ar('3')); ?>

                                        </span>
                                        <span class="data-item-icon">
                                            <img src="img/Path105.png" alt="">
                                        </span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-item-info">
                                            <?php echo e(en2ar('9')); ?>

                                        </span>
                                        <span class="data-item-icon">
                                            <img src="img/bed.png" alt="">
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
                                        <?php echo e($est->address); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="details">
                                <a href="<?php echo e(route('estate.show', $est->slug)); ?>">التفاصيل</a>
                            </div>
                        </div>
                        <div class="estate__ads--item--bottom-paragraph">
                            <p>
                                <?php echo e($est->extra_details); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="pagination-dection">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1 \</a></li>
                <li class="page-item active"><a class="page-link" href="#">2 </a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/partials/_real_estate_last_6_ads.blade.php ENDPATH**/ ?>