<?php $__env->startSection('content'); ?>
  <h1><?php echo e($album->name); ?></h1>
  <a class="button secondary" href="/">Go Back</a>
  <a class="button" href="/photos/create/<?php echo e($album->id); ?>">Upload Photo To Album</a>
  <hr>
  <?php if(count($album->photos) > 0): ?>
    <?php
      $colcount = count($album->photos);
  	  $i = 1;
    ?>
    <div id="photos">
      <div class="row text-center">
        <?php $__currentLoopData = $album->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($i == $colcount): ?>
            <div class='medium-4 columns end'>
            <a href="/photos/<?php echo e($photo->id); ?>">
                <img class="thumbnail" src="/storage/photos/<?php echo e($photo->album_id); ?>/<?php echo e($photo->filename); ?>" alt="<?php echo e($photo->title); ?>">
              </a>
             <br>
             <h4><?php echo e($photo->title); ?></h4>
          <?php else: ?>
            <div class='medium-4 columns'>
              <a href="/photos/<?php echo e($photo->id); ?>">
                 <img class="thumbnail" src="/storage/photos/<?php echo e($photo->album_id); ?>/<?php echo e($photo->filename); ?>" alt="<?php echo e($photo->title); ?>">
               </a>
              <br>
              <h4><?php echo e($photo->title); ?></h4>
          <?php endif; ?>
        	<?php if($i % 3 == 0): ?>
          </div></div><div class="row text-center">
        	<?php else: ?>
            </div>
          <?php endif; ?>
        	<?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php else: ?>
    <p>No Photos To Display</p>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>