<?php $__env->startSection('content'); ?>
<section class="users">
    <div class="container">
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo \Session::get('success'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="offset-3 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title"><br><h4>Settings</h4><br></div>
                        <hr>
                        <form  method="POST" action="<?php echo e(route('Admin::setting.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_title"><?php echo e(__('admin::dashboard.settings_site_title')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_title" name="data[site_title_ar]" <?php if(isset($setting['site_title_ar'])): ?> value="<?php echo e($setting['site_title_ar']); ?>" <?php endif; ?> placeholder="<?php echo e(__('admin::dashboard.settings_site_title')); ?>" required="true"->
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_email"><?php echo e(__('admin::dashboard.settings_site_email')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_email" name="data[site_email]" <?php if(isset($setting['email'])): ?>  value="<?php echo e($setting['email']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_site_email')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_mobile"><?php echo e(__('admin::dashboard.settings_site_mobile')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_mobile" name="data[site_mobile]" <?php if(isset($setting['site_mobile'])): ?>  value="<?php echo e($setting['site_mobile']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_site_mobile')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_phone"><?php echo e(__('admin::dashboard.settings_site_phone')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_phone" name="data[site_phone]" <?php if(isset($setting['site_phone'])): ?>  value="<?php echo e($setting['site_phone']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_site_phone')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="facebook_url"><?php echo e(__('admin::dashboard.settings_facebook_url')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="facebook_url" name="data[facebook_url]" <?php if(isset($setting['facebook_url'])): ?>  value="<?php echo e($setting['facebook_url']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_facebook_url')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="twitter_url"><?php echo e(__('admin::dashboard.settings_twitter_url')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="twitter_url" name="data[twitter_url]" <?php if(isset($setting['twitter_url'])): ?>  value="<?php echo e($setting['twitter_url']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_twitter_url')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="instagram"><?php echo e(__('admin::dashboard.settings_instgram_url')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="instagram" name="data[instagram]" <?php if(isset($setting['instagram'])): ?>  value="<?php echo e($setting['instagram']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_instgram_url')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!---------------whats up-------------->
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_whatup"><?php echo e(__('admin::dashboard.settings_site_whatup')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="site_whatup" name="data[site_whatup]" <?php if(isset($setting['site_whatup'])): ?>  value="<?php echo e($setting['site_whatup']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_site_whatup')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!------------about us------------->
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_aboutus"><?php echo e(__('admin::dashboard.settings_site_aboutus_ar')); ?></label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control" id="site_aboutus" name="data[site_aboutus_ar]"   placeholder="<?php echo e(__('admin::dashboard.settings_site_aboutus_ar')); ?>" required="true"><?php if(isset($setting['site_aboutus_ar'])): ?>  <?php echo e($setting['site_aboutus_ar']); ?> <?php endif; ?></textarea>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!-----site_addresse------------>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="site_addresse_ar"><?php echo e(__('admin::dashboard.settings_site_addresse')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" id="site_addresse_ar" name="data[site_addresse_ar]" <?php if(isset($setting['site_addresse_ar'])): ?>  value="<?php echo e($setting['site_addresse_ar']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.settings_site_addresse')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <!-----Mobile App Link------------>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="playStoreLink"><?php echo e(__('admin::dashboard.playStoreLink')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" id="playStoreLink" name="data[playStoreLink]" <?php if(isset($setting['playStoreLink'])): ?>  value="<?php echo e($setting['playStoreLink']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.playStoreLink')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-2 control-label" for="aplleStoreLink"><?php echo e(__('admin::dashboard.aplleStoreLink')); ?></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="aplleStoreLink" name="data[aplleStoreLink]" <?php if(isset($setting['aplleStoreLink'])): ?>  value="<?php echo e($setting['aplleStoreLink']); ?>" <?php endif; ?>  placeholder="<?php echo e(__('admin::dashboard.aplleStoreLink')); ?>">
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>











                            </div>

                            <hr>
                            <button type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripting...'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/settings/edit.blade.php ENDPATH**/ ?>