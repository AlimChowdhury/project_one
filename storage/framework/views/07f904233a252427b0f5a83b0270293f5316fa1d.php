

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <h2 class="card-title mb-4">Welcome, <?php echo e(Auth::user()->name); ?></h2>

                <?php if(Auth::user()->profile_picture): ?>
                    <img src="<?php echo e(asset('storage/' . Auth::user()->profile_picture)); ?>" alt="Profile Picture"
                        class="rounded-circle mb-3" width="150">
                <?php endif; ?>

                <p><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
                <p><strong>Phone:</strong> <?php echo e(Auth::user()->phone); ?></p>
                <p><strong>Bio:</strong> <?php echo e(Auth::user()->bio); ?></p>
                <p><strong>Division:</strong> <?php echo e(Auth::user()->division->name ?? 'N/A'); ?></p>
                <p><strong>District:</strong> <?php echo e(Auth::user()->district->name ?? 'N/A'); ?></p>
                <p><strong>Upazila:</strong> <?php echo e(Auth::user()->upazila->name ?? 'N/A'); ?></p>


                <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary mt-3">Edit Profile</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/profile.blade.php ENDPATH**/ ?>