<?php
/**
 * Core Design Scriptegrator plugin for Joomla! 2.5
 * @author		Daniel Rataj, <info@greatjoomla.com>
 * @package		Joomla 
 * @subpackage	System
 * @category	Plugin
 * @version		2.5.x.2.3.5
 * @copyright	Copyright (C) 2007 - 2013 Great Joomla!, http://www.greatjoomla.com
 * @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL 3
 * 
 * This file is part of Great Joomla! extension.   
 * This extension is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This extension is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

defined('_JEXEC') or die;

class PlgSystemCDScriptegratorLibraryphpjs
{
	/**
	 * Get instance
	 * 
	 * @param	$params
	 * @return	instance
	 */
	public static function getInstance()
	{
		static $instance;
		if ($instance == null)
		{
			$instance = new PlgSystemCDScriptegratorLibraryphpjs();
		}
		return $instance;
	}
	
	/**
	 * Import files to header
	 * 
	 * @return array
	 */
	public function importFiles()
	{
		return array(
			'js/php.default.namespaced.min.js'
		);
	}
}
?>