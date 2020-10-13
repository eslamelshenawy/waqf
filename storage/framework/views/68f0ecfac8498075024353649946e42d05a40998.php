<div class="log__-__in">
    <li class="userlog log__in">
        <a href="#">
            <img src="<?php echo e(asset('img/about1.png')); ?>" alt="user pic">
            <i class="fas fa-caret-down"></i>
        </a>
        <div class="user_dropdown">
            <ul>
                <li>
                    <a href="<?php echo e(route('Admin::root')); ?>">
                        <i class="fas fa-cog"></i>
                        لوحة التحكم
                    </a>
                </li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" id="logoutForm">
                        <?php echo csrf_field(); ?>
                        <a onclick="logout()" href="#">
                            <i class="fas fa-sign-in-alt"></i>
                            الخروج
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </li>
    <li class="notification__log log__in">
        <a href="#">
            <img src="<?php echo e(asset('img/bell.png')); ?>" alt="notifications">
            <span class="new_notifications"></span>
        </a>
        <div class="notifications_dropdown">
            <ul>
                <li>
                    <a href="#">
                        <i class="far fa-check-circle"></i>
                        الحجز
                        <span>على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي
                                                            يقرأها. ولذلك يتم استخدام طريقة ل</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-check-circle"></i>
                        الحجز
                        <span>على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي
                                                            يقرأها. ولذلك يتم استخدام طريقة ل</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-check-circle"></i>
                        الحجز
                        <span>على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي
                                                            يقرأها. ولذلك يتم استخدام طريقة ل</span>
                    </a>
                </li>
            </ul>
            <div class="see-more">
                <a href="#">مشاهدة الكل</a>
            </div>
        </div>
    </li>
</div>
<?php $__env->startSection('scripting...'); ?>
    <script>
        function logout(){
            document.getElementById('logoutForm').submit(); return false;
        }

    </script>
<?php $__env->stopSection(); ?><?php /**PATH /home1/forsama1/public_html/waqf/Modules/Client/Resources/views/layouts/partials/_admin_logged_board.blade.php ENDPATH**/ ?>