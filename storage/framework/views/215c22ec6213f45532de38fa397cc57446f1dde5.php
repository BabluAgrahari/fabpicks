
<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-9">
        <h4>Order List</h4>
      </div>
      <div class="col-md-3 ">
        <div class=" product-btn-group d-flex justify-content-end">
          <?php if(!empty($filter)): ?>
          <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
          <?php else: ?>
          <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <?php echo $__env->make('crm.order.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-12 ">
        <div class="table-responsive">
          <table class="table products-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Order Number</th>
                <th scope="col">Order Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th scope="row"><?php echo e(++$key); ?></th>
                <td><?php echo e($list->order_number); ?></td>
                <td><?php echo e(date('d-m-Y',(int)$list->order_date)); ?></td>
                <td><?php echo e($list->amount); ?></td>
                <td><?php echo e($list->status); ?></td>
                <td><a href="<?php echo e(url('crm/order-details/'.$list->_id)); ?>" class="orderDetails text-info" _id="<?php echo e($list->_id); ?>"><i class="ri-add-circle-line"></i></a></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php echo e($lists->appends($_GET)->links()); ?>

  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/order/list.blade.php ENDPATH**/ ?>