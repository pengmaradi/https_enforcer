.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _user-manual-configuring-the-pages:

Configuring the Pages
---------------------

Once the plugin is up and running, it is time to designate some pages as “secure” and see if the
forwards are happening correctly.

#. Login into the TYPO3 backend (administration) using the
   http://www.mydomain.org/typo3/ URL.
#. In the core module menu select WEB > Page.
#. In the page tree, click on any node that represents a page.
#. Click on the "Edit page properties" header button.
#. In the tab "Behaviour" there should be a checkbox called **HTTPS Enforcer (SSL)** at the bottom of the palette "Miscellaneous".
   If the box is checked, all requests for the page will be made over a secure (encrypted) connection. If the box is unchecked, all requests for the page will be made
   over an insecure (unencrypted) connection.
