
<?php $__env->startSection('page_title'); ?>
<?php echo app('translator')->get('messages.specialties.create_specialty'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i><?php echo app('translator')->get('messages.specialties.create_specialty'); ?> </h3>
                </div>
                <div class="box-content">
                    <?php if($specialty): ?>
                    <?php echo Form::model($specialty,["url"=>"specialty/$specialty->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]); ?>

                    <?php echo $__env->make('specialty.input',['buttonAction'=>''.\Lang::get("messages.Edit").'','required'=>'  (optional)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                    <?php echo Form::open(["url"=>"specialty","class"=>"form-horizontal","method"=>"POST","files"=>"True"]); ?>

                    <?php echo $__env->make('specialty.input',['buttonAction'=>''.\Lang::get("messages.save").'','required'=>'  *'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#specialty').addClass('active');
        $('#specialty_create').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/specialty/form.blade.php ENDPATH**/ ?>