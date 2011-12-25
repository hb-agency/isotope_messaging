<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
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
 * @copyright  Winans Creative 2009, Intelligent Spark 2010, iserv.ch GmbH 2010
 * @author     Fred Bliss <fred.bliss@intelligentspark.com>
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Table tl_iso_messaging
 */
$GLOBALS['TL_DCA']['tl_iso_messaging'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'					=> 'Table',
		'ptable'								=> 'tl_iso_orders',
		'onload_callback' => array
		(
			array('IsotopeBackend', 'hideArchivedRecords'),
		),
		'onsubmit_callback'			=> array(
			array('tl_iso_messaging', 'sendMessages')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'					=> 4,
			'fields'					=> array('tstamp'),
			'flag'						=> 5,
			'panelLayout'			=> 'filter;search,limit',
			'headerFields'		=> array('order_id', 'billing_address'),
			'disableGrouping'	=> true,
		),
		'label' => array
		(
			'fields'					=> array('subject'),
			'format'				=> '%s',
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'				=> 'act=select',
				'class'				=> 'header_edit_all',
				'attributes'		=> 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['edit'],
				'href'				=> 'act=edit',
				'icon'				=> 'edit.gif'
			),
			'copy' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['copy'],
				'href'				=> 'act=copy',
				'icon'				=> 'copy.gif'
			),
			'show' => array
			(
				'label'				=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['show'],
				'href'				=> 'act=show',
				'icon'				=> 'show.gif'
			),
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'			=> array('textOnly'),
		'default'					=> '{message_legend},subject,senderName,sender,cc,bcc;{attach_legend:hide},attachments,attachDocument,documentTemplate,documentTitle;{content_legend},message;{template_legend},template',
		'dcawizard'				=> 'subject,senderName,sender,cc,bcc,attachments,attachDocument,documentTemplate,documentTitle,message,template',
	),

	// Fields
	'fields' => array
	(
		
		'subject' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['subject'],
			'exclude'				=> true,
			'inputType'			=> 'text',
			'eval'					=> array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'long'),
		),
		'message' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['message'],
			'exclude'                 => true,
			'search'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'decodeEntities'=>true, 'helpwizard'=>true),
			'explanation'             => 'isoMailTokens',
		),
		'text' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['text'],
			'exclude'                 => true,
			'search'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'decodeEntities'=>true, 'helpwizard'=>true),
			'explanation'             => 'isoMailTokens',
		),
		'template' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['template'],
			'exclude'				=> true,
			'inputType'			=> 'select',
			'default'				=> 'mail_default',
			'options' 				=> $this->getTemplateGroup('mail_'),
			'eval'					=> array('mandatory'=>true, 'tl_class'=>'w50'),
		),
		'senderName' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['senderName'],
			'exclude' 				=> true,
			'inputType'			=> 'text',
			'eval'					=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'load_callback'		=> array(
				array('tl_iso_messaging', 'getConfigData')
			)
		),
		'sender' => array
		(
			'label' 					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['sender'],
			'exclude'				=> true,
			'inputType'			=> 'text',
			'eval' 					=> array('mandatory'=>true, 'maxlength'=>255, 'rgxp'=>'email', 'tl_class'=>'w50'),
			'load_callback'		=> array(
				array('tl_iso_messaging', 'getConfigData')
			)
		),
		'cc' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['cc'],
			'exclude'				=> true,
			'inputType'			=> 'text',
			'eval'					=> array('maxlength'=>255, 'rgxp'=>'extnd', 'tl_class'=>'w50'),
		),
		'bcc' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['bcc'],
			'exclude'				=> true,
			'inputType'			=> 'text',
			'eval'					=> array('maxlength'=>255, 'rgxp'=>'extnd', 'tl_class'=>'w50'),
		),
		'attachments' => array
		(
		  	'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['attachments'],
		  	'inputType'			=> 'fileTree',
		  	'eval'					=> array('mandatory'=>false, 'files'=>true, 'filesOnly'=>true,'fieldType' => 'checkbox'),
		),
		'attachDocument' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['attachDocument'],
			'exclude'				=> true,
			'inputType'			=> 'checkbox',
			'eval'					=> array('submitOnChange'=>true, 'tl_class'=>'clr'),
		),
		'documentTemplate'	=> array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['documentTemplate'],
			'exclude'				=> true,
			'inputType'			=> 'select',
			'options'				=> $this->getTemplateGroup('iso_invoice'),
			'eval'					=> array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		),
		'documentTitle'		=> array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_iso_messaging']['documentTitle'],
			'exclude'				=> true,
			'inputType'			=> 'text',
			'eval'					=> array('maxlength'=>255, 'tl_class'=>'w50'),
		),
	)
);


class tl_iso_messaging extends Backend
{
	
