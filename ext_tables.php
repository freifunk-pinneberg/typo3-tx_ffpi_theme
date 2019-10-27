<?php
defined('TYPO3_MODE') or die();

# Register Base PageTs for domains (only 7.6+)
if(method_exists('\TYPO3\CMS\Core\Utility\ExtensionManagementUtility','registerPageTSConfigFile')){
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $_EXTKEY,
        'Configuration/PageTSconfig/Base.tsconfig',
        'Freifunk Pinneberg - Base PageTs'
    );
}
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    $_EXTKEY,
    'Configuration/TypoScript',
    'Freifunk Pinneberg - Base Theme'
);