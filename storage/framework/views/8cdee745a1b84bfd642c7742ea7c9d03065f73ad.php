
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3">
                <h5>All Products </h5>
            </div>
            <div class="col-md-9 product-btn-group d-flex justify-content-end">
                <?php if(!empty($filter)): ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                <?php else: ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                <?php endif; ?>
                <a href="<?php echo e(url('crm/product/create')); ?>" class="btn btn-success btn-sm">
                    <?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'add'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Icon::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f)): ?>
<?php $component = $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f; ?>
<?php unset($__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f); ?>
<?php endif; ?> Add
                </a>
            </div>
        </div>
    </div>



    <div class="card-body">
        <?php echo $__env->make('crm.product.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Trail Point</th>
                                <th>Sale Price</th>
                                <th>Rewards Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e(++$key); ?></th>
                                <td><img src="<?php echo e($list->image ?? defaultImg()); ?>" style="height:50px; width:60px;"> </td>
                                <td><?php echo e(ucwords($list->name)); ?></td>
                                <td><?php echo e(ucwords(str_replace('_',' ',$list->product_type))); ?></td>
                                <td><?php echo e(!empty($list->SubCategory->Category->name)?$list->SubCategory->Category->name:''); ?>/<?php echo e(!empty($list->SubCategory->name)?$list->SubCategory->name:''); ?></td>
                                <td><?php echo e($list->trial_point); ?></td>
                                <td><?php echo e($list->sale_price); ?></td>
                                <td><?php echo e($list->rewards_point); ?></td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="<?php echo e($list->sub_category); ?>" product_id="<?php echo e($list->_id); ?>" class="view text-info"><i class="ri-add-circle-line"></i></a>
                                        <a href="<?php echo e(url('crm/product/'.$list->_id)); ?>/edit" class="edit text-info">
                                            <?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'edit'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Icon::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f)): ?>
<?php $component = $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f; ?>
<?php unset($__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f); ?>
<?php endif; ?>
                                        </a>
                                    </div>
                                </td>
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

<?php $__env->startPush('js'); ?>
<script>
    $('.view').click(function() {
        $('#relatedProducts').modal('show');
    })
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('modal'); ?>
<!-- related products start -->
<div class="modal fade" id="relatedProducts" tabindex="-1" aria-labelledby="related-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="related-product">Related products</h1>
                <button type="button" onclick="javascript:window.location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="message"></div>
                    <div class="col-md-12">
                        <table class="table table-light table-striped products-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Sort</th>

                                </tr>
                            </thead>
                            <tbody id="list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- related products End -->
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script>
    // //for edit
    $(document).on('click', '.view', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let product_id = $(this).attr('product_id');
        let url = "<?php echo e(url('crm/product-view')); ?>/" + id;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: {
                'product_id': product_id
            },
            success: function(res) {

                if (res.status) {
                    let list = '';
                    $.each(res.record, (index, val) => {
                        list += `<tr><td>${++index}</td>
                        <td><img src="${val.image}" style="height:50px; width:60px;"></td>
                        <td>${val.name}</td>
                        <td> <input type="text" _id="${val._id}" value="${val.sort}" name="sort" class="updatesort form-control form-control-sm" > </td>
                        
                        </tr>`;
                    });
                    $('#list').html(list);

                }
            }
        });
    });

    $(document).on('keyup', '.updatesort', function(e) {
        e.preventDefault(0);
        let id = $(this).attr('_id');
        let sort = $(this).val();
        $.ajax({
            url: "<?php echo e(url('crm/product-update')); ?>/" + id,
            type: 'post',
            datatype: 'JSON',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                'sort': sort,
            },
            success: function(res) {
                if (res.status || !res.status) {
                    alertMsg(res.status, res.msg, 2000);
                }
            }

        });
    });
</script>
<?php $__env->stopPush(); ?>;

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/product/list.blade.php ENDPATH**/ ?>