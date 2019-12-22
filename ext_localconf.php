<?php

//CE Icons
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);

$icons = [
    'ffpitheme_stage' => 'ext_icon.svg',
    'ffpitheme_video_teaser' => 'ext_icon.svg',
    'ffpitheme_picture_teaser' => 'ext_icon.svg',
    'ffpitheme_teaser_cards' => 'ext_icon.svg',
    'ffpitheme_grid_cards' => 'ext_icon.svg',
    'ffpitheme_news_menu' => 'ext_icon.svg',
    'ffpitheme_subpage_menu' => 'ext_icon.svg',
    'ffpitheme_participate' => 'ext_icon.svg',
];

foreach ($icons as $iconName => $iconFile) {
    $iconRegistry->registerIcon(
        $iconName,
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:ffpi_theme/' . $iconFile]
    );
}

//RTE Config
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['ffpi_default'] = 'EXT:ffpi_theme/Configuration/Yaml/Rte/FfpiDefault.yaml';