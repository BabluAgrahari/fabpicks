<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="<?php echo e(url('crm/product')); ?>">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Product Name" value="<?= !empty($filter['name']) ? $filter['name'] : '' ?>" name="name" id="name" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Type" value="<?= !empty($filter['type']) ? $filter['type'] : '' ?>" name="type" id="type" />
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="<?php echo e(url('crm/product')); ?>" class="btn btn-danger btn-sm"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/product/filter.blade.php ENDPATH**/ ?>