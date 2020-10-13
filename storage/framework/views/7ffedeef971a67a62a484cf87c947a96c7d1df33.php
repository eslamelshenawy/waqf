<?php echo $__env->make('shared::includes._md_', [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
<section class="tenants">
    <div class="container" id="tenantContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title"><br><h4><?php echo e(__('shared::estates.new_apartment')); ?></h4><br></div>
                        <hr>
                    <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('Admin::apartments.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div id="buildingsDiv" class="col-md-4 mb-4" style="display: block;">
                                <label for="building"><?php echo e(__('shared::estates.select_building')); ?></label>
                                <?php echo $__env->make('admin::lists._buildings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php $__errorArgs = ['building'];
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

                            <!-- Start Identity Number -->
                            <div class="col-md-3 mb-3">
                                <?php $city = app('\App\City'); ?>
                                <label for="identity_number"><?php echo e(__('shared::commons.city')); ?></label>
                                <select class="form-control" name="city">
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


                        </div>

                        <hr>

                        <div class="form-row">

                            <!-- Start Apartment Number -->
                            <div class="col-md-3 mb-4">
                                <label for="number"><?php echo e(__('shared::commons.number')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="number" value="<?php echo e(old('number')); ?>" id="number"
                                       placeholder="<?php echo e(__('shared::commons.number')); ?>">
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
                                <label for="space"><?php echo e(__('shared::commons.space')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['space'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="space" value="<?php echo e(old('space')); ?>" id="name"
                                       placeholder="<?php echo e(__('shared::commons.space')); ?>">
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
                                <label for="floorNumber"><?php echo e(__('shared::commons.price')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="price" value="<?php echo e(old('price')); ?>"
                                       id="price" placeholder="<?php echo e(__('shared::commons.price')); ?>">
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

                            <!-- Start Floor number -->
                            <div class="col-md-2 mb-4">
                                <label for="floorNumber"><?php echo e(__('shared::estates.floor_number')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['floor_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="floor_number" value="<?php echo e(old('floor_number')); ?>"
                                       id="floorNumber" placeholder="<?php echo e(__('shared::estates.floor_number')); ?>">
                                <?php $__errorArgs = ['floor_number'];
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

                            <div class="col-md-10 mb-2">
                                <table class="table table-borderless text-center">

                                    <tr>
                                        <td colspan="1"><h5><?php echo e(__('shared::commons.number_of')); ?></h5></td>
                                        <td style="width: 100px;"><label for="number_of_rooms"><?php echo e(__('shared::estates.rooms')); ?></label></td>
                                        <td style="width: 100px;"><label for="number_of_toilets"><?php echo e(__('shared::estates.toilets')); ?></label></td>
                                        <td style="width: 100px;"><label for="number_of_kitchens"><?php echo e(__('shared::estates.kitchens')); ?></label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td><input type="number" maxlength="10" class="field form-control <?php $__errorArgs = ['number_of_rooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="number_of_rooms"
                                                   id="numberOfRoom" value="<?php echo e(old('number_of_rooms')); ?>" placeholder="0" required></td>

                                        <td><input type="number" maxlength="10" class="field form-control <?php $__errorArgs = ['number_of_toilets'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="number_of_toilets"
                                                   id="numberOfToilets" value="<?php echo e(old('number_of_toilets')); ?>" placeholder="0" required></td>

                                        <td><input type="number" maxlength="10" class="field form-control <?php $__errorArgs = ['number_of_kitchens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="number_of_kitchens"
                                                   id="numberOfKitchens" value="<?php echo e(old('number_of_kitchens')); ?>" placeholder="0" required></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">

                            <div class="col-md-12">
                                <label for="isHasAirConditioner"><?php echo e(__('shared::estates.is_has_air_conditioner')); ?></label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="1" class="form-check-inline"
                                       id="isHasAirConditionerYes"
                                       name="is_has_air_conditioner"
                                       onchange="isHasAirConditioner(this.value)" <?php echo e(old('is_has_air_conditioner') == '1' ? 'checked' : ''); ?> />
                                <label for="isHasAirConditionerYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="0" class="form-check-inline"
                                       id="isHasAirConditionerNo" name="is_has_air_conditioner"
                                       onchange="isHasAirConditioner(this.value)" <?php echo e(old('is_has_air_conditioner') == '0' ? 'checked' : ''); ?>>
                                <label for="isHasAirConditionerNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-2 mb-3 mt-3" id="numberOfAirConditionerDiv" style="display: <?php echo e(old('is_has_air_conditioner') == '1' ? 'block' : 'none'); ?>;">
                                <label for="numberOfAirConditioner">&nbsp;&nbsp;<?php echo e(__('shared::estates.number_of_conditioners')); ?></label>
                                <input type="number" name="number_of_air_conditioner" value="<?php echo e(old('number_of_air_conditioner')); ?>"
                                       class="form-check-inline form-control" maxlength="5" id="numberOfAirConditioner" />
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="col-md-12 mb-3 mt-4">
                                <label for="isKitchenReady">&nbsp;&nbsp;<?php echo e(__('shared::estates.is_kitchen_ready')); ?></label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="1" <?php echo e(old('is_kitchen_ready') == '1' ? 'checked' : ''); ?>

                                       class="form-check-inline" id="isKitchenReadyYes" name="is_kitchen_ready" onchange="isKitchenReady(this.value)">
                                <label for="isKitchenReadyYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="0" <?php echo e(old('is_kitchen_ready') == '0' ? 'checked' : ''); ?>

                                       class="form-check-inline" id="isKitchenReadyNo" name="is_kitchen_ready" onchange="isKitchenReady(this.value)">
                                <label for="isKitchenReadyNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3 mt-3" id="kitchenDetailsDiv" style="display: <?php echo e(old('is_kitchen_ready') == '1' ? 'block' : 'none'); ?>;">
                                <label for="kitchenDetails"><?php echo e(__('shared::estates.kitchen_details')); ?></label>
                                <textarea name="kitchen_details" class="form-check-inline form-control mt-2" id="kitchenDetails" rows="4"><?php echo e(old('kitchen_details')); ?></textarea>
                            </div>

                            <?php $__errorArgs = ['is_kitchen_ready'];
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

                            <?php $__errorArgs = ['kitchen_details'];
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
                            <div class="col-md-12 mb-3 mt-4">
                                <label for="isHasParking">&nbsp;&nbsp;<?php echo e(__('shared::estates.is_has_parking')); ?></label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="1" <?php echo e(old('is_has_parking') == '1' ? 'checked' : ''); ?>

                                       class="form-check-inline" id="isHasParkingYes" name="is_has_parking" onchange="isHasParking(this.value)">
                                <label for="isHasParkingYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                            </div>

                            <div class="col-md-3 mb-3 mt-4">
                                <input type="radio" value="0" <?php echo e(old('is_has_parking') == '0' ? 'checked' : ''); ?>

                                       class="form-check-inline" id="isHasParkingNo" name="is_has_parking" onchange="isHasParking(this.value)">
                                <label for="isHasParkingNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-md-3 mb-3 mt-3" id="parkingNumberDiv" style="display: <?php echo e(old('is_has_parking') == '0' ? 'block' : 'none'); ?>;">
                                <label for="parkingNumber">&nbsp;&nbsp;<?php echo e(__('shared::estates.parking_number')); ?></label>
                                <input type="text" name="parking_number" class="form-check-inline form-control" id="parkingNumber" value="<?php echo e(old('parking_number')); ?>">
                            </div>

                            <?php $__errorArgs = ['is_has_parking'];
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
                            <div class="col-md-12">
                                <label class="form-check-label"><?php echo e(__('shared::estates.rent_type')); ?></label>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" <?php echo e(old('rent_type') == 'monthly' ? 'checked' : ''); ?>

                                       id="rentTypeMonthly" value="monthly">
                                <label class="form-check-label" for="rentTypeMonthly"><?php echo e(__('shared::estates.monthly')); ?></label>
                            </div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" <?php echo e(old('rent_type') == 'quarterly' ? 'checked' : ''); ?>

                                       id="rentTypeQuarterly" value="quarterly">
                                <label class="form-check-label" for="rentTypeQuarterly"><?php echo e(__('shared::estates.quarterly')); ?></label>
                            </div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" <?php echo e(old('rent_type') == 'midterm' ? 'checked' : ''); ?>

                                       id="rendTypeMidterm" value="midterm">
                                <label class="form-check-label" for="rendTypeMidterm"><?php echo e(__('shared::estates.midterm')); ?></label>
                            </div>

                            <div class="form-check form-check-inline col-md-2 mt-4">
                                <input class="form-check-input" type="radio"
                                       name="rent_type" <?php echo e(old('rent_type') == 'yearly' ? 'checked' : ''); ?>

                                       id="rentTypeYearly" value="yearly">
                                <label class="form-check-label" for="rentTypeYearly"><?php echo e(__('shared::estates.yearly')); ?></label>
                            </div>

                            <?php $__errorArgs = ['rent_type'];
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
                                <textarea class="form-control" name="extra_details" id="extraDetails" rows="8"><?php echo e(old('extra_details')); ?></textarea>
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

                        <hr>

                        <div class="form-row">
                            <!-- end of col -->
                            <div class="col-md-6 mb-4">
                                <h5 class="card-title"><?php echo e(__('shared::estates.apartment_images')); ?></h5>

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
                            <!-- end of col -->
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
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


<?php $__env->startPush('scripts...'); ?>
<script>
    let isHasAirConditioner = function(val){
        if(val === '1'){
            document.getElementById('numberOfAirConditionerDiv').style.display = 'block';
        }else if(val === '0'){
            document.getElementById('numberOfAirConditionerDiv').style.display = 'none';
        }
    };

    let isKitchenReady = function(val){
        if(val === '1'){
            document.getElementById('kitchenDetailsDiv').style.display = 'block';
        }else if(val === '0'){
            document.getElementById('kitchenDetailsDiv').style.display = 'none';
        }
    };

    let isHasParking = function(val){
        if(val === '1'){
            document.getElementById('parkingNumberDiv').style.display = 'block';
        }else if(val === '0'){
            document.getElementById('parkingNumberDiv').style.display = 'none';
        }
    }
</script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/estates/apartments/create.blade.php ENDPATH**/ ?>