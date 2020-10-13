<?php $__env->startSection('top-navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-content'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
  Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripting...'); ?>
  <script>

    let targetUrl = null;

    function choiceUserType(val){

      let choiceBtn = document.getElementById('choiceBtn');

      switch (val) {
        case 'beneficiary':
          choiceBtn.removeAttribute('disabled');
          targetUrl = '/beneficiaries/register';
          break;
        case 'tenant':
          choiceBtn.removeAttribute('disabled');
          targetUrl = '/tenants/register';
          break;
        case 'agency':
          choiceBtn.removeAttribute('disabled');
          targetUrl = '/agencies/register';
          break;
      }
    }

    function redirectToUserForm(){
      let userTypeForm = document.getElementById('userTypeForm');
      userTypeForm.action = targetUrl;
      userTypeForm.submit();

    }



  </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <main class="register_main">

<section class="register register--bg_prim">
  <div class="container">
    <div class="heading">
      <h2>
        تسجيل حساب جديد
        <span class="line"></span>
      </h2>
      <p>
        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
        سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات
        في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
        تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدا
      </p>
    </div>

    <form action="" name="user_type_form" id="userTypeForm">
      <div class="checkbox_group">
        <div class="form-check">
          <input
                  class="form-check-input custom_checkbox"
                  type="radio"
                  name="user_type"
                  id="beneficiary"
                  value="beneficiary"
                  required
                  onchange="choiceUserType(this.value)"
          />
          <label class="form-check-label" for="beneficiary">
            <span class="circle"></span>
            مستفيد من الوقف
          </label>
        </div>
        <div class="form-check">
          <input
                  class="form-check-input custom_checkbox"
                  type="radio"
                  name="user_type"
                  id="tenant"
                  value="tenant"
                  required
                  onchange="choiceUserType(this.value)"
          />
          <label class="form-check-label" for="tenant">
            <span class="circle"></span>
            المستأجرين
          </label>
        </div>

        <div class="form-check">
          <input
                  class="form-check-input custom_checkbox"
                  type="radio"
                  name="user_type"
                  id="agency"
                  value="agency"
                  required
                  onchange="choiceUserType(this.value)"
          />
          <label class="form-check-label" for="agency">
            <span class="circle"></span>
            وكالات الصيانة
          </label>
        </div>

      </div>
    </form>
  </div>
</section>
<div>
  <div class="container">
    <div class="row">
      <div class="col">
        <button disabled onclick="redirectToUserForm()"
                style="display: block;
							margin: 0 auto;
							width: 40%;
							margin-bottom: 15px;
							color: #741b40;
							height: 50px;
							border: none;
							outline: none;
							font-family: _Bold;
							border-radius: 7px;
							font-size: 20px;
                            background-color: #f0f0f0";
                class="btn btn-lg"
                id="choiceBtn"
                type="submit"
        >
          استمرار
        </button>
        <div class="logo__footer text-center">
          <img src="img/logo-footer.png" alt="" style="width: 160px;" />
        </div>
      </div>
    </div>
  </div>
</div>
  </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('client::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Client\Resources/views/register.blade.php ENDPATH**/ ?>