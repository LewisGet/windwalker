<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Session\Handler;

use Windwalker\Session\Database\AbstractDatabaseAdapter;

/**
 * Database session storage handler for PHP
 *
 * @see    http://www.php.net/manual/en/function.session-set-save-handler.php
 * @since  1.0
 */
class DatabaseHandler extends AbstractHandler
{
	/**
	 * The DatabaseAdapter to use when querying.
	 *
	 * @var AbstractDatabaseAdapter
	 */
	protected $db;

	/**
	 * Constructor
	 *
	 * @param  AbstractDatabaseAdapter $db
	 *
	 * @throws \RuntimeException
	 * @since   1.0
	 */
	public function __construct(AbstractDatabaseAdapter $db)
	{
		$this->db = $db;
	}

	/**
	 * Re-initializes existing session, or creates a new one.
	 *
	 * @param string $savePath    Save path
	 * @param string $sessionName Session name, see http://php.net/function.session-name.php
	 *
	 * @return bool true on success, false on failure
	 */
	public function open($savePath, $sessionName)
	{
		return true;
	}

	/**
	 * Closes the current session.
	 *
	 * @return bool true on success, false on failure
	 */
	public function close()
	{
		return true;
	}

	/**
	 * Read the data for a particular session identifier from the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  string  The session data.
	 *
	 * @since   1.0
	 */
	public function read($id)
	{
		try
		{
			return $this->db->read($id);
		}
		catch (\Exception $e)
		{
			return false;
		}
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
	 * @param   string  $id    The session identifier.
	 * @param   string  $data  The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   1.0
	 */
	public function write($id, $data)
	{
		try
		{
			return $this->db->write($id, $data);
		}
		catch (\Exception $e)
		{
			return false;
		}
	}

	/**
	 * Destroy the data for a particular session identifier in the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   1.0
	 */
	public function destroy($id)
	{
		try
		{
			return $this->db->destroy($id);
		}
		catch (\Exception $e)
		{
			return false;
		}
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
	 * @param   integer  $lifetime  The maximum age of a session.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   1.0
	 */
	public function gc($lifetime = 1440)
	{
		// Determine the timestamp threshold with which to purge old sessions.
		$past = time() - $lifetime;

		try
		{
			return $this->db->gc($past);
		}
		catch (\Exception $e)
		{
			return false;
		}
	}

	/**
	 * isSupported
	 *
	 * @return  boolean
	 */
	public static function isSupported()
	{
		return true;
	}
}