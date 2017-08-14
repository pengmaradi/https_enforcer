.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-reference:

TypoScript Reference
=======================

The table below shows all possible configuration options for the extension.

Properties
----------

.. container:: ts-properties

==================================== =========== ================================================================== ======================
Property                             Data type   Description                                                        Default
==================================== =========== ================================================================== ======================
secure_typo3_root                    string      Specifies TYPO3 installation root folder (directory)               www.example.org
                                                 when referencing through a secure server.
------------------------------------ ----------- ------------------------------------------------------------------ ----------------------
unsecure_typo3_root                  string      Specifies TYPO3 installation root folder (directory)               www.example.org
                                                 when referencing through a regular (unsecure) server.
------------------------------------ ----------- ------------------------------------------------------------------ ----------------------
require_ssl                          boolean     Require SSL for these pages: If set to 1, this page                0
                                                 plus all subpages will require SSL
------------------------------------ ----------- ------------------------------------------------------------------ ----------------------
disable_httpsenforcer_for_be_user    boolean     Disable HTTPS Enforcer for backend users: If set to 1,             0
                                                 users with valid TYPO3 backend user session can view
                                                 the site without protocol enforcement
------------------------------------ ----------- ------------------------------------------------------------------ ----------------------
ssl_proxy                            string      Name of your ISPs SSL proxy, without preceding https://            
                                                 or trailing slash.
------------------------------------ ----------- ------------------------------------------------------------------ ----------------------
always_allow_SSL                     boolean     Always allow secure connections: If set to 1, requests             0
                                                 for pages over a secure connection will not be
                                                 redirected to a non-secure URL
------------------------------------ ----------- ------------------------------------------------------------------ ----------------------
sslPort                              integer     SSL port: The port on which your machine receives                  443
                                                 secure connections, if different from the standard SSL
                                                 port (443).
==================================== =========== ================================================================== ====================== 


Property details
^^^^^^^^^^^^^^^^

.. only:: html

	.. contents::
		:local:
		:depth: 1


.. _ts-plugin-tx-httpsenforcer-securetypo3root:

secure_typo3_root
"""""""""""""""""

- DO NOT SPECIFY THE TRAILING SLASH
- MAKE SURE YOU ARE SPECIFYING THE ROOT OF THE TYPO3 INSTALLATION

Example 1:

- “regular”, unsecure URL for TYPO3 system: http://www.mydomain.com/index.php?id=30

- secure URL for TYPO3 system: http://secure12.myisp.com/~mydomain/index.php?id=30

- correct value: **secure12.myisp.com/~mydomain**

Example 2:

- “regular”, unsecure URL for TYPO3 system: http://www.mydomain.com/extranet/index.php?id=30

- secure URL for TYPO3 system: http://secure12.myisp.com/~mydomain/extranet/index.php?id=30

- correct value: **secure12.myisp.com/~mydomain/extranet**

.. _ts-plugin-tx-httpsenforcer-unsecuretypo3root:

unsecure_typo3_root
"""""""""""""""""""

- DO NOT SPECIFY THE TRAILING SLASH
- MAKE SURE YOU ARE SPECIFYING THE ROOT OF THE TYPO3 INSTALLATION

Example 1:

- “regular”, unsecure URL for TYPO3 system: http://www.mydomain.com/index.php?id=30

- correct value: **www.mydomain.com**

Example 2:

- “regular”, unsecure URL for TYPO3 system: http://www.mydomain.com/extranet/index.php?id=30

- correct value: **www.mydomain.com/extranet**

.. _ts-plugin-tx-httpsenforcer-sslproxy:

ssl_proxy
"""""""""

If set to a non-empty value, HTTPS Enforcer will prepend this string to the non-encrypted URL on SSL 
redirects and detect a secure connection status by comparing it to the value of HTTP_X_FORWARDED_SERVER.
See above on how to find out whether you need to set this.

.. _ts-plugin-tx-httpsenforcer-sslport:

ssl_port
""""""""

If your secure apache runs on, say, port 444, you will need to set that port here, as well as include it in 
https_enforcer.secure_typo3_root http://www.mydomain.com:**444/typo3/**). 
Some ISPs have a setup where the browser connects to the standard SSL port, but your server receives the 
connection on port 80, while the 'HTTPS' server variable is set to 'on' (check the output of phpinfo() 
to see if that's the case). You'll need to set https_enforcer.sslPort to 80 but leave https_enforcer.secure_typo3_root unmodified.
