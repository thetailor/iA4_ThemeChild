<?php
/**
 * The theme header.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @author iA <ia@ia.net>
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>

<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

<!--[if lt IE 9]>
     <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv-printshiv.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

     <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content">
        <?php _e('Skip to content', 'ia4'); ?>
    </a>
    <div class="container">
        <header id="masthead" class="site-header" role="banner">
            <div class="center">
            <?php if (!get_theme_mod('ia4_center_logo', false)): ?>
                <div class="cols table table-align-middle logo-and-navigation">
                    <div class="col small table-cell">
                        <div class="header-bg site-branding">
                        <?php if (get_header_image()) : ?>
                            <div id="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home" class="header-logo">
                                    <!--<img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>">-->
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEYAAABkCAYAAAA7Ska5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABHRJREFUeNrsm+1LIlEUxncXiQknmsrKSMpCauidoiDaiP6A/uA++bENerEXQcNIwsJqKq0prAz2PksDs9O06TrXnVmeA5I1and+nZfnnHv7ura2lvxCe2ffiIBgCIZgCIZgCIZgCIZgCIZgaARDMARDMARDMARDMARDMAQTHLu9vVXX19e/Pz8/hwjGZgDy+voaOjg4SBCMzVpaWqrhcNg0DCMiy2sCCaajo8MMhULVaDRaPDs7ixCMwwQY4+bmRiMYm1Wr1RA8p1KpKATjAINcUy6X6TF2UxSlgq/t7e0lgqHAq88uLi40gnlfuhlKDKUaDAKPYFysra3NJBiGUu328vISkhlSgQVjmqb6JvBMgmEoEYwnFg6HK57LgWYsHFO2y8tL7fr6WrNyg5U4UXa7urpKvb29dSlYdNdvytdElx0oMACCuSxGkKqqmpDviUQib10vl8vq/f29mkqlJgCpr6+vKK4X6rlRGVCkgjk5OYkeHR0lIpGIsbS0tCXAvHN3u5fg9efn59FkMhkbHx/PxGIx418qXylgtre39VKppC0sLKTg6rW8Z2hoqIgHAKXTaV10zMbc3FymWd209OQLKMgjy8vLW7VCcQJaXV39gc/Y3NyccNsFgLiT1VVLASNCJ4YbWlxcTDUS+3jvysrKFsJld3dXd16/u7tTA+MxAogiwiA+NTWV8SohIpQAB15o/zkSNipZIMBks9m4CIP834TPZ3CwE4DcY28HZGgXz8HAW7D4kZGRgoxFzs/PH56eniJMFeQcaBi3Kuc7MMfHx7HBwcGCrEUiNHVdz+3t7ekQipAAgcgxKM2f6Y5GDZoHWybijxDv7OwsBQKMbLFl2eTkZO7h4UFFSfc9GJxVaVazKKAolkr2PRiZh3ecJhJwVPRSObQOHDs4chkqH0JXdlvQMBhZ3a1bf4QOHc/7+/uLhUIh6mswEHSyThzYDSCGh4d/SQJUQHiP78/g4diXzCQMAFC7dlUNLSPrNJVnYDRNKyExylpkLpeLDQwM/CYgxfdFIfb8DQaLxJROlrdcXV1FnNoF3gMv8vXhRCwSqlRGpXDzFrunokXwdbnGLFfcRNzLxaFpFLlL+0jpojXAgN3XYKz5ragenoVUOp1O2IfnLh5j2ncdfCvwpqenM9lsNuFF3EP2Izz/tK0iUyp4CgYzEqE18m7jyHr7L8h+ATpXi1SQkYA9bwmQD3p6eoyPBtm1QNnZ2ZnAcKrWzl6GhpLSK1lwNjY2ZupZNF67v7+vz87OHjar1fgQuKwPBhwkR9woepzR0dH8R+NIeBbKMipQozsMvgdjJUdsgyCRitCaQTLFfpA14X98fFTwvwCoLNAqY2NjqXp/B2bNgdu7tnsPHggV0fyplvZobW1Fsi40srPw9PSkeL0z0TQwdg/y8iagtHlk3sVwWqK7u9sgGIehuYzH40WCcVQyJHJZFSywYABEVLG8r+cx/6MRDMEQDMEQDMEQDMEQDMEQDMHQCIZgCIZgCIZgCIZgCOa/t58CDAC6Xz8XGLV15QAAAABJRU5ErkJggg==
" alt="<?php bloginfo('name'); ?>">
                                </a><!-- end logo link -->
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home" class="header-text">
                                    <span class="header-title-text"><?php bloginfo('name'); ?></span>
                                    <span class="header-description-text"><?php bloginfo('description'); ?></span>
                                </a><!-- end header-text-->
                                <?php if(ia4_display_header_menu()) : ?>
                                    <div class="mobile-menu mobile-menu--has-logo js-action" data-action="toggleMenu"><?php _e('Menu', 'ia4'); ?></div>
                                <?php endif; ?>
                            </div><!--end logo-->
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home" class="header-text">
                                <span class="header-title-text"><?php echo str_replace(' ', '<br>', get_bloginfo('name')); ?></span><!-- end header-text-logo-->
                                <span class="header-description-text"><?php bloginfo('description'); ?></span><!-- header-description -->
                            </a><!-- end header-text-->
                        <?php endif; // End header image check. ?>
                        </div><!--end header-bg-->
                    </div><!--end col small-->
                    <?php if(ia4_display_header_menu()) : ?>
                    <div class="col large table-cell">
                        <div class="mobile-menu js-action" data-action="toggleMenu"><!--<?php _e('Menu', 'ia4'); ?>--></div>
                        <div class="navigation original">
                            <div class="menu-wrapper">
                                <nav id="site-navigation" class="main-navigation">
                                    <div class="main-menu-wrapper">
                                        <div class="search-field">
                                            <input type="text" name="search-term" value="<?php if (isset($_GET['s'])) echo $_GET['s']; ?>" class="js-search" id="search-term" aria-label="Search Terms" autocomplete="off">
                                            <a data-action="toggleSearch" class="js-action-toggleSearch search-x" href="#">×</a>
                                        </div><!--end search-field-->

                                        <?php if (has_nav_menu('primary')): ?>
                                            <?php 
                                            $menu = wp_nav_menu(array('echo' => false, 'theme_location' => 'primary', 'depth' => 1, 'menu_id' => 'main-menu', 'items_wrap' => '%3$s', 'container' => '')); ?>
                                            <ul id="main-menu" class="menu">
                                                <?php echo $menu; ?>
                                                <li id="search-box" class="search"><a data-action="toggleSearch" class="js-action-toggleSearch search-text" href="#"><?php _e('Search', 'ia4'); ?></a></li>
                                            </ul>
                                        <?php else: ?>
                                            <ul id="main-menu" class="menu">
                                            	<?php 
                                                    $menu = wp_page_menu(array('theme_location' => 'primary', 'depth' => 1, 'menu_id' => 'main-menu', 'echo' => '0'));
                                                    // whip the page menu into wp_nav_menu form
                                                    $menu = str_replace('<ul>', '', $menu);
                                                    $menu = str_replace('</ul>', '', $menu);
                                                    $menu = str_replace('<div class="menu">', '', $menu);
                                                    $menu = str_replace('</div>', '', $menu);
                                                    echo $menu;
                                                ?>
                                                <li id="search-box" class="search"><a data-action="toggleSearch" class="js-action-toggleSearch search-text" href="#"><?php _e('Search', 'ia4'); ?></a></li>
                                            </ul>
                                        <?php endif; ?>
                                    </div><!--end main-menu-wrapper-->
                                </nav><!--#site-navigation-->
                            </div><!--end menu-rapper header-test-name-->
                        </div><!--end navigation original-->
                    </div><!--end col large-->
                    <?php endif; ?>
                </div><!--end logo-and-navigation-->
            <?php else: // Header without navigation etc. ?>
                <div class="logo-no-navigation">
                <?php if (get_header_image()) : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home">
                        <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>">
                    </a><!-- end logo link -->
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home" class="header-text">
                        <div class="header-text-logo">
                            <?php bloginfo('name'); ?>
                        </div><!-- end header-text-logo-->
                        <div class="header-description">
                            <?php bloginfo('description'); ?>
                        </div><!-- header-description -->
                    </a><!-- end header-text-->
                <?php endif; ?>
                </div>
            <?php endif ?>
            </div><!--end cols-->
        </header>
		<?php flush(); ?>
        <div id="result"></div><!-- wrapper for search results -->
        <div id="content" class="site-content">
