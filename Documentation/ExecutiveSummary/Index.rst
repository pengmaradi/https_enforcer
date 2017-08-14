.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _executive-summary:

Executive Summary
=================

#. Load the **Page HTTPS (SSL) Enforcer**  extension from the repository.
#. Call **bootstrap->run**  method (extbase) in your main **PAGE**  object in the **TypoScript setup** .
#. Specify secure and insecure domain through TypoScript **Constants Editor** , **PLUGIN.TX_HTTPSENFORCER(7)**  section.
#. Edit a page to mark the checkbox in the **HTTPS Enforcer (SSL)**  section.

TypoScript Template **constants**  snippet:

**plugin.tx_httpsenforcer.secure_typo3_root = ssl.mydomain.org** 

**plugin.tx_httpsenforcer.unsecure_typo3_root = www.mydomain.org** 

TypoScript Template **setup**  snippet (extbase specific)::

	page = PAGE
	page.5 = USER_INT
	page.5 {
	  vendorName = TVogt
	  extensionName = HttpsEnforcer
	  pluginName = Pi1
	  controllerName = Https
	  switchableControllerActions {
	    Https {
		  1 = main
		}
	  }
	  userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
	}



