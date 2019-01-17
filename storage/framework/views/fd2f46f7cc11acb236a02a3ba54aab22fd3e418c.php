<?php $__env->startSection('content'); ?>
  <h3>Upload Photo</h3>
  <?php echo Form::open(['action' => 'PhotosController@store','method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <?php echo e(Form::text('title','',['placeholder' => 'Photo Title'])); ?>

    <?php echo e(Form::textarea('description','',['placeholder' => 'Photo Description'])); ?>

    <?php echo e(Form::hidden('album_id', $album_id)); ?>

    <?php echo e(Form::file('photo')); ?>

    <?php echo e(Form::submit('submit')); ?>

  <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>