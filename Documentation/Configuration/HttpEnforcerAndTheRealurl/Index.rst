.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-http-enforcer-and-the-realurl:

HTTP Enforcer and the RealURL extension
---------------------------------------

Since 1.0.8, HTTPS Enforcer supports the mapping of a page hierarchy and GETvars to directories as
done by the RealURL extension (with class.tx_realurl_advanced.php).

To avoid alerts that “**parts of this page are loaded over an insecure connection** ” when
redirected to an encrypted page by HTTP Enforcer, you have to make realurl's **config.baseURL** 
depend on the state of HTTP Enforcer. One way to do this in conjunction with the page header field
is to add the following lines to you site template's Setup::

	[globalVar = TSFE:page|tx_httpsenforcer_force_secure = 0]
	  config.baseURL = http://www.mydomain.org/
	[else]
	  config.baseURL = https://ssl.mydomain.org/
	[global]

If you are using the **plugin.tx_httpsenforcer.require_ssl** constant, I suggest you set config.baseURL
accordingly in the same template record.
