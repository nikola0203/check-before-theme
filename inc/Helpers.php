<?php
/**
 * Helpers methods.
 * List all your static functions you wish to use globally on your theme.
 *
 * @package check_before_theme
 */

if ( ! function_exists( 'print_var' ) ) {
	/**
	 * Var_dump and die method
	 *
	 * @return void
	 */
	function print_var($x) {
		echo '<pre>';
		print_r($x);
		echo '</pre>';
	}
}

if ( ! function_exists( 'dd' ) ) {
	/**
	 * Var_dump and die method
	 *
	 * @return void
	 */
	function dd() {
		echo '<pre>';
		array_map( function( $x ) {
			var_dump( $x );
		}, func_get_args() );
		echo '</pre>';
		die;
	}
}

if ( ! function_exists( 'starts_with' ) ) {
	/**
	 * Determine if a given string starts with a given substring.
	 *
	 * @param string $haystack
	 * @param string|array $needles
	 * @return bool
	 */
	function starts_with($haystack, $needles)
	{
		foreach ((array) $needles as $needle) {
			if ( $needle != '' && substr($haystack, 0, strlen($needle)) === (string) $needle ) {
				return true;
			}
		}
		return false;
	}
}

if ( ! function_exists( 'mix' ) ) {
	/**
	 * Get the path to a versioned Mix file.
	 *
	 * @param string $path
	 * @param string $manifestDirectory
	 * @return \Illuminate\Support\HtmlString
	 *
	 * @throws \Exception
	 */
	function mix( $path, $manifestDirectory = '' )
	{
		if (! $manifestDirectory) {
			// Setup path for standard App-Folder-Structure.
			$manifestDirectory = "assets/dist/";
		}
		static $manifest;
		if (! starts_with($path, '/')) {
			$path = "/{$path}";
		}
		if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
			$manifestDirectory = "/{$manifestDirectory}";
		}
		$rootDir = dirname(__FILE__, 2);
		if (file_exists($rootDir . '/' . $manifestDirectory.'/hot')) {
			return getenv('WP_SITEURL') . ":8080" . $path;
		}
		if (! $manifest) {
			$manifestPath =  $rootDir . $manifestDirectory . 'mix-manifest.json';
			if (! file_exists($manifestPath)) {
				throw new Exception('The Mix manifest does not exist.');
			}
			$manifest = json_decode(file_get_contents($manifestPath), true);
		}

		if (starts_with($manifest[$path], '/')) {
			$manifest[$path] = ltrim($manifest[$path], '/');
		}

		$path = $manifestDirectory . $manifest[$path];

		return get_template_directory_uri() . $path;
	}

	/**
   * Minify options field CSS
   *
   * @param string $option Option filed ID
   * @return css
   */
  function getOptionCss( $option )
  {
    $css = get_option( $option );
		// Remove comments
		$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		// Remove space after colons
		$buffer = str_replace(': ', ':', $buffer);
		// Remove whitespace
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return wp_filter_nohtml_kses( $buffer );
  }
}
