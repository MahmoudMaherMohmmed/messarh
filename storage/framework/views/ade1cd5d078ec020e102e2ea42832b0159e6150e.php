
<?php $__env->startSection('page_title'); ?>
<?php echo app('translator')->get('messages.Static Translations.Languages'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-black">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i><?php echo app('translator')->get('messages.Static Translations.Languages'); ?></h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <?php if(get_action_icons('language/create', 'get')): ?>
                                <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('language/create')); ?>"
                                    data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                            <?php endif; ?>
                            <?php $table_name = 'languages';
                            // pass table name to delete all function
                            // if the current route exists in delete all table flags it will appear in view
                            // else it'll not appear
                            ?>
                            <?php echo $__env->make('partial.delete_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div><br><br>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:18px"><input type="checkbox" id="check_all" data-table="<?php echo e($table_name); ?>"></th>
                                    <th><?php echo app('translator')->get('messages.Title'); ?></th>
                                    <th><?php echo app('translator')->get('messages.Short Code'); ?></th>
                                    <th><?php echo app('translator')->get('messages.Right to Lift ?'); ?></th>
                                    <th class="visible-md visible-lg" style="width:130px"><?php echo app('translator')->get('messages.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="table-flag-blue">
                                        <th><input type="checkbox" name="selected_rows[]" value="<?php echo e($language->id); ?>" class="roles select_all_template">
                                        </th>
                                        <td><?php echo e($language->title); ?></td>
                                        <td><?php echo e($language->short_code); ?></td>
                                        <td><?php echo $language->rtl; ?></td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <?php if(get_action_icons('language/{id}/edit', 'get')): ?>

                                                    <a class="btn btn-sm show-tooltip" title=""
                                                        href="<?php echo e(url('language/' . $language->id . '/edit')); ?>"
                                                        data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if(get_action_icons('language/{id}/delete', 'get')): ?>

                                                    <a class="btn btn-sm btn-danger show-tooltip" title=""
                                                        onclick="return confirm('Are you sure you want to delete this ?');"
                                                        href="<?php echo e(url('language/' . $language->id . '/delete')); ?>"
                                                        data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                <?php endif; ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        $('#language').addClass('active');
        $('#language-index').addClass('active');

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/language/index.blade.php ENDPATH**/ ?>