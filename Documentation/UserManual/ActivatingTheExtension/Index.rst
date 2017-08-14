.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _user-manual-activating-the-extension:

Activating the Extension
------------------------

The HTTPS Enforcer extension is really just a “modularized” piece of code that checks the
current requested page URL and forces a redirect depending on whether that URL is correct for the
current page or not. As such, it is nothing more than a piece of PHP code with the designation
“user” and “internal non-cached” (USER_INT) to the TYPO3 system.

Even if the HTTPS Enforcer extension is loaded, it is just being made “available”, it is not
assigned or injected anywhere, yet. It is up to you to pick an appropriate spot to inject it. What
is suggested here is to check every page and enforce the correct page access accordingly (encrypted
for pages marked as “secure”, and unencrypted for pages not marked as “secure”). Thus a good
spot to “inject” the HTTPS Enforcer would be your MAIN (rootpage) TypoScript template PAGE
object, so that when your main PAGE object is getting worked up and rendered, the check and the
possible redirect will happen.

#. Login into the TYPO3 backend (administration) using the `http://www.mydomain.org/typo3/
   <http://www.mydomain.org/typo3/>`__  URL.
#. In the core module menu select WEB > Template.
#. In the page tree, click on the node that contains your site template.
#. From the top-left drop-down menu, select **Info/Modify**.
#. Click on the “Edit the whole template record” button at the end of the site.
#. Select tab “Includes” and in the “Include static (from extensions)” part select **Https Enforcer (https_enforcer)** from the list of Available Items.
#. Afterwards switch to the tab “General” and scroll down to the **Setup** section.
#. Locate your main TypoScript PAGE object. It should be declared similarly to **page =
   PAGE** . One of the next TypoScript statements probably reads: **page.10 = FLUIDTEMPLATE** or
   something similar.
#. Pick a numerical index right before the very first assignment in your PAGE object (so that the
   http/https check happens **before**  a full page is rendered) and load the necessary **Extbase
   Action Controller**  right in there:  **page.5 = USER_INT** . See details on TypoScript
   configuration below.
#. Click on **Save** to update your TypoScript configuration.

In effect, your TypoScript for the MAIN (rootpage) TypoScript setup section should look as follows::


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

