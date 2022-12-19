
<?php $__env->startSection('content'); ?>


<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3">
                <h5>Client</h5>
            </div>
            <div class="col-md-9 product-btn-group d-flex justify-content-end">
                <?php if(!empty($filter)): ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                <?php else: ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                <?php endif; ?>
                <button type="button" class="btn btn-success btn-sm" id="addClient" data-bs-toggle="modal" data-bs-target="#ClientModal">
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
                </button>
            </div>
        </div>
    </div>
    <div class="card-body ">
        <?php echo $__env->make('crm.client.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12 ">
                <table class="table products-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Store Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">City</th>
                            <th scope="col">Pin Code</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e(++$key); ?></th>
                            <td><?php echo e($list->store_name); ?></td>
                            <td><?php echo e($list->email); ?></td>
                            <td><?php echo e($list->phone); ?></td>
                            <td><?php echo e($list->address); ?></td>
                            <td><?php echo e($list->country); ?></td>
                            <td><?php echo e($list->state); ?></td>
                            <td><?php echo e($list->city); ?></td>
                            <td><?php echo e($list->pincode); ?></td>
                            <td><img src="<?php echo e($list->logo ?? defaultImg()); ?>" style="height:50px; width:60px;"></td>
                            <td>
                                <a href="javascript:void(0)" _id="<?php echo e($list->_id); ?>" class="edit">
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
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo e($lists->appends($_GET)->links()); ?>

    </div>
</div>

<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="ClientModal" tabindex="-1" aria-labelledby="clientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="clientLabel">Client</h1>
                <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container ">
                    <div id="message"></div>
                    <div class="row">
                        <form id="ClientSave" action="<?php echo e(url('crm/client')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div id="put"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="store-owner ">Brand: <span class="required">*</span></label>
                                        <select name="Brand_id" id="Brand_id" class="form-select js-example-basic-single">
                                            <option value="" selected>Select</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($res->_id); ?>"><?php echo e($res->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="text-danger" id="store_owner_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="store-name ">Store Name: <span class="required">*</span></label>
                                        <input type="text" id="store_name" name="store_name" class="form-control" placeholder="Store Name">
                                        <span class="text-danger" id="store_name_msg"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="business-email ">Business Email: <span class="required">*</span></label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Business Email">
                                        <span class="text-danger" id="email_msg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="vat/gstin ">VAT/GSTIN No: </label>
                                        <input type="text" id="gstin" name="gstin" class="form-control" placeholder="VAT/GSTIN No. ">
                                        <span class="text-danger" id="gstin_msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="phone ">Phone: </label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone No. ">
                                        <span class="text-danger" id="phone_msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="mobile ">Mobile: <span class="required">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder=" Mobile No. ">
                                        <span class="text-danger" id="mobile_msg"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="address ">Store Address: <span class="required">*</span></label>
                                        <textarea name="address" id="address" placeholder="Enter Address" class="form-control"></textarea>
                                        <span class="text-danger" id="address_msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="country ">Country: <span class="required">*</span></label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country">
                                        <span class="text-danger" id="country_msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="state ">State: <span class="required">*</span></label>
                                        <select name="state" id="state" class="form-select js-example-basic-single">
                                            <option value=" ">Select</option>
                                            <?php $__currentLoopData = config('global.state'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state); ?>"><?php echo e($state); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="text-danger" id="state_msg"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="city ">City: <span class="required">*</span></label>
                                        <input type="text" name="city" id="city" placeholder="Enter City" class="form-control">

                                        <span class="text-danger" id="city_msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="pincode/zipcode ">Pincode/Zipcode: </label>
                                        <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Pincode/Zipcode">
                                        <span class="text-danger" id="pincode_msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="field-group">
                                        <label for="logo ">Logo: </label>
                                        <input type="file" id="logo" name="logo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4" id="passwordField">
                                </div>

                                <div class="col-md-3">
                                    <div class="field-group">
                                        <div class="form-check form-switch custom-switch custom-switch-1">
                                            <label class="form-check-label" for="store">Store</label>
                                            <input class="form-check-input" type="checkbox" role="switch" value="1" name="store" id="store" checked>
                                            <span class="note">(Toggle the store status.)</span>
                                            <span class="text-danger" id="store_msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="field-group">
                                        <div class="form-check form-switch custom-switch custom-switch-1">
                                            <label class="form-check-label" for="verified-store">Verified Store:</label>
                                            <input class="form-check-input" type="checkbox" role="switch" name="verified_store" value="1" id="verified_store">
                                            <span class="text-danger" id="verified_store_msg"></span>
                                        </div>
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
            </div>
        </div>
    </div>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $('#addClient').click(function(e) {
        e.preventDefault();
        $('#clientLabel').html('Add Client');
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
        $('form#ClientSave').attr('action', '<?php echo e(url("crm/client")); ?>');
        $('#put').html('');
        $('#ClientModal').modal('show');
        $('#passwordField').html(`<div class="field-group">
                                        <label>Password </label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <span class="text-danger" id="password_msg"></span>
                                    </div>`);
    });

    function removeRow(id) {
        var element = document.getElementById("row-" + id);
        element.parentNode.removeChild(element);
    }

    /*start form submit functionality*/
    $("form#ClientSave").submit(function(e) {
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
                    $('form#ClientSave').trigger('reset');
            }
        });
    });
    /*end form submit functionality*/

    //for edit 

    $(document).on('click', '.edit', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let url = "<?php echo e(url('crm/client')); ?>/" + id + "/edit";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function(res) {

                if (res.status) {
                    $('#Brand_id').val(res.record.Brand_id);
                    $('#store_name').val(res.record.store_name);
                    $('#email').val(res.record.email);
                    $('#gstin').val(res.record.gstin);
                    $('#phone').val(res.record.phone);
                    $('#mobile').val(res.record.mobile);
                    $('#address').val(res.record.address);
                    $('#country').val(res.record.country);
                    $('#state').val(res.record.state);
                    $('#city').val(res.record.city);
                    $('#pincode').val(res.record.pincode);
                    let store = res.record.store ? true : false;
                    $('#store').prop('checked', store);
                    let verified_store = res.record.verified_store ? true : false;
                    $('#verified_store').prop('checked', verified_store);

                    $('#clientLabel').html('Edit Client');
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
                    $('form#ClientSave').attr('action', '<?php echo e(url("crm/client")); ?>/' + id);
                    $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                    $('#passwordField').html('');
                    $('#ClientModal').modal('show');
                }
            }
        })
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/client/list.blade.php ENDPATH**/ ?>