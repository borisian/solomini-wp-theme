<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" ?>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<header>

    <div id="ttr_header" class="jumbotron container text-center">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                <nav class="navbar navbar-expand me-2">
                    <div class="footer-entry">
                        <!--HARDCODED-->
                        <div class="d-inline icons">
                            <a href="#" class="m-1"><i class="bi bi-github"></i></a>
                            <a href="#" class="m-1"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="m-1"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                    <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul id="top-menu" class="navbar-nav">%3$s</ul>'
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </div>

</header>

<body <?php body_class('class-name'); ?>>

    <div class="container text-center mt-5">
        <div id="ttr_main" class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto main-content mt-3">