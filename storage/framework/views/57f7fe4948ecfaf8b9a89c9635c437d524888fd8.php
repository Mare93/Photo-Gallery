<?php $__env->startSection('content'); ?>
    <h3>Create Album</h3>

  <?php echo Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <?php echo e(Form::text('name','',['placeholder' => 'Album Name'])); ?>

    <?php echo e(Form::textarea('description','',['placeholder' => 'Album Description'])); ?>

    <?php echo e(Form::file('cover_image')); ?>

    <?php echo e(Form::submit('submit')); ?>

  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>