<?php

$tempColumns = [
	'tx_httpsenforcer_force_secure' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:https_enforcer/Resources/Private/Language/locallang_db.xlf:pages.tx_httpsenforcer_force_secure',
		'config' => [
			'type' => 'check',
			'items' => [
				['LLL:EXT:lang/locallang_core.xlf:labels.enabled', ''],
			],
		]
	]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'miscellaneous', 'tx_httpsenforcer_force_secure');

?>