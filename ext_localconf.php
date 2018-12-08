<?php

//CE Icons
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);

$icons = [
    'ffpitheme_stage' => 'ext_icon.svg',
];

foreach ($icons as $iconName => $iconFile) {
    $iconRegistry->registerIcon(
        $iconName,
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:ffpi_theme/' . $iconFile]
    );
}