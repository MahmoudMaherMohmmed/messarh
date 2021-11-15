

<?php $__env->startSection('page_title'); ?>
<?php echo app('translator')->get('messages.Static Translations.Add Static Translation'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i><?php echo app('translator')->get('messages.Static Translations.Add Static Translation'); ?></h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                     <?php if(isset($static_translation)): ?>
                        <?php echo Form::model($static_translation, ['route' => ['static_translation.update', $static_translation->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>'true' ]); ?>


                    <?php else: ?>
                        <?php echo Form::open(['method' => 'POST', 'route' => 'static_translation.store', 'class' => 'form-horizontal', 'files'=>'true' ]); ?>



                    <?php endif; ?>
                        <?php echo $__env->make('static_translation._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('#static').addClass('active');
        $('#static-create').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/static_translation/create.blade.php ENDPATH**/ ?>