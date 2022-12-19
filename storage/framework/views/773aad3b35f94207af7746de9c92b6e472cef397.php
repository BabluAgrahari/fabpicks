
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header ">
        <div class="row">

            <div class="col-md-9">
                <h4>Sub Attributes</h4>
            </div>

            <div class="col-md-3 product-btn-group d-flex justify-content-end">
                <?php if(!empty($filter)): ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                <?php else: ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                <?php endif; ?>
                <a href="<?php echo e(url('crm/sub-attribute-export')); ?><?php echo e(!empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:''); ?>" class="btn btn-sm btn-success" id="">
                    <?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'export'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>Export
                </a>
                <button type="button" class="btn btn-success" id="AddSubAttribute" data-bs-toggle="modal" data-bs-target="#SubAttribute">
                    <i class="ri-add-circle-line"></i> Add
                </button>

            </div>
        </div>
    </div>

    <div class="card-body">
    <?php echo $__env->make('crm.subattribute.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sub Attributes</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e(++$key); ?></th>
                                <td><?php echo e(ucWords($list->name)); ?></td>
                                <td><?php echo e($list->sort); ?></td>
                                <td><img src="<?php echo e($list->icon ?? defaultImg()); ?>" style="height:50px; width:60px;"> </td>
                                <td>
                                    <div class="action-group">
                                        <a href="javascript:void(0)" _id="<?php echo e($list->_id); ?>" class="edit text-info"><?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
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
<?php endif; ?></a>
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

<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="SubAttributemodal" tabindex="-1" aria-labelledby="SubAttributeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="SubAttributeLabel">Sub Attributes</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div id="message"></div>
                    <form id="SaveSubAttribute" action="<?php echo e(url('crm/sub-attribute')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div id="put"></div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="field-group">
                                    <label>Attribute</label>
                                    <select name="attribute_id" class="form-control" id="attribute_id">
                                        <option value="">Select</option>
                                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($attr->_id); ?>"><?php echo e(ucwords($attr->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="text-danger" id="attribute_id_msg"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="field-group">
                                    <label>Sub Attribute Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                                </div>
                                <span class="text-danger" id="name_msg"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-group">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                    <label for="sort ">Sort</label>
                                    <input type="number" name="sort" id="sort" placeholder="Enter Sort" class="form-control">
                                </div>
                                <span class="text-danger" id="sort_msg"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="field-group">
                                <label>Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactivce</option>
                                    </select>
                                    <span class="text-danger" id="status_msg"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                            <button type="reset" class="btn btn-danger">
                                    <?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'reset'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>Reset
                                </button>
                                <button type="submit" class="btn btn-success btn-sm" id="save">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<script>
    $('#AddSubAttribute').click(function(e) {
        e.preventDefault();
        $('#SubAttributeLabel').html('Add Sub Attribute');
        $('#save').html(`<?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'save'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>Add`);
        $('form#SaveSubAttribute').attr('action', '<?php echo e(url("crm/sub-attribute")); ?>');
        $('#put').html('');
        $('#SubAttributemodal').modal('show');
    });

    $("form#SaveSubAttribute").submit(function(e) {
        e.preventDefault();
        formData = new FormData(this);
        var url = $(this).attr('action');
        let update = $('#putInput').val();
        let label1 = update == 'PUT' ? 'Update' : `<?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'save'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>Add`;
        let label2 = update == 'PUT' ? 'Updating...' : 'Adding...';
        $.ajax({
            data: formData,
            type: "POST",
            url: url,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;${label2}`).attr('disabled', true);
            },
            success: function(res) {

                //hide loader
                $('#save').html(label1).removeAttr('disabled');

                /*Start Validation Error Message*/
                $('span.text-danger').html('');
                if (res.validation) {
                    $.each(res.validation, (index, msg) => {
                        $(`#${index}_msg`).html(`${msg}`);
                    })
                    return false;
                }
                /*End Validation Error Message*/

                /*Start Status message*/
                if (res.status || !res.status) {
                    alertMsg(res.status, res.msg, 2000);
                }
                /*End Status message*/

                //for reset all field
                if (res.status)
                    $('form#SaveSubAttribute').trigger('reset');
            }
        });
    });
    //for edit 

    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "<?php echo e(url('crm/sub-attribute')); ?>/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#attribute_id').val(res.record.attribute_id);
                    $('#name').val(res.record.name);
                    $('#sort').val(res.record.sort);
                    let status = res.record.status ? true : false;
                    $('#status').prop('checked', status);

                    $('#SubAttributeLabel').html('Edit Sub Attribute');
                    $('#save').html(`<?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
<?php $component = App\View\Components\Icon::resolve(['type' => 'update'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>Update`);
                    $('form#SaveSubAttribute').attr('action', '<?php echo e(url("crm/sub-attribute")); ?>/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#SubAttributemodal').modal('show');
                }
            }
        })
    });
</script>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/subattribute/list.blade.php ENDPATH**/ ?>