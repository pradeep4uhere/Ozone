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
    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="slider-link"><center><b>Your Current Location</b></center>
                                    <a href="#" id="location" style="font-size:16px">Choose You Location</a>
                                </div>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <ul>
                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                            <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
