<?php
namespace TVogt\HttpsEnforcer\Controller;

/***************************************************************
*  Copyright notice
*
*  (c) 2003-2005 Gary (gniemcew@yahoo.com)
*  (c) 2006-2013 Florian (florian.schlichting@gmx.de)
*  (c) 2014- Thomas (vogt.muc@gmail.com)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

class HttpsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var array
	 */
	protected $pluginConfiguration;

	/**
	 * action initialize
	 * @return void
	 */
	public function initializeAction() {
		
		$this->pluginConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
	}
	
	/**
	 * action main
	 * @return void
	 */
	public function mainAction() {
		// 	check if http|s enforcment is enabled
		if ($this->pluginConfiguration['disable_httpsenforcer_for_be_user'] && $GLOBALS['BE_USER']->user) {
			// do nothing and return
		} else {
			// replace protocol and (un)secure_typo3_root
			if ($this->ext_requiresSSL() && !$this->ext_isSSL($this->pluginConfiguration['sslPort']))	{
				$baseURI = explode($this->pluginConfiguration['unsecure_typo3_root'], \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'));
				// https://ssl_proxy.myisp.com/www.mydomain.org/?123 forwards to http://www.mydomain.org/?123
				$ssl_proxy = ($this->pluginConfiguration['ssl_proxy']=='') ? '' : $this->pluginConfiguration['ssl_proxy'].'/';
				$url = 'https://'.$ssl_proxy.$this->pluginConfiguration['secure_typo3_root'].$baseURI[1];
				$this->ext_hardRedirect($url);
			} elseif (!$this->ext_requiresSSL() && $this->ext_isSSL($this->pluginConfiguration['sslPort']) && !$this->pluginConfiguration['always_allow_SSL'])	{
				$baseURI = explode($this->pluginConfiguration['secure_typo3_root'],\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'));
				$url = 'http://'.$this->pluginConfiguration['unsecure_typo3_root'].$baseURI[1];
				$this->ext_hardRedirect($url);
			}
		}
	}
	
	/**
	 * Check if the current page is already SSL encrypted
	 *
	 * This is done by checking the SERVER_PORT and HTTPS variables,
	 * unless we have configured an SSL-proxy, then HTTP_X_FORWARDED_SERVER is checked.
	 *
	 * @param	integer		Port number to check
	 * @return	boolean		TRUE if successful, FALSE otherwise
	 * @access	public
	 */
	private function ext_isSSL($port = 443)	{
		if ($this->pluginConfiguration['ssl_proxy'] != '') {
			return (@$_SERVER['HTTP_X_FORWARDED_SERVER'] === $this->pluginConfiguration['ssl_proxy']);
		} elseif (@$_SERVER['SERVER_PORT'] != $port) {
			return false;
		} elseif ( (@$_SERVER['HTTPS'] != 'on')	AND (@$_SERVER['HTTPS'] != 1) ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Check if the current page does require SSL encryption
	 *
	 * @return	boolean		TRUE if SSL is required for this page, FALSE otherwise
	 * @access	public
	 */
	private function ext_requiresSSL() {
		if($GLOBALS['TSFE']->page['tx_httpsenforcer_force_secure'] || $this->pluginConfiguration['require_ssl']) {
			return true;
		}
	}

	/**
	 * Send a redirect header
	 *
	 * @param	string		URL to redirect to
	 * @return	void
	 * @access	public
	 */
	private function ext_hardRedirect($url)	{
		// header("HTTP 302 Redirect");
		header('Location: ' . $url);
		exit;
	}
}

?>
