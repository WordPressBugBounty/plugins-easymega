<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly

class Megamenu_Dashboard
{
    public $title;
    public $config;
    function __construct()
    {
        $this->title = __('EasyMega', 'easymega');
        add_action('admin_menu', array($this, 'add_menu'));
        add_action('admin_enqueue_scripts', array($this, 'scripts'));
    }
    function add_menu()
    {
        add_options_page(
            $this->title,
            $this->title,
            'manage_options',
            'easymega',
            array($this, 'page')
        );
    }

    function scripts($id)
    {
        if ($id != 'settings_page_easymega') {
            return;
        }
        $file = EASYMEGA_PATH . '/assets/css/dashboard.css';
        if (file_exists($file)) {
            $v = filemtime($file);
            wp_enqueue_style('easymega-wp-admin',  EASYMEGA_URL . '/assets/css/dashboard.css', false, $v);
        }
    }

    function setup()
    {
        $plugin = get_plugin_data(EASYMEGA_PATH . 'easymega.php');
        $this->config = $plugin;
    }

    function page()
    {
        $this->setup();
        $this->page_header();
        echo '<div class="wrap">';
        $this->page_inner();
        echo '</div>';
    }

    private function page_header()
    {
?>
        <div class="cd-header">
            <div class="cd-row">
                <div class="cd-header-inner">
                    <a href="#" class="cd-branding" title="<?php echo esc_attr($this->config['Name']); ?>">
                        <svg width="44px" height="44px" viewBox="0 0 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop" transform="translate(-89.000000, -881.000000)" fill="#593C98" fill-rule="nonzero">
                                    <g id="banner-1544x500" transform="translate(33.000000, 473.000000)">
                                        <g id="icon-copy" transform="translate(43.000000, 395.000000)">
                                            <g id="three-layers" transform="translate(13.111312, 13.930769)">
                                                <polygon id="Shape" points="21.8226189 21.1512109 43.6451141 10.5851987 21.8842637 0.0490187305 21.8224951 0.019310409 0 10.5851987 21.7608504 21.1218739"></polygon>
                                                <polygon id="Shape" opacity="0.652060688" points="34.5405038 16.4912131 21.8226189 22.625115 9.11921686 16.4863855 0 20.9017847 21.7602314 31.4370983 21.8226189 31.4668066 43.6451141 20.9017847"></polygon>
                                                <polygon id="Shape" opacity="0.171195652" points="34.5405038 27.1652892 21.8226189 33.29981 9.11921686 27.1608329 0 31.5753657 21.7602314 42.110803 21.8226189 42.1406351 43.6451141 31.5753657"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <span class="cd-logo-name"><?php esc_html_e('EasyMega', 'easymega'); ?></span>
                    <span class="cd-version"><?php echo esc_html($this->config['Version']); ?></span>
                </div>
            </div>
        </div>
    <?php
    }
    private function page_inner()
    {

    ?>
        <div class="cd-row metabox-holder">
            <h1 class="cd-hidden-heading">&nbsp;</h1>
            <div class="cd-main">


                <div class="cd-box">
                    <div class="cd-box-top"><?php esc_html_e('Creating a Mega Menu', 'easymega'); ?></div>
                    <div class="cd-box-content">

                        <ul class="cd-steps">
                            <li>
                                <div class="cd-step-thumb">
                                    <img src="<?php echo esc_url(EASYMEGA_URL . '/assets/images/step-1.png'); ?>">
                                </div>

                                <div class="cd-step-content">
                                    <h3 class="cd-step-number"><?php esc_html_x('Step 1', 'step number', 'easymega'); ?></h3>
                                    <h4><?php esc_html_e('Enable Mega Menu Features', 'easymega'); ?></h4>
                                    <p><?php printf(
                                            /* translators: 1: Link. */
                                            esc_html__('Navigate to: Customize &rarr; %1$s &rarr; Select a menu if exists, if not, Just add new, scroll down bottom and check to "Enable mega menu features".', 'easymega'), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            '<a href="' . esc_url(admin_url('customize.php?autofocus[panel]=nav_menus')) . '">' . esc_html__('Menus', 'easymega') . '</a>'
                                        ); ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="cd-step-thumb">
                                    <img src="<?php echo esc_url(EASYMEGA_URL . '/assets/images/step-2.png'); ?>">
                                </div>
                                <div class="cd-step-content">
                                    <h3 class="cd-step-number"><?php esc_html_x('Step 2', 'step number', 'easymega'); ?></h3>
                                    <h4><?php esc_html_e('Open mega menu panel settings', 'easymega'); ?></h4>
                                    <p><?php esc_html_e('After Mega menu enabled you can see Mega menu settings button for each menu item. Click this button to open mega menu settings panel.', 'easymega'); ?></p>
                                </div>
                            </li>

                            <li>
                                <div class="cd-step-thumb">
                                    <img src="<?php echo esc_url(EASYMEGA_URL . '/assets/images/step-3.png'); ?>">
                                </div>
                                <div class="cd-step-content">
                                    <h3 class="cd-step-number"><?php esc_html_x('Step 3', 'step number', 'easymega'); ?></h3>
                                    <h4><?php esc_html_e('Enable mega menu for item', 'easymega'); ?></h4>
                                    <p><?php esc_html_e('Check to option Enable Mega Menu to enable mega menu for this item. After Mega Menu enabled you can see more settings for menu item, let add that you want here.', 'easymega'); ?></p>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>


                <?php

                

                    $string = 'Builds with customizer system
Live view
Drag & Drop mega menu builder
Content grid layout
Builder content layout
Add widgets in your menu content [PRO]
Mega menu styling [PRO]
Inherit menu from theme
Custom responsive break point
Full with layout
Boxed layout
Custom mega menu content with
Align menu items to the left or right of the menu bar
Align sub menus to left or right of parent menu item';

                    $fs = explode("\n", $string);
                ?>
                    <div class="cd-box">
                        <div class="cd-box-top"><?php esc_html_e('EasyMega Features', 'easymega'); ?></div>
                        <div class="cd-box-content">
                            <ul class="cd-list-features">
                                <?php
                                foreach ($fs as $f) {
                                    $f = str_replace('[PRO]', '<span class="cd-pro">' . __('Pro', 'easymega') . '</span>', $f);
                                    echo "<li>{$f}</li>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                }
                                ?>
                            </ul>
                            <a href="https://www.famethemes.com/plugins/easymega-pro/"><?php esc_html_e('View Pro Version Details &rarr;', 'easymega'); // phpcs:ignore WordPress.Security.EscapeOutput.UnsafePrintingFunction	 
                                                                                        ?></a>
                        </div>
                    </div>
                <?php  ?>

                <?php do_action('megamenu/dashboard/main', $this); ?>
            </div>
            <div class="cd-sidebar">

                <div class="cd-box">
                    <div class="cd-box-top"><?php esc_html_e('EasyMega Documentation', 'easymega'); ?></div>
                    <div class="cd-box-content">
                        <p><?php esc_html_e('Not sure how something works? Take a look at the documentation and learn.', 'easymega'); ?></p>
                        <a href="https://docs.famethemes.com/article/110-easymega-documentation"><?php esc_html_e('Visit Documentation &rarr;', 'easymega'); ?></a>
                    </div>
                </div>

                <?php
                $themes = array(
                    array(
                        'name' => 'OnePress',
                        'thumb' => 'https://i0.wp.com/themes.svn.wordpress.org/onepress/2.0.4/screenshot.png?w=300&strip=all',
                    ),
                    array(
                        'name' => 'Screenr',
                        'thumb' => 'https://i0.wp.com/themes.svn.wordpress.org/screenr/1.1.6/screenshot.png?w=300&strip=all',
                    ),
                    array(
                        'name' => 'GeneratePress',
                        'thumb' => 'https://i0.wp.com/themes.svn.wordpress.org/generatepress/2.0.2/screenshot.png?w=300&strip=all',
                    ),
                    array(
                        'name' => 'Astra',
                        'thumb' => 'https://i0.wp.com/themes.svn.wordpress.org/astra/1.2.6/screenshot.jpg?w=300&strip=all',
                    ),

                )
                ?>

                <div class="cd-box">
                    <div class="cd-box-top"><?php esc_html_e('Themes Compatibility', 'easymega'); ?></div>
                    <div class="cd-box-content">
                        <p><?php esc_html_e('EasyMega compatibility with a lot of themes, here are some great themes you may like', 'easymega'); ?></p>
                        <?php
                        foreach ($themes as $t) {
                            $link =  'https://wordpress.org/themes/' . strtolower($t['name']) . '/';
                            echo '<p class="cd-themes">';
                            echo "<a href='" . esc_url($link) . "'>";
                            echo "<img src='" . esc_url($t['thumb']) . "'/>";
                            echo "<br/><strong>" . esc_html($t['name']) . "</strong>";
                            echo '</a>';
                            echo '</p>';
                        }
                        ?>
                    </div>
                </div>

                <?php do_action('megamenu/dashboard/sidebar', $this); ?>

            </div>
        </div>
<?php
    }
}

new Megamenu_Dashboard();
