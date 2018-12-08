<?php

defined('TYPO3_MODE') || die();

$extensionKey = 'FfpiTheme';
$extensionPath = 'ffpi_theme';
$ll = 'LLL:EXT:' . $extensionPath . '/Resources/Private/Language/locallang_backend.xlf:';
$llCore = 'LLL:EXT:lang/locallang.xlf';
$llFrontend = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
$llFrontendDb = 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:';


// Add Content Elements from Subfolder
$files = glob(__DIR__ . '/ContentElements/*.php');

foreach ($files as $file) {
    /** @var array $contentElement */
    $contentElement = include $file;
    $contentName = strtolower($extensionKey . '_' . $contentElement['name']);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            $ll . $contentElement['name'] . '.wizard.title',
            $contentName,
            $contentElement['icon'] ?: 'EXT:' . $extensionPath . '/ext_icon.svg'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
        $extensionPath
    );
    $GLOBALS['TCA']['tt_content']['types'][$contentName] = [
        'showitem' => $contentElement['showitem'],
        'columnsOverrides' => $contentElement['columnsOverrides']
    ];

    if ($contentElement['flexform']) {
        $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][',' . $contentName] =
            'FILE:EXT:' . $extensionPath . '/Configuration/FlexForms/' . ucfirst($contentElement['name']) . '.xml';
    }
}

$GLOBALS['TCA']['tt_content']['columns']['hidden']['config']['l10n_mode'] = 'mergeIfNotBlank';
$GLOBALS['TCA']['tt_content']['columns']['hidden']['config']['l10n_display'] = 'defaultAsReadonly';
