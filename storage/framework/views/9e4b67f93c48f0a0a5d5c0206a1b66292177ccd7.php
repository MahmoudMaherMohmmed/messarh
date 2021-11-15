
<?php $__env->startSection('page_title'); ?>
    <?php echo app('translator')->get('messages.provider.provider'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-black">
                        <div class="box-title">
                            <h3><i class="fa fa-table"></i> <?php echo app('translator')->get('messages.provider.provider'); ?></h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="btn-toolbar pull-right">
                                <div class="btn-group">
                                    <?php if(get_action_icons('provider/create', 'get')): ?>

                                        <a class="btn btn-circle show-tooltip" title=""
                                            href="<?php echo e(url('provider/create')); ?>" data-original-title="Add new record"><i
                                                class="fa fa-plus"></i></a>
                                    <?php endif; ?>
                                    <?php $table_name = 'providers';
                                    // pass table name to delete all function
                                    // if the current route exists in delete all table flags it will appear in view
                                    // else it'll not appear
                                    ?>
                                </div>
                            </div>
                            <br><br>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">

                                    <thead>
                                        <tr>
                                            <th style="width:18px"><input type="checkbox" id="check_all" data-table="<?php echo e($table_name); ?>"></th>
                                            <th>id</th>
                                            <th><?php echo app('translator')->get('messages.Title'); ?></th>
                                            <th><?php echo app('translator')->get('messages.Image.Image'); ?></th>
                                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><input type="checkbox" name="selected_rows[]" value="<?php echo e($value->id); ?>" class="roles select_all_template">
                                                </td>
                                                <td><?php echo e($value->id); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li> <b><?php echo e($language->title); ?> :</b>
                                                            <?php echo e($value->getTranslation('title', $language->short_code)); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>

                                                <td>
                                                    <?php if($value->image): ?>
                                                        <img class=" img-circle" width="100px" height="100px"
                                                            src="<?php echo e($value->image); ?>" />
                                                    <?php else: ?>
                                                        <img class=" img-circle" width="100px" height="100px"
                                                            src="https://ui-avatars.com/api/?name=<?php echo e($value->title); ?>" />
                                                    <?php endif; ?>
                                                </td>
                                                <td class="visible-md visible-xs visible-sm visible-lg">
                                                    <div class="btn-group">
                                                        
                                                        <?php if(get_action_icons('provider/{id}/edit', 'get')): ?>

                                                            <a class="btn btn-sm show-tooltip"
                                                                href='<?php echo e(url("provider/$value->id/edit")); ?>'
                                                                title="Edit"><i class="fa fa-edit"></i></a>
                                                        <?php endif; ?>
                                                        <?php if(get_action_icons('provider/{id}/delete', 'get')): ?>

                                                            <form action="<?php echo e(url('provider/' . $value->id . '/delete')); ?>"
                                                                method="GET" style="display: initial;">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE" />
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    style="height: 28px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
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
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('#provider').addClass('active');
        $('#provider_index').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/provider/index.blade.php ENDPATH**/ ?>