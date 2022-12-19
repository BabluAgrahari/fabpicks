
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<?php $__env->startSection('content'); ?>

<div class="card " id="test">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">About Us</h4>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <?php echo $__env->make('crm.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(url('crm/aboutus/'.$res->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="col-md-12">
                    <div class="search-field">
                        <input type="hidden" value="<?php echo e($res->id); ?>">
                        <div class="field-group">
                            <label for="about-us-content">About Us Content</label>
                            <textarea name="aboutus" id="aboutus" class="textarea form-control" required><?php echo e($res->aboutus); ?></textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-5 text-center"><?php if (isset($component)) { $__componentOriginalf7b6b6c4bc4eccc8de0185d678bdf3c8197f591f = $component; } ?>
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
<?php endif; ?>Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/aboutus/aboutus.blade.php ENDPATH**/ ?>