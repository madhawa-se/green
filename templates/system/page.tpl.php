<?php
/**
 * @file
 * Displays a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   element.
 * - $head: Markup for the HEAD element (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the
 *   current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled in
 *   theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been
 *   disabled in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been
 *   disabled.
 * - $primary_links (array): An array containing primary navigation links for
 *   the site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links
 *   for the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $right: The HTML for the right sidebar.
 * - $node: The node object, if there is an automatically-loaded node associated
 *   with the page, and the node ID is the second argument in the page's path
 *   (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic
 *   content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
    <head>
        <?php print $head; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php print $head_title; ?></title>
            <?php print $styles; ?>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
            <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet"/>
            <?php print $scripts; ?>
            <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?></script>
    </head>
    <body class="<?php print $body_classes; ?>">
        <div class="header-wrap">
            <div class="container">
                <div id="header" class="header">
                    <div class="header-top">
                        <?php if (!empty($header)) { ?>
                            <div id="header-region">
                                <?php print $header; ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="header-bottom">
                        <div class="search-box">
                            <?php print $search_box ?>
                            <a class="search-close"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <div id="logo-title">
                                    <?php if (!empty($logo)): ?>
                                        <a href="<?php print $front_page; ?>" title="<?php print $site_name . " " . t('Home'); ?>" rel="home" id="logo">
                                            <img class="logo" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                                        </a>
                                    <?php endif; ?>
                                </div> <!-- /logo-title -->
                            </div>
                            <div class="col-xs-9">
                                <div id="navigation" class="navbar navbar-default menu
                                <?php
                                if (!empty($primary_links)) {
                                    print "withprimary";
                                } if (!empty($secondary_links)) {
                                    print " withsecondary";
                                }
                                ?>">
                                         <?php if (!empty($primary_links)) { ?>
                                        <div id="primary" class="clear-block no-bullets">
                                            <?php print theme('links', $primary_links, array('class' => 'links primary-links hidden-xs hidden-sm ')); ?>
                                            <a class="search-trigger" href="javascript:void(0);"><i class="search fa"></i></a>
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="hidden-txt">open menu</span>
                                            </button>
                                        </div>
                             
                                    <?php } ?>
                                </div> <!-- /navigation -->
                            </div>
                        </div>
                    </div>
                </div> <!-- /header -->
            </div>
        </div>
        <div class="header-mob-wrap visible-xs visible-sm">
            <div class="navbar navbar-default menu
            <?php
            if (!empty($primary_links)) {
                print "withprimary";
            } if (!empty($secondary_links)) {
                print " withsecondary";
            }
            ?>">
                     <?php if (!empty($primary_links)) { ?>
                    <!--Collection of nav links and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <?php print theme('links', $primary_links, array('class' => 'links primary-links nav nav-mob navbar-nav no-bullets')); ?>
                    </div>
                <?php } ?>
            </div> <!-- /navigation -->
        </div>
        <section class="banner">
            <div class="container">
                <?php
                $menuparent = menu_get_active_trail();
                if ($menuparent[1]) {
                    ?>
                    <h1 class="title"><?php print $menuparent[1]['link_title']; ?></h1>
                <?php } ?>
            </div>
        </section>
        <div id="page">
            <div id="page" class="container">
                <div id="container" class="clear-block">
                    <?php if (!empty($left)): ?>
                        <div id="sidebar-left" class="column sidebar">
                            <?php print $left; ?>
                        </div> <!-- /sidebar-left -->
                    <?php endif; ?>

                    <div id="main" class="column"><div id="main-squeeze">
                            <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
                            <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>

                            <div id="content">
                                <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                                <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
                                <?php
                                if (!empty($messages)): print $messages;
                                endif;
                                ?>
                                <?php
                                if (!empty($help)): print $help;
                                endif;
                                ?>
                                <div id="content-content" class="clear-block">
                                    <?php print $content; ?>
                                </div> <!-- /content-content -->

                                <?php if ($content_bottom) { ?> 
                                    <?php print $content_bottom ?>                    
                                <?php } ?>
                                <?php print $feed_icons; ?>
                            </div> <!-- /content -->

                        </div></div> <!-- /main-squeeze /main -->

                    <?php if (!empty($right)): ?>
                        <div id="sidebar-right" class="column sidebar">
                            <?php print $right; ?>
                        </div> <!-- /sidebar-right -->
                    <?php endif; ?>
                </div>
            </div>
        </div> <!-- /container -->
        </div><!-- /page -->

        <div id="footer-wrapper" class="">
            <div id="footer" class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <?php print $footer_message; ?>
                            <?php
                            if (!empty($footer)) {
                                print $footer;
                            }
                            ?> 
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <?php
                            if (!empty($footer_bottom)) {
                                print $footer_bottom;
                            }
                            ?> 
                        </div>
                    </div>
                </div>
            </div> <!-- /footer -->
        </div> <!-- /footer-wrapper -->
        <?php print $closure; ?>
    </body>
</html>
