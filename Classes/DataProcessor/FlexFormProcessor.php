<?php

namespace FFPI\FfpiTheme\DataProcessor;

/*
 * This file was part of the package bk2k/bootstrap-package.
 * licensed under the MIT License
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Minimal TypoScript configuration
 * Process field pi_flexform and overrides the values stored in data
 *
 * 10 = BK2K\BootstrapPackage\DataProcessing\FlexFormProcessor
 *
 *
 * Advanced TypoScript configuration
 * Process field assigned in fieldName and stores processed data to new key
 *
 * 10 = BK2K\BootstrapPackage\DataProcessing\FlexFormProcessor
 * 10 {
 *   fieldName = pi_flexform
 *   as = flexform
 * }
 */
class FlexFormProcessor implements DataProcessorInterface
{
    /**
     * @var FlexFormService
     */
    protected $flexFormService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
    }

    /**
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array<mixed> the processed data as key/value store
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData): array
    {
        // The field name to process
        $fieldName = $cObj->stdWrapValue('fieldName', $processorConfiguration);
        if (empty($fieldName)) {
            $fieldName = 'pi_flexform';
        }
        if (!$processedData['data'][$fieldName]) {
            return $processedData;
        }
        // Process Flexform
        $originalValue = $processedData['data'][$fieldName];
        if (!is_string($originalValue)) {
            return $processedData;
        }
        $flexformData = $this->flexFormService->convertFlexFormContentToArray($originalValue);
        // Set the target variable
        $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration);
        if (!empty($targetVariableName)) {
            $processedData[$targetVariableName] = $flexformData;
        } else {
            $processedData['data'][$fieldName] = $flexformData;
        }
        return $processedData;
    }
}