	public function __construct()
	{
		parent::__construct();

		$this->import('BackendUser', 'User');
		$this->import('Isotope');
	}
	
	
	public function sendMessages(DataContainer $dc)
	{
		$objOrder = new IsotopeBackendOrder();
		
		if (!$objOrder->findBy('id',$dc->activeRecord->pid))
		{
			$this->log('Invalid order ID! "' . $dc->activeRecord->pid . '"', __METHOD__, TL_ERROR);
			return;
		}
		
		$this->Isotope->Order = $objOrder;
		
		$arrBilling = $this->Isotope->Order->billingAddress;
		if(!strlen($arrBilling['email']))
		{
			echo $this->Isotope->Order->id; var_dump($arrBilling); exit;
		}
		$arrData = is_array($this->Isotope->Order->email_data) ? $this->Isotope->Order->email_data : array();
		$arrPlainData = array_map('strip_tags', $arrData);
		
		try
		{
			$objEmail = new Email();
			$objEmail->from = $dc->activeRecord->sender;
			$objEmail->fromName = $dc->activeRecord->senderName;
			$objEmail->subject = $this->Isotope->parseSimpleTokens($this->Isotope->replaceInsertTags($dc->activeRecord->subject), $arrPlainData);
			$objEmail->text = $this->Isotope->parseSimpleTokens($this->Isotope->replaceInsertTags($this->html2text($dc->activeRecord->message)), $arrPlainData);
			$objEmail->replyTo($dc->activeRecord->sender);

			$css = '';

			// Add style sheet newsletter.css
			if (file_exists(TL_ROOT . '/newsletter.css'))
			{
				$buffer = file_get_contents(TL_ROOT . '/newsletter.css');
				$buffer = preg_replace('@/\*\*.*\*/@Us', '', $buffer);

				$css  = '<style type="text/css">' . "\n";
				$css .= trim($buffer) . "\n";
				$css .= '</style>' . "\n";
				$arrData['head_css'] = $css;
			}

			// Add HTML content
			if (strlen($dc->activeRecord->message))
			{
				// Get mail template
				$objTemplate = new IsotopeTemplate((strlen($dc->activeRecord->template) ? $dc->activeRecord->template : 'mail_default'));

				$objTemplate->body = $dc->activeRecord->message;
				$objTemplate->charset = $GLOBALS['TL_CONFIG']['characterSet'];
				$objTemplate->css = '##head_css##';

				// Prevent parseSimpleTokens from stripping important HTML tags
				$GLOBALS['TL_CONFIG']['allowedTags'] .= '<doctype><html><head><meta><style><body>';
				$strHtml = str_replace('<!DOCTYPE', '<DOCTYPE', $objTemplate->parse());
				$strHtml = $this->Isotope->parseSimpleTokens($this->Isotope->replaceInsertTags($strHtml), $arrData);
				$strHtml = str_replace('<DOCTYPE', '<!DOCTYPE', $strHtml);

				// Parse template
				$objEmail->html = $strHtml;
				$objEmail->imageDir = TL_ROOT . '/';
			}

			if ($dc->activeRecord->cc != '')
			{
				$arrRecipients = trimsplit(',', $dc->activeRecord->cc);
				$objEmail->sendCc($arrRecipients);
			}
			
			if ($dc->activeRecord->bcc != '')
			{
				$arrRecipients = trimsplit(',', $dc->activeRecord->bcc);
				$objEmail->sendBcc($arrRecipients);
			}

			$attachments = deserialize($dc->activeRecord->attachments);
			if (is_array($attachments) && count($attachments) > 0)
			{
				foreach($attachments as $attachment)
				{
					if(file_exists(TL_ROOT . '/' . $attachment))
					{
						$objEmail->attachFile(TL_ROOT . '/' . $attachment);
					}
				}
			}

			if ($dc->activeRecord->attachDocument && $this->Isotope->Order instanceof IsotopeProductCollection)
			{
				$strTemplate = ($dc->activeRecord->documentTemplate ? $dc->activeRecord->documentTemplate : null);

				$objPdf = $this->Isotope->Order->generatePDF($strTemplate, null, false);
				$objPdf->lastPage();

				$strTitle = $this->Isotope->parseSimpleTokens($this->Isotope->replaceInsertTags($dc->activeRecord->documentTitle), $arrPlainData);

				$objEmail->attachFileFromString($objPdf->Output($strTitle.'.pdf', 'S'), $strTitle.'.pdf', 'application/pdf');
			}

			$objEmail->sendTo($arrBilling['email']);
			
			//Archive the email
			$this->Database->prepare("UPDATE tl_iso_messaging SET archive=1 WHERE id=?")->execute($dc->activeRecord->id);
			
		}
		catch( Exception $e )
		{
			$this->log('Isotope email error: ' . $e->getMessage(), __METHOD__, TL_ERROR);
		}
	
	}
	
	public function getConfigData($varValue, DataContainer $dc)
	{
		if(strlen($varValue))
			return $varValue;
		
		switch($dc->field)
		{
			case 'sender':
				return strlen($this->Isotope->Config->shippingEmail) ? $this->Isotope->Config->shippingEmail : $GLOBALS['TL_CONFIG']['adminEmail'];
				break;
				
			case 'senderName':
				return strlen($this->Isotope->Config->label) ? $this->Isotope->Config->label : $GLOBALS['TL_CONFIG']['websiteTitle'];
				break;
				
			default:
				return;
		
		}
	}
	
	
	protected function html2text($strDocument) 
	{
		$arrRules = array (
			'@<script[^>]*?>.*?</script>@si', // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',          // Strip out HTML tags
            '@([\r\n])[\s]+@',                // Strip out white space
            '@&(quot|#34);@i',                // Replace HTML entities
            '@&(amp|#38);@i',                 //   Ampersand &
            '@&(lt|#60);@i',                  //   Less Than <
            '@&(gt|#62);@i',                  //   Greater Than >
            '@&(nbsp|#160);@i',               //   Non Breaking Space
            '@&(iexcl|#161);@i',              //   Inverted Exclamation point
            '@&(cent|#162);@i',               //   Cent 
            '@&(pound|#163);@i',              //   Pound
            '@&(copy|#169);@i',               //   Copyright
            '@&(reg|#174);@i',                //   Registered
            '@&#(d+);@e'					  // Evaluate as php
		);                   
		                
		$arrReplace = array (
		  '',
          '',
          '1',
          '"',
          '&',
          '<',
          '>',
          ' ',
          chr(161),
          chr(162),
          chr(163),
          chr(169),
          chr(174),
          'chr()'
        );
  		
  		return preg_replace($arrRules, $arrReplace, $strDocument);
	}

}

