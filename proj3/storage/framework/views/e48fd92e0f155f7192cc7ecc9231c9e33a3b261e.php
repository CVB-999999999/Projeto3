<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.header','data' => []]); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('content', null, []); ?> 
        <!-- Title and Includes -->
        <title>Home | A Tutoring Company</title>
     <?php $__env->endSlot(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.navfoot','data' => []]); ?>
<?php $component->withName('navfoot'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('content', null, []); ?> 

        <!-- Carousel single img -->
        <div id="imgStart" class="carousel slide text-center" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/tutoring.jpg" alt="smart people">
                    <!-- Caption -->
                    <div class="carousel-caption">
                        <h3 class="shadow-lg">Creating smart people since 1999</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards to show what they tutor -->
        <div class="container mx-auto mt-5">
            <div class="row row-cols-md-3">
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> First to third cycle </h2>
                    <ul class="card-body mx-auto">
                        <li> Tutoring to all subjects</li>
                        <li> Preperation to final exams</li>
                    </ul>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> Secondary school </h2>
                    <ul class="card-body mx-auto">
                        <li> Tutoring to all subjects</li>
                        <li> Preperation to final exams</li>
                    </ul>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> Higher education </h2>
                    <ul class="card-body mx-auto">
                        <li> Tutoring to all math subjects</li>
                        <li> Tutoring to all computing subjects</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- More info -->
        <div class="text-center">
        
        
        
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary py-2 px-4 rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#moreInfo">
                <h5> Show all Disciplines </h5>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="moreInfo" tabindex="-1" aria-labelledby="moreInfoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="moreInfoLabel">All Disciplines</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <ul>
                                <?php $__currentLoopData = $ctgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ctg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key != 0): ?>
                                        <?php if($ctg->grade != $ctgs[$key-1]->grade): ?>
                                            <p><h6><strong> Grade <?php echo e($ctg->grade); ?> </strong></h6></p>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <p><h6><strong> Grade <?php echo e($ctg->grade); ?> </strong></h6></p>
                                    <?php endif; ?>
                                    <li> <?php echo e($ctg->name); ?> </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why us -->
        <!-- Cards with markting -->
        <div class="container mx-auto mt-5 mb-5">
            <h1 class="text-center" style="margin-bottom: 2%;"> Why Us?</h1>
            <div class="row row-cols-md-3">
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"></i> High Success Rate </h2>
                    <div class="card-body mx-auto">
                        Our students are 30% more likelly to success in their education than our competition
                    </div>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"></i> Best Resources </h2>
                    <div class="card-body mx-auto">
                        All our resources are made by teachers curently teaching the subjects to ensure that they are
                        the best possible
                    </div>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> Ease of Use </h2>
                    <div class="card-body mx-auto">
                        As we have all our resouces online our students can study whenever they want
                    </div>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php /**PATH C:\Users\Paulo Garrido\Desktop\proj3\resources\views/index.blade.php ENDPATH**/ ?>