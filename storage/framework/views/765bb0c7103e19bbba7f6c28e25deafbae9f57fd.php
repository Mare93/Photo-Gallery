<?php $__env->startSection('content'); ?>
  <h3><?php echo e($photo->title); ?></h3>
  <p><?php echo e($photo->description); ?></p>
  <a href="/albums/<?php echo e($photo->album_id); ?>">Back To Gallery</a>
  <hr>
  <img src="/storage/photos/<?php echo e($photo->album_id); ?>/<?php echo e($photo->filename); ?>" alt="<?php echo e($photo->title); ?>">
  <br><br>
  <?php echo Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']); ?>

    <?php echo e(Form::hidden('_method', 'DELETE')); ?>

    <?php echo e(Form::submit('Delete Photo', ['class' => 'button alert'])); ?>

  <?php echo Form::close(); ?>

  <hr>
  <small>Size: <?php echo e($photo->size); ?></small>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>