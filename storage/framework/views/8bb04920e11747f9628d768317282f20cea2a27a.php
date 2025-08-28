<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .sidebar {
            width: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            height: 100vh;
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
            color: #333333ff;
            text-decoration: none;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .container-flex {
            display: flex;
        }
    </style>
</head>

<body>
    <div class="container-flex">
        <div class="sidebar">
            <h4>Dashboard</h4>
            <a href="<?php echo e(route('admin.users', ['id' => Auth::user()->id])); ?>">Users Permission</a>
            <a href="<?php echo e(route('posts.index')); ?>">Posts</a>
            <a href="<?php echo e(route('user-dropdown')); ?>" class="btn btn-primary">Filter User</a>


        </div>

        <div class="main-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\Users\User\Desktop\project_one\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>