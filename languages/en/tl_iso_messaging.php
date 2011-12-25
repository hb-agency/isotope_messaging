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
 * Headlines
 */
 $GLOBALS['TL_LANG']['tl_iso_messaging']['messages']				= 'Messages';
 
 /**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_iso_messaging']['subject'] 				= array('Message subject', 'Enter the subject of the message.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['senderName'] 			= array('Sender name', 'Enter the name of the sender as you would like it to appear.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['sender'] 					= array('Sender email', 'Enter the email of the sender.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['cc'] 						= array('Send copy', 'If you would like to CC someone, enter their email here.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['bcc'] 						= array('Send blind copy', 'If you would like to Blind CC someone, enter their email here.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['attachments'] 		= array('Attachments', 'Please choose the files you want to send along with this e-mail message.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['attachDocument']	= array('Attach an order document', 'Allows you to generate an additional document as a PDF attachment for this email.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['documentTemplate']	= array('Document template', 'Select an document template to override the default collection template.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['documentTitle']			= array('Document title', 'Please specify a title for the attached document.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['template']				= array('Email Template', 'Here you can select an HTML e-mail template to use.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['message']			= array('Message Content', 'Enter the HTML text of the message.');
$GLOBALS['TL_LANG']['tl_iso_messaging']['text']					= array('Plain Text Content', 'Enter the plain text of the message.');

 /**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_iso_messaging']['message_legend'] 		= 'Message details';
$GLOBALS['TL_LANG']['tl_iso_messaging']['attach_legend'] 			= 'Attachments';
$GLOBALS['TL_LANG']['tl_iso_messaging']['content_legend'] 		= 'Message content';
$GLOBALS['TL_LANG']['tl_iso_messaging']['template_legend'] 		= 'Message template';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_iso_messaging']['new']    	= array('New Message', 'Create a new message');
$GLOBALS['TL_LANG']['tl_iso_messaging']['edit']   	= array('Edit ', 'Edit message ID %s');
$GLOBALS['TL_LANG']['tl_iso_messaging']['delete'] 	= array('Delete ', 'Delete message ID %s');
$GLOBALS['TL_LANG']['tl_iso_messaging']['goBack'] 	='Go Back';

 
 ?>