<style>
    .page-link {
        color: #2fc296;
    }
</style>

<div class="row align-items-center mb-3">
    <?php

    use Illuminate\Http\Request;

    $perPage = (!empty($_GET['perPage'])) ? (int)$_GET['perPage'] : config('constants.perPage'); ?>
    <div class="col-md-1">
        <div class="list-number">
            <select name="perPare" id="perPage" class="form-select">
                <option value="10" <?php echo e(($perPage =="10" )?'selected':''); ?>>10</option>
                <option value="20" <?php echo e(($perPage =="20" )?'selected':''); ?>>20</option>
                <option value="50" <?php echo e(($perPage =="50" )?'selected':''); ?>>50</option>
                <option value="100" <?php echo e(($perPage =="100" )?'selected':''); ?>>100</option>
                <option value="200" <?php echo e(($perPage =="200" )?'selected':''); ?>>200</option>
                <option value="500" <?php echo e(($perPage =="500" )?'selected':''); ?>>500</option>
            </select>
        </div>
    </div>

    <div class="col-md-5 ">
        <?php
        $perPage = (!empty($_GET['perPage'])) ? (int)$_GET['perPage'] : config('constants.perPage');
        $first_record = $paginator->firstItem();
        $current_record = ($perPage * ($paginator->currentPage() - 1)) + $paginator->count();
        $total_record = $paginator->total();
        echo "Showing $first_record to  $current_record of $total_record Results.";
        ?>
    </div>

    <?php if($paginator->hasPages()): ?>
    <div class="col-md-6 d-flex justify-content-end">
        <nav aria-label="Page navigation  pagination-sm">
            <ul class="pagination">
            <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                <?php if($paginator->onFirstPage()): ?>
                <li class="disabled page-item"><span class="page-link">&laquo;</span></li>
                <?php else: ?>
                <li class="page-item"><a href="<?php echo e($paginator->previousPageUrl()); ?>" class="page-link" rel="prev">&laquo;</a></li>
                <?php endif; ?>


                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(is_string($element)): ?>
                <li class="disabled page-item"><span><?php echo e($element); ?></span></li>
                <?php endif; ?>


                <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                <li class="active page-item"><span class="page-link"><?php echo e($page); ?></span></li>
                <?php else: ?>
                <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php if($paginator->hasMorePages()): ?>
                <li class="page-item"><a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">&raquo;</a></li>
                <?php else: ?>
                <li class="disabled page-item"><span class="page-link">&raquo;</span></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <?php endif; ?>
</div>
<?php $__env->startPush('pagination-js'); ?>
<?php
$x = $_SERVER['REQUEST_URI'];
$parsed = parse_url($x);
$string = '';
if (!empty($parsed['query'])) {
    $query = $parsed['query'];
    parse_str($query, $params);
    unset($params['perPage']);
    $string = http_build_query($params);
}
?>
<script>
    $('#perPage').change(function() {
        var query = '<?= $string ?>';
        var perPage = $(this).val();
        location.href = "<?php echo e(url()->current()); ?>?perPage=" + perPage + '&' + query;
    })
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/layout/pagination.blade.php ENDPATH**/ ?>