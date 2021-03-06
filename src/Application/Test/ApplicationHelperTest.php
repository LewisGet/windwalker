<?php
/**
 * Part of Windwalker project Test files.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT Taiwan, Inc. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Application\Test;

use Windwalker\Application\Helper\ApplicationHelper;

/**
 * Test class of ApplicationHelper
 *
 * @since 2.0
 */
class ApplicationHelperTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Method to test isAscii().
	 *
	 * @return void
	 *
	 * @covers Windwalker\Application\Helper\ApplicationHelper::isAscii
	 */
	public function testIsAscii()
	{
		$this->assertTrue(ApplicationHelper::isAscii('Shakespeare'));
		$this->assertFalse(ApplicationHelper::isAscii('莎士比亞 Shakespeare'));
	}
}
