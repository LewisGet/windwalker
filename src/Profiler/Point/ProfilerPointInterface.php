<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Profiler\Point;

/**
 * Interface ProfilerPointInterface
 *
 * @since  2.0
 */
interface ProfilerPointInterface
{
	/**
	 * Get the name of this profile point.
	 *
	 * @return  string  The name of this profile point.
	 */
	public function getName();

	/**
	 * Get the elapsed time in seconds since the first
	 * point in the profiler it belongs to was marked.
	 *
	 * @return  float  The time in seconds.
	 */
	public function getTime();

	/**
	 * Get the allocated amount of memory in bytes
	 * since the first point in the profiler it belongs to was marked.
	 *
	 * @param bool $megaBytes
	 *
	 * @return  integer  The amount of allocated memory in B.
	 */
	public function getMemory($megaBytes = false);
}
