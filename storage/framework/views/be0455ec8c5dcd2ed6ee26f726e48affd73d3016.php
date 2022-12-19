
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-9">
                <h4> Push Notification</h4>
            </div>
            <div class="col-md-3 ">
                <div class=" product-btn-group d-flex justify-content-end">
                    <?php if(!empty($filter)): ?>
                    <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                    <?php else: ?>
                    <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                    <?php endif; ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" id="addPush" data-bs-target="#pushNotification">
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
<?php endif; ?>Add 
                    </button>
                </div>
            </div>
        </div>
    </div>


        <div class="card-body">
            <?php echo $__env->make('crm.pushNotification.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="table-responsive">
                        <table class="table products-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Group </th>
                                    <th scope="col">Subject </th>
                                    <th scope="col">Push Notification </th>
                                    <th scope="col">icon</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e(++$key); ?></th>
                                    <td><?php echo e(ucWords($list->user_group)); ?></td>
                                    <td><?php echo e(ucWords($list->subject)); ?></td>
                                    <td><?php echo e(ucWords($list->notification)); ?></td>
                                    <td><img src="<?php echo e($list->icon ?? defaultImg()); ?>" style="height:50px; width:60px;"></td>
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

    <!-- push notification Modal -->
    <div class="modal fade" id="pushNotification" tabindex="-1" aria-labelledby="pushNotificationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pushNotificationLabel">Add Push Notification</h1>
                    <button type="button" class="btn-close" onclick="javascript:window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message"></div>
                    <form id="savePush" action="<?php echo e(url('crm/push-notification')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div id="put"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-group">
                                    <label for="user-group ">Select User Group: <span class="required">*</span></label>
                                    <select name="user_group" id="user_group" class="form-select  ">
                                        <option value="" selected>Please select user group</option>
                                        <option value="usergroup-1">usergroup-1</option>
                                        <option value="usergroup-2">usergroup-2</option>
                                        <option value="usergroup-3">usergroup-3</option>
                                        <option value="usergroup-4">usergroup-4</option>
                                        <option value="usergroup-5">usergroup-5</option>
                                        <option value="usergroup-6">usergroup-6</option>
                                    </select>
                                </div>
                                <span class="text-danger" id="user_group_msg"></span>
                            </div>

                            <div class="col-md-12">
                                <div class="field-group">
                                    <label for="subject">Subject: <span class="required">*</span></label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Hey! New stock arrived!">
                                </div>
                                <span class="text-danger" id="subject_msg"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-group">
                                    <label for="notification-body">Notification Body: <span class="required">*</span></label>
                                    <textarea name="notification" id="notification" placeholder="Hey I want to tell you something awesome thing!" class="form-control"></textarea>
                                </div>
                                <span class="text-danger" id="notification_msg"></span>
                            </div>

                            <div class="col-md-12">
                                <div class="field-group">
                                    <label for="notification-icon">Notification Icon: <span class="required">*</span></label>
                                    <input type="file" id="icon" name="icon" class="form-control">
                                    <span class="note"><i class="fa-solid fa-circle-info"></i> If not enter than default icon will use which you upload at time of create one signal app.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="field-group text-center">
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
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('js'); ?>
    <script>
        $('#addPush').click(function(e) {
            e.preventDefault();
            $('#pushNotificationLabel').html('Add Push Notification');
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
            $('form#savePush').attr('action', '<?php echo e(url("crm/push-notification")); ?>');
            $('#put').html('');
            $('#pushNotification').modal('show');
        });
        /*start form submit functionality*/
        $("form#savePush").submit(function(e) {
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
                        $('form#savePush').trigger('reset');
                }
            });
        });
        //for edit
        $(document).on('click', '.edit', function(e) {
            e.preventDefault(0);

            let id = $(this).attr('_id');
            let url = "<?php echo e(url('crm/push-notification')); ?>/" + id + "/edit";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function(res) {

                    if (res.status) {
                        $('#user_group').val(res.record.user_group);
                        $('#notification').val(res.record.notification);
                        $('#subject').val(res.record.subject);
                        $('#pushNotificationLabel').html('Edit Push Notification');
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
                        $('form#savePush').attr('action', '<?php echo e(url("crm/push-notification")); ?>/' + id);
                        $('#put').html('<input type="hidden" id="putInput" name="_method" value="PUT">');
                        $('#pushNotification').modal('show');
                    }
                }
            })
        });
    </script>
    <?php $__env->stopPush(); ?>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/pushNotification/list.blade.php ENDPATH**/ ?>