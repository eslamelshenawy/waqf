<?php echo $__env->make('shared::includes._md_', [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section class="tenants">
        <div class="container" id="tenantContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4><?php echo e(__('shared::estates.edit_shop')); ?></h4><br></div>
                            <hr>
                            <form class="needs-validation" novalidate method="POST" action="<?php echo e(route("Admin::shops.update", $shop->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <div class="form-row">
                                    <div id="buildingsDiv" class="col-md-4 mb-4">
                                        <label for="building"><?php echo e(__('shared::estates.the_building')); ?></label>
                                        <?php echo $__env->make('admin::lists._buildings', ['selected_id' => $shop->parent_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <!-- End Buildings List for each beneficiary -->
                                    <!-- Start City Number -->
                                    <div class="col-md-4 mb-4">
                                        <?php $city = app('\App\City'); ?>
                                        <label for="city"><?php echo e(__('shared::commons.city')); ?></label>
                                        <select class="form-control" name="city" id="city">
                                            <option selected disabled><?php echo e(__('shared::actions.select')); ?></option>
                                            <?php $__currentLoopData = $city->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->name_en); ?>" <?php echo e(old('city') == $c->name_en || $shop->city_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->name_ar); ?></option>
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
                                    <!-- End City Number -->
                                </div>
                                <div class="form-row">
                                    <!-- Start Shop Number -->
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
                                               name="number" value="<?php echo e(old('number', $shop->number)); ?>" id="number"
                                               placeholder="<?php echo e(__('shared::commons.number')); ?>" maxlength="10">
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
                                    <!-- End Shop Number -->
                                    <!-- Start Shop Space -->
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
                                               name="space" value="<?php echo e(old('space', $shop->space)); ?>" id="space"
                                               placeholder="<?php echo e(__('shared::commons.space')); ?>" maxlength="10">
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
                                    <!-- End Shop Number -->
                                    <!-- Start Shop Price -->
                                    <div class="col-md-3 mb-4">
                                        <label for="price"><?php echo e(__('shared::commons.price')); ?></label>
                                        <input type="text" class="field form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               name="price" value="<?php echo e(old('price', $shop->price)); ?>"
                                               id="shopPrice" placeholder="<?php echo e(__('shared::commons.price')); ?>"maxlength="9">
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
                                    <!-- End Shop Price -->
                                </div>
                                <hr>
                               
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="isOnStreetFront"><?php echo e(__('shared::estates.is_on_street_front')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" <?php echo e($shop->is_on_street_front == '1' ? 'checked' : ''); ?> class="form-check-inline" id="isOnStreetFrontYes" name="is_on_street_front">
                                        <label for="isOnStreetFrontYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" <?php echo e($shop->is_on_street_front == '0' ? 'checked' : ''); ?> class="form-check-inline" id="isOnStreetFrontNo" name="is_on_street_front">
                                        <label for="isOnStreetFrontNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                                    </div>
                                    <?php $__errorArgs = ['is_on_street_front'];
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
                                        <label for="isHasAirConditioner"><?php echo e(__('shared::estates.is_has_air_conditioner')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" <?php echo e($shop->is_has_air_conditioner == '1' ? 'checked' : ''); ?>

                                               class="form-check-inline" id="isHasAirConditionerYes" name="is_has_air_conditioner" onchange="isHasAirConditioner(this.value)">
                                        <label for="isHasAirConditionerYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio"
                                               value="0" <?php echo e($shop->is_has_air_conditioner == '0' ? 'checked' : ''); ?>

                                               class="form-check-inline" id="isHasAirConditionerNo" name="is_has_air_conditioner" onchange="isHasAirConditioner(this.value)">
                                        <label for="isHasAirConditionerNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                                    </div>
                                    <?php $__errorArgs = ['is_has_air_conditioner'];
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
                                <div class="form-row">
                                    <div class="col-md-3 mb-3" id="numberOfAirConditionerDiv"
                                         style="display: <?php echo e($shop->is_has_air_conditioner == '1' ? 'block' : 'none'); ?>;">
                                        <label for="numberOfAirConditioner"><?php echo e(__('shared::estates.number_of_conditioners')); ?></label>
                                        <input type="number" name="number_of_air_conditioner" value="<?php echo e($shop->number_of_air_conditioner); ?>" maxlength="2" class="form-check-inline form-control" id="numberOfAirConditioner">
                                    </div>
                                </div>
                                <div class="form-row" id="airConditionerBrandMainDiv">
                                    <div class="col-md-3 mb-3 air-conditioner-brand-div" id="airConditionerBrandDiv" style="display: <?php echo e($shop->is_has_air_conditioner == '1' ? 'block' : 'none'); ?>;">
                                        <label for="airConditionerBrand"><?php echo e(__('shared::estates.air_conditioner_brand')); ?></label>
                                        <input type="text" name="air_conditioner_brand" class="form-check-inline form-control" value="<?php echo e($shop->is_has_air_conditioner); ?>" id="airConditionerBrand">
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="form-row">
                                    <div class="col-md-12 mb-3 mt-4">
                                        <label for="isHasDecoration"><?php echo e(__('shared::estates.is_has_decoration')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" <?php echo e($shop->is_has_decoration == '1' ? 'checked' : ''); ?> class="form-check-inline" id="isHasDecorationYes" name="is_has_decoration" onchange="isHasDecoration(this.value)">
                                        <label for="isHasDecorationYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                                    </div>

                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" <?php echo e($shop->is_has_decoration == '0' ? 'checked' : ''); ?>

                                               class="form-check-inline" id="isHasDecorationNo" name="is_has_decoration" onchange="isHasDecoration(this.value)">
                                        <label for="isHasDecorationNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                                    </div>
                                    <?php $__errorArgs = ['is_has_decoration'];
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
                                <div class="form-row">
                                    <div class="col-md-6 mb-3" id="decorationDetailsDiv" style="display: none;">
                                        <label for="decorationDetails"><?php echo e(__('shared::estates.decoration_details')); ?></label>
                                        <textarea name="decoration_details"
                                                  class="form-check-inline form-control"
                                                  id="decorationDetails"
                                                  rows="4"><?php echo e($shop->decoration_details); ?></textarea>
                                    </div>
                                    <?php $__errorArgs = ['decoration_details'];
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
                                        <label for="isHasParking"><?php echo e(__('shared::estates.is_has_parking')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" <?php echo e($shop->is_has_warehouse == '1' ? 'checked' : ''); ?>

                                               class="form-check-inline"
                                               id="isHasWarehouseYes"
                                               name="is_has_warehouse"
                                               onchange="isHasWarehouse(this.value)">
                                        <label for="isHasWarehouseYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" class="form-check-inline" <?php echo e($shop->is_has_warehouse == '0' ? 'checked' : ''); ?> id="isHasWarehouseNo" name="is_has_warehouse" onchange="isHasWarehouse(this.value)">
                                        <label for="isHasWarehouseNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                                    </div>
                                    <?php $__errorArgs = ['is_has_warehouse'];
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
                                <div class="form-row">
                                    <div class="col-md-3 mb-3" id="warehouseSpaceDiv" style="display: none;">
                                        <label for="warehouseSpace"><?php echo e(__('shared::commons.space')); ?></label>
                                        <input type="text" name="warehouse_space" value="<?php echo e($shop->warehouse_space); ?>"
                                               class="form-check-inline form-control <?php $__errorArgs = ['warehouse_space'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="warehouseSpace">
                                    </div>
                                    <?php $__errorArgs = ['warehouse_space'];
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
                                        <label for="isHasParking"><?php echo e(__('shared::estates.is_has_license')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="1" <?php echo e($shop->is_has_license == '1' ? 'checked' : ''); ?> class="form-check-inline" id="isHasLicenseYes" name="is_has_license" onchange="isHasLicense(this.value)">
                                        <label for="isHasLicenseYes">&nbsp;&nbsp;<?php echo e(__('shared::commons.yes')); ?></label>
                                    </div>
                                    <div class="col-md-3 mb-3 mt-4">
                                        <input type="radio" value="0" <?php echo e($shop->is_has_license == '0' ? 'checked' : ''); ?>

                                               class="form-check-inline" id="isHasLicenseNo" name="is_has_license" onchange="isHasLicense(this.value)">
                                        <label for="isHasLicenseNo">&nbsp;&nbsp;<?php echo e(__('shared::commons.no')); ?></label>
                                    </div>
                                    <?php $__errorArgs = ['is_has_license'];
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
                                <div class="form-row">
                                    <div class="col-md-6 mb-3" id="licenseNotesDiv" style="display: none;">
                                        <label for="licenseNotes"><?php echo e(__('shared::estates.license_notes')); ?></label>
                                        <textarea name="license_notes" class="form-check-inline form-control" id="licenseNotes" rows="8"><?php echo e($shop->license_notes); ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3 mt-3">
                                        <label class="form-check-label"><?php echo e(__('shared::estates.rent_type')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeMonthly" value="monthly" <?php echo e($shop->rent_type == 'monthly' ? 'checked' : ''); ?> />
                                        <label class="form-check-label" for="rentTypeMonthly"><?php echo e(__('shared::estates.monthly')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeQuarterly" value="quarterly" <?php echo e($shop->rent_type == 'quarterly' ? 'checked' : ''); ?> />
                                        <label class="form-check-label" for="rentTypeQuarterly"><?php echo e(__('shared::estates.quarterly')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rendTypeMidterm" value="midterm" <?php echo e($shop->rent_type == 'midterm' ? 'checked' : ''); ?> />
                                        <label class="form-check-label" for="rendTypeMidterm"><?php echo e(__('shared::estates.midterm')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline col-md-2">
                                        <input class="form-check-input" type="radio" name="rent_type" id="rentTypeYearly" value="yearly" <?php echo e($shop->rent_type == 'yearly' ? 'checked' : ''); ?> />
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
                                    <div class="col-md-8 mb-3">
                                        <label for="commercialActivities"><?php echo e(__('shared::estates.commercial_activities')); ?></label>
                                        <input type="text" name="commercial_activities" value="<?php echo e($shop->getCommercialActivities()); ?>"
                                               class="form-control <?php $__errorArgs = ['commercial_activities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="commercialActivities" />
                                    </div>
                                    <?php $__errorArgs = ['commercial_activities'];
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
                                <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                        <span><code><?php echo e(__('shared::commons.using')); ?> <strong>", "</strong> <?php echo e(__('shared::commons.between_words')); ?> <quote><strong><?php echo e(__('shared::commons.example')); ?></strong> <?php echo e(__('shared::commons.electric_tools')); ?>, <?php echo e(__('shared::commons.foodstuffs')); ?>, <?php echo e(__('shared::commons.restaurants')); ?>, <?php echo e(__('shared::commons.etc')); ?>, ...</quote></code></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <!-- Start Email -->
                                    <div class="col-md-12 mb-3">
                                        <label for="extraDetails"><?php echo e(__('shared::estates.extra_details')); ?></label>
                                        <textarea class="form-control <?php $__errorArgs = ['extra_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="extra_details" id="extraDetails" rows="8"><?php echo e(old('extra_details', $shop->extra_details)); ?></textarea>
                                        <?php $__errorArgs = ['extra_details'];
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
                                    <!-- End Email -->
                                </div>
                                <hr>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><?php echo e(__('shared::estates.current_shop_images')); ?></label>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <?php $__currentLoopData = $shop->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(url('/images')); ?>/<?php echo e($image->name); ?>"><img src="<?php echo e(url('/images')); ?>/<?php echo e($image->name); ?>" alt="Apartment Image" class="img-thumbnail" width="100" height="100" /></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-row">
                                    <div class="col-md-6 mb-4">
                                        <h5 class="card-title"><?php echo e(__('shared::estates.images')); ?></h5>
                                        <?php echo $__env->make('shared::includes._uploader_', ['field' => 'images[]', 'title' => __('shared::commons.select_images'), 'multi' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                        <?php if(session()->has('images_not_found')): ?>
                                            <div>
                                            <span class="badge badge-danger">
                                                <?php echo e(__('shared::validations.images.required')); ?>

                                            </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- end of col -->
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1" <?php echo e(old('is_active', $shop->is_active) == '1' ? 'checked' : ''); ?>>
                                            <label class="custom-control-label" for="isActive">
                                                <?php echo e(__('shared::commons.active')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">
                                    <?php echo e(__('shared::actions.create')); ?>

                                </button>
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
       

        window.onload = function(){
            alert('Thanks');
        };
        let isHasAirConditioner = function(val){
            if(val === '1'){
                document.getElementById('numberOfAirConditionerDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('numberOfAirConditionerDiv').style.display = 'none';
                document.getElementById('airConditionerBrandDiv').style.display = 'none';
            }
        };
        function exec(){
            document.getElementById('numberOfAirConditioner').addEventListener('blur', function(){
                let currentValue = parseInt(this.value);
                let airConditionerBrandDiv = document.getElementById('airConditionerBrandDiv');
                if(isNaN(currentValue)){
                    airConditionerBrandDiv.style.display = 'none';
                }
                let currentBrandNodes = document.querySelectorAll('.air-conditioner-brand-div');
                if(currentValue >= 1){
                    airConditionerBrandDiv.style.display = 'block';
                    if(currentBrandNodes.length > 1){
                        let x, L = currentBrandNodes.length - 1;
                        for(x = L; x >= 1; x--){
                            currentBrandNodes[x].parentNode.removeChild(currentBrandNodes[x]);
                        }
                    }
                    for(let i=1; i<currentValue; i++){
                        let newNode = airConditionerBrandDiv.cloneNode(true);
                        document.getElementById('airConditionerBrandMainDiv').appendChild(newNode);
                    }
                }
                if(currentValue === 0){
                    document.getElementById('airConditionerBrandDiv').style.display = 'none';
                }
            });
        }
        exec();
        let isHasParking = function(val){
            if(val === '1'){
                document.getElementById('parkingNumberDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('parkingNumberDiv').style.display = 'none';
            }
        };
        let isHasDecoration = function(val){
            if(val === '1'){
                document.getElementById('decorationDetailsDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('decorationDetailsDiv').style.display = 'none';
            }
        };
        let isHasWarehouse = function(val){
            if(val === '1'){
                document.getElementById('warehouseSpaceDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('warehouseSpaceDiv').style.display = 'none';
            }
        };
        let isHasLicense = function(val){
            if(val === '1'){
                document.getElementById('licenseNotesDiv').style.display = 'block';
            }else if(val === '0'){
                document.getElementById('licenseNotesDiv').style.display = 'none';
            }
        };
        
         $(document).ready(function () {
            
            if ($('#isHasDecorationYes').is(':checked')) {
                document.getElementById('decorationDetailsDiv').style.display = 'block';
            } 
            
            if ($('#isHasLicenseYes').is(':checked')) {
                document.getElementById('licenseNotesDiv').style.display = 'block';
            }  
            
            if ($('#isHasWarehouseYes').is(':checked')) {
                document.getElementById('warehouseSpaceDiv').style.display = 'block';
            }
            
             if ($('#isHasDecorationNo').is(':checked')) {
                document.getElementById('decorationDetailsDiv').style.display = 'none';
            }
            
            
            if ($('#isHasLicenseNo').is(':checked')) {
                document.getElementById('licenseNotesDiv').style.display = 'none';
            }
            
            
              if ($('#isHasWarehouseNo').is(':checked')) {
                document.getElementById('warehouseSpaceDiv').style.display = 'none';
            }
            
    

        })
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('styling...'); ?>
    <style>
        code {
            color: #639
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/estates/shops/edit.blade.php ENDPATH**/ ?>