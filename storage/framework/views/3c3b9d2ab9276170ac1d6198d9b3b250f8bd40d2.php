
<?php $__env->startSection('page_title'); ?>
<?php echo app('translator')->get('messages.provider.Create provider'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i><?php echo app('translator')->get('messages.provider.Create provider'); ?> </h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php if($provider): ?>
                    <?php echo Form::model($provider,["url"=>"provider/$provider->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]); ?>

                    <?php echo $__env->make('provider.input',['buttonAction'=>''.\Lang::get("messages.Edit").'','required'=>'  (optional)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                    <?php echo Form::open(["url"=>"provider","class"=>"form-horizontal","method"=>"POST","files"=>"True"]); ?>

                    <?php echo $__env->make('provider.input',['buttonAction'=>''.\Lang::get("messages.save").'','required'=>'  *'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        $('#provider').addClass('active');
        $('#provider_create').addClass('active');

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/provider/form.blade.php ENDPATH**/ ?>