<?php

defined('TYPO3') || die();

$extensionKey = 'FfpiTheme';
$extensionPath = 'ffpi_theme';
$ll = 'LLL:EXT:' . $extensionPath . '/Resources/Private/Language/locallang_backend.xlf:';
$llCore = 'LLL:EXT:core/Resources/Private/Language/locallang.xlf';
$llFrontend = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
$llFrontendDb = 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:';


// Add Content Elements from Subfolder
$files = glob(__DIR__ . '/ContentElements/*.php');

if ($files) {
    foreach ($files as $file) {
        /** @var array<mixed> $contentElement */
        $contentElement = include $file;
        $contentName = strtolower($extensionKey . '_' . $contentElement['name']);

        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
            [
                'label' => $ll . $contentElement['name'] . '.wizard.title',
                'value' => $contentName,
                'icon' => $contentElement['icon'] ?? 'ffpitheme_' . $contentElement['name'],
                'group' => 'default',
            ],
            'CType',
            $extensionPath
        );
        $GLOBALS['TCA']['tt_content']['types'][$contentName] = [
            'showitem' => $contentElement['showitem'],
            'columnsOverrides' => $contentElement['columnsOverrides']
        ];

        if ($contentElement['flexform']) {
            TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
                '*',
                'FILE:EXT:' . $extensionPath . '/Configuration/FlexForms/' . ucfirst($contentElement['name']) . '.xml',
                $contentName
            );
        }
    }
}
$GLOBALS['TCA']['tt_content']['columns']['hidden']['config']['l10n_mode'] = 'mergeIfNotBlank';
$GLOBALS['TCA']['tt_content']['columns']['hidden']['config']['l10n_display'] = 'defaultAsReadonly';
