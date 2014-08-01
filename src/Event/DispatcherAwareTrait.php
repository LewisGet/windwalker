<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Event;

use Windwalker\Event\Event\EventInterface;

/**
 * Class DispatcherAwareTrait
 *
 * @since 1.0
 */
trait DispatcherAwareTrait
{
	/**
	 * Property dispatcher.
	 *
	 * @var  Dispatcher
	 */
	protected $dispatcher = null;

	/**
	 * Trigger an event.
	 *
	 * @param   EventInterface|string  $event  The event object or name.
	 *
	 * @return  EventInterface  The event after being passed through all listeners.
	 *
	 * @since   1.0
	 */
	public function triggerEvent($event)
	{
		$this->dispatcher->triggerEvent($event);
	}

	/**
	 * getDispatcher
	 *
	 * @return  \Windwalker\Event\Dispatcher
	 */
	public function getDispatcher()
	{
		return $this->dispatcher;
	}

	/**
	 * setDispatcher
	 *
	 * @param   \Windwalker\Event\Dispatcher $dispatcher
	 *
	 * @return  DispatcherAwareTrait  Return self to support chaining.
	 */
	public function setDispatcher($dispatcher)
	{
		$this->dispatcher = $dispatcher;

		return $this;
	}
}
