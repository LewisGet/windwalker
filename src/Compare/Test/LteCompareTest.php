<?php
/**
 * Part of Windwalker project Test files.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Compare\Test;

use Windwalker\Compare\LteCompare;

/**
 * Test class of LteCompare
 *
 * @since {DEPLOY_VERSION}
 */
class LteCompareTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Test instance.
	 *
	 * @var LteCompare
	 */
	protected $instance;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->instance = new LteCompare('flower', 'sakura');
	}

	/**
	 * testToString
	 *
	 * @return  void
	 */
	public function testToString()
	{
		$this->assertEquals('flower <= sakura', $this->instance->toString());
	}

	/**
	 * testToString
	 *
	 * @return  void
	 */
	public function testCompare()
	{
		$compare = new LteCompare(5, 5);

		$this->assertTrue($compare->compare());

		$compare = new LteCompare(4, 5);

		$this->assertTrue($compare->compare());

		$compare = new LteCompare(6, 5);

		$this->assertFalse($compare->compare());
	}
}