.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-ssl-proxys:

SSL proxys
----------

It is quite common for shared hosting ISPs to provide SSL via their own domain (often in the form
https://secure.myisp.com/mydomain/), thus saving their customers the cost of an SSL certificate. In
a few cases, though, the setup is such that instead of directly serving the request,
secure.myisp.com only acts as a proxy, and will fetch the requested page via a normal (unencrypted)
request to the actual server. In this case, typo3 can not know whether the connection is really
secure (as all requests will be over http:// and usually port 80), and HTTPS Enforcer has to
redirect to a URL that it will never be called as (thus the usual detection of the realurl path via
secure_typo3_root fails).

An indication of this situation is when your secure URLs look like
`https://sslproxy.myisp.com/www.mydomain.org/path/as/configured/
<https://secure.myisp.com/www.mydomain.org/path/as/configured/>`__  i.e. they contain your
**complete** hostname, preceded by the name of your ISPs SSL proxy (this is actually the only
configuration handled by HTTPS Enforcer as of 1.0.9). To verify this setup, put a PHP script calling
phpinfo() somewhere on your site and access it over the SSL proxy. PHP variables such as
**$_SERVER['SERVER_NAME']**  or **$_SERVER['HTTP_HOST']**  should be the same as when accessing the
script directly (ie, www.mydomain.org), however there are additional variables such as
**$_SERVER['HTTP_X_FORWARDED_HOST']** that contain the name of the SSL proxy (ie,
sslproxy.myisp.com).

In this situation, you can configure HTTPS Enforcer to treat all connections that are proxied by a
specific host as secure, and add this host to all secure redirects, via the use of the
**plugin.tx_httpsenforcer.ssl_proxy** constant. Mind that secure_typo3_root has to be set to the value of
unsecure_typo3_root!

Example secure URL:

`https://sslproxy.myisp.com/www.mydomain.org/path/as/configured/ <https://secure.myisp.com/www.mydomain.net/path/as/configured/>`__ 


Your Constants configuration:

**plugin.tx_httpsenforcer.secure_typo3_root = www.mydomain.org** 

**plugin.tx_httpsenforcer.unsecure_typo3_root = www.mydomain.org** 

**plugin.tx_httpsenforcer.ssl_proxy = sslproxy.myisp.com** 
