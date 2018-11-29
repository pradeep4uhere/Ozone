<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/simple-line-icons.css'); ?>">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/themify-icons.css'); ?>">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/swiper.min.css'); ?>">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/magnific-popup.css'); ?>">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/set1.css'); ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(config('global.THEME_URL_FRONT_CSS').'/style.css'); ?>">
		<script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/sweetalert.min.js'); ?>"></script>

</head>
<body>
    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="container-fluid">
                <?php echo $__env->make('prssystem.partials.frontend_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
<!-- BEGIN MAIN CONTENT -->
   <?php echo $__env->yieldContent('content'); ?>
<!-- END MAIN CONTENT -->
<!--============================= FOOTER =============================-->

    <?php echo $__env->make('prssystem.partials.frontend_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/popper.min.js'); ?>"></script>
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/bootstrap.min.js'); ?>"></script>
    <!-- Magnific popup JS -->
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/jquery.magnific-popup.js'); ?>"></script>
    <!-- Swipper Slider JS -->
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/swiper.min.js'); ?>"></script>
    <script src="<?php echo e(config('global.THEME_URL_FRONT_JS').'/front-common.js'); ?>"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
    
<!-- begin page level js -->
<?php echo $__env->yieldContent('footer_scripts'); ?>
<!-- end page level js -->
    </body>
</html>
