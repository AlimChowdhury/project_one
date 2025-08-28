

<?php $__env->startSection('content'); ?>
    <h2>Assign Permissions to <?php echo e($user->name); ?></h2>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-admin', auth()->user()->id)): ?>
    <a href="<?php echo e(route('admin.users', ['id' => auth()->user()->id])); ?>" class="btn btn-secondary mb-3">
        Manage Users
    </a>
    <?php endif; ?>


    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.updatePermissions', ['id' => auth()->user()->id, 'userId' => $user->id])); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="role">Role:</label>
            <select name="role" class="form-control" required>
                <option value="viewer" <?php echo e($user->role === 'viewer' ? 'selected' : ''); ?>>Viewer</option>
                <option value="editor" <?php echo e($user->role === 'editor' ? 'selected' : ''); ?>>Editor</option>
                <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
            </select>
        </div>

        <h4>Permissions</h4>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>"
                    class="form-check-input"
                    <?php echo e($user->permissions->contains($permission->id) ? 'checked' : ''); ?>>
                <label class="form-check-label"><?php echo e(ucfirst($permission->name)); ?></label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="<?php echo e(route('admin.users', auth()->user()->id)); ?>" class="btn btn-secondary mt-3">Back</a>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\project_one\resources\views/admin/assign.blade.php ENDPATH**/ ?>