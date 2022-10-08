<?php
/**
 *
 * This theme uses PSR-4 and OOP logic
 *
 * @package check_before_theme
 */

namespace CheckBeforeTheme;

// use WooCommerce;

final class Init
{
	/**
	 * Store all the classes inside an array.
	 *
	 * @return array Full list of classes
	 */
	public static function get_services()
	{
		return [
			Plugins\RequiredPlugins::class,
			Core\Tags::class,
			Core\Sidebar::class,
			Core\NavMenu::class,
			Setup\Setup::class,
			Setup\Menus::class,
			Setup\Enqueue::class,
			// Custom\PostTypes::class,
			// Custom\OptionsPages::class,
			// Api\Customizer::class,
			Api\Shortcode\Shortcodes::class,
			// Api\Widgets\TextWidget::class,
			Plugins\Acf::class,
			Plugins\ContactForm7::class,
			Custom\Custom::class,
			Custom\Filters::class,
			Woo\Woo::class,
		]; 
	}

	/**
	 * Loop through the classes, initialize them, and call the register() method if it exists.
	 *
	 * @return
	 */
	public static function register_services()
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class.
	 *
	 * @param class $class class from the services array
	 * @return class instance new instance of the class
	 */
	private static function instantiate( $class )
	{
		return new $class();
	}

}
