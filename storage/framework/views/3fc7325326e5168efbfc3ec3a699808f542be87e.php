<?php $__env->startSection('content'); ?>
<style>
.center { 
    display:block;
    margin-left:auto;
    text-align:center;
 }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="center" >
                <img src="<?php echo e(asset('img/ambulancia.png')); ?>" width="250px">
                <a href="licasoft" class="btn btn-danger">Central</a>
                <img src="<?php echo e(asset('img/LOGOLICA.png')); ?>" width="250px">
                <br>
                
                
                
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>