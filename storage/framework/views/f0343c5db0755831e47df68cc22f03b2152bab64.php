<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('client::layouts.partials._search_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="latest__estate__ads">
        <div class="tit">
            <h2>احدث إعلانات العقارات</h2>
        </div>
        <div class="container">
            <div class="row">
                <!-- Start Real Estate Blocks -->

                <!-- Start Real Estate Blocks -->
                <?php if(@$estates->IsEmpty() != true): ?>

                <?php echo $__env->renderEach('client::estates.partials._estate', $estates, 'estate'); ?>

                    <div class="pagination-dection">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                    <span class="sr-only"><?php echo e(__('shared::commons.previous')); ?></span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#"><?php echo e(count($estates)); ?> \</a></li>

                            <li class="page-item active"><a class="page-link" href="#"><?php echo e(count($estates)); ?> </a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    <span class="sr-only"><?php echo e(__('shared::commons.next')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                <?php else: ?>
                    <div class="tit">
                        <h4> <?php echo e(__('shared::commons.nodate')); ?></h4>
                    </div>


                <?php endif; ?>
            </div>

        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/estates/index.blade.php ENDPATH**/ ?>