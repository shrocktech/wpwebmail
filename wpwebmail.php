<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/shrocktech
 * @since             1.0.0
 * @package           Wpwebmail
 *
 * @wordpress-plugin
 * Plugin Name:       WP Webmail
 * Plugin URI:        https://github.com/shrocktech/wpwebmail
 * Description:       Email and correspond with your customers right inside the dashboard of WordPress.
 * Version:           1.0.0
 * Author:            ShrockTech
 * Author URI:        https://github.com/shrocktech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpwebmail
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPWEBMAIL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpwebmail-activator.php
 */
function activate_wpwebmail() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpwebmail-activator.php';
	Wpwebmail_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpwebmail-deactivator.php
 */
function deactivate_wpwebmail() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpwebmail-deactivator.php';
	Wpwebmail_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpwebmail' );
register_deactivation_hook( __FILE__, 'deactivate_wpwebmail' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpwebmail.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpwebmail() {

	$plugin = new Wpwebmail();
	$plugin->run();

}
run_wpwebmail();

// Add page to dashboard

function my_admin_menu() {
		add_menu_page(
			__( 'WP WebMail', 'my-textdomain' ),
			__( 'WP WebMail', 'my-textdomain' ),
			'edit_posts',
			'wp-webmail',
			'page_contents',
			'dashicons-email',
			3
		);
	}

	add_action( 'admin_menu', 'my_admin_menu' );


	function page_contents() {
		?>
		<h2>This is just a demo image - remove for production</h2>
<div>
	<img  style="width: 1000px;" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/roundcube.png'; ?>">
</div>


		<?php
	}
