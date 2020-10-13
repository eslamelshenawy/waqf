<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('client::layouts.partials._breadcrumb_3d', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
    <?php echo $__env->make('client::layouts.partials._search_box_maintenance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="search-results" id="maintenance">
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
            <div class="search-results_total">
                <p>عدد نتائج البحث <?php echo e($agencies->count()); ?> فنى / شركة</p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">طلب صيانة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Client::maintenance.store.order')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="apartment_id" id="apartment_id" value="">
                                <input type="hidden" name="tenant_id" id="tenant_id" value="<?php echo e(@Auth::user()->id); ?>">
                                <input type="hidden" name="agency_id" id="agency_id" value="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            الاسم
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo e(@Auth::user()->name); ?>" name="username" required disabled/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">
                                            رقم الجوال
                                            <span class="lable__start">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo e(@Auth::user()->mobile); ?>" name="mobile" required disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="availableDate">
                                                    التاريخ المتاح
                                                    <span class="lable__start">*</span>
                                                </label>
                                                <input type="datetime-local" class="form-control" name="date" required  />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="apartmentId">
                                                    <span class="lable__start">*</span>
                                                    نوع الصيانه
                                                </label>
                                                <select class="form-control" id="apartmentId" name="apartmentId" required>
                                                    <option value="" <?php echo e(old('service') == '' ? 'selected' : ''); ?>><?php echo e(__('اختر نوع الصيانه')); ?></option>
                                                    <option value="electric" <?php echo e(old('service') == 'electric' ? 'selected' : ''); ?>><?php echo e(__('shared::users.electric')); ?></option>
                                                    <option value="carpenter" <?php echo e(old('service') == 'plumber' ? 'selected' : ''); ?>><?php echo e(__('shared::users.plumber')); ?></option>
                                                    <option value="carpenter" <?php echo e(old('service') == 'carpenter' ? 'selected' : ''); ?>><?php echo e(__('shared::users.carpenter')); ?></option>
                                                    <option value="carpenter" <?php echo e(old('service') == 'painter' ? 'selected' : ''); ?>><?php echo e(__('shared::users.painter')); ?></option>
                                                    <option value="carpenter" <?php echo e(old('service') == 'cleaning' ? 'selected' : ''); ?>><?php echo e(__('shared::users.cleaning')); ?></option>
                                                    <option value="uploading_and_downloading" <?php echo e(old('service') == 'uploading_and_downloading' ? 'selected' : ''); ?>><?php echo e(__('shared::users.uploading_and_downloading')); ?></option>
                                                    <option value="transfer_furniture" <?php echo e(old('service') == 'transfer_furniture' ? 'selected' : ''); ?>><?php echo e(__('shared::users.transfer_furniture')); ?></option>
                                                    <option value="paving" <?php echo e(old('service') == 'paving' ? 'selected' : ''); ?>><?php echo e(__('shared::users.paving')); ?></option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fix">
                                            العطل
                                            <span class="lable__start">*</span>
                                        </label>
                                        <textarea class="form-control" id="fix" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                <!-- Start Identity Number -->
                                <div class="form-group col-md-6">
                                    <?php $city = app('\App\City'); ?>
                                    <label for="identity_number"><?php echo e(__('shared::commons.city')); ?></label>
                                    <select class="form-control" name="city" required>
                                        <?php $__currentLoopData = $city->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->name_en); ?>" <?php echo e(old('city') == $c->name_en ? 'selected' : ''); ?>><?php echo e($c->name_ar); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div>
                                        <span class="badge badge-danger"><?php echo e($message); ?></span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <!-- End Identity Number -->

                                <div class="form-group col-md-6">
                                    <h5 class="card-title"><?php echo e(__('shared::commons.images')); ?></h5>

                                    <?php echo $__env->make('shared::includes._uploader_', ['field' => 'images[]', 'multi' => true,
                                    'title' => __('shared::commons.select_images')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div>
                                    <span class="badge badge-danger">
                                        <?php echo e($message); ?>

                                    </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                </div>
                                <button type="submit"  class="btn btn-lg" style="width: 50%;">
                                    طلب الصيانة
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->renderEach('client::components._agency', $agencies, 'agency'); ?>
            <?php echo e($agencies->links()); ?>

            <?php if(auth()->guard()->check()): ?>
        </div>
        <?php endif; ?>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripting...'); ?>
    <script !src="">
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/maintenance/index.blade.php ENDPATH**/ ?>