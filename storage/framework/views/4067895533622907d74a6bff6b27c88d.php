<?php $__env->startSection('title', @$title); ?>

<?php $__env->startSection('content'); ?>

  <section class="breadcrumb-wrapper py-4 border-top">
    <div class="container-xxl">
      <ul class="breadcrumbs">
        <li><a href="javascript:void();">Home</a></li>
        <li>Account</li>
      </ul>
    </div>
  </section>
  <section class="furniture_myaccount_wrap pt-4">
    <div class="container flow-rootX3">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="fw-normal mt-0 font45 c--blackc">Account</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="my_account_wrap">
            <?php echo $__env->make('frontend.pages.user.includes.profile-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="right_content">
              <div class="profile_details h-100 overflow-hidden border flow-rootX2">
                <div class="heading d-flex justify-content-between align-items-center border-bottom pb-4">
                  <h2 class="font25 fw-medium m-0">Profile Details</h2>
                  <a href="<?php echo e(route('user.profile.edit')); ?>" class="btn btn-outline-dark px-5 py-3"
                    title="Edit Details">Edit Details</a>
                </div>
                <div class="info">
                  <ul class="profiledetails">
                    <li>Mobile No</li>
                    <li><?php echo e($user->phone ?? 'N/A'); ?></li>
                    <li>Full Name</li>
                    <li><?php echo e($user->name); ?></li>
                    <li>Email</li>
                    <li><?php echo e($user->email); ?></li>
                    <li>Gender</li>
                    <li><?php echo e($user->gender_text); ?></li>
                    <li>Date of Birth</li>
                    <li><?php echo e($user->dob ? date('d/m/Y', strtotime($user->dob)) : 'N/A'); ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/pages/user/profile-details.blade.php ENDPATH**/ ?>