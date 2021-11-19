<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <article>
            <h1><?= $post->title ?></h1>
            <p>
            By <a href="/authors/<?php echo e($post->author->username); ?>"><?php echo e($post->author->username); ?></a> in <a href="/categories/<?php echo e($post->category->slug); ?>"> <?php echo e($post->category->name); ?> </a>
            </p>
            <div>
                <?= $post->body; ?>
            </div>
        </article>
        <a href="/userposts">Go Back</a>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Paulo Garrido\Desktop\proj3\resources\views/post.blade.php ENDPATH**/ ?>