.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _notesfaq:

Notes/FAQ
=========

**Q: Why the whole business with setting up the TYPO3 root?** 

A: it is the most sure-fire way to work with most of the secure server URL “redirection” schemes
out there. If you have your own server and have your own SSL security certificate installed, your
HTTPS URL most likely looks something like:

`https://secure.mydomain.org/index.php?id=30 <https://secure.mydomain.org/index.php?id=30>`__ 

If you are on a shared virtual hosting server with your ISP providing the certificate, you most
likely have to “route” your HTTPS requests through their domain:

`https://secure55.myisp.com/~mydomain/index.php?id=30 <https://secure55.myisp.com/~mydomain/index.php?id=30>`__

Note that the Enforcer has to be able to translate page requests from insecure to secure, and secure
to insecure (to avoid slow loading of pages if a page is accessed through a “relative” link
right after a secure page). If you specify the root of your TYPO3 installation correctly, all it
needs to do is extract the base name of the document in question and add it to the specified root
(people setting up simulated static documents with TYPO3 is also a consideration, they don't use
the index/php syntax at all). Hence, the plugin takes your secure TYPO3 root for secure requests,
insecure TYPO3 root for “regular” requests, extracts the current “baseline” element in the
path (with arguments), and puts the 1 + 1 together. It should work in most cases.

**Q: How is a request identified as secure or insecure?** 

A: The Enforcer examines two server environment variables, @$_SERVER['SERVER_PORT'] and @$_SERVER['HTTPS'], to figure
out what is going on. This approach should be somewhat safe (it even detects someone “faking” the HTTPS with extra request arguments).

**Q: How does the Enforcer know if a page should be made secure?** 

A: The Enforcer adds an extra numeric field in the *pages* table (extends it) called
**tx_httpsenforcer_force_secure** . That extra field is available in the page header, accessible
from the backend TYPO3 interface. If you check the **HTTPS Enforcer (SSL)**  field, it will set the
**tx_httpsenforcer_force_secure**  page field to 1, and the Enforcer will know this page is supposed
to be secure.
