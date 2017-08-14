<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "https_enforcer".
 *
 * Auto generated 16-02-2017 13:21
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Page HTTP/HTTPS Enforcer',
  'description' => 'Adds a page record option to enforce HTTP/HTTPS access based on server port and environment vars. Can handle shared secure domains and SSL-proxys. Compatible with the RealURL extension.',
  'category' => 'fe',
  'version' => '3.0.0',
  'state' => 'beta',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearcacheonload' => true,
  'author' => 'Thomas Vogt',
  'author_email' => 'vogt.muc@gmail.com',
  'author_company' => '',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.6.0-7.6.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

