
<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header ">
    <div class="row">
      <div class="col-md-9">
        <h4>Survay Feedback</h4>
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
  <?php echo $__env->make('crm.feedback.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-12 ">
        <div class="table-responsive">
          <table class="table products-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <!-- <th scope="col">Product</th> -->
                <th scope="col">User</th>
                <th scope="col">Review</th>
                <th scope="col">Quality</th>
                <th scope="col">Price</th>
                <th scope="col">Value</th>
                <th scope="col">Status</th>
                <th scope="col">Remark</th>

                <!-- <th scope="col">Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$key); ?></td>
                <td><?php echo e($list->User->name); ?></td>
                <td><?php echo e($list->review); ?></td>
                <td><?php echo e($list->quality); ?></td>
                <td><?php echo e($list->price); ?></td>
                <td><?php echo e($list->value); ?></td>
                <td><?php echo e($list->status); ?></td>
                <td><?php echo e($list->remarks); ?></td>


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
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/feedback/list.blade.php ENDPATH**/ ?>