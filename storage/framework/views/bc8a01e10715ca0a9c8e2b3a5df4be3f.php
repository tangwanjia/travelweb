<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('travelWebs')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto">
        <div class="m-6">
            <div class="bg-white my-3 p-12 rounded shadow">
                <h2 class="font-bold mb-3 text-lg">New Travel Recommendation</h2>
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="block" for="title">Title</label>
                        <input class="block w-full border-slate-300" id="title" name="title" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="block" for="text">Text</label>
                        <textarea class="block w-full border-slate-300" id="text" name="text"></textarea>
                    </div>
                    <div>
                        <label for="image" >Image:</label>
                        <input type="file" name="image" id="image">
                    </div><br>
                    <button class="bg-sky-500 text-white p-3 font-bold">Add Note</button>
                </form>
            </div>
        </div>

        <div class="flex flex-wrap">
            <?php $__currentLoopData = $travelWebs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $travelWeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <form class="mb-5" method="POST" action="/dashboard/travelWebs/<?php echo e($travelWeb->id); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label class="block" for="title">Title</label>
                            <input class="block w-full border-slate-300" id="title" name="title" value="<?php echo e($travelWeb->title); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="block" for="text">Text</label>
                            <textarea class="block w-full border-slate-300" id="text" name="text"><?php echo e($travelWeb->text); ?></textarea>
                        </div>
                        <img src="<?php echo e(asset($travelWeb->image)); ?>" alt="<?php echo e($travelWeb->image); ?>" width="30px" height="20px">
                        <div>
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image">
                        </div><br>
                        <button type="submit" class="block w-full bg-sky-500 text-white p-3 font-bold">Update Note</button>
                    </form>


                    <form method="post" action="/dashboard/travelWebs/<?php echo e($travelWeb->id); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <?php echo e(method_field('delete')); ?>

                        <button class="block w-full bg-red-600 text-white p-3 font-bold">Delete Note</button>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\cst8257\travelweb\resources\views/dashboard.blade.php ENDPATH**/ ?>