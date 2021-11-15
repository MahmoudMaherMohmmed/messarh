<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.Category.Category'); ?><span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <?php echo Form::select('category_id', $categorys->pluck('title', 'id'), null, ['class' => 'form-control chosen-rtl', 'required']); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\messarh\resources\views/content/select_category.blade.php ENDPATH**/ ?>