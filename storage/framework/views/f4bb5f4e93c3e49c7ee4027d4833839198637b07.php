<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="grabmorenow">
    <meta name="description" content="Become Seller Now Or Order Online From Nearest Shop">
    <meta name="keywords" content="Best Grocery Items, Best Seller Platform">
    <!-- Page Title -->
     <title><?php echo e(config('app.name')); ?></title>
    <!-- Bootstrap CSS -->
	<link href="http://localhost/laravel/public/css/app.css" rel="stylesheet">
    <link href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/simple-line-icons.css'); ?>">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/themify-icons.css'); ?>">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/set1.css'); ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/thumbs2.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/thumbnail-slider.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/style.css'); ?>">
	<script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/sweetalert.min.js'); ?>"></script>
</head>
<body>
<div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
<!--============================= HEADER START HERE =============================-->
<?php echo $__env->make('prssystem.partials.frontend_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--============================= HEADER ENDS HERE=============================-->
</div>    
</div>    
</div>    
   
<!-- BEGIN MAIN CONTENT -->
   <?php echo $__env->yieldContent('content'); ?>
<!-- END MAIN CONTENT -->
<!--============================= FOOTER =============================-->
    <?php echo $__env->make('prssystem.partials.frontend_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<script>
		var CSRF_TOKEN = '<?php echo e(csrf_token()); ?>';
		var POST_LOCATION_URL = '<?php echo e(route('getlocation')); ?>';
	</script>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/popper.min.js'); ?>"></script>
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/custome.js'); ?>"></script>
<!-- begin page level js -->
<?php echo $__env->yieldContent('footer_scripts'); ?>
<!-- end page level js -->
    </body>
</html>
