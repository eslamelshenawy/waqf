<?php $__env->startSection('content'); ?>

    <section class="tenants">
        <div class="container" id="tenantContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4><?php echo e(__('shared::estates.lands.new')); ?></h4><br></div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Admin::lands.update', $lands->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <div class="form-row">
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                


                                <!-- Start Buildings List for each beneficiary -->
                                        <div class="col-md-3 mb-3">
                                        <?php $city = app('\App\City'); ?>
                                        <label for="identity_number"><?php echo e(__('shared::commons.city')); ?></label>
                                        <select class="form-control" name="city">
                                            <?php $__currentLoopData = $city->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->name_en); ?>" <?php echo e(old('city') == $c->name_en || $c->id == $lands->city_id ? 'selected' : ''); ?>><?php echo e($c->name_ar); ?></option>
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
                                    <!-- End Buildings List for each beneficiary -->

                                    <!-- Start Buildings List for each beneficiary -->
                                    <div id="districtDiv" class="col-md-3 mb-4">
                                        <label for="district"><?php echo e(__('shared::estates.district')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="district" value="<?php echo e(old('district',$lands->district)); ?>" id="district"
                                               placeholder="<?php echo e(__('shared::estates.district')); ?>">
                                        <?php $__errorArgs = ['district'];
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
                                    <!-- End Buildings List for each beneficiary -->

                                    <!-- Start Buildings List for each beneficiary -->
                                    <div id="streetDiv" class="col-md-3 mb-4">
                                        <label for="street"><?php echo e(__('shared::estates.street')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="street" value="<?php echo e(old('street',$lands->street)); ?>" id="street"
                                               placeholder="<?php echo e(__('shared::estates.street')); ?>">
                                        <?php $__errorArgs = ['street'];
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
                                    <!-- End Buildings List for each beneficiary -->

                                </div>

                                <div class="form-row">

                                    <!-- Start Apartment Number -->
                                    <div class="col-md-3 mb-4">
                                        <label for="number"><?php echo e(__('shared::estates.lands.fields.number')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="number" value="<?php echo e(old('number',$lands->number)); ?>" id="number"
                                               placeholder="<?php echo e(__('shared::estates.lands.fields.number')); ?>" maxlength="10">
                                        <?php $__errorArgs = ['number'];
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
                                    <!-- End Apartment Number -->

                                    <!-- Start Apartment Space -->
                                    <div class="col-md-3 mb-4">
                                        <label for="space"><?php echo e(__('shared::estates.lands.fields.space')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['space'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="space" value="<?php echo e(old('space',$lands->space)); ?>" id="space"
                                               placeholder="<?php echo e(__('shared::estates.lands.fields.space')); ?>" maxlength="10">
                                        <?php $__errorArgs = ['space'];
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
                                    <!-- End Apartment Number -->


                                    <!-- Start Apartment Price -->
                                    <div class="col-md-3 mb-4">
                                        <label for="landPrice"><?php echo e(__('shared::estates.lands.fields.price')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="price" value="<?php echo e(old('price',$lands->price)); ?>"
                                               id="landPrice" placeholder="<?php echo e(__('shared::estates.lands.fields.price')); ?>" maxlength="9">
                                        <?php $__errorArgs = ['price'];
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
                                    <!-- End Apartment Price -->
                                </div>


                                <div class="form-row">
                                    <!-- Start Floor number -->
                                    <div class="col-md-7 mb-4">
                                        <label for="location"><?php echo e(__('shared::estates.lands.fields.location')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="location" value="<?php echo e(old('location',$lands->location)); ?>"
                                               id="location" placeholder="<?php echo e(__('shared::estates.lands.fields.location')); ?>">
                                        <?php $__errorArgs = ['location'];
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
                                    <!-- End Floor number -->
                                </div>

                                <hr>

                                <div class="form-row">
                                    <!-- Start Email -->
                                    <div class="col-md-4 mb-3">
                                        <label for="instrumentNumber"><?php echo e(__('shared::estates.instruments.number')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['instrument_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="instrument_number" value="<?php echo e(old('instrument_number',$lands->instrument_number)); ?>"
                                               id="instrumentNumber"
                                               placeholder="<?php echo e(__('shared::estates.instruments.number')); ?>" maxlength="10">
                                        <?php $__errorArgs = ['instrument_number'];
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

                                    <div class="col-md-3 mb-3">
                                        <label for="instrumentDate"><?php echo e(__('shared::estates.instruments.date_at')); ?></label>
                                        <input type="date" class="field form-control <?php $__errorArgs = ['instrument_date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="instrument_date_at" value="<?php echo e(old('instrument_date_at',$lands->instrument_date_at)); ?>"
                                               id="instrumentDateAt"
                                               placeholder="<?php echo e(__('shared::estates.instruments.date_at')); ?>">
                                        <?php $__errorArgs = ['instrument_date_at'];
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

                                    <div class="col-md-3 mb-3">
                                        <label for="court"><?php echo e(__('shared::estates.courts.name')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['court'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="court" value="<?php echo e(old('court',$lands->court)); ?>"
                                               id="court" placeholder="<?php echo e(__('shared::estates.courts.name')); ?>">
                                        <?php $__errorArgs = ['court'];
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

                                </div>

                                <hr>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label class="form-check-label"><?php echo e(__('shared::estates.lands.fields.type')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="checkbox" name="land_type[]" id="landTypeResidential" value="residential" <?php echo e($lands->usage_type[0] == "residential" ? "checked" : ""); ?>>
                                        <label class="form-check-label" for="landTypeResidential"><?php echo e(__('shared::estates.residential')); ?></label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="checkbox" name="land_type[]" id="landTypeCommercial" value="commercial" <?php echo e(@$lands->usage_type[1] == "commercial" ? "checked" : ""); ?>>
                                        <label class="form-check-label" for="landTypeCommercial"><?php echo e(__('shared::estates.commercial')); ?></label>
                                    </div>

                                    <?php $__errorArgs = ['land_type'];
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


                                <hr>


                                <div class="form-row">
                                    <!-- Start Email -->
                                    <div class="col-md-12 mb-3">
                                        <label for="extraDetails"><?php echo e(__('shared::estates.extra_details')); ?></label>
                                        <textarea class="form-control" name="extra_details" id="extraDetails" rows="8"><?php echo e($lands->extra_details); ?></textarea>
                                        <?php $__errorArgs = ['extra_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <!-- End Email -->
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><?php echo e(__('shared::estates.current_lands_images')); ?></label>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <?php $__currentLoopData = $lands->images()->where(['more' => 'lands-image', 'more' => null])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(url('/images')); ?>/<?php echo e($image->name); ?>"><img src="<?php echo e(url('/images')); ?>/<?php echo e($image->name); ?>" alt="Building Image" class="img-thumbnail" width="100" height="100" /></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-row">
                                    <!-- end of col -->
                                    <div class="col-md-6 mb-4">
                                        <h5 class="card-title"><?php echo e(__('shared::estates.lands.images')); ?></h5>
                                        <?php echo $__env->make('shared::includes._uploader_', ['field' => 'images[]',
                                        'title' => __('shared::commons.select_images'), 'multi' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                    <!-- end of col -->


                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1" <?php echo e(@$lands->is_active == "1" ? "checked" : ""); ?>>
                                            <label class="custom-control-label" for="isActive"><?php echo e(__('shared::commons.active')); ?></label>
                                        </div>

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3"><?php echo e(__('shared::actions.create')); ?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripting...'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/estates/lands/edit.blade.php ENDPATH**/ ?>