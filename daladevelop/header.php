<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon.png" sizes="57x57" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-precomposed.png" sizes="57x57" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-72x72.png" sizes="72x72" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-76x76.png" sizes="76x76" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-114x114.png" sizes="114x114" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-120x120.png" sizes="120x120" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-144x144.png" sizes="144x144" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/apple-touch-icon-152x152.png" sizes="152x152" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container clearfix">
        <header class="main-header">
            <div class="wrapper">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                        <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/logo.svg" alt="Daladevelop" class="logo" />
                    </a>
                </h1>

                <div class="menu-main clearfix">
                    <a href="#" id="offcanvas-toggle" class="offcanvas-toggle">
                        Meny
                        <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/menu-icon.svg" alt="Meny" />
                    </a>

                    <nav id="header-navigation" class="header-navigation offcanvas-area" role="navigation">
                        <div class="header-navigation-top">
                            <a href="#" id="offcanvas-close" class="offcanvas-close">
                                <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/menu-close.svg" alt="Stäng" />
                            </a>

                            <div class="social-links">
                                <a href="https://instagram.com/daladevelop/">
                                    Instagram
                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/instagram.svg" alt="Instagram" />
                                </a>

                                <a href="https://twitter.com/daladevelop">
                                    Twitter
                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/twitter.svg" alt="Twitter" />
                                </a>

                                <a href="https://www.facebook.com/groups/daladevelop/">
                                    Facebook
                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/facebook.svg" alt="Facebook" />
                                </a>

                                <a href="https://github.com/daladevelop">
                                    Github
                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/github.svg" alt="Github" />
                                </a>
                            </div>
                        </div>

                        <?php wp_nav_menu( [
                            'theme_location' => 'primary',
                            'depth' => 2
                        ] ); ?>
                    </nav>
                </div>
            </div>
        </header>

        <section class="wrapper main-content">