
<?php $__env->startSection('page_title'); ?>
<?php echo app('translator')->get('messages.country.country'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- BEGIN Content -->
    <div id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> <?php echo app('translator')->get('messages.country.country'); ?></h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <?php if(get_action_icons('country/create', 'get')): ?>
                                    <a class="btn btn-circle show-tooltip" title="" href="<?php echo e(url('country/create')); ?>"
                                        data-original-title="Add new country"><i class="fa fa-plus"></i></a>
                                <?php endif; ?>
                                <?php $table_name = 'countries';
                                // pass table name to delete all function
                                // if the current route exists in delete all table flags it will appear in view
                                // else it'll not appear
                                ?>
                                <?php echo $__env->make('partial.delete_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:18px"><input type="checkbox" id="check_all" data-table="<?php echo e($table_name); ?>"></th>
                                        <th><?php echo app('translator')->get('messages.Title'); ?></th>
                                        <th class="visible-md visible-lg" style="width:130px"><?php echo app('translator')->get('messages.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                    <?php $__currentLoopData = $countrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="table-flag-blue">
                                            <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="<?php echo e($country->id); ?>" ></td>
                                            <td><?php echo e($country->title); ?></td>
                                            <td class="visible-md visible-xs visible-sm visible-lg">
                                                <div class="btn-group">
                                                    <?php if(get_action_icons('operator/create', 'get')): ?>

                                                        <a class="btn btn-sm btn-success show-tooltip" title="Add Operator"
                                                            href="<?php echo e(url('operator/create?country_id=' . $country->id)); ?>"
                                                            data-original-title="Add Operator"><i
                                                                class="fa fa-plus"></i></a>
                                                    <?php endif; ?>
                                                    <?php if(get_action_icons('country/{id}/edit', 'get')): ?>
                                                        <a class="btn btn-sm show-tooltip" title=""
                                                            href="<?php echo e(url('country/' . $country->id . '/edit')); ?>"
                                                            data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if(get_action_icons('country/{id}/delete', 'get')): ?>

                                                        <a class="btn btn-sm btn-danger show-tooltip" title=""
                                                            onclick='return ConfirmDelete()'
                                                            href="<?php echo e(url('country/' . $country->id . '/delete')); ?>"
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
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $("#example").DataTable();

        });

    </script>
    <script>
        $('#country').addClass('active');
        $('#country_index').addClass('active');

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\messarh\resources\views/country/index.blade.php ENDPATH**/ ?>