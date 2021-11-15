
<?php $__env->startSection('page_title'); ?>
    <?php echo e(request()->filled('parent_id') ? $parentTitle : \Lang::get("messages.Category.Category")); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-black">
                        <div class="box-title">
                            <h3><i class="fa fa-table"></i> <?php echo app('translator')->get('messages.Category.Category'); ?></h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="btn-toolbar pull-right">
                                <div class="btn-group">
                                    <?php if(get_action_icons('category/create', 'get')): ?>

                                        <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('category/create')); ?>"
                                            data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                    <?php endif; ?>
                                    <?php $table_name = 'categories';
                                    // pass table name to delete all function
                                    // if the current route exists in delete all table flags it will appear in view
                                    // else it'll not appear
                                    ?>
                                    <?php echo $__env->make('partial.delete_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <br><br>
                            <div class="table-responsive">
                                <table id="dtcontent" class="table table-striped dt-responsive" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width:18px"><input type="checkbox" id="check_all" data-table="<?php echo e($table_name); ?>"></th>
                                            <th>id</th>
                                            <th><?php echo app('translator')->get('messages.Title'); ?></th>
                                            <th><?php echo app('translator')->get('messages.Image.Image'); ?></th>
                                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('#category').addClass('active');
        $('#category_index').addClass('active');

    </script>
    <script>
        window.onload = function() {
            $('#dtcontent').DataTable({
                "processing": true,
                "serverSide": true,
                "search": {
                    "regex": true
                },
                "ajax": {
                    type: "GET",
                    "url": "<?php echo url('category/allData?parent_id=' . request('parent_id')); ?>",
                    "data": "<?php echo e(csrf_token()); ?>"
                },
                columns: [{
                        data: 'index',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'action',
                        searchable: false
                    }
                ],
                "pageLength": 5
            });
        };

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/category/index.blade.php ENDPATH**/ ?>