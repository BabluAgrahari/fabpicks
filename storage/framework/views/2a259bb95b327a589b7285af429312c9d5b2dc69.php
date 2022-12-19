<div class="row mb-2" id="filter" <?= (empty($filter)) ? "style='display:none'" : "" ?>>
    <div class="col-md-12 ml-auto">
        <form action="<?php echo e(url('crm/category')); ?>">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" value="<?= !empty($filter['date_range']) ? $filter['date_range'] : '' ?>" name="date_range" id="daterange-btn" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Name" value="<?= !empty($filter['name']) ? $filter['name'] : '' ?>" name="name" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Discription" value="<?= !empty($filter['discription']) ? $filter['discription'] : '' ?>" name="discription"/>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-search"></i>&nbsp;Search</button>
                    <a href="<?php echo e(url('crm/category')); ?>" class="btn btn-danger btn-sm mt-2"><i class="fas fa-eraser"></i>&nbsp;Clear</a>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/category/filter.blade.php ENDPATH**/ ?>