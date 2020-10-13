<?php $__env->startSection('content'); ?>

    <section class="pages">
        <div class="container" id="page">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo e(route('Admin::buildings.index')); ?>" class="float-right">&times;</a>
                    <div class="clearfix"></div>
                    <div class="card-title"><br><h4><?php echo e(__('admin::dashboard._page', ['something' => __('shared::actions.edit')])); ?></h4><br></div>
                    <hr>

                    <form class="needs-validation" novalidate method="POST" action="<?php echo e(route("Admin::pages.update", $page->slug)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <input type="hidden"   id="slug_type" value="<?php echo e($page->slug); ?>" name="slug_type" />
                        <div class="form-row">
                            <!-- Start District -->
                            <div class="col-md-4 mb-2 m-0">
                                <input type="text" class="form-control" name="title"
                                       id="title" value="<?php echo e($page->title); ?>"
                                       placeholder="<?php echo e(__('shared::commons.title')); ?>"  readonly/>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">حفظ </button>
                            </div>
                        </div>
                        <input type="hidden"   id="content" value="<?php echo e($page->content); ?>" name="content" />
                        <input name="post" id="post" type="hidden" data-post-id="<?php echo e($page->content); ?>">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div id="editor" style="height: 400px;">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <iframe src="<?php echo e(url('pages')); ?>/<?php echo e($page->slug); ?>" width="100%" height="444px">
                                </iframe>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles...'); ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripting...'); ?>

    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function() {
            console.log(quill.getContents().ops[0].insert);
            $('#content').val(quill.getContents().ops[0].insert);
        });

        $(document).ready(function(){
            var conten = $('#content').val();
            if(conten != null ){
                // $('#content').val(conten);
                var postId = $('#post').data("post-id");
                quill.setContents({
                    "ops":[
                        {"insert":postId}
                    ]
                });
            }
        });

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Admin/Resources/views/pages/edit.blade.php ENDPATH**/ ?>