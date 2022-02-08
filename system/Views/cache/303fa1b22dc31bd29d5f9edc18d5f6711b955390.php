<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e(APP_NAME . " | ". $title); ?></title>
        <meta name="description" content="Phase php library">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="png/x-image" href="<?php echo e(asset('imgs/icons/favicon.ico')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style type="text/css"> ul.unstyled{list-style: none}</style>
        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body class="bg-light">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php $__env->startSection('content'); ?>

    <?php echo $__env->yieldSection(); ?>
    <section id="js">
        <script type="text/javascript" src="<?php echo e(asset('jquery/jquery-3.6.0.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('bootstrap/js/popper.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    </section>
    <?php echo $__env->yieldContent('scripts'); ?>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61fbb8e7b9e4e21181bd452b/1fqvkkj27';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/base.blade.php ENDPATH**/ ?>