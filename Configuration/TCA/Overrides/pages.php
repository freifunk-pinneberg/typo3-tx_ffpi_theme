<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();


ExtensionManagementUtility::registerPageTSConfigFile(
    'ffpi_theme',
    'Configuration/PageTSconfig/Base.tsconfig',
    'Freifunk Pinneberg - Base PageTs'
);

$fields = [
    'tx_ffpi_theme_icon' => [
        'label' => 'Icon',
        'exclude' => 1,
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'label' => '',
                    'value' => '',
                ],
                [
                    'label' => 'Question',
                    'value' => 'Question.svg',
                ],
                [
                    'label' => 'Arrow',
                    'value' => 'Arrow.svg',
                ],
            ],
        ],
    ]
];

// Add new fields to pages:
ExtensionManagementUtility::addTCAcolumns('pages', $fields);

// Make fields visible in the TCEforms:
ExtensionManagementUtility::addToAllTCAtypes(
    'pages', // Table name
    '--palette--;Freifunk;tx_ffpi_theme', // Field list to add
    '1', // List of specific types to add the field list to. (If empty, all type entries are affected)
    'after:nav_title' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['pages']['palettes']['tx_ffpi_theme'] = [
    'showitem' => 'tx_ffpi_theme_icon'
];
