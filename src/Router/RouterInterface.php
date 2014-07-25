<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Router;

/**
 * Interface RouterInterface
 */
interface RouterInterface
{
	/**
	 * match
	 *
	 * @param string $route
	 *
	 * @return  mixed
	 *
	 * @throws \InvalidArgumentException
	 */
	public function match($route);
}
 