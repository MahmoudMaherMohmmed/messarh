<?php echo e(csrf_field()); ?>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.users.user_name'); ?> *</label>
    <div class="col-sm-9 col-lg-10 controls">
        <input type="text" name="name" placeholder="<?php echo app('translator')->get('messages.users.user_name'); ?>" class="form-control input-lg"
            required value="<?php echo e($user->name ?? old('name')); ?>">
        <span class="help-inline"><?php echo app('translator')->get('messages.users.add_user'); ?></span>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.users.email'); ?> *</label>
    <div class="col-sm-9 col-lg-10 controls">
        <input type="email" name="email" placeholder="<?php echo app('translator')->get('messages.users.email'); ?>" class="form-control input-lg"
            required value="<?php echo e($user->email ?? old('email')); ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.users.password'); ?> *</label>
    <div class="col-sm-9 col-lg-10 controls">
        <input type="password" name="password" placeholder="<?php echo app('translator')->get('messages.users.password'); ?>"
            class="form-control input-lg" <?php echo e(isset($user) ? '' : 'required'); ?>>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.users.phone'); ?> (optional)</label>
    <div class="col-sm-9 col-lg-10 controls">
        <input type="text" name="phone" placeholder="<?php echo app('translator')->get('messages.users.phone'); ?>" class="form-control input-lg"
            value="<?php echo e($user->phone ?? old('phone')); ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.users.role'); ?> *</label>
    <div class="col-sm-9 col-lg-10 controls">
        <select class="form-control chosen-rtl" data-placeholder="Choose a Role" name="role" tabindex="1" required>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->id); ?>"
                <?php echo e(isset($user) && $user->role_id == $role->id ? 'selected' : (old('role') == $role->id ? 'selected' : '')); ?>>
                <?php echo e($role->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        <input type="submit" class="btn btn-primary" value="<?php echo app('translator')->get('messages.save'); ?>">
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\messarh\resources\views/users/form.blade.php ENDPATH**/ ?>