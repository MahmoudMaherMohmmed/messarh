<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Key'); ?>*</label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::text('key_word',old('key_word'), ['class'=>'form-control input-lg','required' => 'required']); ?>

    </div>
</div>

<div class="form-group text_field1">
  <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Value'); ?> *</label>
  <div class="col-sm-9 col-lg-10 controls tabbable">
      <ul id="myTab1" class="nav nav-tabs">
        <?php $i=0;?>
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php echo e(($i++)? '':'active'); ?>"><a href="#translations<?php echo e($language->short_code); ?>" data-toggle="tab"> <?php echo e($language->title); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>

      <div class="tab-content">
        <?php $i=0;?>
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane fade in <?php echo e(($i++)? '':'active'); ?>" id="translations<?php echo e($language->short_code); ?>">
             <?php echo Form::textarea("translations[$language->id]",(isset($static_translation)) ? $static_translation->getBody($language->short_code):null, ['class'=>'form-control input-lg ckeditor','placeholder'=>"$language->title"]); ?>

          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
  </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <?php echo Form::button('<i class="fa fa-check"></i> '.\Lang::get("messages.save").'',['type'=>'submit','class'=>'btn btn-primary']); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\messarh\resources\views/static_translation/_form.blade.php ENDPATH**/ ?>