
<?php
// pass table name ($table_name) to delete all function from view that includes this page
// if the current route exists in delete all table flags it will appear in view
// else it'll not appear
    $delete_all_flag_exists = get_delete_all_flag() ;
    if($delete_all_flag_exists){
    ?>
        <a  id="delete_button" onclick="delete_selected('<?php echo e($table_name); ?>')" class="btn btn-circle btn-danger show-tooltip" title="<?php echo app('translator')->get('messages.template.delete_many'); ?>" href="#"><i class="fa fa-trash-o"></i></a>
    <?php
    }
?>
<?php /**PATH C:\xampp\htdocs\messarh\resources\views/partial/delete_all.blade.php ENDPATH**/ ?>