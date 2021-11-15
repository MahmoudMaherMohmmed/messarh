<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Parent Category'); ?></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php if(isset(request()->category_id)): ?>
            <?php echo Form::select('parent_id',$parents->pluck('title','id')->toArray(),null,['class'=>'form-control chosen-rtl']); ?>

        <?php else: ?>
            <?php echo Form::select('parent_id',[''=>'']+$parents->pluck('title','id')->toArray(),null,['class'=>'form-control chosen-rtl']); ?>

        <?php endif; ?>
    </div>
</div>



<div class="form-group"  id="cktextarea">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Title'); ?> <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls" >
        <ul id="myTab1" class="nav nav-tabs">
                <?php $i=0;?>
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php echo e(($i++)? '':'active'); ?>"><a href="#title<?php echo e($language->short_code); ?>" data-toggle="tab"> <?php echo e($language->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
            <?php $i=0;?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade in <?php echo e(($i++)? '':'active'); ?>" id="title<?php echo e($language->short_code); ?>">
                    <input class="form-control" name="title[<?php echo e($language->short_code); ?>]" value="<?php if($category): ?><?php echo $category->getTranslation('title',$language->short_code); ?> <?php else: ?> <?php echo e(old('title.' . $language->short_code)); ?><?php endif; ?>"/>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<br>
<br>
<br>
<br>

<div class="form-group">
    <label class="col-sm-3 col-md-2 control-label"><?php echo app('translator')->get('messages.Image.Image'); ?> </label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                <?php if($category): ?>
                    <img src="<?php echo e($category->image); ?>" alt="" />
                <?php else: ?>
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                <?php endif; ?>
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->get('messages.select_image'); ?></span>
                    <span class="fileupload-exists">Change</span>
                    <?php echo Form::file('image',["accept"=>"image/*" ,"class"=>"default"]); ?>

                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <?php echo Form::submit($buttonAction,['class'=>'btn btn-primary']); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\messarh\resources\views/category/input.blade.php ENDPATH**/ ?>