
<?php $__env->startSection('page_title'); ?>
<?php echo app('translator')->get('messages.Category.Category'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
.grid-custom img {
        margin-bottom: 3px;
        border-radius: 4px;
    }

    .grid-custom {
        background: #d59a878c;
        border-radius: 7px;
        border: 3px solid #eee;
        padding: 5px;
    }

    .remove-image{
      position: absolute;
      cursor: pointer;
      background-color: #e40b0b;
      color: white;
      top: -1px;
      right: 15px;
      padding: 0 3px;
      font-size: 13px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
    }
</style>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i><?php echo app('translator')->get('messages.Category.Category'); ?></h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php if($category): ?>
                    <?php echo Form::model($category,["url"=>"category/$category->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]); ?>

                    <?php echo $__env->make('category.input',['buttonAction'=>''.\Lang::get("messages.Edit").'','required'=>'  (optional)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                    <?php echo Form::open(["url"=>"category","class"=>"form-horizontal","method"=>"POST","files"=>"True"]); ?>

                    <?php echo $__env->make('category.input',['buttonAction'=>''.\Lang::get("messages.save").'','required'=>'  *'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#category').addClass('active');
        $('#category_create').addClass('active');

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/category/form.blade.php ENDPATH**/ ?>