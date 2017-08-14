.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _user-manual-configuring-the-extension:

Configuring the Extension
-------------------------

Once the extension is loaded and added to your site template TypoScript, it is time to inform it
what URLs you want to use for a secure server, and a non-secure (standard) server. (NB: both
settings are mandatory!)

#. Login into the TYPO3 backend (administration) using the
   http://www.mydomain.org/typo3/ URL.
#. In the core module menu select WEB > Template.
#. In the page tree, click on the node that contains your site template.
#. From the top-left drop-down menu, select **Constant Editor**.
#. In the Category drop down below, select **PLUGIN.TX_HTTPSENFORCER(7)**.
#. Click on the “Edit this Constant” pencil next to **plugin.tx_httpsenforcer.secure_typo3_root** and **plugin.tx_httpsenforcer.unsecure_typo3_root**. At this point
   TYPO3 should allow you to assign your own values for the configuration settings.
#. The secure_typo3_root setting is the URL to your secure server TYPO3 root location. Please specify
   it without the https:// prefix and without a trailing slash. It can be in the form
   *secure.mydomain.com*, *www.mydomain.com/secure_folder* or *secure14.myisp.com/~mydomain*. The latter is most common in virtual hosting environments
   – you will have to find that out from your Internet Service Provider. Please note that this
   setting HAS TO INCLUDE THE FULL PATH TO YOUR TYPO3 SYSTEM INSTALLATION DIRECTORY for the URL
   translation to work correctly in most situations.
#. The unsecure_typo3_root setting is a URL to your regular (non-secure) server TYPO3 root location.
   Please specify it without the http:// prefix and without a trailing slash. It can be in the form
   *www.myisp.com/~myusername*, *www.mydomain.com/regular_folder* or *www.mydomain.com*. Please note
   that this setting HAS TO INCLUDE THE FULL PATH TO YOUR TYPO3 SYSTEM INSTALLATION DIRECTORY for the
   URL translation to work correctly in most situations.
#. Click on **Save** to update your TypoScript constants.

In effect, this adds the following two lines to your template's Constants section:

**plugin.tx_httpsenforcer.secure_typo3_root = ssl.mydomain.org** 

**plugin.tx_httpsenforcer.unsecure_typo3_root = www.mydomain.org** 

For a more detailed explanation of the secure_typo3_root and unsecure_typo3_root constants and some
examples, as well as the other configuration options, please see the Reference table below.
