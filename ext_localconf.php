<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TVogt.' . $_EXTKEY,
	'Pi1',
	array(
		'Https' => 'main',
	),
	// non-cacheable actions
	array(
		'Https' => 'main',
	)
);
	
?>