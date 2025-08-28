

<?php $__env->startSection('content'); ?>
    <h2>All Users</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div>
         <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary mt-3">Post</a>
    </div>

   <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Manage Permissions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e(ucfirst($user->role)); ?></td>
                    <td>
                        <?php
                            $adminId = auth()->user()->id;
                        ?>
                        <a href="<?php echo e(route('admin.editPermissions', ['id' => $adminId, 'userId' => $user->id])); ?>"
                            class="btn btn-sm btn-primary">
                            Edit Permissions
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/admin/users.blade.php ENDPATH**/ ?>