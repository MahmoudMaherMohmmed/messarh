
<?php $__env->startSection('page_title'); ?>
    <?php echo app('translator')->get('messages.kannel.logs'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Session::has('send_kannel_logs')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo Session::get('send_kannel_logs'); ?>

        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i><?php echo app('translator')->get('messages.kannel.logs'); ?></h3>
                    <div class="box-tool">
                        <a class="btn btn-sm btn-primary show-tooltip" title="" href="<?php echo e(route('send.kannel.log')); ?>">
                            Send Email With Kannel Details Now <i class="fa fa-envelope"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <form method='GET' class="width_m_auto form-horizontal" action='<?php echo route('kannel.logs'); ?>'>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.kannel.select'); ?></label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="<?php echo app('translator')->get('messages.kannel.select'); ?>"
                                    name="kannel_id" tabindex="1">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $kannels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kannel_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kannel_item->id); ?>"
                                            <?php echo e(isset($kannel) && $kannel != null && $kannel->id == $kannel_item->id ? 'selected' : ''); ?>>
                                            <?php echo e($kannel_item->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo app('translator')->get('messages.kannel.date'); ?><span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <?php echo Form::text('date', isset($date) && $date != null ? $date : date('Y-m-d'), ['placeholder' => \Lang::get('messages.kannel.date'), 'class' => 'form-control js-datepicker', 'value' => date('Y-m-d'), 'autocomplete' => 'off']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6 col-lg-6" style="text-align: right;">
                                <?php echo Form::submit(\Lang::get('messages.kannel.submit'), ['class' => 'btn btn-primary']); ?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($logs) && count($logs) > 0): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> <?php echo app('translator')->get('messages.kannel.kannels'); ?></h3>
                    </div>
                    <div class="box-content">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('messages.kannel.id'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.kannel_title'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.connection_name'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.ip'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.port'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.status'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.sent'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.queued'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.failed'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.throughput'); ?></th>
                                        <th><?php echo app('translator')->get('messages.kannel.created_at'); ?></th>
                                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="table-flag-blue">
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($log->kannel->title); ?></td>
                                            <td><?php echo e($log->connection_name); ?></td>
                                            <td><?php echo e($log->ip); ?></td>
                                            <td><?php echo e($log->port); ?></td>
                                            <td><?php echo e($log->status); ?></td>
                                            <td><?php echo e($log->sent); ?></td>
                                            <td><?php echo e($log->queued); ?></td>
                                            <td><?php echo e($log->failed); ?></td>
                                            <td><?php echo e($log->throughput); ?></td>
                                            <td><?php echo e($log->created_at->format('H:i:s')); ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success show-tooltip" title=""
                                                    href="<?php echo e(route('kannel.log.send_email', [$log->id])); ?>"
                                                    data-original-title="Send Email">Send Email <i
                                                        class="fa fa-envelope"></i></a>
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
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#kannel').addClass('active');
        $('#kannel_logs').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp_7_3\htdocs\kannel_report_system\resources\views/kannel/logs.blade.php ENDPATH**/ ?>