
<?php echo $__env->make('content.select_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content Type'); ?><span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::select('content_type_id', $content_types->pluck('title', 'id'), null, ['class' => 'form-control chosen-rtl', 'id' => 'first_select', 'required']); ?>

    </div>
</div>


<div class="form-group" id="cktextarea">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Title'); ?> <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <ul id="myTab1" class="nav nav-tabs">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($i++ ? '' : 'active'); ?>"><a href="#title<?php echo e($language->short_code); ?>"
                        data-toggle="tab">
                        <?php echo e($language->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade in <?php echo e($i++ ? '' : 'active'); ?>" id="title<?php echo e($language->short_code); ?>">
                    <input class="form-control" name="title[<?php echo e($language->short_code); ?>]" value="<?php echo e(old('title.' . $language->short_code)); ?>" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.patch number'); ?> </label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::number('patch_number', null, ['placeholder' => 'Patch Number', 'class' => 'form-control', 'min' => 0]); ?>

    </div>
</div>


<div class="form-group" id="advanced">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content'); ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <ul id="myTab1" class="nav nav-tabs">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($i++ ? '' : 'active'); ?>"><a href="#description<?php echo e($language->short_code); ?>"
                        data-toggle="tab"> <?php echo e($language->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade in <?php echo e($i++ ? '' : 'active'); ?>"
                    id="description<?php echo e($language->short_code); ?>">
                    <textarea class="form-control col-md-12 ckeditor" id="ckeditor"
                        name="path[<?php echo e($language->short_code); ?>]" rows="6">
                                <?php echo e(old('path.' . $language->short_code)); ?>

                        </textarea>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<div class="form-group" hidden id="normal">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content'); ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <ul id="myTab1" class="nav nav-tabs">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($i++ ? '' : 'active'); ?>"><a href="#path<?php echo e($language->short_code); ?>"
                        data-toggle="tab"> <?php echo e($language->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade in <?php echo e($i++ ? '' : 'active'); ?>" id="path<?php echo e($language->short_code); ?>">
                    <input class="form-control" disabled name="path[<?php echo e($language->short_code); ?>]" value="<?php echo e(old('path.' . $language->short_code)); ?>" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<div class="form-group" hidden id="video">
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label"><?php echo app('translator')->get('messages.Image Preview'); ?></label>
        <div class="col-sm-9 col-md-8 controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <?php if($content): ?>
                        <img src="<?php echo e($content->image_preview); ?>" alt="" />
                    <?php else: ?>
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                    <?php endif; ?>
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail"
                    style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->get('messages.select_image'); ?></span>
                        <span class="fileupload-exists">Change</span>
                        <?php echo Form::file('image_preview', ['accept' => 'image/*', 'class' => 'default']); ?>

                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <span class="label label-important">NOTE!</span>
            <span>Only extensions supported png, jpg, and jpeg</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content'); ?> <span
                class="text-danger">*</span></label>
        <div class="col-sm-9 col-md-10 controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview fileupload-exists img-thumbnail"
                    style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new">Select Video File</span>
                        <span class="fileupload-exists">Change</span>
                        <?php echo Form::file('path', ['accept' => 'video/*', 'class' => 'default', 'disabled' => true]); ?>

                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <span class="label label-important">NOTE!</span>
            <span>Only extension supported mp4, flv, and 3gp</span>
        </div>


    </div>
</div>


<div class="form-group" hidden id="audio">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content'); ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-md-10 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-preview fileupload-exists img-thumbnail"
                style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select Audio File</span>
                    <span class="fileupload-exists">Change</span>
                    <?php echo Form::file('path', ['accept' => 'audio/*', 'class' => 'default', 'disabled' => true]); ?>

                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported mp3</span>
    </div>
</div>


<div class="form-group" hidden id="image">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content'); ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                <?php if($content): ?>
                    <img src="<?php echo e($content->path); ?>" alt="" />
                <?php else: ?>
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                <?php endif; ?>
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail"
                style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->get('messages.select_image'); ?></span>
                    <span class="fileupload-exists">Change</span>
                    <?php echo Form::file('path', ['accept' => 'image/*', 'class' => 'default', 'disabled' => true]); ?>

                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>


<div class="form-group" hidden id="external">
    <div class="form-group">
        <label class="col-sm-3 col-md-2 control-label"><?php echo app('translator')->get('messages.Image Preview'); ?></label>
        <div class="col-sm-9 col-md-8 controls">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <?php if($content): ?>
                        <img src="<?php echo e($content->image_preview); ?>" alt="" />
                    <?php else: ?>
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                    <?php endif; ?>
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail"
                    style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new"><?php echo app('translator')->get('messages.select_image'); ?></span>
                        <span class="fileupload-exists">Change</span>
                        <?php echo Form::file('image_preview', ['accept' => 'image/*', 'class' => 'default', 'disabled' => true]); ?>

                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <span class="label label-important">NOTE!</span>
            <span>Only extensions supported png, jpg, and jpeg</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Content Type.Content'); ?> <span
                class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            <?php echo Form::text('path', null, ['placeholder' => trans('messages.Content Type.Content'), 'class' => 'form-control', 'disabled' => true]); ?>

        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <?php echo Form::submit($buttonAction, ['class' => 'btn btn-primary']); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\messarh\resources\views/content/input_store.blade.php ENDPATH**/ ?>