<?php $__env->startSection('content'); ?>
    <section >
        <div class="container" >
            <?php echo $__env->make('accounting::layouts.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">


                            <?php echo $__env->make('accounting::accounts.partials._new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="table-responsive">
                                <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('create accountings') ||auth()->user()->can('create accounts')): ?>
                                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success" id="addBtn" data-toggle="modal" data-target="#modalSubscriptionForm"><i
                                                    class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                                <?php endif; ?>

                                <table id="multicolumn_ordering_tabl" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Parent</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">TypeMenu</th>
                                        <th class="text-center">Balance</th>
                                        <th class="text-center"><i class="fas fa-times"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($accounts && $accounts->count()): ?>
                                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            if($account->parent_id != null ){
                                               $namAccount= @$account->account->name;
                                            }
                                            ?>
                                            <tr>

                                                <td scope="row"><?php echo e($account->id); ?></td>
                                                <td scope="row"><?php echo e($account->code); ?></td>
                                                <td scope="row"><?php echo e(@$namAccount); ?></td>
                                                <td scope="row"><?php echo e($account->name); ?></td>
                                                <td scope="row"><?php echo e($account->type); ?></td>
                                                <td scope="row"><?php echo e($account->typeMenu); ?></td>
                                                <td scope="row"><?php echo e($account->typeMenu == "دائنه" ? $account->creditFirst - $account->debitFrist : $account->debitFrist - $account->creditFirst); ?></td>
                                                <td scope="row">
                                                    <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update accountings')||auth()->user()->can('update accounts')): ?>
                                                        <a href="<?php echo e(url('en/accounting/accounts/edit', $account->id)); ?>" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('delete accountings') ||auth()->user()->can('delete accounts')): ?>

                                                        <form style="display: none;" method="POST" action="<?php echo e(url('api/accounts/remove', $account->id)); ?>" id="form-<?php echo e($account->id); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('post'); ?>
                                                            <input type="hidden" name="id" value="<?php echo e($account->id); ?>" />

                                                        </form>
                                                        <a href="JavaScript:void(0);" class="text-danger mr-2"
                                                           onclick="deleteEstate(<?php echo $account->id; ?>)">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts...'); ?>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('scripting...'); ?>
    <script>
        $('#multicolumn_ordering_tabl').DataTable({
            language: {
                "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing":   "جارٍ التحميل...",
                "sLengthMenu":   "أظهر _MENU_ مدخلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix":  "",
                "sSearch":       "ابحث:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "الأول",
                    "sPrevious": "السابق",
                    "sNext":     "التالي",
                    "sLast":     "الأخير"
                },
                "oAria": {
                    "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });




        function deleteEstate(estate_id){
            Swal.fire({
                title: 'هل انت متاكد من الالغاء',
                text: "لن تتمكن من التراجع عن هذا",
                icon: 'تحذير',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'تم الالغاء',
                        'تم الغاء ',
                        'نجاح'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${estate_id}`).submit();
                    }, 2000);

                }
            });
            alertify.error("لم يتم انشاء حساب جديد ");
            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
<?php $__env->stopSection(); ?>













































































































<?php echo $__env->make('accounting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Accounting\Resources/views/accounts/index.blade.php ENDPATH**/ ?>