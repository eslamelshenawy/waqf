<?php $__env->startSection('content'); ?>
<?php echo $__env->make('shared::includes._md_', [], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="tenants">
    <div class="container" id="tenantContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="<?php echo e(route('Admin::buildings.index')); ?>" class="float-right">&times;</a>
                        <div class="clearfix"></div>
                        <div class="card-title"><br><h4><?php echo e(__('shared::estates.building', ['something' => __('shared::actions.new')])); ?></h4><br></div>
                        <hr>
                    <form class="needs-validation" novalidate method="POST"
                          action="<?php echo e(route('Admin::buildings.store')); ?>"
                          autocomplete="off" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <!-- Start District -->
                            <div class="col-md-6 mb-2">
                                <label for="name"><?php echo e(__('shared::commons.name')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                       id="name" value="<?php echo e(old('name')); ?>"
                                       placeholder="<?php echo e(__('shared::commons.name')); ?>" required>
                                <?php $__errorArgs = ['name'];
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
                        <!-- End Name -->
                        <div class="form-row">
                            <!-- Start City Number -->
                            <div class="col-md-3 mb-3">
                                <?php $city = app('\App\City'); ?>
                                <label for="identity_number"><?php echo e(__('shared::commons.city')); ?></label>
                                <select class="form-control" name="city">
                                    <option selected disabled><?php echo e(__('shared::actions.select')); ?></option>
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
                            <!-- End City Number -->
                            <!-- Start District -->
                            <div class="col-md-5 mb-2">
                                <label for="district"><?php echo e(__('shared::estates.district')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="district"
                                       id="district" value="<?php echo e(old('district')); ?>" placeholder="<?php echo e(__('shared::estates.district')); ?>" required>
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
                            <!-- End District -->
                            <!-- Start District -->
                            <div class="col-md-5 mb-2">
                                <label for="street"><?php echo e(__('shared::estates.street')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="street"
                                       id="street" value="<?php echo e(old('street')); ?>" placeholder="<?php echo e(__('shared::estates.street')); ?>" required>
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
                            <!-- End District -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-2">
                                <label for="number"><?php echo e(__('shared::commons.number')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="number"
                                       id="number" value="<?php echo e(old('number')); ?>" placeholder="<?php echo e(__('shared::commons.number')); ?>"maxlength="10" required>
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
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-2">
                                <label for="space"><?php echo e(__('shared::commons.space')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['space'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="space"
                                       id="space" value="<?php echo e(old('space')); ?>"
                                       placeholder="<?php echo e(__('shared::commons.space')); ?>"maxlength="10" required>
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
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-2">
                                <label for="price"><?php echo e(__('shared::commons.price')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="9" name="price"
                                       id="price" value="<?php echo e(old('price')); ?>" placeholder="<?php echo e(__('shared::commons.price')); ?>" required>
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
                            <!-- End Building Number -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-10 mb-2">
                                <table class="table table-borderless text-center">
                                    <tr>
                                        <td colspan="1"><h5><?php echo e(__('shared::commons.number_of')); ?></h5></td>
                                        <td style="width: 100px;"><label for="number_of_apartments"><?php echo e(__('shared::estates.apartments')); ?></label></td>
                                        <td style="width: 100px;"><label for="number_of_floors"><?php echo e(__('shared::estates.floors')); ?></label></td>
                                        <td style="width: 100px;"><label for="number_of_apartments"><?php echo e(__('shared::estates.shops')); ?></label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td><input type="number" maxlength="10" class="field form-control <?php $__errorArgs = ['number_of_apartments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="number_of_apartments"
                                                   id="numberOfApartments" value="<?php echo e(old('number_of_apartments')); ?>" placeholder="0" required></td>
                                        <td><input type="number" maxlength="10" class="field form-control <?php $__errorArgs = ['number_of_floors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="number_of_floors"
                                                   id="numberOfFloors" value="<?php echo e(old('number_of_floors')); ?>" placeholder="0" required></td>
                                        <td><input type="number" maxlength="10" class="field form-control <?php $__errorArgs = ['number_of_shops'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="number_of_shops" id="numberOfShops" value="<?php echo e(old('number_of_shops')); ?>" placeholder="0" required></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                       <hr>
                        <div class="form-row">
                            <!-- Start Building Number -->
                            <div class="col-md-4 mb-1">
                                <label for="instrumentNumber"><?php echo e(__('shared::estates.instrument_number')); ?></label>
                                <input type="text"
                                       class="form-control"
                                       name="instrument_number"
                                       id="instrumentNumber" value="<?php echo e(old('instrument_number')); ?>"
                                       placeholder="<?php echo e(__('shared::estates.instrument_number')); ?>" required>
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
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-1">
                                <label for="instrumentDataAt"><?php echo e(__('shared::estates.instrument_date')); ?></label>
                                <input type="date" maxlength="10" class="field form-control <?php $__errorArgs = ['instrument_date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="instrument_date_at"
                                       id="instrumentDataAt" value="<?php echo e(old('instrument_date_at')); ?>" required>
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
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-4 mb-1">
                                <label for="court"><?php echo e(__('shared::estates.court')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['court'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="court"
                                       id="courtName" value="<?php echo e(old('court')); ?>" placeholder="<?php echo e(__('shared::estates.court')); ?>" required>
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
                            <!-- End Building Number -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-1">
                                <label for="constructionLicenseNumber"><?php echo e(__('shared::estates.construction_license_number')); ?></label>
                                <input type="text" class="field form-control <?php $__errorArgs = ['construction_license_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="construction_license_number"
                                       id="constructionLicenseNumber" value="<?php echo e(old('construction_license_number')); ?>"
                                       placeholder="<?php echo e(__('shared::estates.construction_license_number')); ?>" required>
                                <?php $__errorArgs = ['construction_license_number'];
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
                            <!-- End Building Number -->
                            <!-- Start Building Number -->
                            <div class="col-md-3 mb-1">
                                <label for="constructionLicenseDateAt"><?php echo e(__('shared::estates.construction_license_date')); ?></label>

                                <input type="date" class="field form-control <?php $__errorArgs = ['construction_license_date_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="construction_license_date_at"
                                       id="constructionLicenseDateAt" value="<?php echo e(old('construction_license_date_at')); ?>"
                                       placeholder="<?php echo e(__('shared::estates.construction_license_date')); ?>" required>
                                <?php $__errorArgs = ['construction_license_date_at'];
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
                            <!-- End Building Number -->
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label class="form-check-label"><?php echo e(__('shared::estates.estate_type')); ?></label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="buildingTypeResidential"
                                           name="usage_type[]" value="residential" <?php echo e(old('usage_type.0') == 'residential' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="buildingTypeResidential"><?php echo e(__('shared::estates.residential')); ?></label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="buildingTypeCommerical"
                                           name="usage_type[]" value="commercial" <?php echo e(old('usage_type.1') == 'commercial' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="buildingTypeCommercial"><?php echo e(__('shared::estates.commercial')); ?></label>
                                </div>
                            </div>

                            <?php $__errorArgs = ['usage_type'];
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
                        <hr>
                        <label>صوره</label>
                        <?php echo $__env->make('shared::includes._uploader_', ['field' => 'instrument_image', 'title' => __('اختار صوره')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php $__errorArgs = ['instrument_image'];
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
                        <hr>
                        <label><?php echo e(__('shared::estates.building_license_image')); ?></label>
                        <?php echo $__env->make('shared::includes._uploader_', ['field' => 'building_license_image', 'title' => __('shared::estates.license_image') ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php $__errorArgs = ['building_license_image'];
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
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="extraDetails"><?php echo e(__('shared::commons.extra_details')); ?></label>
                                <textarea name="extra_details"
                                          class="form-control <?php $__errorArgs = ['extra_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          rows="8"
                                          id="extraDetails"><?php echo e(old('extra_details')); ?></textarea>
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
                        </div>
                        <!-- Bank account number -->
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-4 mt-2">
                                <label class="form-check-label"><?php echo e(__('shared::commons.rent_type')); ?></label>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="rent_type" id="rentTypeMonthly"
                                           value="monthly" <?php if(old('rent_type') == 'monthly'): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="inlineCheckbox1"><?php echo e(__('shared::commons.monthly')); ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rent_type"
                                           id="rentTypeQuarterly"
                                           value="quarterly" <?php if(old('rent_type') == 'quarterly'): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="inlineCheckbox1"><?php echo e(__('shared::commons.quarterly')); ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="rent_type"
                                           id="rendTypeMidterm" value="midterm" <?php if(old('rent_type') == 'midterm'): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="inlineCheckbox1"><?php echo e(__('shared::commons.midterm')); ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="rent_type"
                                           id="rentTypeYearly" value="yearly" <?php if(old('rent_type') == 'yearly'): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="inlineCheckbox1"><?php echo e(__('shared::commons.yearly')); ?></label>
                                </div>
                            </div>
                            <?php $__errorArgs = ['rent_type'];
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
                        <hr>
                        <div class="form-row">
                            <!-- end of col -->
                            <div class="col-md-6 mb-4">
                                <h5 class="card-title"><?php echo e(__('shared::estates.building_images')); ?></h5>
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
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
                                    <label class="custom-control-label" for="isActive"><?php echo e(__('shared::commons.active')); ?></label>
                                </div>
                            </div>
                        </div>






















                        <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded btn-sm m-1 mt-3">
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
<?php $__env->startSection('scripting...'); ?>


    <script>

        let email = document.getElementById('email');
    email.addEventListener('keyup', function(){
        axios.post('/api/email-checker', {
            email: document.getElementById('email').value
        })
        .then((response) => {
            if(response.data === true){
                document.getElementById('email').classList.add("border", "border-danger");
                document.getElementById('invalidEmailMsg').style.display = 'block';
            }

        })
    });
    let counter = 0;
    let deleteKid = function(nodeNo){
        document.getElementById('removeBtn-' + nodeNo).addEventListener('click', function(e){
            let kidNode = document.getElementById('kid-' + nodeNo);
            kidNode.remove();
            counter -= 1;
        });
    };
    let handleKids = function(val){
        if(val === '1'){
            document.getElementById('kids').style.display = 'block';
            document.getElementById('addKid').style.display = 'block';
        }
        if(val === '0'){
            document.getElementById('kids').style.display = 'none';
            document.getElementById('addKid').style.display = 'none';
        }
    };
    document.getElementById('name').focus();
    document.getElementById('email').value = '';
    let martialStatusElement = document.getElementById('maritalStatus');
    let haveKidsElement = document.getElementById('haveKids');
    let isHasKids = false;
    let maritalStatus = 'single';
    martialStatusElement.addEventListener('change', function(){
        maritalStatus = martialStatusElement.value;

        if(maritalStatus === 'single'){
            haveKidsElement.style.display = 'none';
        }
        else if(maritalStatus === 'married'){
            haveKidsElement.style.display = 'block';

        }else if(maritalStatus === 'widower'){
            haveKidsElement.style.display = 'block';
        }else if(maritalStatus === 'divorcee'){
            haveKidsElement.style.display = 'block';
        }
    });
    document.getElementById('addKid').addEventListener('click', function(e){
        counter += 1;
        let kidsDiv = document.getElementById('kids');
        let mainDiv = document.createElement('div');
        mainDiv.setAttribute('id', 'kid-' + counter);
        let kidId = document.createElement('input');
        kidId.setAttribute('type', 'hidden');
        kidId.setAttribute('name', 'kid_id[]');
        kidId.value = counter;
        mainDiv.appendChild(kidId);
        let topColumn = document.createElement('div');
        topColumn.setAttribute('class', 'form-row');
        let topColumnCell = document.createElement('div');
        topColumnCell.setAttribute('class', 'col-md-12 mb-3');
        topColumn.appendChild(topColumnCell);
        mainDiv.appendChild(topColumn);
        let btnRemove = document.createElement('button');
        btnRemove.setAttribute('type', 'button');
        btnRemove.setAttribute('class', 'btn btn-danger btn-raised-primary btn-lg btn-rounded m-1 mt-3 float-right');
        btnRemove.setAttribute('id', 'removeBtn-' + counter);
        btnRemove.setAttribute('onclick', 'deleteKid('+ counter +')');
        btnRemove.innerHTML = '&times;';
        topColumnCell.appendChild(btnRemove);
        let firstColumn = document.createElement('div');
        firstColumn.setAttribute('class', 'form-row');
        let firstColumnFirstInput = document.createElement('div');
        firstColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');
        let firstColumnSecondInput = document.createElement('div');
        firstColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');
        let secondColumn = document.createElement('div');
        secondColumn.setAttribute('class', 'form-row');
        let secondColumnFirstInput = document.createElement('div');
        secondColumnFirstInput.setAttribute('class', 'col-md-6 mb-3');
        let secondColumnSecondInput = document.createElement('div');
        secondColumnSecondInput.setAttribute('class', 'col-md-6 mb-3');
        let nameLabel = document.createElement('label');
        nameLabel.innerHTML = 'Name';
        let identityLabel = document.createElement('label');
        identityLabel.innerHTML = 'Identity Number';
        let genderLabel = document.createElement('label');
        genderLabel.innerHTML = 'Gender';
        let genderSelect = document.createElement('select');
        genderSelect.setAttribute('name', 'kid_gender[]');
        genderSelect.setAttribute('class', 'form-control');
        let maleOption = document.createElement('option');
        let femaleOption = document.createElement('option');
        maleOption.setAttribute('value', 'male');
        maleOption.innerHTML = 'Male';
        femaleOption.setAttribute('value', 'female');
        femaleOption.innerHTML = 'Female';
        genderSelect.appendChild(maleOption);
        genderSelect.appendChild(femaleOption);
        let birthOfDateLabel = document.createElement('label');
        birthOfDateLabel.innerHTML = 'Birth of Date';
        let birthOfDateInput = document.createElement('input');
        birthOfDateInput.setAttribute('type', 'date');
        birthOfDateInput.setAttribute('class', 'form-control');
        birthOfDateInput.setAttribute('name', 'kid_birth_of_date_at[]');
        secondColumnFirstInput.appendChild(genderLabel);
        secondColumnFirstInput.appendChild(genderSelect);
        secondColumnSecondInput.appendChild(birthOfDateLabel);
        secondColumnSecondInput.appendChild(birthOfDateInput);
        let nameInput = document.createElement('input');
        nameInput.setAttribute('type', 'text');
        nameInput.setAttribute('class', 'form-control');
        nameInput.setAttribute('name', 'kid_name[]');
        nameInput.placeholder = 'Name';
        let identityInput = document.createElement('input');
        identityInput.setAttribute('type', 'text');
        identityInput.setAttribute('class', 'form-control');
        identityInput.setAttribute('name', 'kid_identity_number[]');
        identityInput.placeholder = 'Identity Number';
        let line = document.createElement('hr');
        // col-md-12 mb-3 //
        firstColumnFirstInput.appendChild(nameLabel);
        firstColumnFirstInput.appendChild(nameInput);
        firstColumnSecondInput.appendChild(identityLabel);
        firstColumnSecondInput.appendChild(identityInput);
        firstColumn.appendChild(firstColumnFirstInput);
        firstColumn.appendChild(firstColumnSecondInput);
        secondColumn.appendChild(secondColumnFirstInput);
        secondColumn.appendChild(secondColumnSecondInput);
        mainDiv.appendChild(firstColumn);
        mainDiv.appendChild(secondColumn);
        mainDiv.appendChild(line);
        kidsDiv.appendChild(mainDiv);
    });
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.4/jstree.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ67H5QBLVTdO2pnmEmC2THDx95rWyC1g&libraries=places&callback=initAutocomplete" async defer></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/estates/buildings/create.blade.php ENDPATH**/ ?>