<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  	Blair Winans 2011
 * @author     	Blair Winans <blair@winanscreative.com>
 * @package    	Isotope Messaging
 * @license    	LGPL
 * @filesource
 */
 
/**
* Config
*/
$GLOBALS['TL_DCA']['tl_iso_orders']['config']['ctable'][] = 'tl_iso_messaging';

/**
* List
*/
$GLOBALS['TL_DCA']['tl_iso_orders']['list']['operations']['messaging'] = array
(
	'label'               => &$GLOBALS['TL_LANG']['tl_iso_orders']['messaging'],
	'href'                => 'table=tl_iso_messaging',
	'icon'                => 'system/modules/isotope_messaging/html/iso_messaging.png'
);
 
/**
* Fields
*/
$GLOBALS['TL_DCA']['tl_iso_orders']['fields']['messages'] = array
(
	'label'					=> &$GLOBALS['TL_LANG']['tl_iso_orders']['messages'],
	'inputType'				=> 'dcaWizard',
	'foreignTable'			=> 'tl_iso_messaging',
);
 
 ?>