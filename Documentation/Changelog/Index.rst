.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _changelog:

ChangeLog
=========

.. tabularcolumns:: |r|p{13.7cm}|

=======  ===========================================================================
Version  Changes
=======  ===========================================================================
3.0.0    - Support for TYPO3 7.6
         - Moved checkbox **HTTPS Enforcer (SSL)** within pages record to tab *Behaviour*, palette *Miscellaneous*
         - Changed TypoScript parameter names for standardization (**Important:**  you have to rename former TypoScript constants as well as the vendor
           name in the :ref:`controller configuration <user-manual-activating-the-extension>`)
         - Include static TypoScript via TypoScript Template (Include static): Static TypoScript was moved to EXT:https_enforcer/Configuration/TypoScript
         - Complete documentation overhaul (is now built with Sphinx)
2.0.1    - Removed deprecated function loadTCA
         - Update to namespace syntax in ext_tables.php
2.0.0    - raise major release number in order to distinguish extbase / pibase version
         - fix documentation mistake (TypoScript configuration)
1.0.15   - dependency settings changed (current version only works with TYPO3 v6.0 and higher)
1.0.14   - documentation update
1.0.13   - make extension compatible with extbase
1.0.11   - fix always_allow_SSL bug [thanks, Tolleiv Nietsch!]
         - add sslPort option
1.0.10   - added always_allow_SSL constant
         - when checking for an SSL connection, we now look at the superglobal $_SERVER instead of
           $GLOBALS['HTTP_SERVER_VARS']. $_SERVER is available since PHP 4.1 and the preferred method to
           access these variables, as the “long arrays” (HTTP_\*_VARS) are deprecated for performance
           reasons and may be disabled in installations running on PHP 5, and the variables we need are not
           provided by typo3's t3lib_div::getIndepEnv() [thanks, Johnny, for researching this]
1.0.9    - added https_enforcer.ssl_proxy constant and support for SSL proxys “invisible” to typo3
         - State changed to beta as we have started to do some development (and will do some more soon, see
           ToDo) and thus may introduce bugs
1.0.8    - changed the way https_enforcer separates the (un)secure_typo3_root from the rest of the path so
           that it works well with the **realurl**  extension
=======  ===========================================================================
