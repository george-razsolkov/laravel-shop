<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017
 * @package Admin
 * @subpackage JQAdm
 */


namespace Aimeos\Admin\JQAdm\Type\Product;


/**
 * Factory for product type JQAdm client
 *
 * @package Admin
 * @subpackage JQAdm
 */
class Factory
	extends \Aimeos\Admin\JQAdm\Common\Factory\Base
	implements \Aimeos\Admin\JQAdm\Common\Factory\Iface
{
	/**
	 * Creates a product type client object
	 *
	 * @param \Aimeos\MShop\Context\Item\Iface $context Shop context instance with necessary objects
	 * @param array $templatePaths List of file system paths where the templates are stored
	 * @param string|null $name Admin name (default: "Standard")
	 * @return \Aimeos\Admin\JQAdm\Iface Filter part implementing \Aimeos\Admin\JQAdm\Iface
	 * @throws \Aimeos\Admin\JQAdm\Exception If requested client implementation couldn't be found or initialisation fails
	 */
	public static function createClient( \Aimeos\MShop\Context\Item\Iface $context, array $templatePaths, $name = null )
	{
		/** admin/jqadm/type/product/name
		 * Class name of the used account favorite client implementation
		 *
		 * Each default admin client can be replace by an alternative imlementation.
		 * To use this implementation, you have to set the last part of the class
		 * name as configuration value so the client factory knows which class it
		 * has to instantiate.
		 *
		 * For example, if the name of the default class is
		 *
		 *  \Aimeos\Admin\JQAdm\Type\Product\Standard
		 *
		 * and you want to replace it with your own version named
		 *
		 *  \Aimeos\Admin\JQAdm\Type\Product\Myfavorite
		 *
		 * then you have to set the this configuration option:
		 *
		 *  admin/jqadm/type/product/name = Myfavorite
		 *
		 * The value is the last part of your own class name and it's case sensitive,
		 * so take care that the configuration value is exactly named like the last
		 * part of the class name.
		 *
		 * The allowed characters of the class name are A-Z, a-z and 0-9. No other
		 * characters are possible! You should always start the last part of the class
		 * name with an upper case character and continue only with lower case characters
		 * or numbers. Avoid chamel case names like "MyFavorite"!
		 *
		 * @param string Last part of the class name
		 * @since 2017.10
		 * @category Developer
		 */
		if( $name === null ) {
			$name = $context->getConfig()->get( 'admin/jqadm/type/product/name', 'Standard' );
		}

		if( ctype_alnum( $name ) === false )
		{
			$classname = is_string( $name ) ? '\\Aimeos\\Admin\\JQAdm\\Type\\Product\\' . $name : '<not a string>';
			throw new \Aimeos\Admin\JQAdm\Exception( sprintf( 'Invalid characters in class name "%1$s"', $classname ) );
		}

		$iface = '\\Aimeos\\Admin\\JQAdm\\Iface';
		$classname = '\\Aimeos\\Admin\\JQAdm\\Type\\Product\\' . $name;

		$client = self::createClientBase( $context, $classname, $iface, $templatePaths );

		return self::addClientDecorators( $context, $client, $templatePaths, 'type/product' );
	}

}