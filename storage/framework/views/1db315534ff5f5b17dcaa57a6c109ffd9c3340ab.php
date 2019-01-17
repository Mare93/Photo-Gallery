<?php $__env->startSection('content'); ?>
  <?php if(count($albums) > 0): ?>
    <?php
      $colcount = count($albums);
  	  $i = 1;
    ?>
    <div id="albums">
      <div class="row text-center">
        <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($i == $colcount): ?>
             <div class='medium-4 columns end'>
               <a href="/albums/<?php echo e($album->id); ?>">
                  <img class="thumbnail" src="storage/album_covers/<?php echo e($album->cover_image); ?>" alt="<?php echo e($album->name); ?>">
                </a>
               <br>
               <h4><?php echo e($album->name); ?></h4>
          <?php else: ?>
            <div class='medium-4 columns'>
              <a href="/albums/<?php echo e($album->id); ?>">
                <img class="thumbnail" src="storage/album_covers/<?php echo e($album->cover_image); ?>" alt="<?php echo e($album->name); ?>">
              </a>
              <br>
              <h4><?php echo e($album->name); ?></h4>
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
    <p>No Albums To Display</p>
  <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>